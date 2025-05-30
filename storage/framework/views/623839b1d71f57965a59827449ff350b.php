

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('student.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="bg-white">
        <div class="container flex items-center justify-center min-h-screen px-6 mx-auto pt-16 pb-5">
            <form action="<?php echo e(route('store.permission')); ?>" method="POST" class="w-full max-w-md" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <h1 class="text-2xl font-bold text-center">Form Ijin Siswa</h1>
                <div class="relative flex items-center mt-8">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>

                    <input type="text" readonly
                        class="block w-full py-3 text-gray-800 bg-white border rounded-lg px-11 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        name="name" placeholder="Nama Lengkap" value="<?php echo e($user->name); ?>">
                </div>

                <div class="relative flex items-center mt-4">
                    <span class="absolute">
                        <svg class="w-6 h-6 mx-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M3.78552 9.5 12.7855 14l9-4.5-9-4.5-8.99998 4.5Zm0 0V17m3-6v6.2222c0 .3483 2 1.7778 5.99998 1.7778 4 0 6-1.3738 6-1.7778V11" />
                        </svg>
                    </span>

                    <input type="text" readonly
                        class="block w-full px-10 py-3 text-gray-800 bg-white border rounded-lg dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        name="class" placeholder="Kelas" value="<?php echo e($user->class->class_name); ?>">
                </div>

                <div class="relative flex items-center mt-4">
                    <span class="absolute">
                        <svg class="w-6 h-6 mx-3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.833 4h4.49L9.77 7.618l-2.325 1.55A1 1 0 0 0 7 10c.003.094 0 .001 0 .001v.021a2.129 2.129 0 0 0 .006.134c.006.082.016.193.035.33c.039.27.114.642.26 1.08c.294.88.87 2.019 1.992 3.141c1.122 1.122 2.261 1.698 3.14 1.992c.439.146.81.22 1.082.26a4.424 4.424 0 0 0 .463.04l.013.001h.008s.112-.006.001 0a1 1 0 0 0 .894-.553l.67-1.34l4.436.74v4.32c-2.111.305-7.813.606-12.293-3.874C3.227 11.813 3.527 6.11 3.833 4zm5.24 6.486l1.807-1.204a2 2 0 0 0 .747-2.407L10.18 3.257A2 2 0 0 0 8.323 2H3.781c-.909 0-1.764.631-1.913 1.617c-.34 2.242-.801 8.864 4.425 14.09c5.226 5.226 11.848 4.764 14.09 4.425c.986-.15 1.617-1.004 1.617-1.913v-4.372a2 2 0 0 0-1.671-1.973l-4.436-.739a2 2 0 0 0-2.118 1.078l-.346.693a4.71 4.71 0 0 1-.363-.105c-.62-.206-1.481-.63-2.359-1.508c-.878-.878-1.302-1.739-1.508-2.36a4.583 4.583 0 0 1-.125-.447z"
                                fill="currentColor" />
                        </svg>
                    </span>

                    <input type="tel" readonly
                        class="block w-full px-10 py-3 text-gray-800 bg-white border rounded-lg dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        name="telepon" placeholder="Telepon" value="<?php echo e($user->telepon); ?>">
                </div>

                <div class="relative flex items-center mt-4">
                    <span class="absolute">
                        <svg class="w-6 h-6 mx-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </span>

                    <select id="explanation"
                        class="block w-full px-10 py-3 text-gray-800 bg-white border rounded-lg dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        name="explanation" required>
                        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status->id); ?>">
                                <?php echo e($status->status_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div for="dropzone-file"
                    class="flex items-center px-3 py-3 mx-auto mt-6 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    <div class="relative w-full">
                        <label for="dropzone-file" id="file-label" class="block w-full cursor-pointer mx-2 text-start">
                            Foto Surat
                        </label>

                        <input id="dropzone-file" type="file" accept="image/*" class="hidden" name="image"
                            onchange="handleFileChange(this)">
                    </div>
                </div>
                <p class="font-bold">*foto surat harus benar benar nyata/tidak di manipulasi</p>

                <div id="preview-container" class="mt-4 hidden">
                    <img id="image-preview" src="" alt="Preview Gambar"
                        class="w-1/4 rounded shadow cursor-zoom-in" onclick="openModal()" />
                </div>

                <div id="image-modal"
                    class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden"
                    onclick="closeModal()">
                    <img id="modal-image" src="" class="max-w-[90%] max-h-[90%] rounded shadow-lg" />
                </div>

                <div class="mt-6">
                    <button
                        class="w-full cursor-pointer px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Kirim
                    </button>
                </div>
            </form>
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