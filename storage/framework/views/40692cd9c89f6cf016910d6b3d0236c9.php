<?php $__env->startSection('title', 'Tambah User'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    /* Header Card Banner Pink */
    .header-pink-card {
        background: linear-gradient(135deg, #f8a5c2 0%, #f472b6 100%);
        border-radius: 12px;
        padding: 20px 25px;
        color: white;
        box-shadow: 0 4px 12px rgba(244, 114, 182, 0.2);
    }

    /* Container Form Kustom */
    .form-container-pink {
        background: #ffffff;
        border: 1px solid #fce7f3;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(244, 114, 182, 0.08);
    }
</style>

<div class="container py-4">

    
    <div class="header-pink-card mb-4">
        <h1 class="h3 mb-1 fw-bold text-white">Tambah User</h1>
        <p class="mb-0 text-white-50" style="opacity: 0.9;">Tambahkan pengguna baru beserta hak aksesnya ke dalam sistem.</p>
    </div>

    
    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong>Gagal!</strong> <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    
    <div class="form-container-pink p-4">
        <form action="<?php echo e(route('admin.users.store')); ?>" method="POST">
            
            
            <?php echo $__env->make('users._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\POS_Milaa-main\resources\views/users/create.blade.php ENDPATH**/ ?>