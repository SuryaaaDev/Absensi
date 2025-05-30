

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('student.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="pt-20">
        <h1 class="my-5 text-center text-xl font-bold">Bantuan Pengguna</h1>
        <section class="w-3/4 md:w-1/2 m-auto bg-white border divide-y rounded divide-slate-200 border-slate-200">
            <details class="p-4 group" open>
                <summary
                    class="[&::-webkit-details-marker]:hidden relative flex gap-4 pr-8 font-medium list-none cursor-pointer text-slate-700 focus-visible:outline-none transition-colors duration-300 group-hover:text-slate-900 ">
                    <svg class="w-6 h-6 text-blue-500 shrink-0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" stroke="currentColor" strokeWidth="1.5">
                            <path
                                d="M2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172C22 6.343 22 8.229 22 12c0 3.771 0 5.657-1.172 6.828C19.657 20 17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172C2 17.657 2 15.771 2 12Z" />
                            <path d="M10 16.5H6m2-3H6M2 10h20" strokeLinecap="round" />
                            <path
                                d="M14 15c0-.943 0-1.414.293-1.707C14.586 13 15.057 13 16 13c.943 0 1.414 0 1.707.293c.293.293.293.764.293 1.707c0 .943 0 1.414-.293 1.707C17.414 17 16.943 17 16 17c-.943 0-1.414 0-1.707-.293C14 16.414 14 15.943 14 15Z" />
                        </g>
                    </svg>
                    Bagaimana cara melakukan absensi?
                    <svg class="absolute right-0 w-4 h-4 transition duration-300 top-1 stroke-slate-700 shrink-0 group-open:rotate-180"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </summary>
                <p class="mt-4 text-slate-500">
                    Dekatkan kartu RFID ke alat absensi yang tersedia di beberapa titik di area LAB. Pastikan proses scan
                    dilakukan hingga terdengar bunyi bip atau lampu indikator menyala sebagai tanda bahwa absensi telah
                    berhasil. Pastikan data berhasil tercatat sebelum meninggalkan area.
                </p>
            </details>
            <details class="p-4 group">
                <summary
                    class="[&::-webkit-details-marker]:hidden relative flex gap-4 pr-8 font-medium list-none cursor-pointer text-slate-700 focus-visible:outline-none transition-colors duration-300 group-hover:text-slate-900 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-blue-500  shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-labelledby="title-ac27 desc-ac27">
                        <title id="title-ac27">Leading icon</title>
                        <desc id="desc-ac27">Icon that describes the summary</desc>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.712 4.33a9.027 9.027 0 011.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 00-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 010 9.424m-4.138-5.976a3.736 3.736 0 00-.88-1.388 3.737 3.737 0 00-1.388-.88m2.268 2.268a3.765 3.765 0 010 2.528m-2.268-4.796a3.765 3.765 0 00-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.736 0 01-1.388.88m2.268-2.268l4.138 3.448m0 0a9.027 9.027 0 01-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0l-3.448-4.138m3.448 4.138a9.014 9.014 0 01-9.424 0m5.976-4.138a3.765 3.765 0 01-2.528 0m0 0a3.736 3.736 0 01-1.388-.88 3.737 3.737 0 01-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 01-1.652-1.306 9.027 9.027 0 01-1.306-1.652m0 0l4.138-3.448M4.33 16.712a9.014 9.014 0 010-9.424m4.138 5.976a3.765 3.765 0 010-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.736 0 011.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 00-1.652 1.306A9.025 9.025 0 004.33 7.288" />
                    </svg>
                    Kartu saya tidak terbaca, apa yang harus dilakukan?
                    <svg class="absolute right-0 w-4 h-4 transition duration-300 top-1 stroke-slate-700 shrink-0 group-open:rotate-180"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </summary>
                <p class="mt-4 text-slate-500">
                    Coba pastikan kartu dalam kondisi baik dan dekatkan lagi ke sensor. Jika tetap gagal, segera laporkan ke
                    guru atau admin untuk pengecekan lebih lanjut.
                </p>
            </details>
            <details class="p-4 group">
                <summary
                    class="[&::-webkit-details-marker]:hidden relative flex gap-4 pr-8 font-medium list-none cursor-pointer text-slate-700 focus-visible:outline-none transition-colors duration-300 group-hover:text-slate-900 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-blue-500  shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-labelledby="title-ac29 desc-ac29">
                        <title id="title-ac29">Leading icon</title>
                        <desc id="desc-ac29">Icon that describes the summary</desc>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                    Bagaimana cara izin jika tidak bisa hadir?
                    <svg class="absolute right-0 w-4 h-4 transition duration-300 top-1 stroke-slate-700 shrink-0 group-open:rotate-180"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </summary>
                <p class="mt-4 text-slate-500">
                    Jika Anda tidak dapat hadir, silakan gunakan menu "<a href="/permission" class="underline decoration-solid font-semibold hover:text-slate-400">Perizinan</a>" di website ini untuk mengajukan izin dengan
                    langkah berikut:
                <ul class="list-disc mx-4 text-slate-500">
                    <li>Isi nama lengkap, kelas, nomor telepon, dan email aktif <span class="font-semibold">(akan terisi otomatis dan tidak bisa di ubah).</span></li>
                    <li>Unggah foto surat izin yang jelas dan asli (tidak boleh dimanipulasi).</li>
                    <li>Kirim laporan dan tunggu konfirmasi dari guru atau admin.</li>
                </ul>
                <span class="text-red-500 font-bold">Catatan Penting:</span>
                <ul class="list-disc mx-4 text-slate-500">
                    <li>Pastikan semua data yang Anda kirim benar dan foto surat izin valid.</li>
                    <li>Jika ada data atau foto yang tidak sesuai atau terdeteksi manipulasi, status Anda akan tercatat
                        sebagai alpha (tidak hadir tanpa keterangan).</li>
                    <li>Anda diwajibkan mengajukan ulang perizinan dengan data yang benar agar absensi dapat diperbarui.
                    </li>
                </ul>
                </p>
            </details>
            <details class="p-4 group">
                <summary
                    class="[&::-webkit-details-marker]:hidden relative flex gap-4 pr-8 font-medium list-none cursor-pointer text-slate-700 focus-visible:outline-none transition-colors duration-300 group-hover:text-slate-900 ">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 text-blue-500 shrink-0"
                        viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M0 1.75C0 .784.784 0 1.75 0h12.5C15.216 0 16 .784 16 1.75v9.5A1.75 1.75 0 0 1 14.25 13H8.06l-2.573 2.573A1.458 1.458 0 0 1 3 14.543V13H1.75A1.75 1.75 0 0 1 0 11.25Zm1.75-.25a.25.25 0 0 0-.25.25v9.5c0 .138.112.25.25.25h2a.75.75 0 0 1 .75.75v2.19l2.72-2.72a.749.749 0 0 1 .53-.22h6.5a.25.25 0 0 0 .25-.25v-9.5a.25.25 0 0 0-.25-.25Zm7 2.25v2.5a.75.75 0 0 1-1.5 0v-2.5a.75.75 0 0 1 1.5 0ZM9 9a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                    </svg>
                    Bagaimana cara cek riwayat absensi saya?
                    <svg class="absolute right-0 w-4 h-4 transition duration-300 top-1 stroke-slate-700 shrink-0 group-open:rotate-180"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </summary>
                <p class="mt-4 text-slate-500">
                    Riwayat absensi dapat dilihat melalui menu "History" di aplikasi. Di sana, Anda bisa melihat detail
                    kehadiran, termasuk berapa kali Anda hadir, izin, sakit, maupun alpha (tidak hadir tanpa keterangan).
                </p>
            </details>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/student/assistance.blade.php ENDPATH**/ ?>