<nav class="bg-neutral-custom border-b-2 border-secondary sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">

            {{-- Logo WaruMa --}}
            <a href="#beranda" class="flex items-center gap-2 group">
                <img src="{{ asset('assets/images/logoWaruma.svg') }}" alt="Logo WaruMa"
                    class="h-8 sm:h-10 w-auto transition-transform duration-300 group-hover:scale-105 active:scale-95">
            </a>

            {{-- Desktop Navigation Menu --}}
            <div class="hidden md:flex items-center gap-8 font-headline font-bold text-sm text-secondary">
                {{-- Efek underline tipis beranimasi (relative group + underline span) --}}
                <a href="#beranda" class="relative group py-1 text-secondary hover:text-amber-600 transition-colors duration-200">
                    <span>Beranda</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-600 transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a href="#tentang" class="relative group py-1 text-secondary hover:text-amber-600 transition-colors duration-200">
                    <span>Tentang</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-600 transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a href="#kontak" class="relative group py-1 text-secondary hover:text-amber-600 transition-colors duration-200">
                    <span>Kontak</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-600 transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a href="#faq" class="relative group py-1 text-secondary hover:text-amber-600 transition-colors duration-200">
                    <span>FAQ</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-amber-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            {{-- Right Action --}}
            <div class="flex items-center gap-3">
                {{-- Tombol Login dengan efek tekan (active:scale-95) & bayangan bergeser --}}
                <a href="/login"
                    class="hidden sm:inline-flex items-center justify-center bg-primary text-secondary font-headline font-bold text-xs sm:text-sm px-4 sm:px-5 py-2 sm:py-2.5 rounded-xl border-2 border-secondary shadow-[3px_3px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[1px_1px_0px_0px_rgba(35,35,35,1)] active:scale-95 transition-all duration-150">
                    Login Admin
                </a>

                {{-- Hamburger Button Mobile --}}
                <button id="hamburger-btn" type="button"
                    class="md:hidden p-2 rounded-xl border-2 border-secondary bg-white text-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] hover:bg-amber-50 active:scale-90 transition-all duration-150 focus:outline-none cursor-pointer"
                    aria-label="Toggle Navigation">
                    <svg id="icon-hamburger" class="w-6 h-6 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="icon-close" class="w-6 h-6 hidden transition-transform duration-200 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- Mobile Dropdown dengan animasi slide halus --}}
    <div id="mobile-menu" class="hidden md:hidden border-t-2 border-secondary bg-neutral-custom px-4 pt-3 pb-6 space-y-3 transition-all duration-300 ease-in-out">
        <a href="#beranda" class="mobile-link block font-headline font-bold text-base text-secondary py-2 border-b border-slate-200 hover:text-amber-600 hover:translate-x-1 transition-all duration-200">Beranda</a>
        <a href="#tentang" class="mobile-link block font-headline font-bold text-base text-secondary py-2 border-b border-slate-200 hover:text-amber-600 hover:translate-x-1 transition-all duration-200">Tentang</a>
        <a href="#kontak" class="mobile-link block font-headline font-bold text-base text-secondary py-2 border-b border-slate-200 hover:text-amber-600 hover:translate-x-1 transition-all duration-200">Kontak</a>
        <a href="#faq" class="mobile-link block font-headline font-bold text-base text-secondary py-2 border-b border-slate-200 hover:text-amber-600 hover:translate-x-1 transition-all duration-200">FAQ</a>
        <div class="pt-2 sm:hidden">
            <a href="/login" class="w-full inline-flex items-center justify-center bg-primary text-secondary font-headline font-bold text-sm py-2.5 rounded-xl border-2 border-secondary shadow-[3px_3px_0px_0px_rgba(35,35,35,1)] active:scale-95 transition-all">
                Login Admin
            </a>
        </div>
    </div>
</nav>
