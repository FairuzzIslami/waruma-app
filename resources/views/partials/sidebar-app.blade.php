<!-- BACKDROP MOBILE SIDEBAR (Z-40) -->
<div id="backdrop" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

<!-- SIDEBAR NAVIGATION -->
<aside id="sidebar" class="sidebar-transition fixed md:sticky top-0 md:top-[57px] h-screen md:h-[calc(100vh-57px)] z-50 bg-white border-r-2 border-secondary flex flex-col justify-between p-3 overflow-y-auto -translate-x-full md:translate-x-0 w-60 shrink-0">
    <div class="space-y-4">
        <div class="flex items-center gap-2.5 px-1 py-1">
            <button id="closeBtn" class="md:hidden w-8 h-8 bg-primary rounded-lg border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] flex items-center justify-center shrink-0" aria-label="Tutup Menu">
                <img src="{{ asset('assets/icons/icon-close.svg') }}" alt="Tutup" class="w-4 h-4 object-contain">
            </button>

            <img src="{{ asset('assets/images/logoWaruma.svg') }}" alt="Logo WARUMA" class="hidden md:block w-8 h-8 object-contain shrink-0">

            <div class="sb-text overflow-hidden whitespace-nowrap">
                <h1 class="font-extrabold font-headline text-base leading-none text-secondary">WARU<span class="text-amber-500">MA</span></h1>
                <p class="text-[9px] text-gray-500 font-medium font-body">Warung Mudah POS</p>
            </div>
        </div>

        <hr class="border-gray-200" />

        <nav class="space-y-1.5">
            {{-- Dashboard --}}
            <a href="{{ Route::has('dashboard') ? route('dashboard') : '#' }}"
               class="nav-link flex items-center gap-2.5 px-2.5 py-2 {{ request()->routeIs('dashboard') ? 'bg-primary font-bold border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]' : 'font-medium text-gray-700 hover:bg-gray-100' }} rounded-lg text-xs font-headline transition-all">
                <img src="{{ asset('assets/icons/balok.svg') }}" alt="Dashboard" class="w-4 h-4 object-contain shrink-0">
                <span class="sb-text whitespace-nowrap">Dashboard</span>
            </a>

            {{-- Kelola Stok --}}
            <a href="{{ Route::has('stok.index') ? route('stok.index') : '#' }}"
               class="nav-link flex items-center gap-2.5 px-2.5 py-2 {{ request()->routeIs('stok.*') ? 'bg-primary font-bold border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]' : 'font-medium text-gray-700 hover:bg-gray-100' }} rounded-lg text-xs font-headline transition-all">
                <img src="{{ asset('assets/icons/arsip.svg') }}" alt="Kelola Stok" class="w-4 h-4 object-contain shrink-0">
                <span class="sb-text whitespace-nowrap">Kelola Stok & Kategori</span>
            </a>

            {{-- Kasir / POS --}}
            <a href="{{ Route::has('transaksi.index') ? route('transaksi.index') : '#' }}"
               class="nav-link flex items-center gap-2.5 px-2.5 py-2 {{ request()->routeIs('transaksi.*') ? 'bg-primary font-bold border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]' : 'font-medium text-gray-700 hover:bg-gray-100' }} rounded-lg text-xs font-headline transition-all">
                <img src="{{ asset('assets/icons/timbangan.svg') }}" alt="Kasir / POS" class="w-4 h-4 object-contain shrink-0">
                <span class="sb-text whitespace-nowrap">Kasir</span>
            </a>

            {{-- Laporan Laba Rugi --}}
            <a href="{{ Route::has('laporan.laba-rugi') ? route('laporan.laba-rugi') : '#' }}"
               class="nav-link flex items-center gap-2.5 px-2.5 py-2 {{ request()->routeIs('laporan.*') ? 'bg-primary font-bold border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]' : 'font-medium text-gray-700 hover:bg-gray-100' }} rounded-lg text-xs font-headline transition-all">
                <img src="{{ asset('assets/icons/grafikNaikPenelusuran.svg') }}" alt="Laporan Laba Rugi" class="w-4 h-4 object-contain shrink-0">
                <span class="sb-text whitespace-nowrap">Laporan Laba Rugi</span>
            </a>
        </nav>
    </div>

    <div class="space-y-1.5 pt-3 border-t border-gray-100">
        {{-- Katalog Publik Link --}}
        <a href="{{ url('/') }}" target="_blank" class="flex items-center justify-between px-2.5 py-2 bg-gray-100 rounded-lg font-semibold border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] text-xs font-headline">
            <div class="flex items-center gap-2.5 overflow-hidden">
                <img src="{{ asset('assets/icons/toko.svg') }}" alt="Katalog" class="w-4 h-4 object-contain shrink-0">
                <span class="sb-text whitespace-nowrap">Katalog Publik</span>
            </div>
            <img src="{{ asset('assets/icons/external.svg') }}" alt="Link Luar" class="sb-text w-3.5 h-3.5 object-contain shrink-0">
        </a>

        {{-- Profil Owner (Dinamis dengan Ikon/Foto) --}}
        <div class="flex items-center gap-2.5 p-1.5 bg-gray-50 rounded-xl border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
            @if (Auth::user() && Auth::user()->foto)
                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Profile" class="w-7 h-7 rounded-full border border-secondary object-cover shrink-0">
            @else
                <div class="w-7 h-7 rounded-full bg-primary border border-secondary flex items-center justify-center font-bold text-xs shrink-0 text-secondary">
                    {{ strtoupper(substr(Auth::user()->username ?? 'A', 0, 1)) }}
                </div>
            @endif

            {{-- Info Text --}}
            <div class="sb-text overflow-hidden whitespace-nowrap">
                <p class="text-[11px] font-bold font-headline leading-tight text-secondary">
                    Ibu {{ ucfirst(Auth::user()->username ?? 'Ibu Ani') }}
                </p>
                <p class="text-[9px] font-body text-gray-500 font-medium">
                    {{ Auth::user()->role->nama_role ?? 'Owner toko' }}
                </p>
            </div>
        </div>
    </div>
</aside>
