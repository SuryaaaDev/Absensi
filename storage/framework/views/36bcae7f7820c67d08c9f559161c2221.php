

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ml-64 p-10 flex flex-col gap-4">
        <div class="bg-white shadow-sm p-6 rounded-lg w-2/5 flex justify-between">
            <label for="mode_name">
                <span class="font-bold text-md">Mode Absen</span>
                <p class="text-gray-800 text-sm mb-3">Ganti mode absen untuk kehadiran atau kepulangan.</p>
                <p class="text-gray-800 font-mono font-bold">=> <?php echo e($modeName); ?></p>
            </label>
            <form action="<?php echo e(route('mode')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="flex justify-end mt-6">
                    <button
                        class="py-2 px-4 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
                        type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 1024 1027">
                            <path fill="currentColor"
                                d="M990 1L856 135q-69-63-157.5-98.5T512 1Q353 1 223.5 90.5T37 323l119 48q43-108 139.5-175T512 129q145 0 254 97L640 353q-1 14 8.5 23.5T672 385h309q14 0 27.5-13.5T1023 344l1-320q1-24-34-23zM512 897q-145 0-254-96l126-127q1-14-8.5-23.5T352 641H43q-14 1-27.5 14.5T1 683l-1 320q-1 24 34 23l134-134q69 63 157.5 98t186.5 35q159 0 288.5-89T987 703l-119-47q-43 108-139.5 174.5T512 897z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white shadow-sm p-6 rounded-lg w-2/6 flex flex-col">
            <h1 class="font-bold text-md">Batas Waktu</h1>
            <p class="text-gray-800 text-sm mb-3">Atur batas waktu yang digunakan untuk absen.</p>
            <div class="flex justify-between">
                <div class="flex flex-col gap-2 mt-2">
                    <div class="flex gap-2 items-center">
                        <label class="font-semibold text-md">Jam Masuk :</label>
                        <span class="border border-black p-1 rounded-lg text-gray-800 font-mono font-bold"><?php echo e($timeLimit->in); ?></span>
                    </div>
                    <div class="flex gap-2 items-center">
                        <label class="font-semibold text-md">Jam Pulang :</label>
                        <span class="border border-black p-1 rounded-lg text-gray-800 font-mono font-bold"><?php echo e($timeLimit->out); ?></span>
                    </div>
                </div>
                <div class="flex justify-end h-full mt-16">
                    <button popovertarget="edit-time"
                        class="py-2 px-4 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3" />
                            </g>
                        </svg>
                    </button>
                </div>

                <section popover id="edit-time"
                    class="w-sm p-6 m-auto bg-white rounded-md shadow-md z-10">
                    <button type="button" popovertarget="edit-time" popovertargetaction="hide"
                        class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="w-6 h-6 text-gray-800 hover:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                    </button>

                    <h2 class="text-lg font-semibold capitalize">Edit Batas Waktu</h2>
                    <form action="<?php echo e(route('time')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="flex flex-col gap-2 mt-4">
                            <div class="flex gap-2 items-center">
                                <label class="font-semibold text-md">Jam Masuk :</label>
                                <input type="time" class="border border-black p-1 rounded-lg" value="<?php echo e($timeLimit->in); ?>" name="in">
                            </div>
                            <div class="flex gap-2 items-center">
                                <label class="font-semibold text-md">Jam Pulang :</label>
                                <input type="time" class="border border-black p-1 rounded-lg" value="<?php echo e($timeLimit->out); ?>" name="out">
                            </div>
                        </div>

                        <div class="flex justify-end mt-6 gap-3">
                            <button
                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                type="submit">Save</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/admin/settings.blade.php ENDPATH**/ ?>