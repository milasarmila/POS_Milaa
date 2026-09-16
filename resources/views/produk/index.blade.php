@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1>Produk</h1>
            <p>Kelola data produk dan stok barang.</p>
        </div>

        @can('create', App\Models\Produk::class)
            <a href="{{ route('produk.create') }}" class="btn-tambah">
                + Tambah Produk
            </a>
        @endcan

    </div>


    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            <strong>Berhasil!</strong>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif


    {{-- ALERT ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong>Gagal!</strong>
            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif


    {{-- DAFTAR PRODUK --}}
    <div class="produk-container">

        {{-- HEADER TABEL --}}
        <div class="produk-header">

            <div>
                <h4>Daftar Produk</h4>
                <p>Produk yang tersedia di sistem.</p>
            </div>

            {{-- SEARCH --}}
            <form
                action="{{ route('produk.index') }}"
                method="GET"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari produk..."
                    class="search-input"
                >

                <button type="submit" class="btn-cari">
                    Cari
                </button>

                @if(request('search'))
                    <a
                        href="{{ route('produk.index') }}"
                        class="btn-reset"
                    >
                        Reset
                    </a>
                @endif

            </form>

        </div>


        {{-- TABLE --}}
        <div class="table-responsive">

            <table class="table produk-table mb-0">

                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th width="90">Foto</th>
                        <th>Nama Produk</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width="210">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($products as $product)

                        <tr>

                            {{-- NOMOR --}}
                            <td>
                                {{ $products->firstItem() + $loop->index }}
                            </td>


                            {{-- FOTO --}}
                            <td>

                                <a
                                    href="{{ route('produk.edit', $product) }}"
                                    class="foto-link"
                                >

                                    <div class="foto-box">

                                        @if($product->foto)

                                            <img
                                                src="{{ asset('storage/' . $product->foto) }}"
                                                alt="{{ $product->nama }}"
                                                class="foto-produk"
                                            >

                                        @else

                                            <span class="no-foto">
                                                📦
                                            </span>

                                        @endif

                                    </div>

                                </a>

                            </td>


                            {{-- NAMA --}}
                            <td>

                                <a
                                    href="{{ route('produk.edit', $product) }}"
                                    class="nama-produk"
                                >
                                    {{ $product->nama }}
                                </a>

                            </td>


                            {{-- HARGA BELI --}}
                            <td>

                                Rp {{ number_format(
                                    $product->harga_beli,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                            {{-- HARGA JUAL --}}
                            <td>

                                <span class="harga-jual">
                                    Rp {{ number_format(
                                        $product->harga_jual,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                </span>

                            </td>


                            {{-- STOK --}}
                            <td>

                                @if($product->stok <= 0)

                                    <span class="stok habis">
                                        Habis
                                    </span>

                                @elseif($product->stok <= 10)

                                    <span class="stok sedikit">
                                        {{ $product->stok }} pcs
                                    </span>

                                @else

                                    <span class="stok tersedia">
                                        {{ $product->stok }} pcs
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="aksi">

                                    {{-- DETAIL --}}
                                    <a
                                        href="{{ route('produk.show', $product->id) }}"
                                        class="btn-detail"
                                    >
                                        Detail
                                    </a>


                                    {{-- EDIT --}}
                                    @can('update', $product)

                                        <a
                                            href="{{ route('produk.edit', $product) }}"
                                            class="btn-edit"
                                        >
                                            Edit
                                        </a>

                                    @endcan


                                    {{-- HAPUS --}}
                                    @can('delete', $product)

                                        <form
                                            action="{{ route('produk.destroy', $product) }}"
                                            method="POST"
                                            class="form-hapus"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-hapus"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    @endcan

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7">

                                <div class="kosong">

                                    <div class="kosong-icon">
                                        📦
                                    </div>

                                    <h4>Belum ada produk</h4>

                                    @if(request('search'))

                                        <p>
                                            Produk "{{ request('search') }}" tidak ditemukan.
                                        </p>

                                        <a
                                            href="{{ route('produk.index') }}"
                                            class="btn-reset"
                                        >
                                            Tampilkan Semua
                                        </a>

                                    @else

                                        <p>
                                            Belum ada produk yang tersimpan.
                                        </p>

                                        @can('create', App\Models\Produk::class)

                                            <a
                                                href="{{ route('produk.create') }}"
                                                class="btn-tambah"
                                            >
                                                + Tambah Produk
                                            </a>

                                        @endcan

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($products->hasPages())

            <div class="pagination-area">

                <div>
                    Menampilkan
                    <strong>{{ $products->firstItem() }}</strong>
                    -
                    <strong>{{ $products->lastItem() }}</strong>
                    dari
                    <strong>{{ $products->total() }}</strong>
                    produk
                </div>

                <div>
                    {{ $products->appends(request()->query())->links() }}
                </div>

            </div>

        @endif

    </div>

</div>


<style>

    /* =========================
       DASAR
    ========================= */

    body {
        background: #fff9fb;
    }

    .container {
        max-width: 1250px;
    }


    /* =========================
       HEADER
    ========================= */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .page-header h1 {
        margin: 0;
        font-size: 30px;
        font-weight: 700;
        color: #222;
    }

    .page-header p {
        margin: 5px 0 0;
        color: #777;
        font-size: 14px;
    }


    /* =========================
       TOMBOL TAMBAH
    ========================= */

    .btn-tambah {
        display: inline-block;
        background: #f28bb0;
        color: white;
        text-decoration: none;
        border: none;
        padding: 10px 18px;
        border-radius: 7px;
        font-weight: 600;
    }

    .btn-tambah:hover {
        background: #eb729f;
        color: white;
    }


    /* =========================
       ALERT
    ========================= */

    .alert {
        border-radius: 7px;
    }


    /* =========================
       CONTAINER PRODUK
    ========================= */

    .produk-container {
        background: white;
        border: 1px solid #f0dce4;
        border-radius: 10px;
        overflow: hidden;
    }


    /* =========================
       HEADER PRODUK
    ========================= */

    .produk-header {
        padding: 18px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        border-bottom: 1px solid #f0e3e8;
    }

    .produk-header h4 {
        margin: 0;
        font-size: 20px;
        font-weight: 600;
        color: #222;
    }

    .produk-header p {
        margin: 4px 0 0;
        font-size: 13px;
        color: #888;
    }


    /* =========================
       SEARCH
    ========================= */

    .search-form {
        display: flex;
        gap: 7px;
    }

    .search-input {
        width: 240px;
        height: 40px;
        border: 1px solid #e4ccd6;
        border-radius: 7px;
        padding: 0 12px;
        outline: none;
    }

    .search-input:focus {
        border-color: #f28bb0;
    }

    .btn-cari {
        height: 40px;
        padding: 0 17px;
        background: #f28bb0;
        color: white;
        border: none;
        border-radius: 7px;
        font-weight: 600;
    }

    .btn-cari:hover {
        background: #eb729f;
    }

    .btn-reset {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        padding: 0 14px;
        background: white;
        color: #666;
        border: 1px solid #ddd;
        border-radius: 7px;
        text-decoration: none;
    }

    .btn-reset:hover {
        background: #f5f5f5;
        color: #333;
    }


    /* =========================
       TABLE
    ========================= */

    .produk-table {
        min-width: 900px;
    }

    .produk-table thead th {
        background: #fff5f8;
        color: #555;
        font-size: 13px;
        font-weight: 600;
        padding: 13px 14px;
        border-bottom: 1px solid #eedce3;
        white-space: nowrap;
    }

    .produk-table tbody td {
        padding: 12px 14px;
        vertical-align: middle;
        font-size: 14px;
        color: #555;
        border-bottom: 1px solid #f2e8ec;
    }

    .produk-table tbody tr:last-child td {
        border-bottom: none;
    }

    .produk-table tbody tr:hover {
        background: #fffafb;
    }


    /* =========================
       FOTO
    ========================= */

    .foto-link {
        text-decoration: none;
    }

    .foto-box {
        width: 55px;
        height: 55px;
        border-radius: 7px;
        overflow: hidden;
        border: 1px solid #ead8df;
        background: #fff5f8;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .foto-produk {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .no-foto {
        font-size: 22px;
    }


    /* =========================
       NAMA PRODUK
    ========================= */

    .nama-produk {
        color: #222;
        text-decoration: none;
        font-weight: 600;
    }

    .nama-produk:hover {
        color: #f28bb0;
    }


    /* =========================
       HARGA
    ========================= */

    .harga-jual {
        color: #f06f9f;
        font-weight: 600;
    }


    /* =========================
       STOK
    ========================= */

    .stok {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: 600;
    }

    .tersedia {
        background: #eaf7ef;
        color: #198754;
    }

    .sedikit {
        background: #fff3cd;
        color: #856404;
    }

    .habis {
        background: #f8d7da;
        color: #b02a37;
    }


    /* =========================
       AKSI
    ========================= */

    .aksi {
        display: flex;
        align-items: center;
        gap: 5px;
        flex-wrap: wrap;
    }

    .aksi a,
    .aksi button {
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 12px;
        text-decoration: none;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-detail {
        background: #f3f3f3;
        color: #555;
        border: 1px solid #ddd;
    }

    .btn-detail:hover {
        background: #e9e9e9;
        color: #333;
    }

    .btn-edit {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffe69c;
    }

    .btn-edit:hover {
        background: #ffc107;
        color: #333;
    }

    .btn-hapus {
        background: #fde8eb;
        color: #dc3545;
        border: 1px solid #f5c2c7;
    }

    .btn-hapus:hover {
        background: #dc3545;
        color: white;
    }

    .form-hapus {
        display: inline;
        margin: 0;
    }


    /* =========================
       DATA KOSONG
    ========================= */

    .kosong {
        text-align: center;
        padding: 50px 20px;
    }

    .kosong-icon {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .kosong h4 {
        margin-bottom: 5px;
    }

    .kosong p {
        color: #888;
        margin-bottom: 15px;
    }


    /* =========================
       PAGINATION
    ========================= */

    .pagination-area {
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #f0e3e8;
        font-size: 13px;
        color: #888;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .produk-header {
            flex-direction: column;
            align-items: stretch;
        }

        .search-form {
            width: 100%;
        }

        .search-input {
            width: 100%;
            flex: 1;
        }

        .pagination-area {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

    }

</style>


<script>

    document.addEventListener('DOMContentLoaded', function () {

        const deleteForms = document.querySelectorAll('.form-hapus');

        deleteForms.forEach(function (form) {

            form.addEventListener('submit', function (event) {

                const yakin = confirm(
                    'Apakah kamu yakin ingin menghapus produk ini?'
                );

                if (!yakin) {
                    event.preventDefault();
                }

            });

        });

    });

</script>

@endsection