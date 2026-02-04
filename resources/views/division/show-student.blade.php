@extends('layout.app')

@section('navbar')
    @include('division.navbar')
@endsection

@section('content')
    <div class="ml-17 sm:ml-72">
        <div class="flex justify-center items-center min-h-screen py-10 px-2">
            <div class="w-full max-w-2xl bg-white rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-indigo-600 via-blue-500 to-cyan-500 p-6 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-16 h-16 rounded-full bg-white text-indigo-600 flex items-center justify-center text-2xl font-bold shadow-md">
                            <img src="{{ $student['profile'] ? asset('storage/' . $student['profile']) : $profile }}"
                                alt="Foto Profil {{ $student['name'] }}"
                                class="w-full h-full" />
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-white">{{ $student['name'] }}</h2>
                            <p class="text-sm text-indigo-100">Kelas {{ $student['class']['class_name'] }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-sm text-white/80">Kartu Siswa</span>
                        <p class="text-xs text-white/60">SMK Negeri 2 Klaten</p>
                    </div>
                </div>

                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <p class="text-xs text-gray-500 uppercase">NISN</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $student['NISN'] }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase">Absen</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $student['absen'] }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase">Email</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $student['email'] ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase">Telepon</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $student['telephone'] }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase">Telepon Orang Tua</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $student['parents_phone'] }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-xs text-gray-500 uppercase">Alamat</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $student['address'] }}</p>
                    </div>
                </div>

                <div class="border-t border-gray-200 px-4 py-4 mx-4 flex justify-end gap-3">
                    <button onclick="window.history.back()"
                        class="flex gap-1 px-5 py-2 text-sm font-medium text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg transition cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M4.4 7.4L6.8 4h2.5L7.2 7h6.3a6.5 6.5 0 0 1 0 13H9l1-2h3.5a4.5 4.5 0 1 0 0-9H7.2l2.1 3H6.8L4.4 8.6L4 8z" />
                        </svg>
                        <span>Kembali</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
