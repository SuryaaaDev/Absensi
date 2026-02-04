<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('student.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-emerald-50 via-white to-green-50 p-10">
        <div
            class="relative w-full sm:w-1/2 xl:w-1/3 overflow-hidden rounded-2xl shadow-2xl border border-white/20 bg-white/30 backdrop-blur-xl transition-transform hover:scale-[1.02] duration-300">
            <div class="relative h-36 bg-gradient-to-r from-green-300 via-lime-200 to-emerald-300">
                <img src="<?php echo e(asset('storage/image/smkn2-klaten.png')); ?>" alt="SMK Negeri 2 Klaten"
                    class="absolute inset-0 opacity-25 bg-cover bg-center h-36 w-full rounded-b-2xl">

                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                    <div class="rounded-full border-4 border-white shadow-lg bg-gradient-to-tr from-lime-400 to-emerald-600">
                        <div
                            class="flex justify-center items-center size-32 rounded-full bg-emerald-600 shadow-inner text-white">
                            <?php if($user->profile): ?>
                                <img src="<?php echo e(asset('storage/' . $user->profile)); ?>" alt="<?php echo e($user->name); ?>"  class="w-full h-full object-cover rounded-full">
                            <?php else: ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-16" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                                        <path fill="currentColor"
                                            d="M16 14a5 5 0 0 1 4.995 4.783L21 19v1a2 2 0 0 1-1.85 1.995L19 22H5a2 2 0 0 1-1.995-1.85L3 20v-1a5 5 0 0 1 4.783-4.995L8 14h8Zm0 2H8a3 3 0 0 0-2.995 2.824L5 19v1h14v-1a3 3 0 0 0-2.824-2.995L16 16ZM12 2a5 5 0 1 1 0 10a5 5 0 0 1 0-10Zm0 2a3 3 0 1 0 0 6a3 3 0 0 0 0-6Z" />
                                    </g>
                                </svg>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-20 pb-6 px-6 text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-1"><?php echo e($user->name); ?></h3>
                <p class="text-sm text-gray-600 mb-4"><?php echo e($user->class->class_name); ?></p>

                <div class="flex flex-col gap-2 text-left text-gray-700">
                    <div class="flex items-center gap-3">
                        <p><span class="font-semibold">NISN:</span> <?php echo e($user->NISN); ?></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <p><span class="font-semibold">No Absen:</span> <?php echo e($user->absen); ?></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <p><span class="font-semibold">Email:</span> <?php echo e($user->email); ?></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <p><span class="font-semibold">Telepon Pribadi:</span> <?php echo e($user->telephone); ?></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <p><span class="font-semibold">Telepon Orang Tua:</span> <?php echo e($user->parents_phone); ?></p>
                    </div>
                    <div class="flex items-start gap-3">
                        <p><span class="font-semibold">Alamat:</span> <?php echo e($user->address); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/student/profile.blade.php ENDPATH**/ ?>