@extends('layout.app')

@section('navbar')
    @include('division.navbar')
@endsection

@section('content')
    <div class="max-w-4xl ml-17 sm:ml-72 mx-auto p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Pengaturan</h1>

        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Mode Absensi Divisi</h2>
            <p class="text-sm text-gray-500 mb-4">
                Gunakan tombol di bawah untuk mengubah mode absensi divisi <span class="font-bold">(hanya bisa diganti pada
                    hari Sabtu).</span>
            </p>

            <form action="{{ route('mode.division') }}" method="POST">
                @csrf
                <button type="submit" name="toggle_mode_name" value="1"
                    class="flex gap-2 justify-center items-center px-6 py-3 text-white font-medium rounded-lg shadow-md transition
                       {{ $mode->mode_name == 'masuk' ? 'bg-indigo-600 hover:bg-indigo-700' : 'bg-emerald-600 hover:bg-emerald-700' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 1024 1027">
                        <path fill="currentColor"
                            d="M990 1L856 135q-69-63-157.5-98.5T512 1Q353 1 223.5 90.5T37 323l119 48q43-108 139.5-175T512 129q145 0 254 97L640 353q-1 14 8.5 23.5T672 385h309q14 0 27.5-13.5T1023 344l1-320q1-24-34-23zM512 897q-145 0-254-96l126-127q1-14-8.5-23.5T352 641H43q-14 1-27.5 14.5T1 683l-1 320q-1 24 34 23l134-134q69 63 157.5 98t186.5 35q159 0 288.5-89T987 703l-119-47q-43 108-139.5 174.5T512 897z" />
                    </svg>
                    <span>{{ $mode->mode_name == 'masuk' ? 'Ganti ke Pulang' : 'Ganti ke Masuk' }}</span>
                </button>
            </form>

            <p class="mt-3 text-sm text-gray-500">
                Mode saat ini:
                <span class="font-semibold text-indigo-600">{{ ucfirst($mode->mode_name) }}</span>
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Tipe Absensi Divisi</h2>
            <p class="text-sm text-gray-500 mb-4">
                Gunakan tombol di bawah untuk mengubah tipe absensi divisi. Tipe RFID untuk absensi menggunakan kartu dan Tipe Manual untuk absensi manual di Website <span class="font-bold">(hanya bisa diganti pada
                    hari Sabtu).</span>
            </p>

            <form action="{{ route('mode.division') }}" method="POST">
                @csrf
                <button type="submit" name="toggle_absen_mode" value="1"
                    class="flex gap-2 justify-center items-center px-6 py-3 text-white font-medium rounded-lg shadow-md transition
                       {{ $mode->absen_mode == 'rfid' ? 'bg-indigo-600 hover:bg-indigo-700' : 'bg-emerald-600 hover:bg-emerald-700' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 1024 1027">
                        <path fill="currentColor"
                            d="M990 1L856 135q-69-63-157.5-98.5T512 1Q353 1 223.5 90.5T37 323l119 48q43-108 139.5-175T512 129q145 0 254 97L640 353q-1 14 8.5 23.5T672 385h309q14 0 27.5-13.5T1023 344l1-320q1-24-34-23zM512 897q-145 0-254-96l126-127q1-14-8.5-23.5T352 641H43q-14 1-27.5 14.5T1 683l-1 320q-1 24 34 23l134-134q69 63 157.5 98t186.5 35q159 0 288.5-89T987 703l-119-47q-43 108-139.5 174.5T512 897z" />
                    </svg>
                    <span>{{ $mode->absen_mode == 'rfid' ? 'Ganti ke Manual' : 'Ganti ke RFID' }}</span>
                </button>
            </form>

            <p class="mt-3 text-sm text-gray-500">
                Tipe saat ini:
                <span class="font-semibold text-indigo-600">{{ strtoupper($mode->absen_mode) }}</span>
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Batas Waktu Absensi Divisi</h2>
            <p class="text-sm text-gray-500 mb-4">
                Atur jam batas absensi masuk & pulang <span class="font-bold">(hanya bisa diganti pada hari Sabtu).</span>
            </p>

            <form action="{{ route('time.division') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf
                <div>
                    <label for="in" class="block text-sm font-medium text-gray-700 mb-1">Jam Masuk</label>
                    <input type="time" name="in" id="in" value="{{ $timeLimit->in ?? '' }}"
                        class="w-full px-3 py-2 border rounded-lg shadow-sm focus:ring focus:ring-indigo-200">
                </div>
                <div>
                    <label for="out" class="block text-sm font-medium text-gray-700 mb-1">Jam Pulang</label>
                    <input type="time" name="out" id="out" value="{{ $timeLimit->out ?? '' }}"
                        class="w-full px-3 py-2 border rounded-lg shadow-sm focus:ring focus:ring-indigo-200">
                </div>

                <div class="md:col-span-2 flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                        Simpan Batas Waktu
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 sm:flex justify-between items-center">
            <div class="sm:mr-5 mb-5 sm:mb-0">
                <h1 class="font-bold text-md">Keluar Akun</h1>
                <p class="text-gray-800 text-sm">Tekan tombol ini untuk keluar dari sistem.</p>
            </div>
            <form method="POST" action="{{ route('logout.division') }}">
                @csrf
                <button
                    class="py-3 px-6 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:bg-red-700 flex items-center gap-2"
                    type="submit">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
@endsection
