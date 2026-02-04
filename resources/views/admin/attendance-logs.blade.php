@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="p-6 ml-17 sm:ml-64" x-data="attendanceLog()" x-init="fetchLogs();
    startAutoRefresh()">
        <h1 class="text-2xl font-bold mb-4 flex items-center">
            📜 Log Aktivitas Absensi
            <span class="flex justify-center items-center ml-3 text-gray-500 animate-pulse">
                <svg x-show="loading" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24">
                    <circle cx="12" cy="2" r="0" fill="#000000">
                        <animate attributeName="r" begin="0" calcMode="spline" dur="1s"
                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                            values="0;2;0;0" />
                    </circle>
                    <circle cx="12" cy="2" r="0" fill="#000000" transform="rotate(45 12 12)">
                        <animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s"
                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                            values="0;2;0;0" />
                    </circle>
                    <circle cx="12" cy="2" r="0" fill="#000000" transform="rotate(90 12 12)">
                        <animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s"
                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                            values="0;2;0;0" />
                    </circle>
                    <circle cx="12" cy="2" r="0" fill="#000000" transform="rotate(135 12 12)">
                        <animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s"
                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                            values="0;2;0;0" />
                    </circle>
                    <circle cx="12" cy="2" r="0" fill="#000000" transform="rotate(180 12 12)">
                        <animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s"
                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                            values="0;2;0;0" />
                    </circle>
                    <circle cx="12" cy="2" r="0" fill="#000000" transform="rotate(225 12 12)">
                        <animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s"
                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                            values="0;2;0;0" />
                    </circle>
                    <circle cx="12" cy="2" r="0" fill="#000000" transform="rotate(270 12 12)">
                        <animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s"
                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                            values="0;2;0;0" />
                    </circle>
                    <circle cx="12" cy="2" r="0" fill="#000000" transform="rotate(315 12 12)">
                        <animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s"
                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                            values="0;2;0;0" />
                    </circle>
                </svg>
            </span>
        </h1>

        <div
            class="flex flex-col lg:flex-row sm:items-center sm:justify-between gap-4 mb-6 bg-gradient-to-r from-white to-gray-50 shadow-md p-5 rounded-2xl border border-gray-200">
            <div class="flex flex-col md:flex-row gap-4 items-center">
                <div class="relative">
                    <label class="block text-xs font-semibold text-gray-600 mb-1 uppercase tracking-wider">Status</label>
                    <div class="relative">
                        <select x-model="filterStatus" @change="fetchLogs(1)"
                            class="appearance-none w-48 sm:w-52 px-4 py-2 pr-10 border border-gray-300 rounded-xl text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none">
                            <option value="">Semua</option>
                            <option value="success">Success</option>
                            <option value="warning">Warning</option>
                            <option value="error">Error</option>
                        </select>
                        <svg class="w-4 h-4 text-gray-400 absolute right-3 top-3 pointer-events-none"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1 uppercase tracking-wider">Tanggal</label>
                    <input type="date" x-model="filterDate" @change="fetchLogs(1)"
                        class="w-48 sm:w-52 px-4 py-2 border border-gray-300 rounded-xl text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none">
                </div>
            </div>

            <div class="flex justify-center items-center gap-2">
                <button @click="resetFilters"
                    class="flex items-center gap-2 px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl shadow-sm hover:bg-gray-100 hover:border-gray-400 hover:shadow-md active:scale-95 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 6.5V12l-4 3" />
                            <path
                                d="M17.5 20.353A9.99 9.99 0 0 0 22 12c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10q1.03-.002 2-.2" />
                            <path d="M21.5 20.5h-4v-4" />
                        </g>
                    </svg>
                    Reset Filter
                </button>
                <button @click="deleteLogs()"
                    class="flex items-center gap-2 px-5 py-2 text-sm font-medium text-red-700 bg-white border border-red-300 rounded-xl shadow-sm hover:bg-red-100 hover:border-red-400 hover:shadow-md active:scale-95 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                    </svg>
                    Hapus Log
                </button>
            </div>

            <div class="bg-red-200 flex justify-around items-center">
                <div class="text-amber-300 font-bold">
                    <h1>Filter</h1>
                    <p>Filter your log</p>
                </div>

                <div>
                    
                </div>
            </div>
        </div>

        <div class="w-full overflow-x-auto">
            <table class="w-full text-left border border-separate rounded border-slate-200" cellspacing="0">
                <tbody>
                    <tr>
                        <th
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 border-slate-300 text-slate-700 bg-slate-100 whitespace-nowrap">
                            Waktu</th>
                        <th
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 border-slate-300 text-slate-700 bg-slate-100 whitespace-nowrap">
                            Nama Siswa</th>
                        <th
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 border-slate-300 text-slate-700 bg-slate-100 whitespace-nowrap">
                            No Kartu</th>
                        <th
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 border-slate-300 text-slate-700 bg-slate-100 whitespace-nowrap">
                            Status</th>
                        <th
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 border-slate-300 text-slate-700 bg-slate-100 whitespace-nowrap">
                            Pesan</th>
                    </tr>

                    <template x-for="log in logs" :key="log.id">
                        <tr class="transition-colors duration-300 hover:bg-slate-50 bg-white">
                            <td class="h-12 px-6 text-sm border-t border-l border-slate-200 text-slate-600 whitespace-nowrap"
                                x-text="formatDate(log.created_at)"></td>
                            <td class="h-12 px-6 text-sm border-t border-l border-slate-200 text-slate-600 whitespace-nowrap"
                                x-text="log.student?.name ?? '-'"></td>
                            <td class="h-12 px-6 text-sm border-t border-l border-slate-200 text-slate-600 whitespace-nowrap"
                                x-text="log.card_number ?? '-'"></td>
                            <td
                                class="h-12 px-6 text-sm border-t border-l border-slate-200 text-slate-600 whitespace-nowrap">
                                <span class="px-2 py-1 text-sm rounded"
                                    :class="{
                                        'bg-green-100 text-green-800': log.status === 'success',
                                        'bg-red-100 text-red-800': log.status === 'error',
                                        'bg-yellow-100 text-yellow-800': ['warning', 'info'].includes(log.status)
                                    }"
                                    x-text="log.status.charAt(0).toUpperCase() + log.status.slice(1)">
                                </span>
                            </td>
                            <td class="h-12 px-6 text-sm border-t border-l border-slate-200 text-slate-600 whitespace-nowrap"
                                x-text="log.message"></td>
                        </tr>
                    </template>

                    <template x-if="logs.length === 0 && !loading">
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500 italic bg-white">
                                Tidak ada data log absensi yang ditemukan.
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <div class="bg-white shadow rounded-b-lg overflow-hidden">
            <div class="flex justify-between items-center p-4 bg-gray-50">
                <button
                    class="flex items-center gap-2 px-4 py-2 text-gray-700 font-medium bg-white border border-gray-300 rounded-xl shadow-sm hover:bg-gray-100 hover:border-gray-400 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    @click="changePage(currentPage - 1)" :disabled="currentPage <= 1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="hidden sm:block">Sebelumnya</span>
                </button>

                <span class="text-sm text-gray-600">
                    Halaman
                    <span class="font-semibold text-gray-800" x-text="currentPage"></span>
                    dari
                    <span class="font-semibold text-gray-800" x-text="lastPage"></span>
                </span>

                <button
                    class="flex items-center gap-2 px-4 py-2 text-gray-700 font-medium bg-white border border-gray-300 rounded-xl shadow-sm hover:bg-gray-100 hover:border-gray-400 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    @click="changePage(currentPage + 1)" :disabled="currentPage >= lastPage">
                    <span class="hidden sm:block">Berikutnya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        function attendanceLog() {
            return {
                logs: [],
                loading: false,
                currentPage: 1,
                lastPage: 1,
                filterStatus: '',
                filterDate: '',

                fetchLogs(page = 1) {
                    this.loading = true;
                    const params = new URLSearchParams({
                        page,
                        status: this.filterStatus || '',
                        date: this.filterDate || ''
                    });

                    fetch(`{{ route('attendance.logs.json') }}?${params.toString()}`)
                        .then(res => res.json())
                        .then(data => {
                            this.logs = data.data;
                            this.currentPage = data.current_page;
                            this.lastPage = data.last_page;
                            this.loading = false;
                        })
                        .catch(() => this.loading = false);
                },

                startAutoRefresh() {
                    setInterval(() => {
                        this.fetchLogs(this.currentPage);
                    }, 5000);
                },

                changePage(page) {
                    if (page >= 1 && page <= this.lastPage) {
                        this.fetchLogs(page);
                    }
                },

                resetFilters() {
                    this.filterStatus = '';
                    this.filterDate = '';
                    this.fetchLogs(1);
                },

                formatDate(dateStr) {
                    const date = new Date(dateStr);
                    return date.toLocaleString('id-ID', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    });
                },
                deleteLogs() {
                    if (!confirm(this.filterDate ?
                            `Yakin ingin menghapus log tanggal ${this.filterDate}?` :
                            'Yakin ingin menghapus semua log absensi?')) {
                        return;
                    }

                    const params = new URLSearchParams({
                        date: this.filterDate || ''
                    });

                    fetch(`{{ route('attendance.logs.delete') }}?${params.toString()}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            alert(data.message);
                            this.fetchLogs(1);
                        })
                        .catch(() => alert('Gagal menghapus data.'));
                },
            }
        }
    </script>
@endsection
