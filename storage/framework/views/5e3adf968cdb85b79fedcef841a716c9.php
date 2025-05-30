

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('student.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="pt-24 px-10 md:px-0">
        <h1 class="text-center text-2xl font-bold py-4">History</h1>
        <section x-data="{ tab: 1 }" class="max-w-full">
            <ul class="flex items-center m-auto md:mx-52" role="tablist">
                <li>
                    <button @click="tab = 1"
                        :class="tab === 1 ? 'border-emerald-500 text-emerald-500' : 'border-transparent text-slate-700'"
                        class="inline-flex cursor-pointer items-center justify-center w-full h-12 gap-2 px-6 -mb-px text-sm font-medium tracking-wide transition duration-300 border-b-2 rounded-t focus-visible:outline-none whitespace-nowrap">
                        <span class="order-2">Absen</span>
                    </button>
                </li>
                <li>
                    <button @click="tab = 2"
                        :class="tab === 2 ? 'border-emerald-500 text-emerald-500' : 'border-transparent text-slate-700'"
                        class="inline-flex cursor-pointer items-center justify-center w-full h-12 gap-2 px-6 -mb-px text-sm font-medium tracking-wide transition duration-300 border-b-2 rounded-t focus-visible:outline-none whitespace-nowrap">
                        <span class="order-2">Perizinan</span>
                    </button>
                </li>
                <li>
                    <button @click="tab = 3"
                        :class="tab === 3 ? 'border-emerald-500 text-emerald-500' : 'border-transparent text-slate-700'"
                        class="inline-flex cursor-pointer items-center justify-center w-full h-12 gap-2 px-6 -mb-px text-sm font-medium tracking-wide transition duration-300 border-b-2 rounded-t focus-visible:outline-none whitespace-nowrap">
                        <span class="order-2">Lain-lain</span>
                    </button>
                </li>
            </ul>

            <div class="px-6 py-4" x-show="tab === 1">
                <div class="overflow-x-auto md:w-1/2 md:p-0 m-auto rounded border border-gray-300 shadow-sm">
                    <table class="min-w-full divide-y-2 divide-gray-200">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr class="*:font-medium *:text-gray-900">
                                <th class="px-3 py-2 whitespace-nowrap">#</th>
                                <th class="px-3 py-2 whitespace-nowrap">Tanggal</th>
                                <th class="px-3 py-2 whitespace-nowrap">Jam Masuk</th>
                                <th class="px-3 py-2 whitespace-nowrap">Jam Pulang</th>
                                <th class="px-3 py-2 whitespace-nowrap">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="*:text-gray-900 *:first:font-medium">
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($loop->iteration); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->attendance_date); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->time_in); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($attendance->time_out); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap rounded-lg">
                                        <span
                                            class="inline-flex items-center font-bold justify-center rounded-full px-2.5 py-0.5
                                            <?php if($attendance->status->id == 1): ?> text-red-700
                                            <?php elseif($attendance->status->id == 2): ?>  text-emerald-700
                                            <?php elseif($attendance->status->id == 3): ?>  text-blue-700
                                            <?php else: ?> text-amber-700 <?php endif; ?>
                                            "><?php echo e($attendance->status->status_name); ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
            <div class="px-6 py-4" x-show="tab === 2" x-cloak>

                <div class="overflow-x-auto md:w-1/2 md:p-0 m-auto rounded border border-gray-300 shadow-sm">
                    <table class="min-w-full divide-y-2 divide-gray-200">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr class="*:font-medium *:text-gray-900">
                                <th class="px-3 py-2 whitespace-nowrap">#</th>
                                <th class="px-3 py-2 whitespace-nowrap">Tanggal</th>
                                <th class="px-3 py-2 whitespace-nowrap">Jenis Izin</th>
                                <th class="px-3 py-2 whitespace-nowrap">Image</th>
                                <th class="px-3 py-2 whitespace-nowrap">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="*:text-gray-900 *:first:font-medium">
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($loop->iteration); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->created_at); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap"><?php echo e($permission->explanation->status_name); ?></td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <img src="<?php echo e(asset('storage/' . $permission->image)); ?>" alt="Preview"
                                            class="w-18 h-18 rounded-md cursor-zoom-in"
                                            onclick="openImageModal('<?php echo e(asset('storage/' . $permission->image)); ?>')">
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap rounded-lg">
                                        <?php if($permission->status === 'pending'): ?>
                                            <span
                                                class="inline-flex items-center justify-center rounded-full border border-blue-500 px-2.5 py-0.5 text-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="-ms-1 me-1 size-5"
                                                    viewBox="0 0 24 24">
                                                    <circle cx="18" cy="12" r="0" fill="currentColor">
                                                        <animate attributeName="r" begin=".67" calcMode="spline"
                                                            dur="1.5s"
                                                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8"
                                                            repeatCount="indefinite" values="0;2;0;0" />
                                                    </circle>
                                                    <circle cx="12" cy="12" r="0" fill="currentColor">
                                                        <animate attributeName="r" begin=".33" calcMode="spline"
                                                            dur="1.5s"
                                                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8"
                                                            repeatCount="indefinite" values="0;2;0;0" />
                                                    </circle>
                                                    <circle cx="6" cy="12" r="0" fill="currentColor">
                                                        <animate attributeName="r" begin="0" calcMode="spline"
                                                            dur="1.5s"
                                                            keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8"
                                                            repeatCount="indefinite" values="0;2;0;0" />
                                                    </circle>
                                                </svg>
                                                <p class="text-sm whitespace-nowrap font-semibold">Pending</p>
                                            </span>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    class="-ms-1 me-1.5 size-4.5">
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
            <div class="px-6 py-4" x-show="tab === 3" x-cloak>
                <p class="text-center">
                    Coming soon...
                </p>
            </div>
        </section>
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

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\absensi-siswa\resources\views/student/history.blade.php ENDPATH**/ ?>