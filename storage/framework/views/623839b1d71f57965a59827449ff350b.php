

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('student.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <div class="px-6 pt-24 pb-10 min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-50 via-white to-green-50">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 w-full sm:px-20 lg:px-32">
                <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                    <h2 class="flex items-center gap-2 text-2xl font-bold text-gray-800 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" color="currentColor">
                                <path
                                    d="m11 22l-1.478-2.354c-1.03-1.64-1.545-2.46-2.361-2.607c-1.33-.24-2.703.665-3.661 1.47" />
                                <path
                                    d="M3.5 9v7.028c0 1.203 0 1.804.299 2.287c.298.484.836.753 1.912 1.29l3.944 1.973c.841.42.85.422 1.79.422H14.5c2.828 0 4.243 0 5.121-.879c.879-.878.879-2.293.879-5.121V9c0-2.828 0-4.243-.879-5.121C18.743 3 17.328 3 14.5 3h-5c-2.828 0-4.243 0-5.121.879C3.5 4.757 3.5 6.172 3.5 9M12 9H8m8 5H8m9-12v2m-5-2v2M7 2v2" />
                            </g>
                        </svg>
                        <span>Peraturan Pengisian Form</span>
                    </h2>

                    <ul class="space-y-4 text-gray-700 text-sm">
                        <li class="flex items-start gap-3">
                            <span
                                class="flex-shrink-0 w-6 h-6 flex items-center justify-center bg-emerald-100 text-emerald-600 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            Isi data dengan benar sesuai identitas diri.
                        </li>
                        <li class="flex items-start gap-3">
                            <span
                                class="flex-shrink-0 w-6 h-6 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v4H3V4zm0 6h18v10a1 1 0 01-1 1H4a1 1 0 01-1-1V10z" />
                                </svg>
                            </span>
                            Jenis ijin harus dipilih sesuai kebutuhan.
                        </li>
                        <li class="flex items-start gap-3">
                            <span
                                class="flex-shrink-0 w-6 h-6 flex items-center justify-center bg-red-100 text-red-600 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            Foto surat wajib jelas dan asli (tidak dimanipulasi).
                        </li>
                        <li class="flex items-start gap-3">
                            <span
                                class="flex-shrink-0 w-6 h-6 flex items-center justify-center bg-yellow-100 text-yellow-600 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            Pastikan nomor telepon aktif untuk keperluan verifikasi.
                        </li>
                        <li class="flex items-start gap-3">
                            <span
                                class="flex-shrink-0 w-6 h-6 flex items-center justify-center bg-purple-100 text-purple-600 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </span>
                            Form yang sudah dikirim tidak dapat diubah kembali.
                        </li>
                    </ul>

                    <div class="mt-8 border-t border-gray-200 pt-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400 mr-2" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M6.457 1.047c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0 1 14.082 15H1.918a1.75 1.75 0 0 1-1.543-2.575Zm1.763.707a.25.25 0 0 0-.44 0L1.698 13.132a.25.25 0 0 0 .22.368h12.164a.25.25 0 0 0 .22-.368Zm.53 3.996v2.5a.75.75 0 0 1-1.5 0v-2.5a.75.75 0 0 1 1.5 0ZM9 11a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                            </svg>
                            <p>Pengisian yang tidak sesuai aturan dapat dianggap <span
                                    class="font-semibold text-red-500">tidak sah</span>.</p>
                        </div>
                    </div>
                </div>

                <div>
                    <form action="<?php echo e(route('store.permission')); ?>" method="POST"
                        class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <h1 class="text-2xl font-bold text-center text-gray-800">Form Ijin Siswa</h1>
                        <div class="relative flex items-center mt-6">
                            <span class="absolute">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input type="text" readonly name="name" value="<?php echo e($user->name); ?>"
                                class="block w-full py-3 text-gray-700 bg-gray-50 border rounded-lg px-11 focus:border-emerald-500 focus:ring-emerald-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                placeholder="Nama Lengkap">
                        </div>

                        <div class="relative flex items-center mt-4">
                            <span class="absolute">
                                <svg class="w-6 h-6 mx-3 text-gray-400" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3.78552 9.5 12.7855 14l9-4.5-9-4.5-8.99998 4.5Zm0 0V17m3-6v6.2222c0 .3483 2 1.7778 5.99998 1.7778 4 0 6-1.3738 6-1.7778V11" />
                                </svg>
                            </span>
                            <input type="text" readonly name="class" value="<?php echo e($user->class->class_name); ?>"
                                class="block w-full py-3 text-gray-700 bg-gray-50 border rounded-lg px-11 focus:border-emerald-500 focus:ring-emerald-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                placeholder="Kelas">
                        </div>

                        <div class="relative flex items-center mt-4">
                            <span class="absolute">
                                <svg class="w-6 h-6 mx-3 text-gray-400" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M3.833 4h4.49L9.77 7.618l-2.325 1.55A1 1 0 0 0 7 10v.021c.01.53.145 1.338.301 1.678c.294.88.87 2.019 1.992 3.141c1.122 1.122 2.261 1.698 3.14 1.992c.439.146.81.22 1.082.26c.15.02.303.033.463.04a1 1 0 0 0 .894-.553l.67-1.34l4.436.74v4.32c-2.111.305-7.813.606-12.293-3.874C3.227 11.813 3.527 6.11 3.833 4Z" />
                                </svg>
                            </span>
                            <input type="tel" readonly name="telephone" value="<?php echo e($user->telephone); ?>"
                                class="block w-full py-3 text-gray-700 bg-gray-50 border rounded-lg px-11 focus:border-emerald-500 focus:ring-emerald-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                placeholder="Telepon">
                        </div>

                        <div class="relative flex items-center mt-4">
                            <span class="absolute">
                                <svg class="w-6 h-6 mx-3 text-gray-400" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0118 0Z" />
                                </svg>
                            </span>
                            <select id="explanation" name="explanation" required
                                class="block w-full py-3 text-gray-700 border rounded-lg px-11 focus:border-emerald-500 focus:ring-emerald-400 focus:outline-none focus:ring focus:ring-opacity-40">
                                <option value="" disabled selected>Pilih Jenis Ijin</option>
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status->id); ?>"><?php echo e($status->status_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div
                            class="flex items-center px-4 py-3 mt-6 text-center border-2 border-dashed rounded-lg cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <div class="relative w-full text-start ml-3">
                                <label for="dropzone-file" id="file-label"
                                    class="block cursor-pointer text-gray-600">Foto Surat</label>
                                <input id="dropzone-file" type="file" accept="image/*" class="hidden" name="image"
                                    onchange="handleFileChange(this)" required />
                            </div>
                        </div>
                        <p class="text-xs text-red-500 mt-2">*Foto surat harus asli dan tidak dimanipulasi</p>

                        <div id="preview-container" class="mt-4 hidden">
                            <img id="image-preview" src="" alt="Preview Gambar"
                                class="w-1/3 rounded shadow cursor-zoom-in" onclick="openModal()" />
                        </div>

                        <div id="image-modal"
                            class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden"
                            onclick="closeModal()">
                            <img id="modal-image" src="" class="max-w-[90%] max-h-[90%] rounded shadow-lg" />
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="flex items-center justify-center gap-2 w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg hover:from-blue-500 hover:to-indigo-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 14 14">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M11.688.103a1.724 1.724 0 0 1 2.208 2.208L10.39 12.816a1.72 1.72 0 0 1-1.242 1.137a1.7 1.7 0 0 1-1.619-.462L5.716 11.69l-1.89.976a.625.625 0 0 1-.911-.571l.08-3.132L.5 6.467a1.7 1.7 0 0 1-.466-1.542A1.72 1.72 0 0 1 1.17 3.61l.005-.002zm.69 1.157a.47.47 0 0 0-.286.026L1.572 4.793a.47.47 0 0 0-.31.363l-.003.014a.45.45 0 0 0 .123.412l1.95 1.948l6.33-4.177a.5.5 0 0 1 .616.783L4.225 9.8l-.033 1.27l1.355-.7a.625.625 0 0 1 .728.111l2.138 2.127l.006.006a.45.45 0 0 0 .433.124l.008-.002a.47.47 0 0 0 .342-.312v-.002l3.511-10.516l.007-.02a.47.47 0 0 0-.342-.626"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Kirim</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function handleFileChange(input) {
            const fileLabel = document.getElementById('file-label');
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('image-preview');
            const modalImage = document.getElementById('modal-image');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                fileLabel.textContent = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    modalImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                fileLabel.textContent = "Foto Surat";
                previewContainer.classList.add('hidden');
            }
        }

        function openModal() {
            document.getElementById('image-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('image-modal').classList.add('hidden');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/student/permission.blade.php ENDPATH**/ ?>