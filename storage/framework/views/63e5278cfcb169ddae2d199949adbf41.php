<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="p-5 ml-17 sm:ml-64">
        <h1 class="text-center text-2xl font-bold pb-4 pt-10">Rekap Absensi</h1>
        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm bg-white">
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
                <tbody id="attendance-table" class="divide-y divide-gray-200">
                    <?php echo $__env->make('admin.attendance-table', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <p id="message" class="fixed top-4 right-4 flex gap-2 px-4 py-3 rounded-md"></p>
    <script>
        function reloadAttendanceTable() {
            $.ajax({
                url: '<?php echo e(route('attendances.table')); ?>',
                method: 'GET',
                success: function(response) {
                    $('#attendance-table').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Gagal mengambil data:', error);
                }
            });
        }

        function checkScanAPI() {
            $.ajax({
                url: 'api/scan',
                method: 'GET',
                success: function(response) {
                    if (response.refresh) {
                        reloadAttendanceTable();
                    }

                    const messageElement = $('#message');

                    if (response.success || response.error) {
                        const isSuccess = !!response.success;

                        const icon = isSuccess ?
                            `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 22C6.48 22 2 17.52 2 12S6.48 2 12 2s10 4.48 10 10-4.48 10-10 10z" />
                                </svg>` :
                            `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z" />
                                </svg>`;

                        messageElement
                            .html(`${icon}<span>${response.success || response.error}</span>`)
                            .removeClass()
                            .addClass(
                                'fixed top-4 right-4 flex items-center gap-2 px-4 py-3 rounded-md text-sm shadow border transition-opacity duration-300 ' +
                                (isSuccess ?
                                    'bg-emerald-50 text-emerald-700 border-emerald-200' :
                                    'bg-red-50 text-red-700 border-red-200')
                            )
                            .fadeIn();

                        setTimeout(() => {
                            messageElement.fadeOut();
                        }, 4000);
                    }
                }
            });
        }

        // setInterval(reloadAttendanceTable, 3000);
        setInterval(checkScanAPI, 3000);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/admin/attendance.blade.php ENDPATH**/ ?>