

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
        <button popovertarget="add-status"
            class="flex items-center cursor-pointer p-2 rounded bg-blue-500 hover:bg-blue-600 text-white border-blue-700 mx-1">
            <div class="mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 1024 1024">
                    <path fill="currentColor"
                        d="M512 0C229.232 0 0 229.232 0 512c0 282.784 229.232 512 512 512c282.784 0 512-229.216 512-512C1024 229.232 794.784 0 512 0zm0 961.008c-247.024 0-448-201.984-448-449.01c0-247.024 200.976-448 448-448s448 200.977 448 448s-200.976 449.01-448 449.01zM736 480H544V288c0-17.664-14.336-32-32-32s-32 14.336-32 32v192H288c-17.664 0-32 14.336-32 32s14.336 32 32 32h192v192c0 17.664 14.336 32 32 32s32-14.336 32-32V544h192c17.664 0 32-14.336 32-32s-14.336-32-32-32z" />
                </svg>
            </div>
            <span class="mx-1">Tambah Data</span>
        </button>
        <section popover id="add-status" class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
            <button type="button" popovertarget="add-status" popovertargetaction="hide"
                class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
            </button>

            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Tambah Data Keterangan</h2>
            <form action="<?php echo e(route('add.status')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="status_name">Nama Keterangan</label>
                        <input id="status_name" type="status_name"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="status_name" required>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button
                        class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                        type="submit">Save</button>
                </div>
            </form>
        </section>

        <h1 class="text-center text-2xl font-bold pb-4">Data Keterangan</h1>
        <div class="overflow-x-auto w-1/4 m-auto rounded border border-gray-300 shadow-sm bg-white">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-3 py-2 whitespace-nowrap">#</th>
                        <th class="px-3 py-2 whitespace-nowrap">Keterangan</th>
                        <th class="px-3 py-2 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($loop->iteration); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($status->status_name); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <?php if($loop->first || $loop->iteration == 2 || $loop->iteration == 3): ?>
                                    <span
                                        class="inline-flex items-center justify-center rounded-full border border-gray-500 px-2 py-0.5 text-gray-700 gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                                        </svg>

                                        <p class="text-sm whitespace-nowrap">Default</p>
                                    </span>
                                <?php else: ?>
                                    <span
                                        class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                        <button type="button" popovertarget="edit-status-<?php echo e($status->id); ?>"
                                            class="px-3 py-1.5 cursor-pointer text-sm font-medium transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2">
                                                    <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3" />
                                                </g>
                                            </svg>
                                        </button>

                                        <button type="button" popovertarget="delete-status-<?php echo e($status->id); ?>"
                                            class="px-3 py-1.5 cursor-pointer text-sm font-medium bg-red-600 transition-colors hover:bg-red-500 hover:text-gray-900 focus:relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </button>
                                    </span>
                                <?php endif; ?>


                                <section popover id="delete-status-<?php echo e($status->id); ?>"
                                    class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
                                    <div class="flex justify-center">
                                        <svg class="text-red-700 w-32 h-32" viewBox="-2 -2 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 20C4.477 20 0 15.523 0 10S4.477 0 10 0s10 4.477 10 10s-4.477 10-10 10zm0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16zm0-13a1 1 0 0 1 1 1v5a1 1 0 0 1-2 0V6a1 1 0 0 1 1-1zm0 10a1 1 0 1 1 0-2a1 1 0 0 1 0 2z"
                                                fill="currentColor" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-200" for="class_name">Apakah anda yakin
                                        menghapus data ini?</p>
                                    <form action="<?php echo e(route('delete.status', $status->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <div class="flex justify-end mt-6 gap-2">
                                            <button popovertarget="delete-status-<?php echo e($status->id); ?>"
                                                popovertargetaction="hide"
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                                type="button">Batal</button>
                                            <button
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600"
                                                type="submit"
                                                <?php if($loop->first || $loop->iteration == 2): ?> disabled <?php endif; ?>>Delete</button>
                                        </div>
                                    </form>
                                </section>

                                <section popover id="edit-status-<?php echo e($status->id); ?>"
                                    class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
                                    <button type="button" popovertarget="edit-status-<?php echo e($status->id); ?>"
                                        popovertargetaction="hide"
                                        class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg>
                                    </button>

                                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit
                                        Keterangan
                                    </h2>
                                    <form action="<?php echo e(route('edit.status', $status->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200" for="status_name">Nama
                                                    Keterangan</label>
                                                <input id="status_name" type="status_name"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="status_name" value="<?php echo e($status->status_name); ?>" required>
                                            </div>
                                        </div>

                                        <div class="flex justify-end mt-6 gap-3">
                                            <button
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                                type="submit">Save</button>
                                        </div>
                                    </form>
                                </section>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/admin/statuses.blade.php ENDPATH**/ ?>