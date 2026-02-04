@extends('layout.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="ml-17 sm:ml-64 max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-center text-gray-800">
            Denah Ruangan / LAB
        </h1>

        <div x-data="deviceGrid()" x-init="init()" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <template x-if="loading">
                <div class="col-span-full flex flex-col items-center justify-center py-20 space-y-4">
                    <svg class="mx-auto size-8 animate-spin text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>

                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <p class="text-gray-600 text-lg font-semibold tracking-wide">
                        Memuat data ruangan...
                    </p>
                </div>
            </template>

            <template x-for="device in devices" :key="device.id">
                <div
                    class="relative bg-gradient-to-br from-indigo-50 via-white to-blue-50 rounded-2xl shadow-md p-6 flex flex-col justify-between border border-indigo-100 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 ease-out group">
                    <div
                        class="absolute -top-5 -right-5 w-20 h-20 bg-indigo-200/40 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-all duration-500">
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center mb-3">
                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 2c4.418 0 8 3.582 8 8 0 4.628-8 12-8 12S4 14.628 4 10c0-4.418 3.582-8 8-8z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <h2 class="ml-3 text-xl font-bold text-gray-800 tracking-wide" x-text="device.location"></h2>
                        </div>

                        <div class="space-y-2 text-sm">
                            <p class="text-gray-600 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" height="200"
                                    viewBox="0 0 16 16">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M3.261 2.186c.337-.274.829-.154 1.044.223c.197.344.09.777-.21 1.035A5.987 5.987 0 0 0 2 8a5.99 5.99 0 0 0 2.095 4.556c.3.258.407.69.21 1.035c-.215.377-.707.497-1.044.223A7.485 7.485 0 0 1 .5 8a7.485 7.485 0 0 1 2.761-5.814m8.434.223c-.197.344-.09.777.21 1.035A5.986 5.986 0 0 1 14 8a5.986 5.986 0 0 1-2.095 4.556c-.3.258-.407.69-.21 1.035c.215.377.707.497 1.044.223A7.485 7.485 0 0 0 15.5 8a7.485 7.485 0 0 0-2.761-5.814c-.337-.274-.829-.154-1.044.223M4.759 4.878c.315-.327.837-.21 1.062.184c.19.33.097.744-.144 1.04A2.988 2.988 0 0 0 5 8c0 .72.254 1.381.677 1.899c.241.295.333.708.144 1.04c-.225.393-.747.51-1.062.183A4.485 4.485 0 0 1 3.5 8c0-1.213.48-2.313 1.26-3.122Zm5.42.184c-.19.33-.098.744.144 1.04C10.746 6.618 11 7.28 11 8s-.254 1.381-.677 1.899c-.242.295-.333.708-.144 1.04c.225.393.747.51 1.062.183A4.484 4.484 0 0 0 12.5 8c0-1.213-.48-2.313-1.26-3.122c-.314-.327-.836-.21-1.061.184M8 9.5a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3"
                                        clip-rule="evenodd" />
                                </svg>
                                Source:
                                <span class="font-semibold text-indigo-600" x-text="device.source"></span>
                            </p>
                            <p class="text-gray-600 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-500"
                                    viewBox="0 0 16 16">
                                    <path fill="currentColor"
                                        d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4c0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4Z" />
                                </svg>
                                Jumlah Hadir:
                                <span class="font-bold text-emerald-600 text-lg" x-text="device.attendance"></span>
                            </p>
                        </div>
                    </div>

                    <div class="relative z-10 mt-6">
                        <a :href="'/rooms/' + device.id"
                            class="w-full inline-block text-center px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-blue-600 
                    text-white rounded-xl text-sm font-semibold shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <script>
        function deviceGrid() {
            return {
                devices: [],
                loading: true,
                async fetchData() {
                    try {
                        const res = await fetch("/api/devices");
                        const data = await res.json();
                        this.devices = data.data;
                    } catch (err) {
                        console.error("Fetch error:", err);
                    } finally {
                        this.loading = false;
                    }
                },
                init() {
                    this.fetchData();
                    setInterval(() => this.fetchData(), 10000);
                }
            }
        }
    </script>
@endsection
