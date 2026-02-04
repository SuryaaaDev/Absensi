@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="p-5 ml-17 sm:ml-64">
        <div class="mb-4">
            <a href="{{ route('students') }}" onclick="if(document.referrer) { history.back(); return false; }"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-200 rounded-lg shadow-sm hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        <h1 class="text-2xl font-bold mb-4 text-center">Detail Siswa</h1>
        <div
            class="bg-white rounded-2xl shadow-lg p-6 flex flex-col md:flex-row items-center md:items-start gap-6 transition-all duration-300 hover:shadow-xl">

            <div class="flex justify-center w-full md:w-1/3 mt-0 md:mt-4">
                <img src="{{ $student['profile'] ? asset('storage/' . $student['profile']) : $profile }}"
                    alt="Foto Profil {{ $student['name'] }}"
                    class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover shadow-md ring-4 ring-slate-100 transition-transform duration-300 hover:scale-105" />
            </div>

            <div class="flex flex-col md:flex-row justify-between w-full text-gray-700 gap-6">
                <div class="space-y-2 w-full md:w-1/2">
                    <h2 class="text-2xl font-semibold text-gray-900">{{ $student['name'] }}</h2>

                    <div class="relative group flex items-center">
                        <p class="font-medium text-gray-700">Nomor Kartu:</p>
                        <div
                            class="font-mono text-gray-900 ml-2 px-2 py-0.5 rounded-md bg-gray-50 blur-sm group-hover:blur-none transition-all duration-300 cursor-pointer">
                            {{ $student['card_number'] ?? 'Belum terdaftar' }}
                        </div>
                    </div>

                    <p><span class="font-medium">NISN:</span> {{ $student['NISN'] }}</p>
                    <p><span class="font-medium">No Absen:</span> {{ $student['absen'] }}</p>
                    <p><span class="font-medium">Kelas:</span> {{ $student['class']['class_name'] ?? '-' }}</p>
                    <p><span class="font-medium">Email:</span> {{ $student['email'] }}</p>
                </div>

                <div class="space-y-2 w-full md:w-1/2 md:border-l md:pl-6 border-gray-100 -mt-4 md:mt-0">
                    <p><span class="font-medium">No Telepon:</span> {{ $student['telephone'] }}</p>
                    <p><span class="font-medium">No Orang Tua:</span> {{ $student['parents_phone'] }}</p>
                    <div>
                        <p class="font-medium mb-1">Alamat:</p>
                        <p class="text-gray-800 leading-relaxed bg-gray-50 rounded-lg p-2 border border-gray-100 shadow-sm">
                            {{ $student['address'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 my-4 text-center">
            <div class="bg-green-100 text-green-800 rounded-xl p-4 shadow">
                <p class="text-sm font-medium">Hadir</p>
                <p class="text-2xl font-bold">{{ $presentCount }}</p>
            </div>
            <div class="bg-blue-100 text-blue-800 rounded-xl p-4 shadow">
                <p class="text-sm font-medium">Terlambat</p>
                <p class="text-2xl font-bold">{{ $lateCount }}</p>
            </div>
            <div class="bg-yellow-100 text-yellow-800 rounded-xl p-4 shadow">
                <p class="text-sm font-medium">Izin</p>
                <p class="text-2xl font-bold">{{ $permisCount }}</p>
            </div>
            <div class="bg-red-100 text-red-800 rounded-xl p-4 shadow">
                <p class="text-sm font-medium">Alpha</p>
                <p class="text-2xl font-bold">{{ $alphaCount }}</p>
            </div>
        </div>

        <h2 class="text-xl font-semibold mb-2">Riwayat Absensi</h2>
        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm bg-white">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-4 py-2 whitespace-nowrap">#</th>
                        <th class="px-4 py-2 whitespace-nowrap">Tanggal</th>
                        <th class="px-4 py-2 whitespace-nowrap">Jam Masuk</th>
                        <th class="px-4 py-2 whitespace-nowrap">Jam Pulang</th>
                        <th class="px-4 py-2 whitespace-nowrap">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if (empty($attendances))
                        <tr>
                            <td colspan="5" class="py-12 whitespace-nowrap">
                                <div class="flex flex-col items-center justify-center text-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-25 h-25 text-black">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    <h2 class="text-lg font-semibold text-gray-800 mt-1">Belum ada riwayat absensi</h2>
                                    <p class="mt-2 text-gray-500">Siswa ini belum melakukan absensi apapun.</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                    @foreach ($attendances as $item)
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-4 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $item['attendance_date'] }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $item['time_in'] ?? '-' }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $item['time_out'] ?? '-' }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <span
                                    class="inline-block rounded-full px-3 py-1 text-sm font-semibold
                                    @if ($item['status']['id'] == 1) bg-red-100 text-red-600
                                    @elseif($item['status']['id'] == 2) bg-emerald-100 text-emerald-600
                                    @elseif($item['status']['id'] == 3) bg-blue-100 text-blue-600
                                    @else bg-amber-100 text-amber-600 @endif">
                                    {{ $item['status']['status_name'] ?? '-' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
