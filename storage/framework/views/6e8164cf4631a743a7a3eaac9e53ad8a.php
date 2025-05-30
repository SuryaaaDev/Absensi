

<?php $__env->startSection('title', 'Login | RFID'); ?>
<?php $__env->startSection('content'); ?>
    <?php if($errors->any() || session('failed')): ?>
        <div class="fixed z-10 top-4 right-4">
            <div class="flex items-start w-full gap-4 px-4 py-3 text-sm text-red-600 border border-red-100 rounded bg-red-100/50"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5" role="graphics-symbol" aria-labelledby="title-09 desc-09">
                    <title id="title-09">Icon title</title>
                    <desc id="desc-09">A more detailed description of the icon</desc>
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h3 class="mb-2 font-semibold">Login failed!</h3>
                    <?php if($errors->any()): ?>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    <?php if(session('failed')): ?>
                        <p><?php echo e(session('failed')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="h-screen flex justify-center items-center bg-gray-100 p-5 md:p-0">
        <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md <?php if($errors->any() || session('failed')): ?>
            ring-2 ring-red-600 shadow-red-400 shadow-xl            
        <?php endif; ?>">
            <div class="px-6 py-4">
                <h3 class="mt-3 text-xl font-medium text-center text-gray-600">Selamat Datang</h3>

                <p class="mt-1 text-center text-gray-500">Masukkan Email dan Password anda</p>

                <form action="<?php echo e(route('login.submit')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="w-full mt-4">
                        <input
                            class="block w-full px-4 py-2 mt-2 text-black placeholder-gray-500 bg-white border rounded-lg ring-1 ring-gray-100 focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                            type="email" placeholder="Email" name="email" required />
                    </div>

                    <div class="w-full mt-4">
                        <input
                            class="block w-full px-4 py-2 mt-2 text-black placeholder-gray-500 bg-white border rounded-lg ring-1 ring-gray-100 focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                            type="password" placeholder="Password" name="password" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        

                        <button
                            class="px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50 cursor-pointer">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/auth/login.blade.php ENDPATH**/ ?>