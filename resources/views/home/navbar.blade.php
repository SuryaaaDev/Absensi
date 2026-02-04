<header id="navbar"
    class="fixed z-20 w-full h-20 md:h-auto transition-all duration-300 ease-in-out after:absolute after:top-full after:left-0 after:z-10 after:block after:h-px after:w-full lg:after:hidden">

    <div class="relative mx-auto max-w-full px-6 lg:max-w-5xl xl:max-w-7xl 2xl:max-w-[96rem]">
        <nav aria-label="main navigation"
            class="flex h-[5.5rem] items-stretch justify-between font-medium text-slate-700"
            role="navigation">

            <div class="flex items-center gap-2 text-md md:text-lg whitespace-nowrap focus:outline-none lg:flex-1">
                <a href="#" class="flex items-center gap-2 font-semibold">
                    <img src="{{ asset('storage/image/logo-smk2klt.png') }}" alt="Logo SMK"
                        class="w-12 md:w-14 drop-shadow-md">
                    SMKN 2 KLATEN | RFID
                </a>
            </div>

            <ul role="menubar" aria-label="Select page"
                class="invisible absolute top-0 left-0 z-[-1] ml-auto h-screen w-full justify-center overflow-hidden overflow-y-auto overscroll-contain bg-white/90 px-8 pb-12 pt-28 font-medium opacity-0 transition-[opacity,visibility] duration-300 
                lg:visible lg:relative lg:top-0 lg:z-0 lg:flex lg:h-full lg:w-auto lg:items-stretch lg:overflow-visible lg:bg-transparent lg:px-0 lg:py-0 lg:pt-0 lg:opacity-100">
                
                <li role="none" class="flex items-stretch">
                    <a href="#about"
                        class="flex items-center gap-2 lg:px-6 transition-colors duration-300 hover:text-emerald-600 focus:text-emerald-600 focus:outline-none">
                        About
                    </a>
                </li>
                <li role="none" class="flex items-stretch">
                    <a href="#fitur"
                        class="flex items-center gap-2 lg:px-6 transition-colors duration-300 hover:text-emerald-600 focus:text-emerald-600 focus:outline-none">
                        Fitur
                    </a>
                </li>
                <li role="none" class="flex items-stretch">
                    <a href="#cara-absen"
                        class="flex items-center gap-2 lg:px-6 transition-colors duration-300 hover:text-emerald-600 focus:text-emerald-600 focus:outline-none">
                        Cara Absen
                    </a>
                </li>
                <li role="none" class="flex items-stretch">
                    <a href="#statistik"
                        class="flex items-center gap-2 lg:px-6 transition-colors duration-300 hover:text-emerald-600 focus:text-emerald-600 focus:outline-none">
                        Statistik
                    </a>
                </li>
                <li role="none" class="flex items-stretch">
                    <a href="#faq"
                        class="flex items-center gap-2 lg:px-6 transition-colors duration-300 hover:text-emerald-600 focus:text-emerald-600 focus:outline-none">
                        FAQ
                    </a>
                </li>
            </ul>

            <div class="flex items-center md:px-6 ml-auto lg:ml-0 lg:p-0">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ Auth::user()->dashboardUrl() }}"
                            class="inline-flex items-center justify-center px-3 sm:px-5 h-10 py-3 text-sm font-medium text-white bg-emerald-600 rounded-lg shadow hover:bg-emerald-500 transition-colors duration-300">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center justify-center px-3 sm:px-5 h-10 py-3 text-sm font-medium text-white bg-emerald-600 rounded-lg shadow hover:bg-emerald-500 transition-colors duration-300">
                            Log in
                        </a>
                    @endauth
                @endif
            </div>
        </nav>
    </div>
</header>

<script>
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 10) {
            navbar.classList.add(
                'bg-gradient-to-r',
                'from-white/90',
                'via-emerald-50/90',
                'to-white/90',
                'shadow-md',
                'backdrop-blur-md'
            );
        } else {
            navbar.classList.remove(
                'bg-gradient-to-r',
                'from-white/90',
                'via-emerald-50/90',
                'to-white/90',
                'shadow-md',
                'backdrop-blur-md'
            );
        }
    });
</script>
