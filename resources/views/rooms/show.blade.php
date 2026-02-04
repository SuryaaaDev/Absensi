@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="ml-17 sm:ml-64 max-w-full mx-auto p-6" x-data="deviceDetail()" x-init="initFromUrl()">
        
        <div class="mb-4 flex items-center">
            <a href="{{ route('rooms.index') }}" onclick="if(document.referrer) { history.back(); return false; }"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-200 rounded-lg shadow-sm hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>
        <div
            class="relative bg-gradient-to-r from-indigo-500 to-blue-600 text-white rounded-2xl p-6 shadow-lg mb-6 overflow-hidden">
            <div class="absolute right-6 top-1/2 -translate-y-1/2 opacity-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-40 h-40 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <rect x="3" y="4" width="18" height="12" rx="2" ry="2" stroke-width="1.5" />          
                    <path d="M9 20h6M12 16v4" stroke-width="1.5" />      
                    <rect x="6" y="21" width="12" height="2" rx="1" ry="1" stroke-width="1.5" />
                    <rect x="20" y="17" width="3" height="5" rx="1.5" stroke-width="1.5" />
                </svg>
            </div>

            <h1 class="text-3xl font-extrabold mb-2 flex gap-2 relative z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 16 16" fill="currentColor">
                    <g fill="currentColor" fill-rule="evenodd">
                        <path d="M8 6h.956v7.944H8z" />
                        <path
                            d="M8.511.016C6.047.016 4.047 2.024 4.047 4.5c0 2.478 2 4.484 4.464 4.484c2.465 0 4.464-2.007 4.464-4.484S10.977.016 8.511.016zm.159 1.626a3.008 3.008 0 0 0-3.018 2.997c0 .662-.648.346-.648-.645A3.008 3.008 0 0 1 8.022.997c.996 0 1.314.645.648.645zm1.439 9.514v.926c2.477.248 3.729 1.062 3.729 1.47c0 .509-1.887 1.501-5.344 1.501c-3.459 0-5.346-.992-5.346-1.501c0-.438 1.342-1.181 3.758-1.421v-.927c-2.379.211-4.872.938-4.872 2.36c0 1.598 3.249 2.433 6.46 2.433c3.209 0 6.459-.835 6.459-2.433c0-1.462-2.56-2.203-4.844-2.408z" />
                    </g>
                </svg>
                Ruangan <span x-text="device?.location ?? '-'"></span>
            </h1>
            <p class="text-lg relative z-10">Source: <span x-text="device?.source ?? '-'"></span></p>
            <p class="text-lg relative z-10">Jumlah Hadir:
                <span class="font-bold text-emerald-300 text-2xl" x-text="device?.attendances?.length ?? '-'"></span>
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div
                class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row gap-3 sm:gap-0 justify-between sm:items-center">
                <h2 class="text-xl font-bold text-gray-700">👨‍🎓 Siswa di Ruangan Ini</h2>
                <div class="relative w-full max-w-sm mb-4">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                        </svg>
                    </span>

                    <input type="text" placeholder="Cari siswa..."
                        class="w-full pl-10 pr-3 py-2 text-sm border border-gray-300 rounded-lg shadow-sm 
               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        x-model="search">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3 text-left">Kelas</th>
                            <th class="px-6 py-3 text-left">Jam Masuk</th>
                            <th class="px-6 py-3 text-left">Jam Pulang</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(attendance, index) in filteredStudents()" :key="attendance.id">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-3 whitespace-nowrap" x-text="index + 1"></td>
                                <td class="px-6 py-3 whitespace-nowrap font-medium text-gray-800"
                                    x-text="attendance.student?.name"></td>
                                <td class="px-6 py-3 whitespace-nowrap text-gray-600"
                                    x-text="attendance.student?.class?.class_name ?? '-'">
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-gray-600" x-text="attendance.time_in ?? '-'">
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-gray-600" x-text="attendance.time_out ?? '-'">
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <span class="px-3 py-1 rounded-full font-semibold"
                                        :class="{
                                            'bg-red-100 text-red-600': attendance.status?.id == 1,
                                            'bg-emerald-100 text-emerald-600': attendance.status?.id == 2,
                                            'bg-blue-100 text-blue-600': attendance.status?.id == 3,
                                            'bg-amber-100 text-amber-600': ![1, 2, 3].includes(attendance.status?.id)
                                        }"
                                        x-text="attendance.status?.status_name ?? '-'">
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap whitespace-nowrap">
                                    <span
                                        class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                        <a :href="`/students/detail/${attendance.student?.id}-${slugify(attendance.student?.name)}`"
                                            class="px-3 py-1.5 cursor-pointer text-sm font-medium transition-colors hover:bg-gray-100 hover:text-gray-900 focus:relative"
                                            aria-label="View">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2">
                                                    <path d="M3 13c3.6-8 14.4-8 18 0" />
                                                    <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6Z" />
                                                </g>
                                            </svg>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        </template>
                        <template x-if="filteredStudents().length === 0">
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada data siswa yang ditemukan.
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function deviceDetail() {
            return {
                device: null,
                students: [],
                search: '',
                async fetchRemote(id) {
                    try {
                        const res = await fetch(`http://localhost:8001/api/devices/${id}`);
                        const data = await res.json();
                        this.device = data.data;
                        this.students = data.data.attendances || [];
                    } catch (e) {
                        console.error('Gagal mengambil data:', e);
                    }
                },
                init(id) {
                    this.fetchRemote(id);
                    setInterval(() => this.fetchRemote(id), 10000);
                },
                initFromUrl() {
                    const parts = window.location.pathname.split('/').filter(Boolean);
                    const id = parts[parts.length - 1];
                    if (id) this.init(id);
                },
                filteredStudents() {
                    if (!this.search) return this.students;
                    return this.students.filter(a =>
                        (a.student?.name || '').toLowerCase().includes(this.search.toLowerCase()) ||
                        (a.status?.status_name || '').toLowerCase().includes(this.search.toLowerCase())
                    );
                },
                slugify(text) {
                    return text ?
                        text.toString().toLowerCase()
                        .replace(/\s+/g, '-') // spasi jadi -
                        .replace(/[^\w\-]+/g, '') // hapus simbol
                        .replace(/\-\-+/g, '-') // ganti --
                        .replace(/^-+/, '') // hapus strip depan
                        .replace(/-+$/, '') // hapus strip belakang
                        :
                        '';
                }
            }
        }
    </script>
@endsection
