

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ml-70">
        <h1 class="text-center text-2xl font-bold pb-4 pt-10">Rekap Absensi</h1>
        <div class="overflow-x-auto w-4/5 m-auto rounded border border-gray-300 shadow-sm bg-white">
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
                        <th class="px-3 py-2 whitespace-nowrap">Aksi</th>
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
                                    class="inline-flex items-center justify-center rounded-full px-2.5 py-0.5
                                    <?php if($attendance->status->id == 1): ?> bg-red-100 text-red-700
                                    <?php elseif($attendance->status->id == 2): ?> bg-emerald-100 text-emerald-700
                                    <?php elseif($attendance->status->id == 3): ?> bg-blue-100 text-blue-700
                                    <?php else: ?> bg-amber-100 text-amber-700 <?php endif; ?>
                                    "><?php echo e($attendance->status->status_name); ?></span>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <span
                                    class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                    <button type="button" popovertarget="edit-attendance-<?php echo e($attendance->id); ?>"
                                        class="px-3 py-1.5 cursor-pointer text-sm font-medium transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative"
                                        aria-label="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2">
                                                <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3" />
                                            </g>
                                        </svg>
                                    </button>
                                    <button type="button" popovertarget="delete-attendance-<?php echo e($attendance->id); ?>"
                                        class="px-3 py-1.5 cursor-pointer text-sm font-medium bg-red-600 transition-colors hover:bg-red-500 hover:text-gray-900 focus:relative"
                                        aria-label="Delete" disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </span>

                                <section popover id="delete-attendance-<?php echo e($attendance->id); ?>"
                                    class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
                                    <div class="flex justify-center">
                                        <svg class="text-red-700 w-32 h-32" viewBox="-2 -2 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 20C4.477 20 0 15.523 0 10S4.477 0 10 0s10 4.477 10 10s-4.477 10-10 10zm0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16zm0-13a1 1 0 0 1 1 1v5a1 1 0 0 1-2 0V6a1 1 0 0 1 1-1zm0 10a1 1 0 1 1 0-2a1 1 0 0 1 0 2z"
                                                fill="currentColor" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-200" for="class_name">Apakah anda yakin
                                        menghapus data ini?</p>
                                    <form action="" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <div class="flex justify-end mt-6 gap-2">
                                            <button popovertarget="delete-attendance-<?php echo e($attendance->id); ?>"
                                                popovertargetaction="hide"
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                                type="button">Batal</button>
                                            <button
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600"
                                                type="submit">Delete</button>
                                        </div>
                                    </form>
                                </section>

                                <section popover id="edit-attendance-<?php echo e($attendance->id); ?>"
                                    class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
                                    <button type="button" popovertarget="edit-attendance-<?php echo e($attendance->id); ?>"
                                        popovertargetaction="hide"
                                        class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg>
                                    </button>

                                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit
                                        Status Siswa
                                    </h2>
                                    <form action="" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200" for="attendance_name">Nama
                                                    Status</label>
                                                <select id="status_name"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="status_name" required>
                                                    <option value="" disabled selected>Pilih kelas</option>
                                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($status->id); ?>"><?php echo e($status->status_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="flex justify-end mt-6 gap-3">
                                            <button
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                                type="submit">Save</button>
                                        </div>
                                    </form>
                                </section>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <p id="message" class="fixed top-4 right-4 flex gap-2 px-4 py-3 rounded-md"></p>
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: '/api/scan',
                    method: 'GET',
                    success: function(response) {
                        if (response.refresh) {
                            location.reload();
                        }
                        const messageElement = $('#message');
                        messageElement.html(`
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" role="graphics-symbol" aria-labelledby="title-01 desc-01">
                            <title id="title-01">Icon title</title>
                            <desc id="desc-01">A more detailed description of the icon</desc>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ${response.success || response.error}
                    `);

                        messageElement.removeClass(
                            'border-amber-100 bg-amber-50 text-amber-500 bg-gray-500');
                        messageElement.addClass('border border-emerald-100 bg-emerald-50 text-emerald-500');
                    },
                    error: function(xhr, status, error) {
                        const messageElement = $('#message');
                        messageElement.html(`
                        <svg class="h-6 w-6 animate-spin font-bold" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
	                        <g fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="4">
	                        	<path d="M4 24c0 11.046 8.954 20 20 20v0c11.046 0 20-8.954 20-20S35.046 4 24 4"/>
	                        	<path d="M36 24c0-6.627-5.373-12-12-12s-12 5.373-12 12s5.373 12 12 12v0"/>
	                        </g>
                        </svg>
                        Loading...
                    `);

                        messageElement.removeClass(
                            'border border-emerald-100 bg-emerald-50 text-emerald-500');
                        messageElement.addClass('border border-amber-100 bg-amber-50 text-amber-500');
                    }
                });
            });

            setInterval(function() {
                location.reload();
            }, 3000);
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/admin/attendance.blade.php ENDPATH**/ ?>