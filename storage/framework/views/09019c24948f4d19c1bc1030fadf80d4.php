

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('student.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="pt-24 px-4 md:px-0 min-h-screen bg-gradient-to-br from-emerald-50 via-white to-green-50">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Halo, <?php echo e(Auth::user()->name); ?> 👋</h2>
            <p class="text-gray-600">Selamat datang di halaman absensi Anda</p>
        </div>

        <div class="flex flex-col md:flex-row md:justify-center md:space-x-8 space-y-8 md:space-y-0">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 md:w-2/4 w-full overflow-hidden pb-2">
                <div class="p-5 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">Riwayat Absensi</h3>
                    <span
                        class="px-3 py-1 text-xs rounded-full font-semibold 
                        <?php echo e($mode->absen_mode === 'manual' ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-600'); ?>">
                        Mode: <?php echo e(strtoupper($mode->absen_mode)); ?>

                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-center">
                        <thead class="bg-gray-50 text-gray-700">
                            <tr>
                                <th class="px-3 py-2 font-medium whitespace-nowrap">#</th>
                                <th class="px-3 py-2 font-medium whitespace-nowrap">Nama</th>
                                <th class="px-3 py-2 font-medium whitespace-nowrap">Tanggal</th>
                                <th class="px-3 py-2 font-medium whitespace-nowrap">Jam Masuk</th>
                                <th class="px-3 py-2 font-medium whitespace-nowrap">Jam Pulang</th>
                                <th class="px-3 py-2 font-medium whitespace-nowrap">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php $__empty_1 = true; $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-emerald-50 transition">
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($loop->iteration); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap font-medium"><?php echo e($attendance->student->name); ?>

                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->attendance_date); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->time_in ?? '-'); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->time_out ?? '-'); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center justify-center rounded-full px-2.5 py-0.5 text-xs font-semibold
                                            <?php if($attendance->status->id == 1): ?> bg-red-100 text-red-700
                                            <?php elseif($attendance->status->id == 2): ?> bg-emerald-100 text-emerald-700
                                            <?php elseif($attendance->status->id == 3): ?> bg-blue-100 text-blue-700
                                            <?php else: ?> bg-amber-100 text-amber-700 <?php endif; ?>">
                                            <?php echo e($attendance->status->status_name); ?>

                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="px-3 py-4 text-gray-500">
                                        Tidak ada data absensi tersedia.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div
                class="bg-white rounded-2xl shadow-lg border border-gray-200 md:w-1/3 w-full flex flex-col items-center justify-center text-center p-8">
                <?php if($mode->absen_mode === 'manual'): ?>
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-2 text-emerald-500" width="48"
                            height="48" viewBox="0 0 2048 2048">
                            <path fill="currentColor"
                                d="M1600 896q40 0 75 15t61 41t41 61t15 75v384q0 119-45 224t-124 183t-183 123t-224 46q-144 0-268-55t-226-156l-472-472q-28-28-43-65t-15-76q0-42 16-78t43-64t63-42t78-16q82 0 141 59l107 106V853q-59-28-106-70t-80-95t-52-114t-18-126q0-93 35-174t96-143t142-96T832 0q93 0 174 35t143 96t96 142t35 175q0 93-37 178t-105 149q35 9 63 30t49 52q45-25 94-25q50 0 93 23t69 66q45-25 94-25zM512 448q0 75 34 143t94 113V448q0-40 15-75t41-61t61-41t75-15q40 0 75 15t61 41t41 61t15 75v256q60-45 94-113t34-143q0-66-25-124t-69-101t-102-69t-124-26q-66 0-124 25t-102 69t-69 102t-25 124zm1152 640q0-26-19-45t-45-19q-34 0-47 19t-16 47t-1 62t0 61t-16 48t-48 19q-37 0-50-23t-16-60t2-77t2-77t-15-59t-51-24q-34 0-47 19t-16 47t-1 62t0 61t-16 48t-48 19q-37 0-50-23t-16-60t2-77t2-77t-15-59t-51-24q-34 0-47 19t-16 47t-1 62t0 61t-16 48t-48 19q-26 0-45-19t-19-45V448q0-26-19-45t-45-19q-26 0-45 19t-19 45v787q0 23-8 42t-23 35t-35 23t-42 9q-22 0-42-8t-37-24l-139-139q-21-21-50-21t-50 21t-22 51q0 29 21 50l472 473q84 84 184 128t219 45q93 0 174-35t142-96t96-142t36-175v-384z" />
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800">Mode Absen Manual Aktif</h4>
                        <p class="text-gray-600 text-sm mt-1 mb-5">
                            Klik tombol di bawah untuk melakukan absen hari ini.
                        </p>
                    </div>

                    <form action="<?php echo e(route('student.manual.absen')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2 bg-emerald-600 text-white rounded-full font-semibold hover:bg-emerald-500 active:scale-95 transition cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="m17 11l2 2l4-4" />
                                </g>
                            </svg>
                            <?php if($mode->mode_name === 'masuk'): ?>
                                Absen Masuk Sekarang
                            <?php else: ?>
                                Absen Pulang Sekarang
                            <?php endif; ?>
                        </button>
                    </form>
                <?php else: ?>
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-2 text-gray-500" width="48"
                            height="48" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M20 20H4c-1.654 0-3-1.346-3-3V7c0-1.654 1.346-3 3-3h16c1.654 0 3 1.346 3 3v10c0 1.654-1.346 3-3 3zM4 6c-.551 0-1 .449-1 1v10c0 .551.449 1 1 1h16c.551 0 1-.449 1-1V7c0-.551-.449-1-1-1H4zm6 9H6a1 1 0 1 1 0-2h4a1 1 0 1 1 0 2zm0-4H6a1 1 0 1 1 0-2h4a1 1 0 1 1 0 2z" />
                            <circle cx="16" cy="10.5" r="2" fill="currentColor" />
                            <path fill="currentColor"
                                d="M16 13.356c-1.562 0-2.5.715-2.5 1.429c0 .357.938.715 2.5.715c1.466 0 2.5-.357 2.5-.715c0-.714-.98-1.429-2.5-1.429z" />
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800">Mode RFID Aktif</h4>
                        <p class="text-gray-600 text-sm mt-1">
                            Silakan gunakan kartu RFID Anda untuk melakukan absensi.
                        </p>
                    </div>
                    <span class="px-4 py-1 bg-gray-200 text-gray-700 text-sm rounded-full font-medium">
                        Absen manual dinonaktifkan
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/student/index.blade.php ENDPATH**/ ?>