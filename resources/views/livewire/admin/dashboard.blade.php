<div>
    <!-- HERO BANNER -->
    <section class="neo rounded-2xl bg-primary p-5 sm:p-8">
        <div class="flex flex-wrap gap-2 mb-4 sm:mb-6">
            <span class="inline-flex items-center gap-1.5 rounded-md bg-white/80 px-2 py-0.5 text-[10px] font-bold">
                <span class="w-2 h-2 rounded-full bg-emerald-600"></span> WARUNG BUKA
            </span>
            <span class="inline-flex items-center gap-1.5 rounded-md bg-white/80 px-2 py-0.5 text-[10px] font-bold">
                <img src="{{ asset('assets/icons/catatanCeklist.svg') }}" alt="Kasir" class="w-3 h-3 object-contain shrink-0">
                <span>22</span> Produk tersedia
            </span>
        </div>
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 sm:gap-6">
            <div>
                <h1 class="text-2xl sm:text-4xl font-extrabold leading-tight">
                    Selamat Datang,<br />{{ auth()->user()->name ?? 'Ibu Ani' }}! 👋
                </h1>
                <p class="mt-2 sm:mt-3 text-xs sm:text-sm text-secondary/80 max-w-xs font-body">
                    Pencatatan kasir WaruMa siap digunakan. Penjualan pagi ini bergerak sehat dengan margin rata-rata 22%.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-2.5 sm:gap-3">
                <a href="#" class="neo-sm rounded-lg bg-white px-4 py-2.5 text-xs sm:text-sm font-semibold inline-flex items-center justify-center gap-2 text-secondary btn-brutal">
                    + Transaksi Baru
                </a>
                <a href="#" class="neo-sm rounded-lg bg-secondary text-white px-4 py-2.5 text-xs sm:text-sm font-semibold inline-flex items-center justify-center gap-2 btn-brutal">
                    + Tambah Barang
                </a>
            </div>
        </div>
    </section>

    <!-- KARTU STATISTIK -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mt-5 sm:mt-6">

        <!-- CARD 1: TOTAL OMZET -->
        <article class="neo rounded-xl bg-white overflow-hidden flex flex-col justify-between">
            <div class="p-4 flex-1 flex flex-col justify-between min-h-[110px]">
                <p class="label">TOTAL OMZET HARI INI</p>
                <div class="my-auto">
                    <p class="text-2xl lg:text-3xl font-extrabold leading-tight flex items-baseline gap-1 truncate text-secondary">
                        <span class="text-xl font-bold">Rp</span><span>1.450.000</span>
                    </p>
                </div>
                <p class="text-xs text-secondary/60 flex items-center gap-1.5 font-medium font-body">
                    <img src="{{ asset('assets/icons/kertas.svg') }}" alt="Omzet" class="w-3.5 h-3.5 object-contain" />
                    <span>18 Transaksi Berhasil</span>
                </p>
            </div>
            <div class="foot bg-[#f9f8f0] border-t-2 border-secondary">Target Harian: Rp 2.000.000</div>
        </article>

        <!-- CARD 2: LABA BERSIH -->
        <article class="neo rounded-xl bg-white overflow-hidden flex flex-col justify-between">
            <div class="p-4 flex-1 flex flex-col justify-between min-h-[110px]">
                <p class="label">LABA BERSIH HARI INI</p>
                <div class="my-auto">
                    <p class="text-2xl lg:text-3xl font-extrabold leading-tight text-emerald-600 flex items-baseline gap-1 truncate">
                        <span class="text-xl font-bold">Rp</span><span>320.000</span>
                    </p>
                </div>
                <p class="text-xs text-secondary/60 font-medium font-body">HPP Modal: Rp 1.130.000</p>
            </div>
            <div class="foot bg-[#dcefe2] border-t-2 border-secondary flex justify-between items-center">
                <span>Margin Keuntungan</span>
                <span class="text-emerald-600 font-extrabold">22,07%</span>
            </div>
        </article>

        <!-- CARD 3: KATALOG PRODUK -->
        <article class="neo rounded-xl bg-white overflow-hidden flex flex-col justify-between">
            <div class="p-4 flex-1 flex flex-col justify-between min-h-[110px]">
                <div class="flex items-center justify-between">
                    <p class="label">KATALOG PRODUK</p>
                    <span class="w-6 h-6 rounded bg-[#f9f8f0] border border-secondary/20 flex items-center justify-center">
                        <img src="{{ asset('assets/icons/katalogProduk.svg') }}" alt="Katalog" class="w-3.5 h-3.5">
                    </span>
                </div>
                <div class="my-auto">
                    <p class="text-2xl lg:text-3xl font-extrabold text-secondary">22 Produk</p>
                </div>
                <p class="text-xs text-secondary/60 font-medium font-body">Terbagi dalam 6 Kategori</p>
            </div>
            <div class="foot bg-[#f9f8f0] border-t-2 border-secondary flex justify-between items-center">
                <span>Stok Aman</span>
                <span class="text-emerald-600 font-extrabold">18 Item</span>
            </div>
        </article>

        <!-- CARD 4: PERLU RESTOCK -->
        <article class="neo-danger rounded-xl bg-white overflow-hidden flex flex-col justify-between">
            <div class="p-4 flex-1 flex flex-col justify-between min-h-[110px]">
                <div class="flex items-center justify-between">
                    <p class="label text-red-600">PERLU RESTOCK</p>
                    <span class="rounded bg-red-100 text-red-600 px-1.5 py-0.5 text-[10px] font-bold inline-flex items-center gap-1 border border-red-300">
                        <img src="{{ asset('assets/icons/peringatanMerah.svg') }}" alt="Kritis" class="w-3 h-3"> KRITIS
                    </span>
                </div>
                <div class="my-auto">
                    <p class="text-2xl lg:text-3xl font-extrabold leading-tight text-red-600">4 Barang</p>
                </div>
                <p class="text-xs text-secondary/60 font-medium font-body">Mencapai / di bawah limit aman</p>
            </div>
            <a href="#" class="foot bg-red-100 text-red-600 flex justify-between items-center border-t-2 border-red-600">
                <span>Segera Order Ulang</span>
                <img src="{{ asset('assets/icons/panahBawahMerah.svg') }}" alt="Panah" class="w-3.5 h-3.5">
            </a>
        </article>

    </section>
</div>
