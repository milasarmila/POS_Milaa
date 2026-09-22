<?php $__env->startSection('title', 'Edit Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    .edit-page {
        background: #fff9fc;
        min-height: calc(100vh - 60px);
        padding: 35px 0 50px;
    }

    .edit-header {
        margin-bottom: 25px;
    }

    .page-title {
        color: #4f3540;
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 5px;
    }

    .page-subtitle {
        color: #947682;
        font-size: 14px;
    }

    .edit-wrapper {
        max-width: 850px;
        margin: 0 auto;
    }

    .edit-card {
        background: #ffffff;
        border: 1px solid #f3dce6;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(225, 150, 180, 0.10);
        padding: 25px;
    }
</style>


<div class="edit-page">

    <div class="container">

        <div class="edit-wrapper">

            
            <div class="edit-header">

                <h2 class="page-title">
                    Edit Produk
                </h2>

                <p class="page-subtitle mb-0">
                    Ubah foto, nama, harga, atau stok produk.
                </p>

            </div>


            
            <div class="edit-card">

                <form
                    action="<?php echo e(route('produk.update', $produk)); ?>"
                    method="POST"
                    enctype="multipart/form-data">

                    <?php echo method_field('PUT'); ?>

                    <?php echo $__env->make('produk._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                </form>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\POS_Milaa-main\resources\views/produk/edit.blade.php ENDPATH**/ ?>