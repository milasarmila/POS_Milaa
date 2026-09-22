<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?php echo $__env->yieldContent('title', 'Laa Accessories'); ?>
    </title>

    <?php echo app('Illuminate\Foundation\Vite')([
        'resources/css/app.css',
        'resources/js/app.js'
    ]); ?>

    <style>

        /* =====================================================
           GLOBAL
           ===================================================== */

        html,
        body {
            width: 100%;
            min-height: 100%;

            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f8fafc;
        }


        /* =====================================================
           CONTENT HALAMAN
           ===================================================== */

        .laa-page-content {
            width: 100%;

            margin: 0;
            padding: 0;
        }


        /* =====================================================
           ALERT SUCCESS
           ===================================================== */

        .laa-alert-wrapper {
            width: 1250px;
            max-width: calc(100% - 30px);

            margin: 0 auto 20px auto;
            padding: 0;
        }


        /* =====================================================
           BOOTSTRAP CONTAINER TIDAK MEMPENGARUHI NAVBAR
           ===================================================== */

        .laa-page-content > .container,
        .laa-page-content > .container-fluid {
            margin-left: auto;
            margin-right: auto;
        }

    </style>

</head>

<body>

    

    <main class="laa-page-content">

        
        <?php if(session('success')): ?>
            <div class="laa-alert-wrapper">
                <div class="alert alert-success mb-0">
                    <?php echo e(session('success')); ?>

                </div>
            </div>
        <?php endif; ?>


        
        <?php echo $__env->yieldContent('content'); ?>

    </main>

</body>
</html><?php /**PATH C:\laragon\www\POS_Milaa-main\resources\views/layouts/app.blade.php ENDPATH**/ ?>