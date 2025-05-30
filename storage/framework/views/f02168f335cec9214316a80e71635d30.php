<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="<?php echo e(asset('storage/image/logo-smk2klt.png')); ?>">
    <title><?php echo $__env->yieldContent('title', 'Absensi Siswa | RFID'); ?></title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<body class="bg-gray-100">
    <nav>
        <?php echo $__env->yieldContent('navbar'); ?>
    </nav>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/layout/app.blade.php ENDPATH**/ ?>