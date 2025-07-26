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
        <div class="bg-white rounded-2xl shadow-md p-6 mb-6 flex flex-col sm:flex-row items-center gap-6">
            <div class="shrink-0">
                <img src="{{ $profile }}" alt="Foto Profil {{ $student->name }}"
                    class="w-28 h-28 rounded-full object-cover shadow-sm">
            </div>

            <div class="text-gray-700 space-y-1">
                <h2 class="text-xl font-semibold text-gray-900">{{ $student->name }}</h2>
                <p><span class="font-medium">No Absen:</span> {{ $student->absen }}</p>
                <p><span class="font-medium">Kelas:</span> {{ $student->class->class_name ?? '-' }}</p>
                <p><span class="font-medium">Email:</span> {{ $student->email }}</p>
                <p><span class="font-medium">No Telepon:</span> {{ $student->telepon }}</p>
                <div class="relative group flex">
                    <p class="font-medium text-gray-700">Nomor Kartu:</p>
                    <div
                        class="text-gray-900 font-mono px-2 py-0.5 rounded w-fit transition-all duration-300 blur-sm group-hover:blur-none">
                        {{ $student->card_number ?? 'Belum terdaftar' }}
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
                    @if ($attendances->isEmpty())
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
                            <td class="px-4 py-2 whitespace-nowrap">{{ $item->attendance_date }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $item->time_in ?? '-' }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $item->time_out ?? '-' }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <span
                                    class="inline-block rounded-full px-3 py-1 text-sm font-semibold
                                    @if ($item->status?->id == 1) bg-red-100 text-red-600
                                    @elseif($item->status?->id == 2) bg-emerald-100 text-emerald-600
                                    @elseif($item->status?->id == 3) bg-blue-100 text-blue-600
                                    @else bg-amber-100 text-amber-600 @endif">
                                    {{ $item->status?->status_name ?? '-' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
