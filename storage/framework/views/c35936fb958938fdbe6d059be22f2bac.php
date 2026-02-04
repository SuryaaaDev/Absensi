<header
    class="fixed z-20 w-full h-20 md:h-auto border-b shadow-lg border-slate-200 bg-white/80 shadow-slate-700/5 after:absolute after:top-full after:left-0 after:z-10 after:block after:h-px after:w-full after:bg-slate-200 lg:border-slate-200 lg:backdrop-blur-sm lg:after:hidden">
    <div class="relative mx-auto max-w-full px-6 lg:max-w-5xl xl:max-w-7xl 2xl:max-w-[96rem]">
        <nav aria-label="main navigation" class="flex h-[5.5rem] items-stretch justify-between font-medium text-slate-700"
            role="navigation">
            <div class="flex items-center gap-2 text-md md:text-lg whitespace-nowrap focus:outline-none lg:flex-1">
                <img src="<?php echo e(asset('storage/image/logo-smk2klt.png')); ?>" alt="" class="w-12 md:w-16">
                SMKN 2 KLATEN | RFID
            </div>

            <div class="flex justify-center items-center">
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        class="relative self-center visible block w-10 h-10 opacity-100 cursor-pointer"
                        aria-expanded="false" aria-label="Toggle navigation" type="button">
                        <div class="absolute w-6 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            <span aria-hidden="true"
                                class="absolute block h-0.5 w-9/12 -translate-y-2 transform rounded-full bg-slate-900 transition-all duration-300"></span>
                            <span aria-hidden="true"
                                class="absolute block h-0.5 w-6 transform rounded-full bg-slate-900 transition duration-300"></span>
                            <span aria-hidden="true"
                                class="absolute block h-0.5 w-1/2 origin-top-left translate-y-2 transform rounded-full bg-slate-900 transition-all duration-300"></span>
                        </div>
                    </button>

                    <section x-show="open" x-collapse
                        class="absolute z-20 right-5 flex flex-col py-2 mt-1 list-none bg-white rounded shadow-md w-72 top-full shadow-slate-500/50">
                        <ul>
                            <li>
                                <a class="flex items-center justify-start gap-2 p-2 px-3.5 transition-colors duration-300 text-slate-500 hover:bg-emerald-50 hover:text-emerald-500 <?php echo e(request()->is('profile*') ? 'bg-emerald-50 text-emerald-500 outline-none' : ''); ?>"
                                    href="/profile">
                                    <?php if(Auth::user()->profile): ?>
                                        <img src="<?php echo e(asset('storage/' . Auth::user()->profile)); ?>" alt="<?php echo e(Auth::user()->name); ?>"
                                            class="flex-shrink-0 w-8 h-8 rounded-full object-cover">
                                    <?php else: ?>
                                        <img src="<?php echo e($avatar); ?>" alt="<?php echo e(Auth::user()->name); ?>"
                                            class="flex-shrink-0 w-8 h-8">
                                    <?php endif; ?>

                                    <div
                                        class="flex flex-col <?php echo e(request()->is('profile*') ? 'text-emerald-500' : ''); ?>">
                                        <span class="leading-5 truncate"><?php echo e(\Illuminate\Support\Str::limit(Auth::user()->name, 25, '...')); ?></span>
                                        <span class="leading-5 truncate"><?php echo e(\Illuminate\Support\Str::limit(Auth::user()->email, 20, '...')); ?></span>
                                    </div>
                                </a>
                            </li>
                            <hr>
                            <li>
                                <a class="flex items-start justify-start gap-2 p-2 px-5 transition-colors duration-300 text-slate-500 hover:bg-emerald-50 hover:text-emerald-500 <?php echo e(request()->is('student*') ? 'bg-emerald-50 text-emerald-500 outline-none' : ''); ?>"
                                    href="<?php echo e(route('student')); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        class="flex-shrink-0 w-5 h-5 <?php echo e(request()->is('student*') ? 'text-emerald-500' : ''); ?>"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                                        aria-labelledby="t-04 d-04" role="graphics-symbol">
                                        <title id="t-04">Button icon</title>
                                        <desc id="d-04">An icon describing the buttons usage</desc>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                    </svg>
                                    <span
                                        class="leading-5 truncate <?php echo e(request()->is('student*') ? 'text-emerald-500' : ''); ?>">Data
                                        Absen</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-start justify-start gap-2 p-2 px-5 transition-colors duration-300 text-slate-500 hover:bg-emerald-50 hover:text-emerald-500 <?php echo e(request()->is('history*') ? 'bg-emerald-50 text-emerald-500 outline-none' : ''); ?>"
                                    href="<?php echo e(route('history')); ?>" aria-current="page">
                                    <svg class="flex-shrink-0 w-5 h-5 <?php echo e(request()->is('history*') ? 'text-emerald-500' : ''); ?>"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4l3 3M3.22302 14C4.13247 18.008 7.71683 21 12 21c4.9706 0 9-4.0294 9-9 0-4.97056-4.0294-9-9-9-3.72916 0-6.92858 2.26806-8.29409 5.5M7 9H3V5" />
                                    </svg>
                                    <span
                                        class="leading-5 truncate <?php echo e(request()->is('history*') ? 'text-emerald-500' : ''); ?>">History</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-start justify-start gap-2 p-2 px-5 transition-colors duration-300 text-slate-500 hover:bg-emerald-50 hover:text-emerald-500 <?php echo e(request()->is('permission*') ? 'bg-emerald-50 text-emerald-500 outline-none' : ''); ?>"
                                    href="<?php echo e(route('permission')); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="flex-shrink-0 w-5 h-5 <?php echo e(request()->is('permission*') ? 'text-emerald-500' : ''); ?>"
                                        viewBox="0 0 16 16">
                                        <path fill="currentColor"
                                            d="M0 1.75C0 .784.784 0 1.75 0h12.5C15.216 0 16 .784 16 1.75v9.5A1.75 1.75 0 0 1 14.25 13H8.06l-2.573 2.573A1.458 1.458 0 0 1 3 14.543V13H1.75A1.75 1.75 0 0 1 0 11.25Zm1.75-.25a.25.25 0 0 0-.25.25v9.5c0 .138.112.25.25.25h2a.75.75 0 0 1 .75.75v2.19l2.72-2.72a.749.749 0 0 1 .53-.22h6.5a.25.25 0 0 0 .25-.25v-9.5a.25.25 0 0 0-.25-.25Zm7 2.25v2.5a.75.75 0 0 1-1.5 0v-2.5a.75.75 0 0 1 1.5 0ZM9 9a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                                    </svg>
                                    <span
                                        class="leading-5 truncate <?php echo e(request()->is('permission*') ? 'text-emerald-500' : ''); ?>">Perizinan</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-start justify-start gap-2 p-2 px-5 transition-colors duration-300 text-slate-500 hover:bg-emerald-50 hover:text-emerald-500 <?php echo e(request()->is('borrow*') ? 'bg-emerald-50 text-emerald-500 outline-none' : ''); ?>"
                                    href="<?php echo e(route('borrow')); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="flex-shrink-0 w-5 h-5 font-bold <?php echo e(request()->is('borrow*') ? 'text-emerald-500' : ''); ?>"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M334.434 206.171c0 13.516-3.435 25.318-10.288 35.397c-5.65 8.47-15.12 17.649-28.436 27.534c-7.664 5.247-12.711 10.184-15.126 14.823c-3.04 5.648-4.54 14.113-4.54 25.409h-42.666c0-17.137 1.824-29.64 5.454-37.504c4.23-9.483 13.407-19.064 27.521-28.743c6.664-5.045 11.503-10.183 14.529-15.425c3.625-5.852 5.449-12.503 5.449-19.966c0-11.899-3.539-20.766-10.594-26.624c-5.636-4.228-12.502-6.345-20.569-6.345c-13.108 0-22.59 4.339-28.436 13.009c-4.236 6.45-6.36 14.719-6.36 24.8v.304h-45.361c0-26.422 8.36-46.382 25.09-59.898c14.12-11.283 31.574-16.94 52.34-16.94c18.16 0 34.092 3.533 47.798 10.588c22.803 11.703 34.195 31.572 34.195 59.581m134.9 49.83c0 117.82-95.513 213.333-213.334 213.333c-117.82 0-213.333-95.513-213.333-213.334S138.18 42.667 256 42.667S469.334 138.179 469.334 256m-42.667 0c0-94.107-76.561-170.667-170.667-170.667S85.334 161.894 85.334 256S161.894 426.667 256 426.667S426.667 350.106 426.667 256m-170.668 69.333c-14.728 0-26.667 11.938-26.667 26.666s11.94 26.667 26.667 26.667s26.667-11.939 26.667-26.667s-11.94-26.666-26.667-26.666" />
                                    </svg>
                                    <span
                                        class="leading-5 truncate <?php echo e(request()->is('borrow*') ? 'text-emerald-500' : ''); ?>">Peminjaman</span>
                                </a>
                            </li>
                            <hr>
                            <li>
                                <form action="<?php echo e(route('logout.student')); ?>" method="POST" class="">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit"
                                        class="cursor-pointer w-full flex items-center justify-start gap-2 p-2 px-5 transition-colors duration-300 text-red-500 hover:bg-red-50 hover:text-red-500 focus:bg-red-50 focus:text-red-600 focus:outline-none focus-visible:outline-none">
                                        <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                        </svg>
                                        Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </nav>
    </div>
</header>
<?php /**PATH C:\laragon\www\absensi-siswa\resources\views/student/navbar.blade.php ENDPATH**/ ?>