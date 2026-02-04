<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="p-5 ml-17 sm:ml-64">
        <h1 class="text-center text-2xl font-bold pb-4">Permohonan Izin</h1>
        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm bg-white">
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
                    <?php if($permissions->isEmpty()): ?>
                        <tr>
                            <td colspan="8" class="py-16 whitespace-nowrap">
                                <div class="flex flex-col items-center justify-center text-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-25 h-25">
                                        <path
                                            d="M384 480l48 0c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224l-400 0c-11.4 0-21.9 6-27.6 15.9L48 357.1 48 96c0-8.8 7.2-16 16-16l117.5 0c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8L416 144c8.8 0 16 7.2 16 16l0 32 48 0 0-32c0-35.3-28.7-64-64-64L298.5 96c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7L64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l23.7 0L384 480z" />
                                    </svg>
                                    <h2 class="text-2xl font-semibold text-gray-800 mt-1">Belum Ada Perizinan</h2>
                                    <p class="mt-2 text-gray-500">Belum ada siswa yang mengajukan perizinan.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($loop->iteration); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->student->absen); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->student->name); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->student->class->class_name); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->student->telephone); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->explanation->status_name ?? '-'); ?>

                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div class="w-20 h-20 overflow-hidden rounded-md">
                                    <img src="<?php echo e(asset('storage/' . $permission->image)); ?>" alt="Preview"
                                        class="w-full h-full object-cover cursor-zoom-in"
                                        onclick="openImageModal('<?php echo e(asset('storage/' . $permission->image)); ?>')">
                                </div>
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

                                    <section popover id="rejected-<?php echo e($permission->id); ?>">
                                        <div
                                            class="fixed inset-0 z-50 min-h-screen w-full flex justify-center items-center py-10 px-4 bg-black/40 transition overflow-y-scroll">
                                            <div
                                                class="w-full max-w-sm px-2 sm:px-6 py-4 sm:py-6 m-auto bg-white rounded-md shadow-md z-10 overflow-hidden">
                                                <div class="flex justify-center mb-4">
                                                    <svg class="text-red-700 w-20 h-20 sm:w-32 sm:h-32"
                                                        viewBox="-2 -2 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10 20C4.477 20 0 15.523 0 10S4.477 0 10 0s10 4.477 10 10s-4.477 10-10 10zm0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16zm0-13a1 1 0 0 1 1 1v5a1 1 0 0 1-2 0V6a1 1 0 0 1 1-1zm0 10a1 1 0 1 1 0-2a1 1 0 0 1 0 2z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </div>

                                                <div class="text-center">
                                                    <p
                                                        class="text-md sm:text-base text-gray-700 break-words whitespace-normal leading-relaxed">
                                                        Apakah anda yakin menolak permohonan izin ini?
                                                    </p>
                                                </div>

                                                <form action="<?php echo e(route('rejected', $permission->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="flex justify-end mt-6 gap-2">
                                                        <button popovertarget="rejected-<?php echo e($permission->id); ?>"
                                                            popovertargetaction="hide" type="button"
                                                            class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-600 rounded-md hover:bg-gray-500 focus:outline-none focus:bg-gray-500">
                                                            Batal
                                                        </button>
                                                        <button type="submit"
                                                            class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:bg-red-500">
                                                            Tolak
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </section>

                                    <section popover id="accepted-<?php echo e($permission->id); ?>">
                                        <div
                                            class="fixed inset-0 z-50 min-h-screen w-full flex justify-center items-center py-10 px-4 bg-black/40 transition overflow-y-scroll">
                                            <div
                                                class="w-full max-w-sm px-4 sm:px-6 py-4 sm:py-6 m-auto bg-white rounded-md shadow-md z-10 overflow-hidden">
                                                <div class="flex justify-center">
                                                    <svg class="text-green-700 w-32 h-32" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                                    </svg>

                                                </div>
                                                <p
                                                    class="text-md sm:text-base text-gray-700 break-words whitespace-normal leading-relaxed">
                                                    Apakah anda yakin menyetujui permohonan
                                                    izin
                                                    ini?</p>
                                                <form action="<?php echo e(route('accepted', $permission->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <label class="relative flex items-center">
                                                        <input
                                                            class="w-4 h-4 transition-colors bg-white border-2 rounded appearance-none cursor-pointer focus-visible:outline-none peer border-slate-500 checked:border-emerald-500 checked:bg-emerald-500 checked:hover:border-emerald-600 checked:hover:bg-emerald-600 focus:outline-none checked:focus:border-emerald-700 checked:focus:bg-emerald-700 checked:ring-2 checked:ring-emerald-600 hover:ring-2 hover:ring-emerald-600 disabled:cursor-not-allowed disabled:border-slate-100 disabled:bg-slate-50"
                                                            type="checkbox" required />
                                                        <span
                                                            class="pl-2 cursor-pointer text-gray-700 peer-disabled:cursor-not-allowed peer-disabled:text-slate-400 break-words whitespace-normal leading-relaxed">
                                                            Surat sudah sesuai dengan ketentuan
                                                        </span>
                                                        <svg class="absolute left-0 w-4 h-4 transition-all duration-300 -rotate-90 opacity-0 pointer-events-none top-1 fill-white stroke-white peer-checked:rotate-0 peer-checked:opacity-100 peer-disabled:cursor-not-allowed"
                                                            viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                            aria-labelledby="title-1 description-1"
                                                            role="graphics-symbol">
                                                            <title id="title-1">Check mark icon</title>
                                                            <desc id="description-1">
                                                                Check mark icon to indicate whether the radio input is
                                                                checked
                                                                or not.
                                                            </desc>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M12.8116 5.17568C12.9322 5.2882 13 5.44079 13 5.5999C13 5.759 12.9322 5.91159 12.8116 6.02412L7.66416 10.8243C7.5435 10.9368 7.37987 11 7.20925 11C7.03864 11 6.87501 10.9368 6.75435 10.8243L4.18062 8.42422C4.06341 8.31105 3.99856 8.15948 4.00002 8.00216C4.00149 7.84483 4.06916 7.69434 4.18846 7.58309C4.30775 7.47184 4.46913 7.40874 4.63784 7.40737C4.80655 7.406 4.96908 7.46648 5.09043 7.57578L7.20925 9.55167L11.9018 5.17568C12.0225 5.06319 12.1861 5 12.3567 5C12.5273 5 12.691 5.06319 12.8116 5.17568Z" />
                                                        </svg>
                                                    </label>

                                                    <div class="flex justify-end mt-6 gap-2">
                                                        <button popovertarget="accepted-<?php echo e($permission->id); ?>"
                                                            popovertargetaction="hide"
                                                            class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-600 rounded-md hover:bg-gray-500 focus:outline-none focus:bg-gray-500"
                                                            type="button">Batal</button>
                                                        <button
                                                            class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-green-600 rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-500"
                                                            type="submit">Setujui</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
                </tbody>
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