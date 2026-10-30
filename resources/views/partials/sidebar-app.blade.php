<!-- BACKDROP MOBILE SIDEBAR (Z-40) -->
<div id="backdrop" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

<!-- SIDEBAR NAVIGATION -->
<aside id="sidebar" class="sidebar-transition fixed md:sticky top-0 md:top-[57px] h-screen md:h-[calc(100vh-57px)] z-50 bg-white border-r-2 border-secondary flex flex-col justify-between p-3 overflow-y-auto -translate-x-full md:translate-x-0 w-60 shrink-0 font-body">
    <div class="space-y-4">
        <!-- HEADER SIDEBAR BRAND -->
        <div class="flex items-center gap-2.5 px-1 py-1">
            <button id="closeBtn" class="md:hidden w-8 h-8 bg-primary rounded-lg border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] flex items-center justify-center shrink-0 cursor-pointer" aria-label="Tutup Menu">
                <img src="{{ asset('assets/icons/icon-close.svg') }}" alt="Tutup" class="w-4 h-4 object-contain">
            </button>

            <img src="{{ asset('assets/images/logoWaruma.svg') }}" alt="Logo WARUMA" class="hidden md:block w-8 h-8 object-contain shrink-0">

            <div class="sb-text overflow-hidden whitespace-nowrap">
                <h1 class="font-black font-headline text-base leading-none text-secondary">WARU<span class="text-amber-500">MA</span></h1>
                <p class="text-[9px] text-gray-500 font-bold font-body">Sistem Kasir Warung</p>
            </div>
        </div>

        <hr class="border-gray-200" />

        <!-- NAVIGASI UTAMA -->
        <nav class="space-y-2">

            <p class="text-[10px] font-extrabold uppercase text-gray-400 px-2 tracking-wider font-headline">Menu Utama</p>

            {{-- 1. Dashboard --}}
            <a href="{{ route('dashboard') }}"
               class="nav-link flex items-center gap-2.5 px-3 py-2.5 {{ request()->routeIs('dashboard') ? 'bg-primary font-black border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]' : 'font-bold text-gray-700 hover:bg-amber-50' }} rounded-xl text-xs font-headline transition-all">
                <img src="{{ asset('assets/icons/balok.svg') }}" alt="Dashboard" class="w-4 h-4 object-contain shrink-0">
                <span class="sb-text whitespace-nowrap">Dashboard</span>
            </a>

            {{-- 2. Kelola Stok & Produk (LINK KE BARANG.INDEX) --}}
            <a href="{{ route('barang.index') }}"
               class="nav-link flex items-center gap-2.5 px-3 py-2.5 {{ request()->routeIs('barang.*') ? 'bg-primary font-black border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]' : 'font-bold text-gray-700 hover:bg-amber-50' }} rounded-xl text-xs font-headline transition-all">
                <img src="{{ asset('assets/icons/arsip.svg') }}" alt="Stok Barang" class="w-4 h-4 object-contain shrink-0">
                <span class="sb-text whitespace-nowrap">Stok &amp; Katalog Barang</span>
            </a>

            {{-- 3. Kasir / POS --}}
            <a href="{{ Route::has('transaksi.index') ? route('transaksi.index') : '#' }}"
               class="nav-link flex items-center gap-2.5 px-3 py-2.5 {{ request()->routeIs('transaksi.*') ? 'bg-primary font-black border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]' : 'font-bold text-gray-700 hover:bg-amber-50' }} rounded-xl text-xs font-headline transition-all">
                <img src="{{ asset('assets/icons/timbangan.svg') }}" alt="Kasir Penjualan" class="w-4 h-4 object-contain shrink-0">
                <span class="sb-text whitespace-nowrap">Kasir Penjualan</span>
            </a>

            {{-- 4. Laporan Keuangan --}}
            <a href="{{ Route::has('laporan.laba.rugi') ? route('laporan.laba.rugi') : '#' }}"
               class="nav-link flex items-center gap-2.5 px-3 py-2.5 {{ request()->routeIs('laporan.*') ? 'bg-primary font-black border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]' : 'font-bold text-gray-700 hover:bg-amber-50' }} rounded-xl text-xs font-headline transition-all">
                <img src="{{ asset('assets/icons/grafikNaikPenelusuran.svg') }}" alt="Laporan Keuangan" class="w-4 h-4 object-contain shrink-0">
                <span class="sb-text whitespace-nowrap">Laporan Untung / Rugi</span>
            </a>
        </nav>
    </div>

    <!-- FOOTER SIDEBAR -->
    <div class="space-y-2 pt-3 border-t border-gray-100">
        {{-- Katalog Publik Link --}}
        <a href="{{ url('/') }}" target="_blank"
           class="flex items-center justify-between px-2.5 py-2 bg-amber-50/60 hover:bg-amber-100 rounded-xl font-extrabold border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] text-xs font-headline transition-all"
           title="Lihat Toko Publik">
            <div class="flex items-center gap-2 overflow-hidden">
                <img src="{{ asset('assets/icons/toko.svg') }}" alt="Katalog" class="w-4 h-4 object-contain shrink-0">
                <span class="sb-text whitespace-nowrap text-secondary">Lihat Toko Publik</span>
            </div>
            <img src="{{ asset('assets/icons/external.svg') }}" alt="Link Luar" class="sb-text w-3.5 h-3.5 object-contain shrink-0">
        </a>

        {{-- Profil Owner --}}
        <a href="{{ route('profile') }}"
           class="flex items-center gap-2.5 p-1.5 bg-white hover:bg-amber-50 rounded-xl border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all overflow-hidden"
           title="Profil Pemilik Warung">
            @if (Auth::user() && Auth::user()->foto)
                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Profile" class="w-7 h-7 rounded-full border border-secondary object-cover shrink-0">
            @else
                <div class="w-7 h-7 rounded-full bg-primary border-1.5 border-secondary flex items-center justify-center font-black text-xs shrink-0 text-secondary">
                    {{ strtoupper(substr(Auth::user()->username ?? 'A', 0, 1)) }}
                </div>
            @endif

            {{-- Info Profil Text (Otomatis Sembunyi Saat Collapsed) --}}
            <div class="sb-text overflow-hidden whitespace-nowrap">
                <p class="text-[11px] font-black font-headline leading-tight text-secondary truncate">
                    {{ ucfirst(Auth::user()->username ?? 'Admin Warung') }}
                </p>
                <p class="text-[9px] font-body text-gray-500 font-bold">
                    Pemilik Warung
                </p>
            </div>
        </a>
    </div>
</aside>
