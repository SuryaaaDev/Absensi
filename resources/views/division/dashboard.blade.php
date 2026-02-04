@extends('layout.app')

@section('navbar')
    @include('division.navbar')
@endsection

@section('content')
    <div class="ml-17 sm:ml-72 p-6 min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100">
        <div>
            <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
                <div class="relative p-6 bg-white rounded-2xl shadow group overflow-hidden">
                    <h2 class="text-sm text-slate-500">Total Siswa</h2>
                    <p class="text-3xl font-bold text-indigo-600">{{ $data['totalStudents'] }}</p>
                </div>

                <div class="relative p-6 bg-white rounded-2xl shadow group overflow-hidden">
                    <h2 class="text-sm text-slate-500">Hadir Hari Ini</h2>
                    <p class="text-3xl font-bold text-green-600">{{ $data['presentToday'] }}</p>
                </div>

                <div class="relative p-6 bg-white rounded-2xl shadow group overflow-hidden">
                    <h2 class="text-sm text-slate-500">Mode Absen</h2>
                    <p class="text-2xl font-semibold text-orange-600">{{ $data['mode'] }}</p>
                </div>

                <div class="relative p-6 bg-white rounded-2xl shadow group overflow-hidden">
                    <h2 class="text-sm text-slate-500">Jam Masuk</h2>
                    <p class="text-2xl font-semibold text-blue-600">
                        {{ $data['jamMasuk'] ? \Carbon\Carbon::parse($data['jamMasuk'])->format('H:i') : '-' }}
                    </p>
                </div>

                <div class="relative p-6 bg-white rounded-2xl shadow group overflow-hidden">
                    <h2 class="text-sm text-slate-500">Jam Pulang</h2>
                    <p class="text-2xl font-semibold text-red-600">
                        {{ $data['jamPulang'] ? \Carbon\Carbon::parse($data['jamPulang'])->format('H:i') : '-' }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-4 bg-white rounded-lg shadow h-80 flex flex-col justify-center items-center">
                    <canvas id="saturdayChart" class="w-full h-full"></canvas>
                    <p id="saturdayNoData" class="hidden flex flex-col justify-center items-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-36 h-36 text-gray-500" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M5 20q-.425 0-.712-.288T4 19v-9q0-.425.288-.712T5 9h2q.425 0 .713.288T8 10v9q0 .425-.288.713T7 20zm6 0q-.425 0-.712-.288T10 19v-9l4 4v5q0 .425-.288.713T13 20zm3-8.85l-4-4V5q0-.425.288-.712T11 4h2q.425 0 .713.288T14 5zm6 6l-4-4V13h3q.425 0 .713.288T20 14zm-.925 4.75l-17-16.975q-.3-.3-.288-.712T2.1 3.5t.713-.3t.712.3l16.975 17q.3.3.3.7t-.3.7t-.712.3t-.713-.3" />
                        </svg>
                        <span class="text-center font-medium">Belum ada data.</span>
                    </p>
                </div>

                <div class="p-4 bg-white rounded-lg shadow h-80 flex flex-col justify-center items-center">
                    <canvas id="divisionChart" class="w-full h-full"></canvas>
                    <p id="divisionNoData" class="hidden flex flex-col justify-center items-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class='w-36 h-36 text-gray-500' viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M5.63 5.643a9 9 0 0 0 12.742 12.715m1.674-2.29A9.03 9.03 0 0 0 20.8 14a1 1 0 0 0-1-1H17m-4 0a2 2 0 0 1-2-2m0-4V4a.9.9 0 0 0-1-.8a9 9 0 0 0-2.057.749M15 3.5A9 9 0 0 1 20.5 9H16a1 1 0 0 1-1-1V3.5M3 3l18 18" />
                        </svg>
                        <span class="text-center font-medium">Belum ada data.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const saturdayLabels = @json($saturdayStats->pluck('tanggal')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d M Y')));
        const saturdayCounts = @json($saturdayStats->pluck('total'));

        const saturdayCtx = document.getElementById('saturdayChart');
        const saturdayNoData = document.getElementById('saturdayNoData');

        if (saturdayCounts.length === 0) {
            saturdayCtx.classList.add('hidden');
            saturdayNoData.classList.remove('hidden');
        } else {
            new Chart(saturdayCtx, {
                type: 'line',
                data: {
                    labels: saturdayLabels,
                    datasets: [{
                        label: 'Jumlah Siswa Hadir (Sabtu)',
                        data: saturdayCounts,
                        borderColor: '#6366F1',
                        backgroundColor: 'rgba(99, 102, 241, 0.2)',
                        fill: true,
                        tension: 0.3,
                        pointBackgroundColor: '#6366F1'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: context => `${context.dataset.label}: ${context.formattedValue} siswa`
                            }
                        },
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: '#e5e7eb'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            },
                            grid: {
                                color: '#e5e7eb'
                            }
                        }
                    }
                }
            });
        }

        const divisionLabels = @json($divisionStats->pluck('division'));
        const divisionCounts = @json($divisionStats->pluck('total'));

        const divisionCtx = document.getElementById('divisionChart');
        const divisionNoData = document.getElementById('divisionNoData');

        if (divisionCounts.length === 0) {
            divisionCtx.classList.add('hidden');
            divisionNoData.classList.remove('hidden');
        } else {
            new Chart(divisionCtx, {
                type: 'pie',
                data: {
                    labels: divisionLabels,
                    datasets: [{
                        label: 'Distribusi Divisi',
                        data: divisionCounts,
                        backgroundColor: ['#6366F1', '#F59E0B', '#10B981', '#EF4444', '#3B82F6']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }
    </script>
@endsection
