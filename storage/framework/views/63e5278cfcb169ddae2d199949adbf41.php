<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="p-5 ml-17 sm:ml-64">
        <div class="flex flex-wrap justify-between items-center mb-4">
            <h1 class="text-center text-2xl font-bold">Rekap Absensi</h1>
            <a href="<?php echo e(route('attendance.logs')); ?>"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium shadow-md hover:shadow-lg hover:from-indigo-600 hover:to-blue-500 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 16 16">
                    <path fill="currentColor"
                        d="M5 8.25a.75.75 0 0 1 .75-.75h4a.75.75 0 0 1 0 1.5h-4A.75.75 0 0 1 5 8.25ZM4 10.5A.75.75 0 0 0 4 12h4a.75.75 0 0 0 0-1.5H4Z" />
                    <path fill="currentColor"
                        d="M13-.005c1.654 0 3 1.328 3 3c0 .982-.338 1.933-.783 2.818c-.443.879-1.028 1.758-1.582 2.588l-.011.017c-.568.853-1.104 1.659-1.501 2.446c-.398.789-.623 1.494-.623 2.136a1.5 1.5 0 1 0 2.333-1.248a.75.75 0 0 1 .834-1.246A3 3 0 0 1 13 16H3a3 3 0 0 1-3-3c0-1.582.891-3.135 1.777-4.506c.209-.322.418-.637.623-.946c.473-.709.923-1.386 1.287-2.048H2.51c-.576 0-1.381-.133-1.907-.783A2.68 2.68 0 0 1 0 2.995a3 3 0 0 1 3-3Zm0 1.5a1.5 1.5 0 0 0-1.5 1.5c0 .476.223.834.667 1.132A.75.75 0 0 1 11.75 5.5H5.368c-.467 1.003-1.141 2.015-1.773 2.963c-.192.289-.381.571-.558.845C2.13 10.711 1.5 11.916 1.5 13A1.5 1.5 0 0 0 3 14.5h7.401A2.989 2.989 0 0 1 10 13c0-.979.338-1.928.784-2.812c.441-.874 1.023-1.748 1.575-2.576l.017-.026c.568-.853 1.103-1.658 1.501-2.448c.398-.79.623-1.497.623-2.143c0-.838-.669-1.5-1.5-1.5Zm-10 0a1.5 1.5 0 0 0-1.5 1.5c0 .321.1.569.27.778c.097.12.325.227.74.227h7.674A2.737 2.737 0 0 1 10 2.995c0-.546.146-1.059.401-1.5Z" />
                </svg>
                <span>Log Absensi</span>
            </a>
        </div>

        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm bg-white">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-3 py-2 whitespace-nowrap">#</th>
                        <th class="px-3 py-2 whitespace-nowrap">Nama</th>
                        <th class="px-3 py-2 whitespace-nowrap">Kelas</th>
                        <th class="px-3 py-2 whitespace-nowrap">Tanggal</th>
                        <th class="px-3 py-2 whitespace-nowrap">Jam Masuk</th>
                        <th class="px-3 py-2 whitespace-nowrap">Jam Pulang</th>
                        <th class="px-3 py-2 whitespace-nowrap">Lokasi Lab</th>
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
                url: '<?php echo e(url('api/scan')); ?>',
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

        setInterval(reloadAttendanceTable, 3000);
        setInterval(checkScanAPI, 3000);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/admin/attendance.blade.php ENDPATH**/ ?>