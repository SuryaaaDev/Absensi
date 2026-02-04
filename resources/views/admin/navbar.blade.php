<div class="fixed border-r border-gray-200 left-0 top-0 bottom-0 z-50">
    <div class="flex flex-col w-17 sm:w-64 h-screen px-2 sm:px-3 py-8 bg-white transition-all duration-300">
        <a href="{{ route('dashboard') }}" class="flex justify-center items-center">
            <img class="w-auto h-10 sm:h-16" src="{{ asset('storage/image/logo-smk2klt.png') }}" alt="logo smkn 2 klaten">
            <h1 class="text-black font-bold text-lg hidden sm:block">SMK N 2 KLATEN</h1>
        </a>

        {{-- <div class="relative mt-6">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>

            <input type="text"
                class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
                placeholder="Search" />
        </div> --}}

        <div class="flex flex-col justify-between flex-1 my-6 overflow-y-auto overflow-x-hidden">
            <nav>
                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700 {{ request()->is('dashboard') ? 'bg-gray-100' : '' }}"
                    href="{{ route('dashboard') }}">
                    <svg class="w-5 h-5 {{ request()->is('dashboard*') ? 'text-gray-700' : '' }}" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span
                        class="mx-4 font-medium hidden sm:inline {{ request()->is('dashboard*') ? 'text-gray-700' : '' }}">Dashboard</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700 {{ request()->is('students*') ? 'bg-gray-100' : '' }}"
                    href="{{ route('students') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 {{ request()->is('students*') ? 'text-gray-700' : '' }}" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4c0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4Z" />
                    </svg>
                    <span
                        class="mx-4 font-medium hidden sm:inline {{ request()->is('students*') ? 'text-gray-700' : '' }}">Data
                        Siswa</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100  hover:text-gray-700 {{ request()->is('classes*') ? 'bg-gray-100' : '' }}"
                    href="{{ route('classes') }}">
                    <svg class="w-5 h-5 {{ request()->is('classes*') ? 'text-gray-700' : '' }}" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3.78552 9.5 12.7855 14l9-4.5-9-4.5-8.99998 4.5Zm0 0V17m3-6v6.2222c0 .3483 2 1.7778 5.99998 1.7778 4 0 6-1.3738 6-1.7778V11" />
                    </svg>

                    <span
                        class="mx-4 font-medium hidden sm:inline {{ request()->is('classes*') ? 'text-gray-700' : '' }}">Kelas</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 {{ request()->is('statuses*') ? 'bg-gray-100' : '' }}"
                    href="{{ route('statuses') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 {{ request()->is('statuses*') ? 'text-gray-700' : '' }}" viewBox="0 0 16 16"
                        fill="currentColor">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M15.941 7.033a8 8 0 0 1-14.784 5.112a.75.75 0 1 1 1.283-.778a6.5 6.5 0 1 0 8.922-8.93a.75.75 0 0 1 .776-1.284a8 8 0 0 1 3.803 5.88ZM9 1a1 1 0 1 1-2 0a1 1 0 0 1 2 0ZM2.804 5a1 1 0 1 0-1.732-1a1 1 0 0 0 1.732 1ZM1 7a1 1 0 1 1 0 2a1 1 0 0 1 0-2Zm4-4.196a1 1 0 1 0-1-1.732a1 1 0 0 0 1 1.732Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span
                        class="mx-4 font-medium hidden sm:inline {{ request()->is('statuses*') ? 'text-gray-700' : '' }}">Keterangan</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 {{ request()->is('rooms*') ? 'bg-gray-100' : '' }}"
                    href="{{ route('rooms.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 {{ request()->is('rooms*') ? 'text-gray-700' : '' }}" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" color="currentColor">
                            <circle cx="12" cy="6" r="4" />
                            <path
                                d="M5 16c-1.25.633-2 1.439-2 2.316C3 20.35 7.03 22 12 22s9-1.65 9-3.684c0-.877-.75-1.683-2-2.316m-7-6v8" />
                        </g>
                    </svg>

                    <span
                        class="mx-4 font-medium hidden sm:inline {{ request()->is('rooms*') ? 'text-gray-700' : '' }}">Ruangan</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700 {{ request()->is('attendances*') ? 'bg-gray-100' : '' }}"
                    href="{{ route('attendances') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 {{ request()->is('attendances*') ? 'text-gray-700' : '' }}" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M15 9.429V5a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v8.286m6-3.857V21m0-11.571h4a2 2 0 0 1 2 2V19a2 2 0 0 1-2 2h-4m0 0H9m0 0v-7.714M9 21H5a2 2 0 0 1-2-2v-3.714a2 2 0 0 1 2-2h4" />
                    </svg>
                    <span
                        class="mx-4 font-medium hidden sm:inline {{ request()->is('attendances*') ? 'text-gray-700' : '' }}">Rekapitulasi</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700 {{ request()->is('attendance/monthly*') ? 'bg-gray-100' : '' }}"
                    href="{{ route('attendance.monthly.student') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 {{ request()->is('attendance/monthly*') ? 'text-gray-700' : '' }}"
                        viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2">
                            <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2" />
                            <path
                                d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v0a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2zm0 7h.01M13 12h2m-6 4h.01M13 16h2" />
                        </g>
                    </svg>
                    <span
                        class="mx-4 font-medium hidden sm:inline {{ request()->is('attendance/monthly*') ? 'text-gray-700' : '' }}">Rekap
                        Absen</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700 {{ request()->is('permissions*') ? 'bg-gray-100' : '' }}"
                    href="{{ route('permissions') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 {{ request()->is('permissions*') ? 'text-gray-700' : '' }}" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M0 1.75C0 .784.784 0 1.75 0h12.5C15.216 0 16 .784 16 1.75v9.5A1.75 1.75 0 0 1 14.25 13H8.06l-2.573 2.573A1.458 1.458 0 0 1 3 14.543V13H1.75A1.75 1.75 0 0 1 0 11.25Zm1.75-.25a.25.25 0 0 0-.25.25v9.5c0 .138.112.25.25.25h2a.75.75 0 0 1 .75.75v2.19l2.72-2.72a.749.749 0 0 1 .53-.22h6.5a.25.25 0 0 0 .25-.25v-9.5a.25.25 0 0 0-.25-.25Zm7 2.25v2.5a.75.75 0 0 1-1.5 0v-2.5a.75.75 0 0 1 1.5 0ZM9 9a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                    </svg>

                    <span
                        class="mx-4 font-medium hidden sm:inline {{ request()->is('permissions*') ? 'text-gray-700' : '' }}">Perizinan</span>
                </a>

                <hr class="my-6 border-gray-200" />

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700 {{ request()->is('settings*') ? 'bg-gray-100' : '' }}"
                    href="{{ route('settings') }}">
                    <svg class="w-5 h-5 {{ request()->is('settings*') ? 'text-gray-700' : '' }}" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.3246 4.31731C10.751 2.5609 13.249 2.5609 13.6754 4.31731C13.9508 5.45193 15.2507 5.99038 16.2478 5.38285C17.7913 4.44239 19.5576 6.2087 18.6172 7.75218C18.0096 8.74925 18.5481 10.0492 19.6827 10.3246C21.4391 10.751 21.4391 13.249 19.6827 13.6754C18.5481 13.9508 18.0096 15.2507 18.6172 16.2478C19.5576 17.7913 17.7913 19.5576 16.2478 18.6172C15.2507 18.0096 13.9508 18.5481 13.6754 19.6827C13.249 21.4391 10.751 21.4391 10.3246 19.6827C10.0492 18.5481 8.74926 18.0096 7.75219 18.6172C6.2087 19.5576 4.44239 17.7913 5.38285 16.2478C5.99038 15.2507 5.45193 13.9508 4.31731 13.6754C2.5609 13.249 2.5609 10.751 4.31731 10.3246C5.45193 10.0492 5.99037 8.74926 5.38285 7.75218C4.44239 6.2087 6.2087 4.44239 7.75219 5.38285C8.74926 5.99037 10.0492 5.45193 10.3246 4.31731Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span
                        class="mx-4 font-medium hidden sm:inline {{ request()->is('settings*') ? 'text-gray-700' : '' }}">Settings</span>
                </a>
            </nav>


        </div>
        <div x-data="{ open: false }">
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
                x-cloak class="absolute w-max left-5/6 bottom-20 py-2 px-2 bg-white rounded-md shadow-2xl z-50">
                <a href="{{ route('admin.profile') }}"
                    class="group flex gap-1 items-center px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-100 hover:text-gray-700  {{ request()->is('profile/admin*') ? 'bg-gray-100 text-gray-200' : '' }}">
                    <svg class="flex-shrink-0 w-6 h-6 {{ request()->is('profile/admin*') ? 'text-gray-700' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"
                            stroke-width="1.9"
                            d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>

                    <span
                        class="font-medium {{ request()->is('profile/admin*') ? 'text-gray-700' : '' }}">Profil</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                    <button type="submit"
                        class="cursor-pointer w-full flex justify-start items-center gap-1 py-2 px-4 rounded-lg transition-colors duration-300 text-red-500 hover:bg-red-500 hover:text-white focus:bg-red-50 focus:text-red-600 focus:outline-none focus-visible:outline-none">
                        <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                        </svg>
                        Log Out
                    </button>
                </form>
            </div>

            <button @click="open = !open"
                class="w-full flex items-center justify-between cursor-pointer py-2 px-2 text-sm font-medium rounded-md hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                <div class="flex items-center">
                    <img src="{{ Auth::user()->profile
                        ? asset('storage/' . Auth::user()->profile)
                        : 'data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjY2NjIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNTAiIGhlaWdodD0iMjUwIiB2aWV3Qm94PSIwIDAgMjUwIDI1MCI+PHBhdGggZD0iTTEyNSAxMjVhNDAgNDAgMCAxIDAgMC04MCA0MCA0MCAwIDAgMCAwIDgwWk0xMjUgMTUwYy01NSAwLTc1IDMwLTc1IDUwdiA1MGgxNTB2LTUwYzAtMjAtMjAtNTAtNzUtNTB6Ii8+PC9zdmc+' }}"
                        alt="Profile {{ Auth::user()->name }}"
                        class="w-8 h-8 rounded-full object-cover border border-gray-300" />
                    <span class="mx-2 font-medium text-gray-800 hidden sm:inline">
                        {{ Auth::user()->name }}
                    </span>
                </div>

                <svg :class="{ 'rotate-180': open }" class="ml-2 h-5 w-5 transform transition-transform duration-200 hidden sm:inline"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
</div>
