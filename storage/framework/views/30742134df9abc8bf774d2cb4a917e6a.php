<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('home.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="relative w-full glide-02">
        <div class="overflow-hidden" data-glide-el="track">
            <ul
                class="relative w-full md:h-screen overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                <li class="flex-shrink-0 w-full h-full">
                    <img src="<?php echo e(asset('storage/image/home-1.png')); ?>" class="object-cover w-full md:h-full cursor-grab" />
                </li>
                <li class="flex-shrink-0 w-full h-full">
                    <img src="<?php echo e(asset('storage/image/home-2.png')); ?>" class="object-cover w-full md:h-full cursor-grab" />
                </li>
            </ul>
        </div>

        <div class="absolute bottom-0 flex items-center justify-center w-full gap-2" data-glide-el="controls[nav]">
            <button class="p-4 group" data-glide-dir="=0" aria-label="goto slide 1"><span
                    class="block w-2 h-2 transition-colors cursor-pointer duration-300 rounded-full ring-1 ring-slate-700 bg-white/20 focus:outline-none"></span></button>
            <button class="p-4 group" data-glide-dir="=1" aria-label="goto slide 2"><span
                    class="block w-2 h-2 transition-colors cursor-pointer duration-300 rounded-full ring-1 ring-slate-700 bg-white/20 focus:outline-none"></span></button>
        </div>
    </div>

    <section class="bg-white dark:bg-gray-900 py-30" id="about">
        <div class="container flex flex-col items-center px-4 py-12 mx-auto text-center">
            <h2 class="text-2xl font-bold tracking-tight text-gray-800 xl:text-3xl dark:text-white">
                Apa Itu Absensi RFID?
            </h2>

            <p class="block max-w-4xl mt-4 text-gray-500 dark:text-gray-300">
                RFID (Radio Frequency Identification) adalah teknologi identifikasi otomatis yang menggunakan gelombang
                radio. Di sistem ini, setiap siswa memiliki kartu identitas berteknologi RFID yang akan dibaca oleh alat
                pemindai setiap kali mereka datang atau pulang dari sekolah. Dengan ini, absensi tidak lagi dilakukan secara
                manual. Data kehadiran siswa langsung terekam secara real-time ke dalam sistem.
            </p>

            <div class="mt-6">
                <a href="#cara-absen"
                    class="inline-flex items-center justify-center w-full px-4 py-2.5 overflow-hidden text-sm text-white transition-colors duration-300 bg-gray-900 rounded-lg shadow sm:w-auto sm:mx-2 hover:bg-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 focus:ring focus:ring-gray-300 focus:ring-opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-2 fill-current" viewBox="0 0 26 26">
                        <path fill="currentColor"
                            d="M13 0C5.925 0 0 5.08 0 11.5c0 3.03 1.359 5.748 3.5 7.781a6.733 6.733 0 0 1-1.094 1.875A16.48 16.48 0 0 1 .375 23.22A1 1 0 0 0 1 25c2.215 0 3.808-.025 5.25-.406c1.29-.342 2.399-1.058 3.531-2.063c1.03.247 2.093.469 3.219.469c7.075 0 13-5.08 13-11.5S20.075 0 13 0zm0 2c6.125 0 11 4.32 11 9.5S19.125 21 13 21c-1.089 0-2.22-.188-3.25-.469a1 1 0 0 0-.938.25c-1.125 1.079-1.954 1.582-3.062 1.875c-.51.135-1.494.103-2.188.157c.14-.158.271-.242.407-.407c.786-.96 1.503-1.975 1.719-3.125a1 1 0 0 0-.344-.937C3.249 16.614 2 14.189 2 11.5C2 6.32 6.875 2 13 2zm-1.906 3.906a1 1 0 0 0-.469.25l-1.5 1.407l1.344 1.468l1.187-1.125h2.406L15 8.97v1.469l-2.563 1.718A1 1 0 0 0 12 13v2h2v-1.438l2.563-1.718A1 1 0 0 0 17 11V8.594a1 1 0 0 0-.25-.656l-1.5-1.688a1 1 0 0 0-.75-.344h-3.188a1 1 0 0 0-.218 0zM12 16v2h2v-2h-2z" />
                    </svg>
                    <span class="mx-2">
                        Cara Absen
                    </span>
                </a>

                <a href="/login"
                    class="inline-flex items-center justify-center w-full px-4 py-2.5 mt-4 overflow-hidden text-sm text-white transition-colors duration-300 bg-blue-600 rounded-lg shadow sm:w-auto sm:mx-2 sm:mt-0 hover:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-2 fill-current" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                            <path stroke-dasharray="46" stroke-dashoffset="46"
                                d="M8 5V4C8 3.44772 8.44772 3 9 3H18C18.5523 3 19 3.44772 19 4V20C19 20.5523 18.5523 21 18 21H9C8.44771 21 8 20.5523 8 20V19">
                                <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="46;0" />
                            </path>
                            <path stroke-dasharray="12" stroke-dashoffset="12" d="M4 12h11" opacity="0">
                                <set attributeName="opacity" begin="0.6s" to="1" />
                                <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s"
                                    values="12;0" />
                            </path>
                            <path stroke-dasharray="6" stroke-dashoffset="6" d="M15 12l-3.5 -3.5M15 12l-3.5 3.5"
                                opacity="0">
                                <set attributeName="opacity" begin="0.8s" to="1" />
                                <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s"
                                    values="6;0" />
                            </path>
                        </g>
                    </svg>

                    <span class="mx-2">
                        Login
                    </span>
                </a>
            </div>
        </div>
    </section>

    <div class="w-8/12 m-auto pt-24 pb-10" id="cara-absen">
        <h1 class="text-2xl font-bold">Cara Absen</h1>
        <ul aria-label="User feed" role="feed"
            class="relative flex flex-col gap-12 py-12 pl-6 before:absolute before:top-0 before:left-6 before:h-full before:border before:-translate-x-1/2 before:border-slate-200 before:border-dashed after:absolute after:top-6 after:left-6 after:bottom-6 after:border after:-translate-x-1/2 after:border-slate-200 ">
            <li role="article" class="relative pl-6 ">
                <div class="flex flex-col flex-1 gap-2">
                    <div
                        class="absolute z-10 inline-flex items-center justify-center w-6 h-6 text-white rounded-full -left-3 ring-2 ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-black bg-white" viewBox="0 0 16 16">
                            <path fill="currentColor"
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
                        </svg>
                    </div>
                    <h4
                        class="flex flex-col items-start text-base font-medium leading-6 lg:items-center md:flex-row text-slate-700">
                        <span class="flex-1">Siapkan Kartu RFID Anda</span>
                    </h4>
                    <p class="text-sm text-slate-500">Setiap siswa memiliki kartu RFID pribadi.</p>
                </div>
            </li>
            <li role="article" class="relative pl-6 ">
                <div class="flex flex-col flex-1 gap-2">
                    <div
                        class="absolute z-10 inline-flex items-center justify-center w-6 h-6 text-white rounded-full -left-3 ring-2 ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-black bg-white" viewBox="0 0 16 16">
                            <path fill="currentColor"
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM6.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402c1.582 0 2.613.949 2.613 2.215c0 1.002-.6 1.667-1.287 2.43l-.096.107l-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705c0-.744-.557-1.236-1.313-1.236c-.843 0-1.336.615-1.336 1.306Z" />
                        </svg>
                    </div>
                    <h4
                        class="flex flex-col items-start text-base font-medium leading-6 lg:items-center md:flex-row text-slate-700">
                        <span class="flex-1">Cari Alat Pemindai</span>
                    </h4>
                    <p class="text-sm text-slate-500">Saat siswa datang dan pulang sekolah, tempelkan kartu RFID ke salah
                        satu
                        alat pemindai (reader) yang tersedia di titik tertentu pada area LAB.</p>
                </div>
            </li>
            <li role="article" class="relative pl-6 ">
                <div class="flex flex-col flex-1 gap-2">
                    <div
                        class="absolute z-10 inline-flex items-center justify-center w-6 h-6 text-white rounded-full -left-3 ring-2 ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-black bg-white" viewBox="0 0 16 16">
                            <g fill="currentColor">
                                <path
                                    d="M7.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237c0-.709-.563-1.195-1.348-1.195c-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121c1.594-.012 2.608.885 2.637 2.062c.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917c.024 1.459-1.277 2.396-2.93 2.396c-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066c.973.006 1.6-.563 1.588-1.354c-.006-.779-.621-1.318-1.541-1.318Z" />
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                            </g>
                        </svg>
                    </div>
                    <h4
                        class="flex flex-col items-start text-base font-medium leading-6 lg:items-center md:flex-row text-slate-700">
                        <span class="flex-1">Tempelkan Kartu ke Alat Pemindai</span>
                    </h4>
                    <p class="text-sm text-slate-500">Letakkan atau tempelkan kartu RFID di dekat alat pemindai. Pastikan
                        lampu
                        indikator menyala atau terdengar bunyi "bip" sebagai tanda data berhasil dibaca.</p>
                </div>
            </li>
            <li role="article" class="relative pl-6 ">
                <div class="flex flex-col flex-1 gap-2">
                    <div
                        class="absolute z-10 inline-flex items-center justify-center w-6 h-6 text-white rounded-full -left-3 ring-2 ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-black bg-white" viewBox="0 0 16 16">
                            <g fill="currentColor">
                                <path
                                    d="M7.519 5.057c.22-.352.439-.703.657-1.055h1.933v5.332h1.008v1.107H10.11V12H8.85v-1.559H4.978V9.322c.77-1.427 1.656-2.847 2.542-4.265ZM6.225 9.281v.053H8.85V5.063h-.065c-.867 1.33-1.787 2.806-2.56 4.218Z" />
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                            </g>
                        </svg>
                    </div>
                    <h4
                        class="flex flex-col items-start text-base font-medium leading-6 lg:items-center md:flex-row text-slate-700">
                        <span class="flex-1">Selesai!</span>
                    </h4>
                    <p class="text-sm text-slate-500">Siswa sudah tercatat hadir atau pulang.</p>
                </div>
            </li>
            <li role="article" class="relative pl-6 ">
                <div class="flex flex-col flex-1 gap-2">
                    <div
                        class="absolute z-10 inline-flex items-center justify-center w-6 h-6 text-white rounded-full -left-3 ring-2 ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500 bg-white" viewBox="0 0 32 32">
                            <g fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 14h1v9h1m12-7a13 13 0 1 1-26 0a13 13 0 0 1 26 0Z" />
                                <path fill="currentColor" d="M17 9.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                            </g>
                        </svg>
                    </div>
                    <h4
                        class="flex flex-col items-start text-base font-medium leading-6 lg:items-center md:flex-row text-red-500">
                        <span class="flex-1">Catatan Penting</span>
                    </h4>
                    <ul class="text-sm text-slate-500">
                        <li>- Jangan meminjamkan kartu kepada siswa lain!</li>
                        <li>- Jika siswa sakit atau ijin bisa ijin di menu "Perizinan" dengan bukti yang
                            Jelas dan Akurat.</li>
                        <li>- Laporkan ke pihak sekolah jika kartu hilang atau rusak.</li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <footer class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-8 mx-auto">
            <div class="flex flex-col items-center text-center">

                <div class="flex flex-wrap justify-center mt-6 -mx-4">
                    <a href="#"
                        class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                        aria-label="Reddit"> Home </a>

                    <a href="#about"
                        class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                        aria-label="Reddit"> About </a>

                    <a href="#cara-absen"
                        class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                        aria-label="Reddit"> Cara Absen </a>
                </div>

            </div>

            <hr class="my-6 border-gray-200 md:my-10 dark:border-gray-700" />

            <div class="flex flex-col gap-3 items-center sm:flex-row sm:justify-between">
                <p class="text-sm text-gray-500 dark:text-gray-300">© 2025 v3.3 Created by <a href="https://www.instagram.com/vortechdev_" class="hover:underline">VortechDev.</a></p>

                <div class="flex -mx-2">
                    <a href="#"
                        class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                        aria-label="Reddit">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z">
                            </path>
                        </svg>
                    </a>

                    <a href="#"
                        class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                        aria-label="Facebook">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z">
                            </path>
                        </svg>
                    </a>

                    <a href="#"
                        class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                        aria-label="Github">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
    <script>
        var glide02 = new Glide('.glide-02', {
            type: 'carousel',
            focusAt: 'center',
            perView: 1,
            autoplay: 3500,
            animationDuration: 700,
            gap: 0,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1024: {
                    perView: 1
                },
                640: {
                    perView: 1
                }
            },
        });

        glide02.mount();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/home/welcome.blade.php ENDPATH**/ ?>