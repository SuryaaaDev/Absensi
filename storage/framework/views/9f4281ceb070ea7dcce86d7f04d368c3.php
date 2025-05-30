

<?php $__env->startSection('content'); ?>
    <h1 class="text-center text-2xl font-bold pb-4">Data Kelas</h1>
    <div class="overflow-x-auto w-1/4 m-auto rounded border border-gray-300 shadow-sm">
        <table class="min-w-full divide-y-2 divide-gray-200">
            <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900">
                    <th class="px-3 py-2 whitespace-nowrap">#</th>
                    <th class="px-3 py-2 whitespace-nowrap">Kelas</th>
                    <th class="px-3 py-2 whitespace-nowrap">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="*:text-gray-900 *:first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo e($loop->iteration); ?></td>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo e($class->class_name); ?></td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <span
                                class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                <button type="button" popovertarget="edit-class-<?php echo e($class->id); ?>"
                                    class="px-3 py-1.5 cursor-pointer text-sm font-medium transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative"
                                    aria-label="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                            <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                            <path
                                                d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3" />
                                        </g>
                                    </svg>
                                </button>
                                <button type="button" popovertarget="delete-class-<?php echo e($class->id); ?>"
                                    class="px-3 py-1.5 cursor-pointer text-sm font-medium bg-red-600 transition-colors hover:bg-red-500 hover:text-gray-900 focus:relative"
                                    aria-label="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </button>
                            </span>

                            <section popover id="delete-class-<?php echo e($class->id); ?>"
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
                                <form action="<?php echo e(route('delete.class', $class->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <div class="flex justify-end mt-6 gap-2">
                                        <button popovertarget="delete-class-<?php echo e($class->id); ?>" popovertargetaction="hide"
                                            class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                            type="button">Batal</button>
                                        <button
                                            class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600"
                                            type="submit">Delete</button>
                                    </div>
                                </form>
                            </section>

                            <section popover id="edit-class-<?php echo e($class->id); ?>"
                                class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
                                <button type="button" popovertarget="edit-class-<?php echo e($class->id); ?>"
                                    popovertargetaction="hide"
                                    class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                    </svg>
                                </button>

                                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Kelas
                                </h2>
                                <form action="<?php echo e(route('edit.class', $class->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                        <div>
                                            <label class="text-gray-700 dark:text-gray-200" for="class_name">Nama
                                                Kelas</label>
                                            <input id="class_name" type="class_name"
                                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                name="class_name" value="<?php echo e($class->class_name); ?>" required>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/admin/class-table.blade.php ENDPATH**/ ?>