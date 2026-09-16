<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        $user = Auth::user();

        $keyword = $request->input('search');

        $sales = Penjualan::query()

            ->when($user->role->name === 'kasir', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })

            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where(
                        'name',
                        'like',
                        '%' . $keyword . '%'
                    );
                });
            })

            ->latest()
            ->paginate()
            ->withQueryString();

        return view('penjualan.index', compact('sales'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(SearchRequest $request)
    {
        $sale = Penjualan::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'OPEN',
            ],
            [
                'total_pembayaran' => 0,
                'metode_pembayaran' => 'CASH',
            ]
        );

        $keyword = $request->input('search');

        if ($keyword) {

            $products = Produk::when(
                $keyword,
                function ($query) use ($keyword) {

                    $query->where(
                        'nama',
                        'like',
                        '%' . $keyword . '%'
                    );
                }
            )
                ->orderBy('nama')
                ->get();

        } else {

            $products = Produk::orderBy('nama')->get();
        }

        $mode = 'create';

        return view(
            'penjualan.pos',
            compact(
                'sale',
                'products',
                'mode'
            )
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penjualan = Penjualan::with([
            'user',
            'itemPenjualan.produk'
        ])->findOrFail($id);

        return view(
            'penjualan.show',
            compact('penjualan')
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        $sale = $penjualan;

        abort_if(
            $sale->status === 'COMPLETED',
            403
        );

        $sale->load('itemPenjualan');

        $products = Produk::orderBy('nama')->get();

        $mode = 'edit';

        return view(
            'penjualan.pos',
            compact(
                'sale',
                'products',
                'mode'
            )
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * Digunakan untuk menyelesaikan / checkout transaksi.
     */
    public function update(
        Request $request,
        Penjualan $penjualan
    ) {

        /*
        |--------------------------------------------------------------------------
        | VALIDASI METODE PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'payment_method' => [
                'required',
                'in:CASH,QRIS'
            ],

            'payment_amount' => [
                'nullable',
                'numeric',
                'min:0'
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | CEK STATUS TRANSAKSI
        |--------------------------------------------------------------------------
        */

        if ($penjualan->status !== 'OPEN') {

            return back()->with(
                'errors',
                'Transaksi sudah diproses.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK KERANJANG
        |--------------------------------------------------------------------------
        */

        if ($penjualan->itemPenjualan()->count() === 0) {

            return back()->with(
                'errors',
                'Keranjang masih kosong.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PROSES CHECKOUT
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use (
            $penjualan,
            $request
        ) {

            /*
            |--------------------------------------------------------------------------
            | HITUNG TOTAL DARI DATABASE
            |--------------------------------------------------------------------------
            */

            $total = $penjualan
                ->itemPenjualan()
                ->sum('subtotal');


            /*
            |--------------------------------------------------------------------------
            | METODE CASH
            |--------------------------------------------------------------------------
            */

            if ($request->payment_method === 'CASH') {

                $paymentAmount = (int) $request->payment_amount;


                /*
                | Uang pembayaran wajib diisi
                */

                if ($paymentAmount <= 0) {

                    abort(
                        422,
                        'Uang pembayaran wajib diisi.'
                    );
                }


                /*
                | Uang pembayaran tidak boleh kurang
                */

                if ($paymentAmount < $total) {

                    abort(
                        422,
                        'Uang pembayaran kurang dari total transaksi.'
                    );
                }


                /*
                | HITUNG KEMBALIAN
                */

                $change = $paymentAmount - $total;


                /*
                | SIMPAN TRANSAKSI
                */

                $penjualan->update([
                    'metode_pembayaran' => 'CASH',

                    'total_pembayaran' => $total,

                    'uang_pembayaran' => $paymentAmount,

                    'kembalian' => $change,

                    'status' => 'COMPLETED',
                ]);

            } else {

                /*
                |--------------------------------------------------------------------------
                | METODE QRIS
                |--------------------------------------------------------------------------
                |
                | QRIS tidak membutuhkan uang pembayaran
                | dan tidak memiliki kembalian.
                |
                */

                $penjualan->update([
                    'metode_pembayaran' => 'QRIS',

                    'total_pembayaran' => $total,

                    'uang_pembayaran' => null,

                    'kembalian' => 0,

                    'status' => 'COMPLETED',
                ]);
            }
        });


        /*
        |--------------------------------------------------------------------------
        | SELESAI
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'penjualan.show',
                $penjualan->id
            )
            ->with(
                'success',
                'Transaksi berhasil diselesaikan.'
            );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        /*
        |--------------------------------------------------------------------------
        | HANYA TRANSAKSI OPEN YANG BOLEH DIBATALKAN
        |--------------------------------------------------------------------------
        */

        if ($penjualan->status !== 'OPEN') {

            return redirect()
                ->route('penjualan.index')
                ->with(
                    'errors',
                    'Transaksi sudah selesai tidak bisa dibatalkan.'
                );
        }


        DB::transaction(function () use ($penjualan) {

            /*
            |--------------------------------------------------------------------------
            | KEMBALIKAN STOK
            |--------------------------------------------------------------------------
            */

            foreach (
                $penjualan->itemPenjualan
                as $item
            ) {

                $item->produk->increment(
                    'stok',
                    $item->kuantitas
                );
            }


            /*
            |--------------------------------------------------------------------------
            | HAPUS ITEM
            |--------------------------------------------------------------------------
            */

            $penjualan
                ->itemPenjualan()
                ->delete();


            /*
            |--------------------------------------------------------------------------
            | HAPUS PENJUALAN
            |--------------------------------------------------------------------------
            */

            $penjualan->delete();
        });


        return redirect()
            ->route('penjualan.index')
            ->with(
                'success',
                'Transaksi berhasil dibatalkan.'
            );
    }
}