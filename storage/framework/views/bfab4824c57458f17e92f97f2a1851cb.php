<?php echo csrf_field(); ?>

<style>
    .form-title {
        color: #5c3d49;
        font-weight: 700;
    }

    .form-label-custom {
        color: #684854;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .form-control, .form-select {
        border-color: #eadde3;
        border-radius: 9px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #f1a5c2;
        box-shadow: 0 0 0 0.2rem rgba(241, 165, 194, 0.15);
    }

    .btn-pink {
        background: #f28fb5;
        border-color: #f28fb5;
        color: white;
        border-radius: 9px;
        padding: 9px 20px;
        font-weight: 600;
    }

    .btn-pink:hover {
        background: #e97da6;
        border-color: #e97da6;
        color: white;
    }

    .btn-back {
        border-radius: 9px;
        padding: 9px 20px;
        font-weight: 600;
    }
</style>

<div class="row g-3">
    
    <div class="col-12">
        <label class="form-label-custom">Nama Lengkap</label>
        <input 
            type="text" 
            name="name"
            class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            value="<?php echo e(old('name', $user->name ?? '')); ?>"
            placeholder="Masukkan nama lengkap user..."
            required
        >
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback">
                <?php echo e($message); ?>

            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div class="col-12 col-md-6">
        <label class="form-label-custom">Email</label>
        <input 
            type="email" 
            name="email"
            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            value="<?php echo e(old('email', $user->email ?? '')); ?>"
            placeholder="nama@email.com"
            required
        >
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback">
                <?php echo e($message); ?>

            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div class="col-12 col-md-6">
        <label class="form-label-custom">
            Password 
            <?php if(isset($user)): ?>
                <small class="text-muted font-weight-normal">(Kosongkan jika tidak ingin mengubah)</small>
            <?php endif; ?>
        </label>
        <input 
            type="password" 
            name="password"
            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            placeholder="Masukkan password..."
            <?php echo e(isset($user) ? '' : 'required'); ?>

        >
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback">
                <?php echo e($message); ?>

            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div class="col-12">
        <label class="form-label-custom">Role / Hak Akses</label>
        <select 
            name="role_id"
            class="form-select <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            required
        >
            <option value="">-- Pilih Role --</option>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($role->id); ?>" <?php if(old('role_id', $user->role_id ?? '') == $role->id): echo 'selected'; endif; ?>>
                    <?php echo e(ucfirst($role->name)); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback">
                <?php echo e($message); ?>

            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div class="col-12 mt-4 d-flex align-items-center gap-2">
        <button type="submit" class="btn btn-pink">
            💾 Simpan
        </button>
        <a href="<?php echo e(route('admin.users')); ?>" class="btn btn-secondary btn-back">
            ← Kembali
        </a>
    </div>
</div><?php /**PATH C:\laragon\www\POS_Milaa-main\resources\views/users/_form.blade.php ENDPATH**/ ?>