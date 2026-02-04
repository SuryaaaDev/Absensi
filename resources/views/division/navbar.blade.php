<div aria-label="Side navigation"
    class="fixed top-0 bottom-0 left-0 z-40 flex flex-col transition-all duration-300 bg-white border-r w-17 sm:w-72 sm:translate-x-0 border-r-slate-200">
    <div class="flex flex-col items-center gap-4 p-6 border-b border-slate-200">
        <div class="shrink-0">
            <a href="{{ route('profile.educator') }}"
                class="relative flex items-center justify-center w-12 h-12 text-white rounded-full">
                @if (Auth::user()->profile)
                    <img src="{{ asset('storage/' . Auth::user()->profile) }}" alt="{{ Auth::user()->name }}"
                        class="w-10 h-10 sm:h-12 sm:w-22 rounded-full" />
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="#9ca3af"
                        class="w-9 h-9 sm:w-16 sm:h-16">
                        <path
                            d="M224 256a128 128 0 1 0 0-256a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512h388.6c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3h-91.5zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8l95.4 38.2z" />
                    </svg>
                @endif
                <span
                    class="absolute bottom-1 right-1 sm:bottom-0 sm:right-0 inline-flex items-center justify-center gap-1 p-1 text-sm text-white border-2 border-white rounded-full bg-emerald-500"><span
                        class="sr-only"> online </span></span>
            </a>
        </div>
        <div class="hidden sm:flex flex-col gap-0 min-h-[2rem] items-start justify-center w-full min-w-0 text-center">
            <h4 class="w-full text-base truncate text-slate-700">ITSC</h4>
            <p class="w-full text-sm truncate text-slate-500">Admin Divisi</p>
        </div>
        <span class="hidden sm:flex text-md text-slate-500">
            {{ \Carbon\Carbon::now('Asia/Jakarta')->locale('id')->translatedFormat('l, d F Y') }}
        </span>
    </div>
    <nav aria-label="side navigation" class="flex-1 overflow-auto divide-y divide-slate-100">
        <div>
            <ul class="flex flex-col flex-1 gap-1 py-3">
                <li class="px-3">
                    <a href="{{ route('division.dashboard') }}"
                        class="flex items-center justify-center gap-3 p-3 transition-colors rounded-xl text-slate-700 hover:text-indigo-500 hover:bg-indigo-50 focus:bg-indigo-50 aria-[current=page]:text-indigo-500 aria-[current=page]:bg-indigo-50 {{ request()->is('dashboard/division*') ? 'bg-indigo-50' : '' }}">
                        <div class="flex items-center self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 {{ request()->is('dashboard/division*') ? 'text-indigo-500' : '' }}"
                                aria-label="Dashboard icon" role="graphics-symbol">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                            </svg>
                        </div>
                        <div
                            class="hidden sm:flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate {{ request()->is('dashboard/division*') ? 'text-indigo-500 font-medium' : '' }}">
                            Dashboard
                        </div>
                    </a>
                </li>
                <li class="px-3">
                    <a href="{{ route('division.students') }}"
                        class="flex items-center justify-center gap-3 p-3 transition-colors rounded-xl text-slate-700 hover:text-indigo-500 hover:bg-indigo-50 focus:bg-indigo-50 aria-[current=page]:text-indigo-500 aria-[current=page]:bg-indigo-50 {{ request()->is('students/division*') ? 'bg-indigo-50' : '' }}">
                        <div class="flex items-center self-center ">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 {{ request()->is('students/division*') ? 'text-indigo-500' : '' }}"
                                viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4c0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4Z" />
                            </svg>
                        </div>
                        <div
                            class="hidden sm:flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate {{ request()->is('students/division*') ? 'text-indigo-500 font-medium' : '' }}">
                            Siswa
                        </div>
                    </a>
                </li>
                <li class="px-3">
                    <a href="{{ route('attendance.monthly.division') }}"
                        class="flex items-center justify-center gap-3 p-3 transition-colors rounded-xl text-slate-700 hover:text-indigo-500 hover:bg-indigo-50 focus:bg-indigo-50 aria-[current=page]:text-indigo-500 aria-[current=page]:bg-indigo-50 {{ request()->is('attendance/division*') ? 'bg-indigo-50' : '' }}">
                        <div class="flex items-center self-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 {{ request()->is('attendance/division*') ? 'text-indigo-500' : '' }}"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M4 8h16M4 8v8.8c0 1.12 0 1.68.218 2.108a2 2 0 0 0 .874.874c.427.218.987.218 2.105.218h9.606c1.118 0 1.677 0 2.104-.218c.377-.192.683-.498.875-.874c.218-.428.218-.986.218-2.104V8M4 8v-.8c0-1.12 0-1.68.218-2.108c.192-.377.497-.682.874-.874C5.52 4 6.08 4 7.2 4H8m12 4v-.803c0-1.118 0-1.678-.218-2.105a2.001 2.001 0 0 0-.875-.874C18.48 4 17.92 4 16.8 4H16M8 4h8M8 4V2m8 2V2m-1 10l-4 4l-2-2" />
                            </svg>
                        </div>
                        <div
                            class="hidden sm:flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate {{ request()->is('attendance/division*') ? 'text-indigo-500 font-medium' : '' }}">
                            Rekap Absensi
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <ul class="flex flex-col flex-1 gap-1 py-3">
                <li class="px-3">
                    <a href="{{ route('settings.division') }}"
                        class="flex items-center justify-center gap-3 p-3 transition-colors rounded-xl text-slate-700 hover:text-indigo-500 hover:bg-indigo-50 focus:bg-indigo-50 aria-[current=page]:text-indigo-500 aria-[current=page]:bg-indigo-50 {{ request()->is('settings/division*') ? 'bg-indigo-50' : '' }}">
                        <div class="flex items-center self-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 {{ request()->is('settings/division*') ? 'text-indigo-500' : '' }}"
                                viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M128 80a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Zm88-29.84q.06-2.16 0-4.32l14.92-18.64a8 8 0 0 0 1.48-7.06a107.21 107.21 0 0 0-10.88-26.25a8 8 0 0 0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186 40.54a8 8 0 0 0-3.94-6a107.71 107.71 0 0 0-26.25-10.87a8 8 0 0 0-7.06 1.49L130.16 40h-4.32L107.2 25.11a8 8 0 0 0-7.06-1.48a107.6 107.6 0 0 0-26.25 10.88a8 8 0 0 0-3.93 6l-2.64 23.76q-1.56 1.49-3 3L40.54 70a8 8 0 0 0-6 3.94a107.71 107.71 0 0 0-10.87 26.25a8 8 0 0 0 1.49 7.06L40 125.84v4.32L25.11 148.8a8 8 0 0 0-1.48 7.06a107.21 107.21 0 0 0 10.88 26.25a8 8 0 0 0 6 3.93l23.72 2.64q1.49 1.56 3 3L70 215.46a8 8 0 0 0 3.94 6a107.71 107.71 0 0 0 26.25 10.87a8 8 0 0 0 7.06-1.49L125.84 216q2.16.06 4.32 0l18.64 14.92a8 8 0 0 0 7.06 1.48a107.21 107.21 0 0 0 26.25-10.88a8 8 0 0 0 3.93-6l2.64-23.72q1.56-1.48 3-3l23.78-2.8a8 8 0 0 0 6-3.94a107.71 107.71 0 0 0 10.87-26.25a8 8 0 0 0-1.49-7.06Zm-16.1-6.5a73.93 73.93 0 0 1 0 8.68a8 8 0 0 0 1.74 5.48l14.19 17.73a91.57 91.57 0 0 1-6.23 15l-22.6 2.56a8 8 0 0 0-5.1 2.64a74.11 74.11 0 0 1-6.14 6.14a8 8 0 0 0-2.64 5.1l-2.51 22.58a91.32 91.32 0 0 1-15 6.23l-17.74-14.19a8 8 0 0 0-5-1.75h-.48a73.93 73.93 0 0 1-8.68 0a8 8 0 0 0-5.48 1.74l-17.78 14.2a91.57 91.57 0 0 1-15-6.23L82.89 187a8 8 0 0 0-2.64-5.1a74.11 74.11 0 0 1-6.14-6.14a8 8 0 0 0-5.1-2.64l-22.58-2.52a91.32 91.32 0 0 1-6.23-15l14.19-17.74a8 8 0 0 0 1.74-5.48a73.93 73.93 0 0 1 0-8.68a8 8 0 0 0-1.74-5.48L40.2 100.45a91.57 91.57 0 0 1 6.23-15L69 82.89a8 8 0 0 0 5.1-2.64a74.11 74.11 0 0 1 6.14-6.14A8 8 0 0 0 82.89 69l2.51-22.57a91.32 91.32 0 0 1 15-6.23l17.74 14.19a8 8 0 0 0 5.48 1.74a73.93 73.93 0 0 1 8.68 0a8 8 0 0 0 5.48-1.74l17.77-14.19a91.57 91.57 0 0 1 15 6.23L173.11 69a8 8 0 0 0 2.64 5.1a74.11 74.11 0 0 1 6.14 6.14a8 8 0 0 0 5.1 2.64l22.58 2.51a91.32 91.32 0 0 1 6.23 15l-14.19 17.74a8 8 0 0 0-1.74 5.53Z" />
                            </svg>
                        </div>
                        <div
                            class="hidden sm:flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate {{ request()->is('settings/division*') ? 'text-indigo-500 font-medium' : '' }}">
                            Pengaturan
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <footer class="p-3 border-t border-slate-200">
        <form action="{{ route('logout.division') }}" method="POST"
            class="flex items-center p-0 sm:p-3 transition-colors rounded text-slate-900 hover:text-red-500 cursor-pointer">
            @csrf
            <button type="submit"
                class="flex items-center justify-center sm:justify-start w-full gap-3 overflow-hidden cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m2 12l5 4v-3h9v-2H7V8z" />
                        <path fill="currentColor"
                            d="M13.001 2.999a8.938 8.938 0 0 0-6.364 2.637L8.051 7.05c1.322-1.322 3.08-2.051 4.95-2.051s3.628.729 4.95 2.051s2.051 3.08 2.051 4.95s-.729 3.628-2.051 4.95s-3.08 2.051-4.95 2.051s-3.628-.729-4.95-2.051l-1.414 1.414c1.699 1.7 3.959 2.637 6.364 2.637s4.665-.937 6.364-2.637c1.7-1.699 2.637-3.959 2.637-6.364s-.937-4.665-2.637-6.364a8.938 8.938 0 0 0-6.364-2.637z" />
                    </svg>
                <span class="hidden sm:flex text-sm font-medium">Logout</span>
            </button>
        </form>
    </footer>
</div>
