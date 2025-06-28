@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="p-5 ml-17 sm:ml-64">
        <h1 class="text-2xl font-bold mb-4">Dashboard Absensi</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-2xl shadow p-4 text-center">
                <h3 class="text-md font-bold text-gray-500">Total Siswa</h3>
                <p class="text-2xl font-bold text-blue-600">{{ $totalStudents }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-4 text-center">
                <h3 class="text-md font-bold text-gray-500">Hadir Hari Ini</h3>
                <p class="text-2xl font-bold text-green-600">{{ $presentToday }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-4 text-center">
                <h3 class="text-md font-bold text-gray-500">Terlambat Hari Ini</h3>
                <p class="text-2xl font-bold text-red-600">{{ $lateToday }}</p>
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
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Masuk</th>
                        <th class="px-4 py-2 text-left">Pulang</th>
                        <th class="px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($recentAttendances as $att)
                        <tr>
                            <td class="px-4 py-2">{{ $att->student->name }}</td>
                            <td class="px-4 py-2">{{ $att->attendance_date }}</td>
                            <td class="px-4 py-2">{{ $att->time_in }}</td>
                            <td class="px-4 py-2">{{ $att->time_out }}</td>
                            <td class="px-4 py-2 whitespace-nowrap rounded-lg">
                                <span
                                    class="inline-flex font-semibold
                                    @if ($att->status->id == 1) text-red-700
                                    @elseif($att->status->id == 2) text-emerald-700
                                    @elseif($att->status->id == 3) text-blue-700
                                    @else text-amber-700 @endif
                                    ">{{ $att->status->status_name }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const barCtx = document.getElementById('barChart').getContext('2d');
        const pieCtx = document.getElementById('pieChart').getContext('2d');

        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($attendancePerDay->pluck('date')) !!},
                datasets: [{
                    label: 'Jumlah Kehadiran',
                    data: {!! json_encode($attendancePerDay->pluck('count')) !!},
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

        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($statusCounts->pluck('status_name')) !!},
                datasets: [{
                    data: {!! json_encode($statusCounts->pluck('attendances_count')) !!},
                    backgroundColor: ['#ef4444', '#10b981', '#3b82f6', '#f59e0b']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
@endsection
