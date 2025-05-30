

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
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
                    <h3 class="mb-2 font-semibold">Uploading failed!</h3>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul> 
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

    <div class="px-10 py-5 ml-64">
        <div class="flex w-1/2 gap-4">
            <form action="<?php echo e(route('students.search')); ?>" method="GET" autocomplete="off">
                <?php echo csrf_field(); ?>
                <div class="relative my-6 w-full">
                    <input id="search" type="search" name="query" placeholder="Search here"
                        value="<?php echo e(request('query')); ?>" aria-label="Search content"
                        class="relative w-full h-10 px-4 pr-12 bg-white shadow-sm text-sm transition-all border rounded outline-none focus-visible:outline-none peer border-slate-200 text-slate-500 autofill:bg-white invalid:border-pink-500 invalid:text-pink-500 focus:border-blue-500 focus:outline-none invalid:focus:border-pink-500 disabled:cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-400" />
                    <?php if(request('query')): ?>
                        <a href="<?php echo e(route('students')); ?>"
                            class="absolute top-1 right-10 ml-2 p-2 text-blue-700 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    <?php endif; ?> 
                    <button type="submit"
                        class="absolute top-2.5 right-4 h-5 w-5 cursor-pointer stroke-slate-400 peer-disabled:cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            strokeWidth="1.5" aria-hidden="true" aria-label="Search icon" role="graphics-symbol">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </div>
            </form>

            <button popovertarget="add-student"
                class="flex items-center h-1/2 m-auto cursor-pointer p-2 rounded bg-blue-500 hover:bg-blue-600 text-white border-blue-700 mx-1">
                <div class="mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M512 0C229.232 0 0 229.232 0 512c0 282.784 229.232 512 512 512c282.784 0 512-229.216 512-512C1024 229.232 794.784 0 512 0zm0 961.008c-247.024 0-448-201.984-448-449.01c0-247.024 200.976-448 448-448s448 200.977 448 448s-200.976 449.01-448 449.01zM736 480H544V288c0-17.664-14.336-32-32-32s-32 14.336-32 32v192H288c-17.664 0-32 14.336-32 32s14.336 32 32 32h192v192c0 17.664 14.336 32 32 32s32-14.336 32-32V544h192c17.664 0 32-14.336 32-32s-14.336-32-32-32z" />
                    </svg>
                </div>
                <span class="mx-1">Tambah Data</span>
            </button>
        </div>

        <section popover id="add-student" class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
            <button type="button" popovertarget="add-student" popovertargetaction="hide"
                class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
            </button>

            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Tambah Data Siswa</h2>
            <form action="<?php echo e(route('add.user')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <?php if(!empty($rfidArray)): ?>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="no-kartu">No Kartu</label>
                            <input id="no-kartu" type="text" value="<?php echo e($rfidArray[0]['nokartu']); ?>" readonly
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none"
                                name="card_number" required>
                        </div>
                    <?php else: ?>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="no-kartu">No Kartu</label>
                            <input id="no-kartu" type="text" placeholder="Tempelkan kartu anda" readonly
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none "
                                name="card_number" required>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="no-absen">No Absen</label>
                        <input id="no-absen" type="number"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="absen" required>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="nama">Nama Lengkap</label>
                        <input id="nama" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="name" required>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="class_name">Kelas</label>
                        <select id="class_name"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="class_name" required>
                            <option value="" disabled selected>Pilih kelas</option>
                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id); ?>"><?php echo e($class->class_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="email">Email</label>
                        <input id="email" type="email"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="email" required>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="telepon">Telepon</label>
                        <input id="telepon" type="tel"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="telepon" required>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="password">Password</label>
                        <input id="password" type="password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            name="password" required>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button
                        class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                        type="submit">Save</button>
                </div>
            </form>
        </section>

        <h1 class="text-center text-2xl font-bold pb-4">Data Siswa</h1>
        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm bg-white">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-3 py-2 whitespace-nowrap">#</th>
                        <th class="px-3 py-2 whitespace-nowrap">No Absen</th>
                        <th class="px-3 py-2 whitespace-nowrap">No Kartu</th>
                        <th class="px-3 py-2 whitespace-nowrap">Nama Lengkap</th>
                        <th class="px-3 py-2 whitespace-nowrap">Kelas</th>
                        <th class="px-3 py-2 whitespace-nowrap">Email</th>
                        <th class="px-3 py-2 whitespace-nowrap">Telepon</th>
                        <th class="px-3 py-2 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($loop->iteration); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($student->absen); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($student->card_number); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($student->name); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($student->class->class_name ?? 'Tidak ada kelas'); ?>

                            </td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($student->email); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap"><?php echo e($student->telepon); ?></td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <span
                                    class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                    <button type="button" popovertarget="update-student-<?php echo e($student->id); ?>"
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
                                    <button type="button" popovertarget="delete-student-<?php echo e($student->id); ?>"
                                        class="px-3 py-1.5 cursor-pointer text-sm font-medium bg-red-600 transition-colors hover:bg-red-500 hover:text-gray-900 focus:relative"
                                        aria-label="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </span>

                                <section popover id="delete-student-<?php echo e($student->id); ?>"
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
                                    <form action="<?php echo e(route('delete.user', $student->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <div class="flex justify-end mt-6 gap-2">
                                            <button popovertarget="delete-student-<?php echo e($student->id); ?>"
                                                popovertargetaction="hide"
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                                type="button">Batal</button>
                                            <button
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600"
                                                type="submit">Delete</button>
                                        </div>
                                    </form>
                                </section>

                                <section popover id="update-student-<?php echo e($student->id); ?>"
                                    class="max-w-4xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-gray-800 z-10">
                                    <button type="button" popovertarget="update-student-<?php echo e($student->id); ?>"
                                        popovertargetaction="hide"
                                        class="cursor-pointer absolute right-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg>
                                    </button>

                                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Tambah Data
                                        Siswa</h2>
                                    <form action="<?php echo e(route('update.user', $student->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200" for="no-kartu">No
                                                    Kartu</label>
                                                <input id="no-kartu" type="text" placeholder="Tempelkan kartu anda"
                                                    readonly
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none"
                                                    name="card_number" value="<?php echo e($student->card_number); ?>" required>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200" for="no-absen">No
                                                    Absen</label>
                                                <input id="no-absen" type="number"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="absen" value="<?php echo e($student->absen); ?>" required>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200" for="nama">Nama
                                                    Lengkap</label>
                                                <input id="nama" type="text"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="name" value="<?php echo e($student->name); ?>" required>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200"
                                                    for="class_name">Kelas</label>
                                                <select id="class_name"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="class_name" required>
                                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($class->id); ?>"
                                                            <?php echo e($student->class->id == $class->id ? 'selected' : ''); ?>>
                                                            <?php echo e($class->class_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200"
                                                    for="email">Email</label>
                                                <input id="email" type="email"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="email" value="<?php echo e($student->email); ?>" required>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200"
                                                    for="telepon">Telepon</label>
                                                <input id="telepon" type="tel"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="telepon" value="<?php echo e($student->telepon); ?>" required>
                                            </div>

                                            <div>
                                                <label class="text-gray-700 dark:text-gray-200"
                                                    for="password">Password</label>
                                                <input id="password" type="password"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                                                    name="password">
                                            </div>
                                        </div>

                                        <div class="flex justify-end mt-6">
                                            <button
                                                class="px-8 py-2.5 cursor-pointer leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                                                type="submit">Save</button>
                                        </div>
                                    </form>
                                </section>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/admin/students.blade.php ENDPATH**/ ?>