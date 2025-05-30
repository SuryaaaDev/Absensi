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
                                <a class="flex items-center justify-start gap-2 p-2 px-3.5 transition-colors duration-300 text-slate-500 hover:bg-blue-50 hover:text-blue-500 <?php echo e(request()->is('profile*') ? 'bg-blue-50 text-blue-600 outline-none' : ''); ?>"
                                    href="/profile">
                                    <svg class="flex-shrink-0 w-8 h-8 <?php echo e(request()->is('profile*') ? 'text-blue-600' : ''); ?>"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    <div class="flex flex-col <?php echo e(request()->is('profile*') ? 'text-blue-600' : ''); ?>">
                                        <span class="leading-5 truncate"><?php echo e(Auth::user()->name); ?></span>
                                        <span class="leading-5 truncate"><?php echo e(Auth::user()->email); ?></span>
                                    </div>
                                </a>
                            </li>
                            <hr>
                            <li>
                                <a class="flex items-start justify-start gap-2 p-2 px-5 transition-colors duration-300 text-slate-500 hover:bg-blue-50 hover:text-blue-500 <?php echo e(request()->is('student*') ? 'bg-blue-50 text-blue-600 outline-none' : ''); ?>"
                                    href="/student">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        class="flex-shrink-0 w-5 h-5 <?php echo e(request()->is('student*') ? 'text-blue-600' : ''); ?>"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                                        aria-labelledby="t-04 d-04" role="graphics-symbol">
                                        <title id="t-04">Button icon</title>
                                        <desc id="d-04">An icon describing the buttons usage</desc>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                    </svg>
                                    <span
                                        class="leading-5 truncate <?php echo e(request()->is('student*') ? 'text-blue-600' : ''); ?>">Data
                                        Absen</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-start justify-start gap-2 p-2 px-5 transition-colors duration-300 text-slate-500 hover:bg-blue-50 hover:text-blue-500 <?php echo e(request()->is('history*') ? 'bg-blue-50 text-blue-600 outline-none' : ''); ?>"
                                    href="/history" aria-current="page">
                                    <svg class="flex-shrink-0 w-5 h-5 <?php echo e(request()->is('history*') ? 'text-blue-600' : ''); ?>"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4l3 3M3.22302 14C4.13247 18.008 7.71683 21 12 21c4.9706 0 9-4.0294 9-9 0-4.97056-4.0294-9-9-9-3.72916 0-6.92858 2.26806-8.29409 5.5M7 9H3V5" />
                                    </svg>
                                    <span
                                        class="leading-5 truncate <?php echo e(request()->is('history*') ? 'text-blue-600' : ''); ?>">History</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-start justify-start gap-2 p-2 px-5 transition-colors duration-300 text-slate-500 hover:bg-blue-50 hover:text-blue-500 <?php echo e(request()->is('permission*') ? 'bg-blue-50 text-blue-600 outline-none' : ''); ?>"
                                    href="/permission">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="flex-shrink-0 w-5 h-5 <?php echo e(request()->is('permission*') ? 'text-blue-600' : ''); ?>"
                                        viewBox="0 0 16 16">
                                        <path fill="currentColor"
                                            d="M0 1.75C0 .784.784 0 1.75 0h12.5C15.216 0 16 .784 16 1.75v9.5A1.75 1.75 0 0 1 14.25 13H8.06l-2.573 2.573A1.458 1.458 0 0 1 3 14.543V13H1.75A1.75 1.75 0 0 1 0 11.25Zm1.75-.25a.25.25 0 0 0-.25.25v9.5c0 .138.112.25.25.25h2a.75.75 0 0 1 .75.75v2.19l2.72-2.72a.749.749 0 0 1 .53-.22h6.5a.25.25 0 0 0 .25-.25v-9.5a.25.25 0 0 0-.25-.25Zm7 2.25v2.5a.75.75 0 0 1-1.5 0v-2.5a.75.75 0 0 1 1.5 0ZM9 9a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" />
                                    </svg>
                                    <span
                                        class="leading-5 truncate <?php echo e(request()->is('permission*') ? 'text-blue-600' : ''); ?>">Perizinan</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-start justify-start gap-2 p-2 px-5 transition-colors duration-300 text-slate-500 hover:bg-blue-50 hover:text-blue-500 <?php echo e(request()->is('assistance*') ? 'bg-blue-50 text-blue-600 outline-none' : ''); ?>"
                                    href="/assistance">
                                    <svg class="flex-shrink-0 w-5 h-5 font-bold <?php echo e(request()->is('assistance*') ? 'text-blue-600' : ''); ?>"
                                        viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m576 736l-32-.001v-286c0-.336-.096-.656-.096-1.008s.096-.655.096-.991c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32s14.336 32 32 32h32v256h-32c-17.664 0-32 14.336-32 32s14.336 32 32 32h128c17.664 0 32-14.336 32-32s-14.336-32-32-32zm-64-384.001c35.344 0 64-28.656 64-64s-28.656-64-64-64s-64 28.656-64 64s28.656 64 64 64zm0-352c-282.768 0-512 229.232-512 512c0 282.784 229.232 512 512 512c282.784 0 512-229.216 512-512c0-282.768-229.216-512-512-512zm0 961.008c-247.024 0-448-201.984-448-449.01c0-247.024 200.976-448 448-448s448 200.977 448 448s-200.976 449.01-448 449.01z"
                                            fill="currentColor" />
                                    </svg>
                                    <span
                                        class="leading-5 truncate <?php echo e(request()->is('assistance*') ? 'text-blue-600' : ''); ?>">Bantuan</span>
                                </a>
                            </li>
                            <hr>
                            <li>
                                <form action="<?php echo e(route('logout')); ?>" method="POST" class="">
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