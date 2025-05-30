

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('reject')): ?>
        <div class="fixed z-10 top-4 right-4">
            <div class="flex items-start w-full gap-4 px-4 py-3 text-sm text-pink-500 border border-pink-100 rounded bg-pink-50"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5" role="graphics-symbol" aria-labelledby="title-09 desc-09">
                    <title id="title-09">Icon title</title>
                    <desc id="desc-09">A more detailed description of the icon</desc>
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h3 class="mb-2 font-semibold">Ditolak!</h3>
                    <p><?php echo e(session('reject')); ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(session('success')): ?>
        <div class="fixed z-10 top-4 right-4">
            <div class="flex items-start w-full gap-4 px-4 py-3 text-sm border rounded border-emerald-100 bg-emerald-50 text-emerald-500"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5" role="graphics-symbol" aria-labelledby="title-06 desc-06">
                    <title id="title-06">Icon title</title>
                    <desc id="desc-06">A more detailed description of the icon</desc>
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h3 class="mb-2 font-semibold">Success</h3>
                    <p><?php echo e(session('success')); ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="p-10 ml-64">
        <h1 class="text-center text-2xl font-bold pb-4">Permohonan Izin</h1>
        <div class="overflow-x-auto w-3/4 m-auto rounded border border-gray-300 shadow-sm bg-white">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-3 py-2 whitespace-nowrap">#</th>
                        <th class="px-3 py-2 whitespace-nowrap">No Absen</th>
                        <th class="px-3 py-2 whitespace-nowrap">Nama</th>
                        <th class="px-3 py-2 whitespace-nowrap">Kelas</th>
                        <th class="px-3 py-2 whitespace-nowrap">Telepon</th>
                        <th class="px-3 py-2 whitespace-nowrap">Jenis Izin</th>
                        <th class="px-3 py-2 whitespace-nowrap">Surat</th>
                        <th class="px-3 py-2 whitespace-nowrap">Persetujuan</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($loop->iteration); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->student->absen); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->student->name); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->student->class->class_name); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->student->telepon); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->explanation->status_name); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <img src="<?php echo e(asset('storage/' . $permission->image)); ?>" alt="Preview"
                                    class="w-18 h-18 rounded-md cursor-zoom-in"
                                    onclick="openImageModal('<?php echo e(asset('storage/' . $permission->image)); ?>')">
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <?php if($permission->status === 'pending'): ?>
                                    <span
                                        class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                        <button type="button" popovertarget="rejected-<?php echo e($permission->id); ?>"
                                            class="px-3 py-1.5 cursor-pointer text-sm font-medium bg-red-500 transition-colors hover:bg-red-400 hover:text-gray-900 focus:relative">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                        <button type="button" popovertarget="accepted-<?php echo e($permission->id); ?>"
                                            class="px-3 py-1.5 cursor-pointer text-sm font-medium bg-green-500 transition-colors hover:bg-green-400 hover:text-gray-900 focus:relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                    </span>

                                    <section popover id="rejected-<?php echo e($permission->id); ?>"
                                        class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
                                        <div class="flex justify-center">
                                            <svg class="text-red-700 w-32 h-32" viewBox="-2 -2 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10 20C4.477 20 0 15.523 0 10S4.477 0 10 0s10 4.477 10 10s-4.477 10-10 10zm0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16zm0-13a1 1 0 0 1 1 1v5a1 1 0 0 1-2 0V6a1 1 0 0 1 1-1zm0 10a1 1 0 1 1 0-2a1 1 0 0 1 0 2z"
                                                    fill="currentColor" />
                                            </svg>
                                        </div>
                                        <p class="text-gray-700 dark:text-gray-200">Apakah anda yakin menolak permohonan
                                            izin
                                            ini?</p>
                                        <form action="<?php echo e(route('rejected', $permission->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="flex justify-end mt-6 gap-2">
                                                <button popovertarget="rejected-<?php echo e($permission->id); ?>"
                                                    popovertargetaction="hide"
                                                    class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                                    type="button">Batal</button>
                                                <button
                                                    class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600"
                                                    type="submit">Tolak</button>
                                            </div>
                                        </form>
                                    </section>

                                    <section popover id="accepted-<?php echo e($permission->id); ?>"
                                        class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
                                        <div class="flex justify-center">
                                            <svg class="text-green-700 w-32 h-32" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                            </svg>

                                        </div>
                                        <p class="text-gray-700 dark:text-gray-200">Apakah anda yakin menyetujui permohonan
                                            izin
                                            ini?</p>
                                        <form action="<?php echo e(route('accepted', $permission->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <label class="relative flex flex-wrap items-center">
                                                <input
                                                    class="w-4 h-4 transition-colors bg-white border-2 rounded appearance-none cursor-pointer focus-visible:outline-none peer border-slate-500 checked:border-emerald-500 checked:bg-emerald-500 checked:hover:border-emerald-600 checked:hover:bg-emerald-600 focus:outline-none checked:focus:border-emerald-700 checked:focus:bg-emerald-700 checked:ring-2 checked:ring-emerald-600 hover:ring-2 hover:ring-emerald-600 disabled:cursor-not-allowed disabled:border-slate-100 disabled:bg-slate-50"
                                                    type="checkbox" required />
                                                <span
                                                    class="pl-2 cursor-pointer text-gray-700 dark:text-gray-200 peer-disabled:cursor-not-allowed peer-disabled:text-slate-400">
                                                    Surat sudah sesuai dengan ketentuan
                                                </span>
                                                <svg class="absolute left-0 w-4 h-4 transition-all duration-300 -rotate-90 opacity-0 pointer-events-none top-1 fill-white stroke-white peer-checked:rotate-0 peer-checked:opacity-100 peer-disabled:cursor-not-allowed"
                                                    viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    aria-hidden="true" aria-labelledby="title-1 description-1"
                                                    role="graphics-symbol">
                                                    <title id="title-1">Check mark icon</title>
                                                    <desc id="description-1">
                                                        Check mark icon to indicate whether the radio input is checked
                                                        or not.
                                                    </desc>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.8116 5.17568C12.9322 5.2882 13 5.44079 13 5.5999C13 5.759 12.9322 5.91159 12.8116 6.02412L7.66416 10.8243C7.5435 10.9368 7.37987 11 7.20925 11C7.03864 11 6.87501 10.9368 6.75435 10.8243L4.18062 8.42422C4.06341 8.31105 3.99856 8.15948 4.00002 8.00216C4.00149 7.84483 4.06916 7.69434 4.18846 7.58309C4.30775 7.47184 4.46913 7.40874 4.63784 7.40737C4.80655 7.406 4.96908 7.46648 5.09043 7.57578L7.20925 9.55167L11.9018 5.17568C12.0225 5.06319 12.1861 5 12.3567 5C12.5273 5 12.691 5.06319 12.8116 5.17568Z" />
                                                </svg>
                                            </label>

                                            <div class="flex justify-end mt-6 gap-2">
                                                <button popovertarget="accepted-<?php echo e($permission->id); ?>"
                                                    popovertargetaction="hide"
                                                    class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                                    type="button">Batal</button>
                                                <button
                                                    class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-green-700 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600"
                                                    type="submit">Setujui</button>
                                            </div>
                                        </form>
                                    </section>
                                <?php elseif($permission->status === 'ditolak'): ?>
                                    <span
                                        class="inline-flex items-center justify-center rounded-full border border-red-500 px-2.5 py-0.5 text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                        </svg>

                                        <p class="text-sm whitespace-nowrap font-semibold">Ditolak</p>
                                    </span>
                                <?php elseif($permission->status === 'diterima'): ?>
                                    <span
                                        class="inline-flex items-center justify-center rounded-full border border-emerald-500 px-2.5 py-0.5 text-emerald-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="-ms-1 me-1.5 size-4.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <p class="text-sm whitespace-nowrap font-semibold">Diterima</p>
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>

        <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
            <div class="relative">
                <button onclick="closeImageModal()"
                    class="absolute top-2 right-2 text-black text-4xl font-bold shadow-2xl cursor-pointer">&times;</button>
                <img id="modalImage" src="" class="max-w-full max-h-[80vh] rounded shadow-lg">
            </div>
        </div>
    </div>

    <script>
        function openImageModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }

        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/admin/permissions.blade.php ENDPATH**/ ?>