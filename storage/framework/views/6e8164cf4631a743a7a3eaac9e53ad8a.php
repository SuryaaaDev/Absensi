<?php $__env->startSection('title', 'Login | RFID'); ?>
<?php $__env->startSection('content'); ?>
    

    <div class="relative isolate h-screen flex justify-center items-center bg-gray-100 p-5 md:p-0 overflow-hidden">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#34D399] to-[#06B6D4] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div
            class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md <?php if($errors->any() || session('failed')): ?> ring-2 ring-red-600 shadow-red-400 shadow-xl <?php endif; ?>">
            <div class="px-6 py-4">
                <h3 class="mt-3 text-xl font-medium text-center text-gray-600">Selamat Datang</h3>

                <p class="mt-1 text-center text-gray-500">Masukkan Email dan Password anda</p>

                <form action="<?php echo e(route('login.submit')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="w-full mt-4">
                        <input
                            class="block w-full px-4 py-2 mt-2 text-black placeholder-gray-500 bg-white border rounded-lg ring-1 ring-gray-100 focus:border-emerald-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-emerald-300 autofill:bg-white"
                            type="email" placeholder="Email" name="email" required />
                    </div>

                    <div class="w-full mt-4">
                        <input
                            class="block w-full px-4 py-2 mt-2 text-black placeholder-gray-500 bg-white border rounded-lg ring-1 ring-gray-100 focus:border-emerald-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-emerald-300 autofill:bg-white"
                            type="password" placeholder="Password" name="password" required />
                    </div>

                    <div class="flex justify-center items-center mt-4">
                        <div class="cf-turnstile" data-sitekey="<?php echo e(config('services.turnstile.sitekey')); ?>">
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        

                        <button
                            class="inline-flex items-center justify-center px-5 h-10 py-3 text-sm font-medium text-white bg-emerald-600 rounded-lg shadow hover:bg-emerald-500 transition-colors duration-300 cursor-pointer">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-30rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-50rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#34D399] to-[#06B6D4] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/auth/login.blade.php ENDPATH**/ ?>