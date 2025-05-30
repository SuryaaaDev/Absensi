

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="w-3/4 ml-70">
        <div class="p-10 grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="dark:bg-white shadow-sm p-6 rounded-lg">
                <div class="flex flex-row space-x-4 items-center">
                    <div id="stats-1" class="bg-gray-200/75 rounded-lg p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 text-black">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm font-medium uppercase leading-4">Total Siswa</p>
                        <p class="text-black font-bold text-2xl inline-flex items-center space-x-2">
                            <span><?php echo e($users); ?> siswa</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="dark:bg-white shadow-sm p-6 rounded-lg">
                <div class="flex flex-row space-x-4 items-center">
                    <div id="stats-1" class="bg-gray-200/75 rounded-lg p-2">
                        <svg class="w-10 h-10 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3.78552 9.5 12.7855 14l9-4.5-9-4.5-8.99998 4.5Zm0 0V17m3-6v6.2222c0 .3483 2 1.7778 5.99998 1.7778 4 0 6-1.3738 6-1.7778V11" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm font-medium uppercase leading-4">Total Kelas</p>
                        <p class="text-black font-bold text-2xl inline-flex items-center space-x-2">
                            <span><?php echo e($classes); ?> kelas</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="dark:bg-white shadow-sm p-6 rounded-lg">
                <div class="flex flex-row space-x-4 items-center">
                    <div id="stats-1" class="bg-gray-200/75 rounded-lg p-2">
                        <svg class="w-10 h-10 text-black"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" stroke-width="1.6">
                                <path d="M17 2v2m-5-2v2M7 2v2m-3.5 6c0-3.3 0-4.95 1.025-5.975S7.2 3 10.5 3h3c3.3 0 4.95 0 5.975 1.025S20.5 6.7 20.5 10v5c0 3.3 0 4.95-1.025 5.975S16.8 22 13.5 22h-3c-3.3 0-4.95 0-5.975-1.025S3.5 18.3 3.5 15zm10 6H17m-3.5-7H17"/>
                                <path d="M7 10s.5 0 1 1c0 0 1.588-2.5 3-3m-4 9s.5 0 1 1c0 0 1.588-2.5 3-3"/>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm font-medium uppercase leading-4">Total Absensi</p>
                        <p class="text-black font-bold text-2xl inline-flex items-center space-x-2">
                            <span><?php echo e($attendances); ?> tercatat</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>