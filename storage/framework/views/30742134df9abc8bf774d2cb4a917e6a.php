<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('home.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="relative w-full glide-02">
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
    </section>

    <section id="about" class="relative py-20 bg-gradient-to-br from-white via-green-100/60 to-white overflow-hidden">
        <div
            class="absolute inset-0 opacity-10 bg-[url('https://www.toptal.com/designers/subtlepatterns/patterns/dots.png')] bg-repeat">
        </div>

        <div class="relative max-w-6xl mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="flex justify-center lg:justify-end order-1 lg:order-2">
                <img src="https://cdn-icons-png.flaticon.com/512/3050/3050525.png" alt="RFID Illustration"
                    class="w-64 lg:w-80 p-4" />
            </div>

            <div class="space-y-6 text-center lg:text-left order-2 lg:order-1">
                <h2 class="text-4xl font-extrabold text-gray-800 drop-shadow-sm">
                    Apa Itu Absensi RFID?
                </h2>
                <p class="text-gray-600 leading-relaxed max-w-xl mx-auto lg:mx-0">
                    <span class="font-semibold text-green-600">RFID (Radio Frequency Identification)</span>
                    adalah teknologi identifikasi otomatis yang menggunakan gelombang radio.
                    Setiap siswa memiliki kartu identitas RFID yang akan dibaca oleh alat pemindai
                    setiap kali hadir atau pulang sekolah.
                    Dengan ini, absensi tercatat <span class="font-medium text-gray-800">otomatis & real-time</span>,
                    tanpa proses manual.
                </p>

                <div class="inline-flex flex-row gap-4 justify-center lg:justify-start pt-2">
                    <a href="#cara-absen"
                        class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-white bg-green-600 rounded-lg shadow hover:bg-green-500 transition-colors duration-300">
                        Cara Absen
                    </a>
                    <a href="<?php echo e(route('login')); ?>"
                        class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:border-green-300 hover:text-green-600 transition-colors duration-300 shadow">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Fitur Utama -->
    <section id="fitur" class="relative py-16 bg-gradient-to-tr from-emerald-50 via-white to-green-50">
        <!-- Pattern background SVG -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="dot-grid" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="1.5" fill="#10b981"></circle>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#dot-grid)" />
            </svg>
        </div>

        <div class="relative container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-emerald-700 md:text-4xl">Fitur Utama</h2>
                <p class="mt-3 text-slate-600 max-w-2xl mx-auto">
                    Sistem absensi sekolah modern dengan teknologi RFID untuk mencatat kehadiran
                    siswa secara real-time, akurat, dan mudah digunakan.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="p-6 bg-white rounded-2xl shadow-md hover:shadow-lg transition">
                    <div class="flex items-center justify-center w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-700">Data Real-time</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        Kehadiran siswa tercatat langsung saat scan kartu tanpa menunggu lama.
                    </p>
                </div>

                <div class="p-6 bg-white rounded-2xl shadow-md hover:shadow-lg transition">
                    <div class="flex items-center justify-center w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill="currentColor"
                                d="M6 2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h4.257a5.503 5.503 0 0 1-.657-1H6a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4v3.5A1.5 1.5 0 0 0 11.5 8H15v1.022a5.5 5.5 0 0 1 1 .185V7.414a1.5 1.5 0 0 0-.44-1.06l-3.914-3.915A1.5 1.5 0 0 0 10.586 2H6Zm8.793 5H11.5a.5.5 0 0 1-.5-.5V3.207L14.793 7ZM9 14.5c0-.168.008-.335.022-.5H8.5a.5.5 0 0 0 0 1h.522A5.571 5.571 0 0 1 9 14.5Zm.207-1.5c.099-.349.23-.683.393-1H8.5a.5.5 0 0 0 0 1h.707Zm1.05-2c.313-.38.677-.716 1.08-1H8.5a.5.5 0 0 0 0 1h1.757ZM6.5 10a.5.5 0 1 0 0 1a.5.5 0 0 0 0-1ZM6 12.5a.5.5 0 1 1 1 0a.5.5 0 0 1-1 0Zm0 2a.5.5 0 1 1 1 0a.5.5 0 0 1-1 0Zm13 0a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0Zm-4-3a.5.5 0 0 0-1 0v3a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 0-1H15v-2.5Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-700">Rekap Otomatis</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        Rekap absensi harian dan bulanan langsung tersedia tanpa input manual.
                    </p>
                </div>

                <div class="p-6 bg-white rounded-2xl shadow-md hover:shadow-lg transition">
                    <div class="flex items-center justify-center w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path fill="currentColor"
                                d="M7.5 8.75c-.898 0-1.71.363-2.298.952A3.24 3.24 0 0 0 4.25 12c0 .898.363 1.71.952 2.298c.589.59 1.4.952 2.298.952c.77 0 1.474-.266 2.03-.713a.75.75 0 1 1 .94 1.17A4.73 4.73 0 0 1 7.5 16.75c-1.311 0-2.5-.532-3.359-1.391A4.74 4.74 0 0 1 2.75 12c0-1.312.532-2.5 1.391-3.359A4.74 4.74 0 0 1 7.5 7.25c1.294 0 2.366.399 3.359 1.391c.831.832 1.299 1.915 1.71 2.87l.055.127c.446 1.032.86 1.941 1.578 2.66c.589.59 1.4.952 2.298.952s1.71-.363 2.298-.952c.59-.589.952-1.4.952-2.298s-.363-1.71-.952-2.298A3.24 3.24 0 0 0 16.5 8.75c-.77 0-1.474.266-2.03.713a.75.75 0 1 1-.94-1.17A4.73 4.73 0 0 1 16.5 7.25c1.311 0 2.5.532 3.359 1.391A4.74 4.74 0 0 1 21.25 12c0 1.312-.532 2.5-1.391 3.359A4.74 4.74 0 0 1 16.5 16.75c-1.312 0-2.5-.532-3.359-1.391c-.949-.95-1.46-2.12-1.894-3.126l-.004-.01c-.453-1.049-.82-1.896-1.445-2.521C9.1 9.004 8.415 8.75 7.5 8.75" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-700">Akses Mudah</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        Guru & siswa dapat melihat data absensi siswa dengan cepat.
                    </p>
                </div>

                <div class="p-6 bg-white rounded-2xl shadow-md hover:shadow-lg transition">
                    <div class="flex items-center justify-center w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path fill="currentColor"
                                d="M10.146 3.248a2 2 0 0 1 3.708 0A7.003 7.003 0 0 1 19 10v4.697l1.832 2.748A1 1 0 0 1 20 19h-4.535a3.501 3.501 0 0 1-6.93 0H4a1 1 0 0 1-.832-1.555L5 14.697V10c0-3.224 2.18-5.94 5.146-6.752zM10.586 19a1.5 1.5 0 0 0 2.829 0h-2.83zM12 5a5 5 0 0 0-5 5v5a1 1 0 0 1-.168.555L5.869 17H18.13l-.963-1.445A1 1 0 0 1 17 15v-5a5 5 0 0 0-5-5z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-700">Notifikasi Kehadiran</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        Orang tua/wali murid langsung mendapat pemberitahuan ketika siswa hadir atau terlambat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="cara-absen" class="relative bg-gradient-to-br from-emerald-50 via-white to-green-50">
        <div class="absolute inset-0 opacity-10 pointer-events-none"
            style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'20\' height=\'20\' viewBox=\'0 0 20 20\'><circle cx=\'2\' cy=\'2\' r=\'2\' fill=\'%23048a55\' opacity=\'1\'/></svg>');">
        </div>
        <div class="relative w-11/12 lg:w-8/12 mx-auto py-20">
            <div
                class="absolute inset-0 bg-[url('https://www.toptal.com/designers/subtlepatterns/patterns/dot-grid.png')] opacity-10">
            </div>

            <div class="relative">
                <h1 class="text-3xl font-bold text-center mb-12 text-slate-800">
                    Cara Absen
                </h1>

                <div class="relative border-l-2 mx-5 border-dashed border-emerald-200">
                    <div class="mb-12 ml-6 group">
                        <span
                            class="absolute -left-4 flex items-center justify-center w-8 h-8 rounded-full bg-emerald-500 text-white ring-4 ring-white">
                            1
                        </span>
                        <div class="p-5 rounded-2xl shadow-md bg-white hover:shadow-lg transition-all duration-300">
                            <h4 class="font-semibold text-lg text-slate-700">
                                Siapkan Kartu RFID Anda
                            </h4>
                            <p class="text-sm text-slate-500 mt-2">
                                Setiap siswa memiliki kartu RFID pribadi.
                            </p>
                        </div>
                    </div>

                    <div class="mb-12 ml-6 group">
                        <span
                            class="absolute -left-4 flex items-center justify-center w-8 h-8 rounded-full bg-teal-500 text-white ring-4 ring-white">
                            2
                        </span>
                        <div class="p-5 rounded-2xl shadow-md bg-white hover:shadow-lg transition-all duration-300">
                            <h4 class="font-semibold text-lg text-slate-700">
                                Cari Alat Pemindai
                            </h4>
                            <p class="text-sm text-slate-500 mt-2">
                                Tempelkan kartu RFID ke reader yang tersedia di area LAB saat
                                datang atau pulang.
                            </p>
                        </div>
                    </div>

                    <div class="mb-12 ml-6 group">
                        <span
                            class="absolute -left-4 flex items-center justify-center w-8 h-8 rounded-full bg-green-500 text-white ring-4 ring-white">
                            3
                        </span>
                        <div class="p-5 rounded-2xl shadow-md bg-white hover:shadow-lg transition-all duration-300">
                            <h4 class="font-semibold text-lg text-slate-700">
                                Tempelkan Kartu ke Alat Pemindai
                            </h4>
                            <p class="text-sm text-slate-500 mt-2">
                                Pastikan lampu indikator menyala atau terdengar bunyi <em>"bip"</em>
                                sebagai tanda berhasil.
                            </p>
                        </div>
                    </div>

                    <div class="mb-12 ml-6 group">
                        <span
                            class="absolute -left-4 flex items-center justify-center w-8 h-8 rounded-full bg-emerald-600 text-white ring-4 ring-white">
                            4
                        </span>
                        <div class="p-5 rounded-2xl shadow-md bg-white hover:shadow-lg transition-all duration-300">
                            <h4 class="font-semibold text-lg text-slate-700">
                                Selesai!
                            </h4>
                            <p class="text-sm text-slate-500 mt-2">
                                Siswa sudah tercatat hadir atau pulang.
                            </p>
                        </div>
                    </div>

                    <div class="ml-6">
                        <span
                            class="absolute -left-4 flex items-center justify-center w-8 h-8 rounded-full bg-red-500 text-white ring-4 ring-white">
                            !
                        </span>
                        <div
                            class="p-5 rounded-2xl shadow-md bg-red-50 border border-red-200 hover:shadow-md transition-all duration-300">
                            <h4 class="font-semibold text-lg text-red-600">
                                Catatan Penting
                            </h4>
                            <ul class="text-sm text-slate-600 mt-2 space-y-1">
                                <li>• Jangan meminjamkan kartu kepada siswa lain.</li>
                                <li>
                                    • Jika sakit atau izin, gunakan menu <strong>Perizinan</strong> dengan bukti jelas.
                                </li>
                                <li>• Laporkan ke pihak sekolah jika kartu hilang atau rusak.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="statistik" class="relative py-20 bg-white">
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M60 0H0V60" fill="none" stroke="#10b981" stroke-width="1" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="relative container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-emerald-700 md:text-4xl">Statistik Singkat</h2>
                <p class="mt-3 text-slate-600 max-w-2xl mx-auto">
                    Beberapa data utama dari sistem absensi sekolah berbasis RFID.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-8 text-center">
                <div class="p-6 bg-emerald-50 rounded-2xl shadow hover:shadow-md transition">
                    <h3 class="count text-4xl font-extrabold text-emerald-600" data-target="<?php echo e($totalStudents); ?>">0</h3>
                    <p class="mt-2 text-sm font-medium text-slate-600">Siswa Terdaftar</p>
                </div>

                <div class="p-6 bg-emerald-50 rounded-2xl shadow hover:shadow-md transition">
                    <h3 class="count text-4xl font-extrabold text-emerald-600" data-target="<?php echo e($attendanceAccuracy); ?>">0
                    </h3>
                    <p class="mt-2 text-sm font-medium text-slate-600">Akurasi Kehadiran (%)</p>
                </div>

                <div class="p-6 bg-emerald-50 rounded-2xl shadow hover:shadow-md transition">
                    <h3 class="count text-4xl font-extrabold text-emerald-600" data-target="<?php echo e($totalAttendances); ?>">0
                    </h3>
                    <p class="mt-2 text-sm font-medium text-slate-600">Data Absensi Tercatat</p>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="relative py-20 bg-gradient-to-tr from-white via-emerald-50 to-green-50">
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="faq-dots" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="2" fill="#10b981" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#faq-dots)" />
            </svg>
        </div>

        <div class="relative container mx-auto px-6 max-w-4xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-emerald-700 md:text-4xl">Pertanyaan Umum</h2>
                <p class="mt-3 text-slate-600 max-w-2xl mx-auto">
                    Beberapa pertanyaan yang sering diajukan terkait sistem absensi RFID sekolah.
                </p>
            </div>

            <div class="space-y-4">
                <details
                    class="p-5 rounded-xl border border-emerald-200 bg-white shadow-sm group open:shadow-md transition">
                    <summary
                        class="[&::-webkit-details-marker]:hidden relative flex justify-between items-center px-4 font-medium cursor-pointer text-slate-700 list-none focus-visible:outline-none group-hover:text-emerald-700">
                        Bagaimana cara siswa melakukan absensi?
                        <svg class="w-5 h-5 text-emerald-600 transform transition-transform duration-300 group-open:rotate-180"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>

                    </summary>
                    <p class="mt-4 px-4 text-slate-600 text-sm leading-relaxed">
                        Siswa cukup menempelkan kartu RFID ke alat pemindai (reader) yang tersedia.
                        Sistem otomatis mencatat waktu hadir atau pulang.
                    </p>
                </details>

                <details
                    class="p-5 rounded-xl border border-emerald-200 bg-white shadow-sm group open:shadow-md transition">
                    <summary
                        class="[&::-webkit-details-marker]:hidden relative flex justify-between items-center px-4 font-medium cursor-pointer text-slate-700 list-none focus-visible:outline-none group-hover:text-emerald-700">
                        Apakah orang tua bisa memantau absensi?
                        <svg class="w-5 h-5 text-emerald-600 transform transition-transform duration-300 group-open:rotate-180"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>

                    </summary>
                    <p class="mt-4 px-4 text-slate-600 text-sm leading-relaxed">
                        Ya, sistem bisa diintegrasikan dengan notifikasi ke orang tua melalui aplikasi
                        atau pesan singkat (SMS/WhatsApp) mengenai kehadiran anak.
                    </p>
                </details>

                <details
                    class="p-5 rounded-xl border border-emerald-200 bg-white shadow-sm group open:shadow-md transition">
                    <summary
                        class="[&::-webkit-details-marker]:hidden relative flex justify-between items-center px-4 font-medium cursor-pointer text-slate-700 list-none focus-visible:outline-none group-hover:text-emerald-700">
                        Bagaimana jika kartu siswa hilang?
                        <svg class="w-5 h-5 text-emerald-600 transform transition-transform duration-300 group-open:rotate-180"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>

                    </summary>
                    <p class="mt-4 px-4 text-slate-600 text-sm leading-relaxed">
                        Siswa harus segera melapor ke pihak sekolah agar kartu lama dinonaktifkan
                        dan kartu baru bisa diterbitkan.
                    </p>
                </details>

                <details
                    class="p-5 rounded-xl border border-emerald-200 bg-white shadow-sm group open:shadow-md transition">
                    <summary
                        class="[&::-webkit-details-marker]:hidden relative flex justify-between items-center px-4 font-medium cursor-pointer text-slate-700 list-none focus-visible:outline-none group-hover:text-emerald-700">
                        Apakah data absensi bisa diekspor?
                        <svg class="w-5 h-5 text-emerald-600 transform transition-transform duration-300 group-open:rotate-180"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>

                    </summary>
                    <p class="mt-4 px-4 text-slate-600 text-sm leading-relaxed">
                        Tentu, admin sekolah bisa mengekspor laporan absensi dalam format Excel atau PDF
                        sesuai kebutuhan.
                    </p>
                </details>
            </div>
        </div>
    </section>


    <footer class="relative">
        <div class="absolute inset-0 bg-gradient-to-tr from-emerald-50 via-white to-green-50"></div>

        <div class="relative container px-6 py-12 mx-auto">
            <div class="grid gap-10 text-center md:text-left sm:grid-cols-2 lg:grid-cols-4">

                <div>
                    <a href="#" class="flex items-center justify-center md:justify-start gap-2 mb-4">
                        <img src="<?php echo e(asset('storage/image/logo-smk2klt.png')); ?>" alt="Logo SMKN 2 Klaten"
                            class="w-12 md:w-14">
                        <span class="font-semibold text-slate-700">SMKN 2 KLATEN | RFID</span>
                    </a>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Sistem Absensi RFID modern untuk meningkatkan kedisiplinan, efisiensi, dan transparansi di
                        lingkungan sekolah.
                    </p>
                </div>

                <div>
                    <h3 class="mb-4 text-sm font-semibold text-slate-700 uppercase">Navigasi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-600 hover:text-emerald-600 transition-colors">Home</a>
                        </li>
                        <li><a href="#about" class="text-slate-600 hover:text-emerald-600 transition-colors">About</a>
                        </li>
                        <li><a href="#cara-absen" class="text-slate-600 hover:text-emerald-600 transition-colors">Cara
                                Absen</a></li>
                        <li><a href="<?php echo e(route('login')); ?>"
                                class="text-slate-600 hover:text-emerald-600 transition-colors">Login</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="mb-4 text-sm font-semibold text-slate-700 uppercase">Kontak</h3>
                    <ul class="space-y-2 text-slate-600">
                        <li>Jl. Senden Bramen, RT 13/RW 06 Senden, Ngawen, Klaten, Jawa Tengah, Indonesia</li>
                        <li>
                            <a href="https://smkn2klaten.sch.id" target="_blank" rel="noopener noreferrer"
                                class="flex justify-center sm:justify-normal items-center gap-2 text-slate-600 hover:text-emerald-600 transition-colors duration-300">
                                <p class="text-center">
                                    <span class="font-semibold">Web Resmi :</span>
                                    <span class="underline decoration-dotted">smkn2klaten.sch.id</span>
                                </p>
                            </a>
                        </li>

                    </ul>
                </div>

                <div>
                    <h3 class="mb-4 text-sm font-semibold text-slate-700 uppercase">Ikuti Kami</h3>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="https://www.instagram.com/vortechdev_"
                            class="text-slate-600 hover:text-emerald-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="-2 -2 24 24">
                                <g fill="currentColor">
                                    <path
                                        d="M14.017 0h-8.07A5.954 5.954 0 0 0 0 5.948v8.07a5.954 5.954 0 0 0 5.948 5.947h8.07a5.954 5.954 0 0 0 5.947-5.948v-8.07A5.954 5.954 0 0 0 14.017 0zm3.94 14.017a3.94 3.94 0 0 1-3.94 3.94h-8.07a3.94 3.94 0 0 1-3.939-3.94v-8.07a3.94 3.94 0 0 1 3.94-3.939h8.07a3.94 3.94 0 0 1 3.939 3.94v8.07z" />
                                    <path
                                        d="M9.982 4.819A5.17 5.17 0 0 0 4.82 9.982a5.17 5.17 0 0 0 5.163 5.164a5.17 5.17 0 0 0 5.164-5.164A5.17 5.17 0 0 0 9.982 4.82zm0 8.319a3.155 3.155 0 1 1 0-6.31a3.155 3.155 0 0 1 0 6.31z" />
                                    <circle cx="15.156" cy="4.858" r="1.237" />
                                </g>
                            </svg>
                        </a>

                        <a href="#" class="text-slate-600 hover:text-emerald-600 transition-colors">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z">
                                </path>
                            </svg>
                        </a>

                        <a href="#" class="text-slate-600 hover:text-emerald-600 transition-colors">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <hr class="my-8 border-emerald-100" />

            <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
                <p class="text-sm text-slate-500">
                    © <span id="year"></span> v3.5 Created by
                    <a href="https://www.instagram.com/vortechdev_" class="text-emerald-600 hover:underline">
                        VortechDev
                    </a>
                </p>
            </div>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
    <script>
        document.getElementById("year").textContent = new Date().getFullYear();

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

        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll(".count");
            const speed = 50;

            const animateCount = (counter) => {
                const updateCount = () => {
                    const target = +counter.getAttribute("data-target");
                    const count = +counter.innerText;
                    const increment = Math.ceil(target / speed);

                    if (count < target) {
                        counter.innerText = count + increment;
                        setTimeout(updateCount, 30);
                    } else {
                        counter.innerText = target.toLocaleString();
                    }
                };
                updateCount();
            };

            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        animateCount(entry.target);
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            counters.forEach((counter) => {
                observer.observe(counter);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/home/welcome.blade.php ENDPATH**/ ?>