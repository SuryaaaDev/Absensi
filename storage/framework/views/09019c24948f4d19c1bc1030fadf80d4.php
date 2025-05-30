

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('student.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="pt-24 px-10 md:px-0">
        <p class="md:ml-40 flex m-auto font-bold md:text-2xl">Halo <?php echo e(Auth::user()->name); ?>, Selamat Datang!</p>
        <h1 class="text-center text-xl md:text-2xl font-bold py-4">Data Absen Anda</h1>
        <div class="overflow-x-auto md:w-2/3 md:p-0 m-auto rounded border border-gray-300 shadow-sm">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-3 py-2 whitespace-nowrap">#</th>
                        <th class="px-3 py-2 whitespace-nowrap">Absen</th>
                        <th class="px-3 py-2 whitespace-nowrap">Nama</th>
                        <th class="px-3 py-2 whitespace-nowrap">Kelas</th>
                        <th class="px-3 py-2 whitespace-nowrap">Tanggal</th>
                        <th class="px-3 py-2 whitespace-nowrap">Jam Masuk</th>
                        <th class="px-3 py-2 whitespace-nowrap">Jam Pulang</th>
                        <th class="px-3 py-2 whitespace-nowrap">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($loop->iteration); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->student->absen); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->student->name); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->student->class->class_name); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->attendance_date); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->time_in ?? '-'); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->time_out ?? '-'); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap rounded-lg">
                                <span
                                    class="inline-flex items-center font-bold justify-center rounded-full px-2.5 py-0.5
                                    <?php if($attendance->status->id == 1): ?> text-red-700
                                    <?php elseif($attendance->status->id == 2): ?>  text-emerald-700
                                    <?php elseif($attendance->status->id == 3): ?>  text-blue-700
                                    <?php else: ?> text-amber-700 <?php endif; ?>
                                    "><?php echo e($attendance->status->status_name); ?></span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/student/index.blade.php ENDPATH**/ ?>