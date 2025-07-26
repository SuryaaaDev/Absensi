<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="p-5 ml-17 sm:ml-64">
        <h1 class="text-2xl font-bold mb-4">Dashboard Absensi</h1>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-2xl shadow p-4 text-center">
                <h3 class="text-md font-bold text-gray-500">Total Siswa</h3>
                <p class="text-2xl font-bold text-blue-600"><?php echo e($totalStudents); ?></p>
            </div>
            <div class="bg-white rounded-2xl shadow p-4 text-center">
                <h3 class="text-md font-bold text-gray-500">Hadir Hari Ini</h3>
                <p class="text-2xl font-bold text-green-600"><?php echo e($presentToday); ?></p>
            </div>
            <div class="bg-white rounded-2xl shadow p-4 text-center">
                <h3 class="text-md font-bold text-gray-500">Ijin Hari Ini</h3>
                <p class="text-2xl font-bold text-amber-600"><?php echo e($permitToday); ?></p>
            </div>
            <div class="bg-white rounded-2xl shadow p-4 text-center">
                <h3 class="text-md font-bold text-gray-500">Alpha Hari Ini</h3>
                <p class="text-2xl font-bold text-red-600"><?php echo e($alphaToday); ?></p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row w-full gap-4 mb-6">
            <div class="bg-white rounded-2xl shadow p-4 w-full md:w-3/4 h-auto">
                <h3 class="text-lg font-semibold mb-2">Kehadiran 7 Hari Terakhir</h3>
                <div class="relative h-[300px]">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow p-4 w-full md:w-1/2 h-auto">
                <h3 class="text-lg font-semibold mb-2">Distribusi Status Hari Ini</h3>
                <div class="relative h-[300px]">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>


        <div class="bg-white rounded-2xl shadow p-4 overflow-x-auto">
            <h3 class="text-lg font-semibold mb-4">Data Kehadiran Terbaru</h3>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left whitespace-nowrap">Nama</th>
                        <th class="px-4 py-2 text-left whitespace-nowrap">Tanggal</th>
                        <th class="px-4 py-2 text-left whitespace-nowrap">Masuk</th>
                        <th class="px-4 py-2 text-left whitespace-nowrap">Pulang</th>
                        <th class="px-4 py-2 text-left whitespace-nowrap">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <?php $__currentLoopData = $recentAttendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap"><?php echo e($att->student->name); ?></td>
                            <td class="px-4 py-2 whitespace-nowrap"><?php echo e($att->attendance_date); ?></td>
                            <td class="px-4 py-2 whitespace-nowrap"><?php echo e($att->time_in ?? '-'); ?></td>
                            <td class="px-4 py-2 whitespace-nowrap"><?php echo e($att->time_out ?? '-'); ?></td>
                            <td class="px-4 py-2 whitespace-nowrap rounded-lg">
                                <span
                                    class="inline-flex font-semibold px-3 py-0.5 rounded-full
                                    <?php if($att->status->id == 1): ?> text-red-600 bg-red-100
                                    <?php elseif($att->status->id == 2): ?> text-emerald-600 bg-emerald-100
                                    <?php elseif($att->status->id == 3): ?> text-blue-600 bg-blue-100
                                    <?php else: ?> text-amber-600 bg-amber-100 <?php endif; ?>
                                    "><?php echo e($att->status->status_name); ?></span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="sticky left-0 flex justify-center mt-5">
                <a href="<?php echo e(route('attendance.monthly')); ?>"
                    class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Lihat Semua Data Absen
                </a>
            </div>
        </div>
    </div>

    <script>
        const barCtx = document.getElementById('barChart').getContext('2d');
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieLabels = <?php echo json_encode($pieLabels); ?>;
        const pieData = <?php echo json_encode($pieData); ?>;
        const pieColors = <?php echo json_encode($pieColors); ?>;

        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($attendancePerDay->pluck('date')); ?>,
                datasets: [{
                    label: 'Jumlah Kehadiran',
                    data: <?php echo json_encode($attendancePerDay->pluck('count')); ?>,
                    backgroundColor: '#3b82f6'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        if (pieData.length > 0) {
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: pieLabels,
                    datasets: [{
                        data: pieData,
                        backgroundColor: pieColors
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        } else {
            document.getElementById('pieChart').parentElement.innerHTML =
                `<div class='flex flex-col justify-center items-center h-full'><svg xmlns="http://www.w3.org/2000/svg" class='w-36 h-36 text-gray-500' viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.63 5.643a9 9 0 0 0 12.742 12.715m1.674-2.29A9.03 9.03 0 0 0 20.8 14a1 1 0 0 0-1-1H17m-4 0a2 2 0 0 1-2-2m0-4V4a.9.9 0 0 0-1-.8a9 9 0 0 0-2.057.749M15 3.5A9 9 0 0 1 20.5 9H16a1 1 0 0 1-1-1V3.5M3 3l18 18"/></svg><p class='text-center text-gray-500'>Tidak ada data hari ini</p></div>`;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>