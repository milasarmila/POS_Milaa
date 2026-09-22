<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container py-4">

    
    <div class="page-header">

        <div>
            <h1>Produk</h1>
            <p>Kelola data produk dan stok barang.</p>
        </div>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Produk::class)): ?>
            <a href="<?php echo e(route('produk.create')); ?>" class="btn-tambah">
                + Tambah Produk
            </a>
        <?php endif; ?>

    </div>


    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            <strong>Berhasil!</strong>
            <?php echo e(session('success')); ?>


            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    <?php endif; ?>


    
    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong>Gagal!</strong>
            <?php echo e(session('error')); ?>


            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    <?php endif; ?>


    
    <div class="produk-container">

        
        <div class="produk-header">

            <div>
                <h4>Daftar Produk</h4>
                <p>Produk yang tersedia di sistem.</p>
            </div>

            
            <form
                action="<?php echo e(route('produk.index')); ?>"
                method="GET"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    value="<?php echo e(request('search')); ?>"
                    placeholder="Cari produk..."
                    class="search-input"
                >

                <button type="submit" class="btn-cari">
                    Cari
                </button>

                <?php if(request('search')): ?>
                    <a
                        href="<?php echo e(route('produk.index')); ?>"
                        class="btn-reset"
                    >
                        Reset
                    </a>
                <?php endif; ?>

            </form>

        </div>


        
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

                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            
                            <td>
                                <?php echo e($products->firstItem() + $loop->index); ?>

                            </td>


                            
                            <td>

                                <a
                                    href="<?php echo e(route('produk.edit', $product)); ?>"
                                    class="foto-link"
                                >

                                    <div class="foto-box">

                                        <?php if($product->foto): ?>

                                            <img
                                                src="<?php echo e(asset('storage/' . $product->foto)); ?>"
                                                alt="<?php echo e($product->nama); ?>"
                                                class="foto-produk"
                                            >

                                        <?php else: ?>

                                            <span class="no-foto">
                                                📦
                                            </span>

                                        <?php endif; ?>

                                    </div>

                                </a>

                            </td>


                            
                            <td>

                                <a
                                    href="<?php echo e(route('produk.edit', $product)); ?>"
                                    class="nama-produk"
                                >
                                    <?php echo e($product->nama); ?>

                                </a>

                            </td>


                            
                            <td>

                                Rp <?php echo e(number_format(
                                    $product->harga_beli,
                                    0,
                                    ',',
                                    '.'
                                )); ?>


                            </td>


                            
                            <td>

                                <span class="harga-jual">
                                    Rp <?php echo e(number_format(
                                        $product->harga_jual,
                                        0,
                                        ',',
                                        '.'
                                    )); ?>

                                </span>

                            </td>


                            
                            <td>

                                <?php if($product->stok <= 0): ?>

                                    <span class="stok habis">
                                        Habis
                                    </span>

                                <?php elseif($product->stok <= 10): ?>

                                    <span class="stok sedikit">
                                        <?php echo e($product->stok); ?> pcs
                                    </span>

                                <?php else: ?>

                                    <span class="stok tersedia">
                                        <?php echo e($product->stok); ?> pcs
                                    </span>

                                <?php endif; ?>

                            </td>


                            
                            <td>

                                <div class="aksi">

                                    
                                    <a
                                        href="<?php echo e(route('produk.show', $product->id)); ?>"
                                        class="btn-detail"
                                    >
                                        Detail
                                    </a>


                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $product)): ?>

                                        <a
                                            href="<?php echo e(route('produk.edit', $product)); ?>"
                                            class="btn-edit"
                                        >
                                            Edit
                                        </a>

                                    <?php endif; ?>


                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $product)): ?>

                                        <form
                                            action="<?php echo e(route('produk.destroy', $product)); ?>"
                                            method="POST"
                                            class="form-hapus"
                                        >

                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button
                                                type="submit"
                                                class="btn-hapus"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    <?php endif; ?>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="7">

                                <div class="kosong">

                                    <div class="kosong-icon">
                                        📦
                                    </div>

                                    <h4>Belum ada produk</h4>

                                    <?php if(request('search')): ?>

                                        <p>
                                            Produk "<?php echo e(request('search')); ?>" tidak ditemukan.
                                        </p>

                                        <a
                                            href="<?php echo e(route('produk.index')); ?>"
                                            class="btn-reset"
                                        >
                                            Tampilkan Semua
                                        </a>

                                    <?php else: ?>

                                        <p>
                                            Belum ada produk yang tersimpan.
                                        </p>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Produk::class)): ?>

                                            <a
                                                href="<?php echo e(route('produk.create')); ?>"
                                                class="btn-tambah"
                                            >
                                                + Tambah Produk
                                            </a>

                                        <?php endif; ?>

                                    <?php endif; ?>

                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>


        
        <?php if($products->hasPages()): ?>

            <div class="pagination-area">

                <div>
                    Menampilkan
                    <strong><?php echo e($products->firstItem()); ?></strong>
                    -
                    <strong><?php echo e($products->lastItem()); ?></strong>
                    dari
                    <strong><?php echo e($products->total()); ?></strong>
                    produk
                </div>

                <div>
                    <?php echo e($products->appends(request()->query())->links()); ?>

                </div>

            </div>

        <?php endif; ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\POS_Milaa-main\resources\views/produk/index.blade.php ENDPATH**/ ?>