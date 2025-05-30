

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('student.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col md:w-1/4 overflow-hidden rounded-lg bg-gray-100 shadow-xs border border-black">
            <div class="mb-8 bg-cover"
                style="background-image: url(&quot;https://cdn.tailkit.com/media/placeholders/photo-JgOeRuGD_Y4-800x400.jpg&quot;);">
                <div class="flex h-32 items-end justify-center">
                    <div class="-mb-12 rounded-full bg-gray-400/50 p-2 shadow-lg">
                        <p alt="User Avatar"
                            class="flex justify-center items-center size-20 text-5xl font-bold rounded-full"><?php echo e($user->absen); ?></p>
                    </div>
                </div>
            </div>

            <div class="grow p-5 text-center">
                <h3 class="mt-3 mb-1 text-lg font-semibold"><?php echo e($user->name); ?></h3>
                <p class="text-sm font-medium text-gray-600"><?php echo e($user->email); ?></p>
                <p class="text-sm font-medium text-gray-600"><?php echo e($user->class->class_name); ?></p>
                <p class="text-sm font-medium text-gray-600"><?php echo e($user->telepon); ?></p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/student/profile.blade.php ENDPATH**/ ?>