<?php $__env->startSection('title', 'Detail Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    body {
        background: #fff8fb;
    }

    .detail-page {
        padding: 35px 0 50px;
    }

    .detail-card {
        max-width: 850px;
        margin: 0 auto;
        background: #ffffff;
        border: 1px solid #f3dce5;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .detail-header {
        padding: 22px 25px;
        background: #fff4f8;
        border-bottom: 1px solid #f3dce5;
    }

    .detail-title {
        margin: 0;
        color: #4f3540;
        font-weight: 700;
        font-size: 25px;
    }

    .detail-subtitle {
        color: #947682;
        font-size: 14px;
        margin-top: 5px;
    }

    .detail-body {
        padding: 30px;
    }

    .product-image-detail {
        width: 220px;
        height: 220px;
        object-fit: cover;
        border-radius: 15px;
        border: 1px solid #f3dce5;
        background: #fff4f8;
    }

    .product-name-detail {
        font-size: 24px;
        font-weight: 700;
        color: #343a40;
        margin-top: 15px;
    }

    .detail-table th {
        width: 180px;
        color: #777;
        font-weight: 600;
    }

    .detail-table td {
        color: #343a40;
    }

    .price-jual {
        color: #ec6f9e;
        font-weight: 700;
    }

    .stock-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .stock-safe {
        background: #e8f7ee;
        color: #198754;
    }

    .stock-low {
        background: #fff3cd;
        color: #997404;
    }

    .stock-empty {
        background: #f8d7da;
        color: #b02a37;
    }

    .btn-back {
        background: #f8f9fa;
        color: #666;
        border: 1px solid #ddd;
        border-radius: 9px;
        padding: 9px 16px;
        text-decoration: none;
    }

    .btn-back:hover {
        background: #eeeeee;
        color: #333;
    }

    .btn-edit-detail {
        background: #f48fb1;
        color: #ffffff;
        border: none;
        border-radius: 9px;
        padding: 9px 16px;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-edit-detail:hover {
        background: #ec6f9e;
        color: #ffffff;
    }
</style>


<div class="container detail-page">

    <div class="detail-card">

        
        <div class="detail-header">
            <h2 class="detail-title">
                Detail Produk
            </h2>

            <div class="detail-subtitle">
                Informasi lengkap produk yang dipilih
            </div>
        </div>


        <div class="detail-body">

            
            <div class="text-center mb-4">

                <?php if($produk->foto): ?>

                    <img
                        src="<?php echo e(asset('storage/' . $produk->foto)); ?>"
                        alt="<?php echo e($produk->nama); ?>"
                        class="product-image-detail"
                        onerror="this.style.display='none';"
                    >

                <?php else: ?>

                    <div
                        class="product-image-detail d-flex align-items-center justify-content-center mx-auto"
                        style="font-size: 60px;"
                    >
                        📦
                    </div>

                <?php endif; ?>


                <div class="product-name-detail">
                    <?php echo e($produk->nama); ?>

                </div>

            </div>


            
            <table class="table detail-table">

                <tr>
                    <th>Nama Produk</th>
                    <td>
                        <?php echo e($produk->nama); ?>

                    </td>
                </tr>

                <tr>
                    <th>Harga Beli</th>
                    <td>
                        Rp <?php echo e(number_format($produk->harga_beli, 0, ',', '.')); ?>

                    </td>
                </tr>

                <tr>
                    <th>Harga Jual</th>
                    <td class="price-jual">
                        Rp <?php echo e(number_format($produk->harga_jual, 0, ',', '.')); ?>

                    </td>
                </tr>

                <tr>
                    <th>Stok</th>
                    <td>

                        <?php if($produk->stok <= 0): ?>

                            <span class="stock-badge stock-empty">
                                Habis
                            </span>

                        <?php elseif($produk->stok <= 10): ?>

                            <span class="stock-badge stock-low">
                                <?php echo e($produk->stok); ?> pcs
                            </span>

                        <?php else: ?>

                            <span class="stock-badge stock-safe">
                                <?php echo e($produk->stok); ?> pcs
                            </span>

                        <?php endif; ?>

                    </td>
                </tr>

                <tr>
                    <th>Diinput Oleh</th>
                    <td>
                        <?php echo e($produk->user->name ?? 'User tidak tersedia'); ?>

                    </td>
                </tr>

                <tr>
                    <th>Dibuat</th>
                    <td>
                        <?php echo e($produk->created_at?->format('d-m-Y H:i') ?? '-'); ?>

                    </td>
                </tr>

                <tr>
                    <th>Terakhir Diubah</th>
                    <td>
                        <?php echo e($produk->updated_at?->format('d-m-Y H:i') ?? '-'); ?>

                    </td>
                </tr>

            </table>


            
            <div class="d-flex gap-2 mt-4">

                <a
                    href="<?php echo e(route('produk.index')); ?>"
                    class="btn btn-back"
                >
                    ← Kembali
                </a>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $produk)): ?>

                    <a
                        href="<?php echo e(route('produk.edit', $produk)); ?>"
                        class="btn btn-edit-detail"
                    >
                        ✏️ Edit Produk
                    </a>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\POS_Milaa-main\resources\views/produk/show.blade.php ENDPATH**/ ?>