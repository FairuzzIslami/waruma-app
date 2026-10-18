<x-guest title="WaruMa">

    {{-- HERO SECTION --}}
    <section class="bg-neutral-custom border-b-2 border-secondary py-8 sm:py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                <div class="lg:col-span-7 space-y-5 sm:space-y-6 text-center lg:text-left">
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold font-headline tracking-tight leading-tight text-secondary">
                        Selamat Datang di <br>
                        <span class="inline-block bg-primary text-secondary px-3 sm:px-4 py-1 rounded-xl border-2 border-secondary shadow-[3px_3px_0px_0px_rgba(35,35,35,1)] sm:shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] mt-1 sm:mt-2">
                            Waruma
                        </span>
                    </h1>

                    <div class="space-y-2 max-w-2xl mx-auto lg:mx-0">
                        <p class="text-base sm:text-lg lg:text-xl font-headline font-bold text-secondary">
                            Temukan berbagai kebutuhan sehari-hari dengan mudah dan praktis di Waruma.
                        </p>
                        <p class="text-xs sm:text-sm lg:text-base font-body text-slate-600">
                            Waruma menyediakan informasi produk, harga, dan ketersediaan stok sehingga Anda dapat menemukan kebutuhan dengan lebih mudah dari rumah.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 sm:gap-4 pt-2">
                        <x-button tag="a" href="#produk" variant="primary" size="lg" class="w-full sm:w-auto">
                            <span>Lihat Produk & Stok Real-time </span>
                        </x-button>

                        <x-button tag="a" href="#tentang" variant="secondary" size="lg" class="w-full sm:w-auto">
                            <span>Tentang Waruma</span>
                        </x-button>
                    </div>

                    <div class="flex items-center justify-center lg:justify-start gap-2 text-xs sm:text-sm font-label font-medium pt-1">
                        <img src="{{ asset('assets/icons/bener.svg') }}" alt="Checklist" class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0">
                        <span class="text-slate-700">Tidak perlu registrasi untuk cek ketersediaan sembako!</span>
                    </div>
                </div>

                <div class="lg:col-span-5 flex justify-center">
                    <div class="w-full max-w-md lg:max-w-none">
                        <img src="{{ asset('assets/images/warumaKios.svg') }}" alt="Waruma Kios Illustration"
                            loading="eager" fetchpriority="high" class="w-full h-auto p-2">
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- STATS BAR SECTION --}}
    <section class="bg-neutral-custom border-b-2 border-secondary py-5 sm:py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 divide-x-2 divide-secondary text-center">
                <div class="px-1 sm:px-2">
                    <h3 class="text-xl sm:text-3xl font-extrabold font-headline text-secondary">22+</h3>
                    <p class="text-[9px] sm:text-xs font-label font-bold text-slate-600 uppercase tracking-wider mt-1">
                        PRODUK SEMBAKO AKTIF</p>
                </div>
                <div class="px-1 sm:px-2">
                    <h3 class="text-xl sm:text-3xl font-extrabold font-headline text-emerald-600">100%</h3>
                    <p class="text-[9px] sm:text-xs font-label font-bold text-slate-600 uppercase tracking-wider mt-1">
                        STOK SESUAI FISIK</p>
                </div>
                <div class="px-1 sm:px-2">
                    <h3 class="text-xl sm:text-3xl font-extrabold font-headline text-secondary">07.00</h3>
                    <p class="text-[9px] sm:text-xs font-label font-bold text-slate-600 uppercase tracking-wider mt-1">
                        BUKA PAGI HARI</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURES SECTION (Mengapa Memilih WaruMa?) --}}
    <section id="beranda" class="bg-neutral-custom py-12 sm:py-16 lg:py-20 border-b-2 border-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <div class="lg:col-span-4 space-y-6 text-center lg:text-left">
                    <div>
                        <span class="inline-block bg-white text-secondary text-xs font-headline font-bold uppercase tracking-wider px-3 py-1 rounded-md border-2 border-secondary mb-3 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                            KELEBIHAN BELANJA
                        </span>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold font-headline text-secondary leading-tight">
                            Mengapa Memilih Waruma?
                        </h2>
                        <p class="text-xs sm:text-sm lg:text-base font-body text-slate-600 mt-2 sm:mt-3 max-w-xl mx-auto lg:mx-0">
                            Kemudahan dalam menemukan informasi kebutuhan sehari-hari warga sekitar secara transparan dan tanpa ribet.
                        </p>
                    </div>

                    <div class="bg-tertiary border-2 border-secondary rounded-2xl p-4 sm:p-5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] space-y-2 sm:space-y-3 text-left">
                        <p class="text-xs sm:text-sm font-body font-semibold text-secondary italic">
                            "Nggak perlu takut kehabisan beras atau telur pas udah jalan ke warung."
                        </p>
                        <p class="text-[11px] sm:text-xs font-label font-bold text-slate-700">
                            — Bu Siti, Warga RT 03
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">

                    <div class="bg-white border-2 border-secondary rounded-2xl p-5 sm:p-6 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] sm:shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[3px_3px_0px_0px_rgba(35,35,35,1)] transition-all">
                        <div class="mb-3 sm:mb-4">
                            <img src="{{ asset('assets/icons/petir.svg') }}" alt="Transaksi Cepat" class="w-10 h-10 sm:w-12 sm:h-12 object-contain">
                        </div>
                        <h3 class="text-base sm:text-lg font-headline font-bold text-secondary mb-1 sm:mb-2">
                            Transaksi Cepat
                        </h3>
                        <p class="text-xs sm:text-sm font-body text-slate-600 leading-relaxed">
                            Proses transaksi yang praktis membantu menghemat waktu saat melakukan pembelian di kasir.
                        </p>
                    </div>

                    <div class="bg-white border-2 border-secondary rounded-2xl p-5 sm:p-6 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] sm:shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[3px_3px_0px_0px_rgba(35,35,35,1)] transition-all">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white border-2 border-secondary rounded-xl flex items-center justify-center p-2 mb-3 sm:mb-4 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                            <img src="{{ asset('assets/icons/arsip.svg') }}" alt="Beragam Produk" class="w-full h-full object-contain">
                        </div>
                        <h3 class="text-base sm:text-lg font-headline font-bold text-secondary mb-1 sm:mb-2">
                            Beragam Produk
                        </h3>
                        <p class="text-xs sm:text-sm font-body text-slate-600 leading-relaxed">
                            Kebutuhan pokok beras, minyak, mie instan, hingga bumbu dapur lengkap tersedia dalam satu tempat.
                        </p>
                    </div>

                    <div class="bg-white border-2 border-secondary rounded-2xl p-5 sm:p-6 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] sm:shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[3px_3px_0px_0px_rgba(35,35,35,1)] transition-all">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-primary border-2 border-secondary rounded-xl flex items-center justify-center p-2 mb-3 sm:mb-4 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                            <img src="{{ asset('assets/icons/grafikNaikPenelusuran.svg') }}" alt="Stok Terpantau Real-time" class="w-full h-full object-contain">
                        </div>
                        <h3 class="text-base sm:text-lg font-headline font-bold text-secondary mb-1 sm:mb-2">
                            Stok Terpantau Real-time
                        </h3>
                        <p class="text-xs sm:text-sm font-body text-slate-600 leading-relaxed">
                            Informasi ketersediaan ter-update langsung dari sistem kasir POS toko setiap kali barang dibeli.
                        </p>
                    </div>

                    <div class="bg-white border-2 border-secondary rounded-2xl p-5 sm:p-6 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] sm:shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[3px_3px_0px_0px_rgba(35,35,35,1)] transition-all">
                        <div class="mb-3 sm:mb-4">
                            <img src="{{ asset('assets/icons/tunjuk.svg') }}" alt="Mudah & Praktis" class="w-10 h-10 sm:w-12 sm:h-12 object-contain">
                        </div>
                        <h3 class="text-base sm:text-lg font-headline font-bold text-secondary mb-1 sm:mb-2">
                            Mudah & Praktis
                        </h3>
                        <p class="text-xs sm:text-sm font-body text-slate-600 leading-relaxed">
                            Akses informasi produk dan stok dengan instan dari HP atau komputer tanpa perlu download aplikasi atau login.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- SECTION: JELAJAHI KATEGORI PRODUK --}}
    <section id="kategori" class="bg-neutral-custom py-12 sm:py-16 border-b-2 border-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <span class="inline-block bg-primary text-secondary text-[10px] sm:text-xs font-headline font-bold uppercase tracking-wider px-2.5 py-1 rounded border-2 border-secondary mb-2 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                    KATEGORI
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold font-headline text-secondary">
                    Jelajahi Kategori Produk
                </h2>
                <p class="text-xs sm:text-sm font-body text-slate-600 mt-1">
                    Temukan berbagai kebutuhan pokok berdasarkan kelompok belanja.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <a href="#produk"
                    class="bg-white border-2 border-secondary rounded-2xl p-3.5 flex items-center gap-3.5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all group">
                    <div class="w-10 h-10 bg-primary border-2 border-secondary rounded-xl flex items-center justify-center p-2 flex-shrink-0 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                        <img src="{{ asset('assets/icons/sembako.svg') }}" alt="Sembako" loading="lazy" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h3 class="font-headline font-bold text-sm text-secondary group-hover:text-amber-600 transition-colors">
                            Sembako
                        </h3>
                        <p class="text-[11px] font-body text-slate-500">4 Produk</p>
                    </div>
                </a>

                <a href="#produk"
                    class="bg-white border-2 border-secondary rounded-2xl p-3.5 flex items-center gap-3.5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all group">
                    <div class="w-10 h-10 bg-white border-2 border-secondary rounded-xl flex items-center justify-center p-2 flex-shrink-0 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                        <img src="{{ asset('assets/icons/mieInstan.svg') }}" alt="Mie Instan" loading="lazy" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h3 class="font-headline font-bold text-sm text-secondary group-hover:text-amber-600 transition-colors">
                            Mie Instan
                        </h3>
                        <p class="text-[11px] font-body text-slate-500">4 Produk</p>
                    </div>
                </a>

                <a href="#produk"
                    class="bg-white border-2 border-secondary rounded-2xl p-3.5 flex items-center gap-3.5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all group">
                    <div class="w-10 h-10 bg-primary border-2 border-secondary rounded-xl flex items-center justify-center p-2 flex-shrink-0 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                        <img src="{{ asset('assets/icons/minuman.svg') }}" alt="Minuman" loading="lazy" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h3 class="font-headline font-bold text-sm text-secondary group-hover:text-amber-600 transition-colors">
                            Minuman
                        </h3>
                        <p class="text-[11px] font-body text-slate-500">4 Produk</p>
                    </div>
                </a>

                <a href="#produk"
                    class="bg-white border-2 border-secondary rounded-2xl p-3.5 flex items-center gap-3.5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all group">
                    <div class="w-10 h-10 bg-white border-2 border-secondary rounded-xl flex items-center justify-center p-2 flex-shrink-0 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                        <img src="{{ asset('assets/icons/makananRingan.svg') }}" alt="Makanan Ringan" loading="lazy" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h3 class="font-headline font-bold text-sm text-secondary group-hover:text-amber-600 transition-colors">
                            Makanan Ringan
                        </h3>
                        <p class="text-[11px] font-body text-slate-500">3 Produk</p>
                    </div>
                </a>

                <a href="#produk"
                    class="bg-white border-2 border-secondary rounded-2xl p-3.5 flex items-center gap-3.5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all group">
                    <div class="w-10 h-10 bg-primary border-2 border-secondary rounded-xl flex items-center justify-center p-2 flex-shrink-0 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                        <img src="{{ asset('assets/icons/rumahTangga.svg') }}" alt="Rumah Tangga" loading="lazy" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h3 class="font-headline font-bold text-sm text-secondary group-hover:text-amber-600 transition-colors">
                            Rumah Tangga
                        </h3>
                        <p class="text-[11px] font-body text-slate-500">2 Produk</p>
                    </div>
                </a>

                <a href="#produk"
                    class="bg-white border-2 border-secondary rounded-2xl p-3.5 flex items-center gap-3.5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all group">
                    <div class="w-10 h-10 bg-white border-2 border-secondary rounded-xl flex items-center justify-center p-2 flex-shrink-0 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                        <img src="{{ asset('assets/icons/perawatanDiri.svg') }}" alt="Perawatan Diri" loading="lazy" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h3 class="font-headline font-bold text-sm text-secondary group-hover:text-amber-600 transition-colors">
                            Perawatan Diri
                        </h3>
                        <p class="text-[11px] font-body text-slate-500">2 Produk</p>
                    </div>
                </a>

                <a href="#produk"
                    class="sm:col-span-2 bg-white border-2 border-secondary rounded-2xl p-3.5 flex items-center gap-3.5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all group">
                    <div class="w-10 h-10 bg-primary border-2 border-secondary rounded-xl flex items-center justify-center p-2 flex-shrink-0 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                        <img src="{{ asset('assets/icons/bumbuDapur.svg') }}" alt="Bumbu Dapur" loading="lazy" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h3 class="font-headline font-bold text-sm text-secondary group-hover:text-amber-600 transition-colors">
                            Bumbu Dapur Lengkap
                        </h3>
                        <p class="text-[11px] font-body text-slate-500">Kecap, saus, bumbu instan & garam (3 Produk)</p>
                    </div>
                </a>

            </div>
        </div>
    </section>

    {{-- SECTION: PRODUK & STOK TERKINI --}}
    <section id="produk" class="bg-neutral-custom py-12 sm:py-16 border-b-2 border-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-extrabold font-headline text-secondary">
                    Produk & Stok Terkini
                </h2>
                <p class="text-xs sm:text-sm font-body text-slate-600 mt-1">
                    Update otomatis setiap kali ada transaksi kasir di toko.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

                <div class="bg-white border-2 border-secondary rounded-2xl shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] flex flex-col justify-between overflow-hidden">
                    <div class="bg-white p-4 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-white text-secondary text-[10px] font-headline font-bold px-2.5 py-1 rounded-md border border-secondary uppercase">
                                MIE INSTAN
                            </span>
                            <span class="bg-emerald-100 text-emerald-700 text-[10px] font-headline font-bold px-2.5 py-1 rounded-md border border-emerald-400">
                                Tersedia
                            </span>
                        </div>

                        <div class="w-full h-44 flex items-center justify-center p-2">
                            <div class="w-full h-full border-2 border-secondary rounded-xl bg-white flex items-center justify-center p-0.5 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] overflow-hidden">
                                <img src="{{ asset('assets/images/indomieGoreng.jpg') }}" alt="Indomie Goreng Spesial" loading="lazy" class="w-full h-full object-cover rounded-lg">
                            </div>
                        </div>
                    </div>

                    <div class="border-t-2 border-secondary p-4 bg-white">
                        <h3 class="font-headline font-bold text-base text-secondary line-clamp-1">Indomie Goreng Spesial</h3>
                        <p class="text-xs font-body text-slate-600 mt-1 leading-relaxed line-clamp-2 min-h-[2.5rem]">
                            Isi 85 gram, mie instan goreng original gurih.
                        </p>

                        <div class="border-t border-slate-200 pt-3 mt-4 flex items-end justify-between">
                            <div>
                                <span class="text-[10px] font-label text-slate-400 uppercase font-bold">HARGA</span>
                                <p class="font-headline font-extrabold text-base text-secondary">Rp 3.100</p>
                            </div>
                            <div class="text-right">
                                <span class="text-[10px] font-label text-slate-400 uppercase font-bold">STOK TOKO</span>
                                <p class="font-headline font-bold text-xs text-emerald-600">120 bks</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-2 border-secondary rounded-2xl shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] flex flex-col justify-between overflow-hidden">
                    <div class="bg-tertiary p-4 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-white text-secondary text-[10px] font-headline font-bold px-2.5 py-1 rounded-md border border-secondary uppercase">
                                SEMBAKO
                            </span>
                            <span class="bg-emerald-100 text-emerald-700 text-[10px] font-headline font-bold px-2.5 py-1 rounded-md border border-emerald-400">
                                Tersedia
                            </span>
                        </div>

                        <div class="w-full h-44 flex items-center justify-center p-2">
                            <div class="w-full h-full border-2 border-secondary rounded-xl bg-white flex items-center justify-center p-0.5 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] overflow-hidden">
                                <img src="{{ asset('assets/images/beras.jpg') }}" alt="Beras Setra Ramos 5kg" loading="lazy" class="w-full h-full object-cover rounded-lg">
                            </div>
                        </div>
                    </div>

                    <div class="border-t-2 border-secondary p-4 bg-white">
                        <h3 class="font-headline font-bold text-base text-secondary line-clamp-1">Beras Setra Ramos 5kg</h3>
                        <p class="text-xs font-body text-slate-600 mt-1 leading-relaxed line-clamp-2 min-h-[2.5rem]">
                            Beras kualitas super pulen tanpa pemutih sintetis.
                        </p>

                        <div class="border-t border-slate-200 pt-3 mt-4 flex items-end justify-between">
                            <div>
                                <span class="text-[10px] font-label text-slate-400 uppercase font-bold">HARGA</span>
                                <p class="font-headline font-extrabold text-base text-secondary">Rp 68.000</p>
                            </div>
                            <div class="text-right">
                                <span class="text-[10px] font-label text-slate-400 uppercase font-bold">STOK TOKO</span>
                                <p class="font-headline font-bold text-xs text-emerald-600">18 karung</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-2 border-secondary rounded-2xl shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] flex flex-col justify-between overflow-hidden">
                    <div class="bg-white p-4 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-white text-secondary text-[10px] font-headline font-bold px-2.5 py-1 rounded-md border border-secondary uppercase">
                                SEMBAKO
                            </span>
                            <span class="bg-emerald-100 text-emerald-700 text-[10px] font-headline font-bold px-2.5 py-1 rounded-md border border-emerald-400">
                                Tersedia
                            </span>
                        </div>

                        <div class="w-full h-44 flex items-center justify-center p-2">
                            <div class="w-full h-full border-2 border-secondary rounded-xl bg-white flex items-center justify-center p-0.5 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] overflow-hidden">
                                <img src="{{ asset('assets/images/minyakGorenng.jpg') }}" alt="Minyak Goreng 2 Liter" loading="lazy" class="w-full h-full object-cover rounded-lg">
                            </div>
                        </div>
                    </div>

                    <div class="border-t-2 border-secondary p-4 bg-white">
                        <h3 class="font-headline font-bold text-base text-secondary line-clamp-1">Minyak Goreng 2 Liter</h3>
                        <p class="text-xs font-body text-slate-600 mt-1 leading-relaxed line-clamp-2 min-h-[2.5rem]">
                            Kemasan pouch higienis, jernih untuk menggoreng renyah.
                        </p>

                        <div class="border-t border-slate-200 pt-3 mt-4 flex items-end justify-between">
                            <div>
                                <span class="text-[10px] font-label text-slate-400 uppercase font-bold">HARGA</span>
                                <p class="font-headline font-extrabold text-base text-secondary">Rp 34.500</p>
                            </div>
                            <div class="text-right">
                                <span class="text-[10px] font-label text-slate-400 uppercase font-bold">STOK TOKO</span>
                                <p class="font-headline font-bold text-xs text-emerald-600">42 pouch</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-2 border-secondary rounded-2xl shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] flex flex-col justify-between overflow-hidden">
                    <div class="bg-tertiary p-4 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-white text-secondary text-[10px] font-headline font-bold px-2.5 py-1 rounded-md border border-secondary uppercase">
                                SEMBAKO
                            </span>
                            <span class="bg-primary text-secondary text-[10px] font-headline font-bold px-2.5 py-1 rounded-md border border-secondary">
                                Sisa Sedikit
                            </span>
                        </div>

                        <div class="w-full h-44 flex items-center justify-center p-2">
                            <div class="w-full h-full border-2 border-secondary rounded-xl bg-white flex items-center justify-center p-0.5 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] overflow-hidden">
                                <img src="{{ asset('assets/images/bawang merah.jpe') }}" alt="Bawang Merah Segar" loading="lazy" class="w-full h-full object-cover rounded-lg">
                            </div>
                        </div>
                    </div>

                    <div class="border-t-2 border-secondary p-4 bg-white">
                        <h3 class="font-headline font-bold text-base text-secondary line-clamp-1">Bawang Merah Segar</h3>
                        <p class="text-xs font-body text-slate-600 mt-1 leading-relaxed line-clamp-2 min-h-[2.5rem]">
                            Bawang merah pilihan segar langsung dari petani.
                        </p>

                        <div class="border-t border-slate-200 pt-3 mt-4 flex items-end justify-between">
                            <div>
                                <span class="text-[10px] font-label text-slate-400 uppercase font-bold">HARGA</span>
                                <p class="font-headline font-extrabold text-base text-secondary">Rp 28.000</p>
                            </div>
                            <div class="text-right">
                                <span class="text-[10px] font-label text-slate-400 uppercase font-bold">STOK TOKO</span>
                                <p class="font-headline font-bold text-xs text-amber-700">Sisa 3 kg</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="bg-primary border-2 border-secondary rounded-2xl p-6 sm:p-8 shadow-[8px_8px_0px_0px_rgba(35,35,35,1)] flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="space-y-2 max-w-2xl">
                    <span class="inline-block bg-white text-secondary text-[10px] sm:text-xs font-headline font-bold uppercase tracking-wider px-2.5 py-1 rounded border border-secondary">
                        KATALOG LENGKAP WARUNG
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-extrabold font-headline text-secondary">
                        Cek Semua Barang & Stok
                    </h3>
                    <p class="text-xs sm:text-sm font-body text-slate-900 leading-relaxed">
                        Buka katalog publik WaruMa untuk melihat seluruh 22+ produk, harga satuan/grosir, dan ketersediaan stok fisik — bebas cek tanpa login.
                    </p>
                </div>

                <div class="w-full md:w-auto">
                    <a href="#katalog" class="w-full md:w-auto inline-flex items-center justify-center gap-2 bg-secondary text-white font-headline font-bold text-xs sm:text-sm px-6 py-3.5 rounded-xl border-2 border-secondary shadow-[3px_3px_0px_0px_rgba(255,255,255,0.3)] hover:bg-slate-800 transition-all">
                        Buka Katalog Publik Lengkap (22 Produk)
                    </a>
                </div>
            </div>

        </div>
    </section>

    {{-- SECTION: TENTANG WARUMA --}}
    <section id="tentang" class="bg-neutral-custom py-12 sm:py-16 border-b-2 border-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                {{-- Left Side: Catatan Warung Ibu Ani / Image Mockup --}}
                <div class="lg:col-span-5 flex justify-center">
                    <div class="w-full max-w-md lg:max-w-none bg-white border-2 border-secondary rounded-2xl p-4 sm:p-5 shadow-[8px_8px_0px_0px_rgba(35,35,35,1)]">
                        <div class="bg-secondary text-white rounded-xl p-5 border-2 border-secondary space-y-4">
                            <div class="flex items-center justify-between border-b border-slate-700 pb-3">
                                <h4 class="font-headline font-bold text-primary text-sm sm:text-base">Catatan Warung Ibu Ani</h4>
                                <span class="text-[10px] font-label text-slate-400">Sejak 2020</span>
                            </div>
                            <p class="text-xs sm:text-sm font-body text-slate-300 italic leading-relaxed">
                                "Dulu warga sering tanya lewat SMS & WA: 'Beras pandan wangi ada bu? Telur masih ada?'. Sekarang tinggal buka link WaruMa, langsung kelihatan stoknya!"
                            </p>
                            <div class="flex items-center gap-3 pt-2">
                                <div class="w-10 h-10 bg-primary text-secondary font-headline font-extrabold rounded-full flex items-center justify-center border-2 border-white text-sm">
                                    IA
                                </div>
                                <div>
                                    <h5 class="font-headline font-bold text-xs text-white">Ibu Ani S.</h5>
                                    <p class="text-[10px] font-body text-slate-400">Pemilik & Pengelola WaruMa</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-3 text-[10px] font-label font-bold text-slate-500 px-1">
                            <span>RT 03 Sukamaju</span>
                            <span>Kasir POS Terkoneksi</span>
                        </div>
                    </div>
                </div>

                {{-- Right Side: Content & Features Check --}}
                <div class="lg:col-span-7 space-y-6">
                    <div>
                        <span class="inline-block bg-tertiary text-secondary text-[10px] sm:text-xs font-headline font-bold uppercase tracking-wider px-2.5 py-1 rounded border-2 border-secondary mb-2 shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                            KISAH KAMI
                        </span>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold font-headline text-secondary">
                            Tentang WaruMa
                        </h2>
                    </div>

                    <div class="space-y-3 text-xs sm:text-sm font-body text-slate-600 leading-relaxed">
                        <p>
                            <strong class="text-secondary font-semibold">WaruMa didirikan sejak tahun 2020</strong> sebagai warung kecil di sudut perumahan yang menjual berbagai kebutuhan pokok sehari-hari.
                        </p>
                        <p>
                            Seiring berjalannya waktu, WaruMa berkembang dan telah memiliki banyak pelanggan setia di lingkungan RT/RW sekitar. Karena itulah dibuat platform berbasis web ini — agar pelanggan bisa melihat daftar stok barang tanpa harus datang langsung ke warung, sekaligus membantu pengelola warung mencatat penjualan secara transparan dan terorganisir.
                        </p>
                    </div>

                    {{-- 2x2 Feature Highlights --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="bg-white border-2 border-secondary rounded-xl p-3 flex items-center gap-3 shadow-[3px_3px_0px_0px_rgba(35,35,35,1)]">
                            <div class="w-6 h-6 bg-primary border border-secondary rounded flex items-center justify-center text-secondary font-bold text-xs flex-shrink-0">
                                ✓
                            </div>
                            <span class="font-headline font-bold text-xs text-secondary">Cek harga & produk kapan saja</span>
                        </div>

                        <div class="bg-white border-2 border-secondary rounded-xl p-3 flex items-center gap-3 shadow-[3px_3px_0px_0px_rgba(35,35,35,1)]">
                            <div class="w-6 h-6 bg-primary border border-secondary rounded flex items-center justify-center text-secondary font-bold text-xs flex-shrink-0">
                                ✓
                            </div>
                            <span class="font-headline font-bold text-xs text-secondary">Cek stok tanpa harus ke warung</span>
                        </div>

                        <div class="bg-white border-2 border-secondary rounded-xl p-3 flex items-center gap-3 shadow-[3px_3px_0px_0px_rgba(35,35,35,1)]">
                            <div class="w-6 h-6 bg-primary border border-secondary rounded flex items-center justify-center text-secondary font-bold text-xs flex-shrink-0">
                                ✓
                            </div>
                            <span class="font-headline font-bold text-xs text-secondary">Bantu pemilik kelola penjualan</span>
                        </div>

                        <div class="bg-white border-2 border-secondary rounded-xl p-3 flex items-center gap-3 shadow-[3px_3px_0px_0px_rgba(35,35,35,1)]">
                            <div class="w-6 h-6 bg-primary border border-secondary rounded flex items-center justify-center text-secondary font-bold text-xs flex-shrink-0">
                                ✓
                            </div>
                            <span class="font-headline font-bold text-xs text-secondary">Akses ringan tanpa login/registrasi</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- SECTION: CALL TO ACTION (CTA) --}}
    <section class="bg-neutral-custom py-12 sm:py-16 border-b-2 border-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-primary border-2 border-secondary rounded-3xl p-6 sm:p-10 lg:p-12 shadow-[8px_8px_0px_0px_rgba(35,35,35,1)] relative overflow-hidden">
                <div class="max-w-3xl space-y-5 sm:space-y-6">
                    <div>
                        <span class="inline-block bg-white text-secondary text-[10px] sm:text-xs font-headline font-bold uppercase tracking-wider px-3 py-1 rounded-full border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                            BEBAS RIBET • SELALU UPDATE
                        </span>
                    </div>

                    {{-- HEADING & DESKRIPSI --}}
                    <div class="space-y-2 sm:space-y-3">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-headline text-secondary leading-tight">
                            Temukan Kebutuhanmu Sekarang di Waruma!
                        </h2>
                        <p class="text-xs sm:text-sm lg:text-base font-body text-slate-800 font-medium">
                            Jelajahi harga sembako terbaru hari ini dan pastikan stok tersedia sebelum keluar rumah.
                        </p>
                    </div>

                    {{-- TOMBOL CTA --}}
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4 pt-2">
                        <x-button tag="a" href="#produk" variant="dark" size="lg" class="w-full sm:w-auto inline-flex items-center justify-center gap-2">
                            <span>Cek Stok Produk Sekarang</span>
                            <span class="font-extrabold">&rarr;</span>
                        </x-button>

                        {{-- Tombol Hubungi Pengelola (Menggunakan img icon) --}}
                        <a href="https://wa.me/6281234567890" target="_blank"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-secondary font-headline font-bold text-sm px-6 py-3.5 rounded-xl border-2 border-secondary shadow-[3px_3px_0px_0px_rgba(35,35,35,1)] hover:bg-slate-100 transition-all">
                            <img src="{{ asset('assets/icons/telepon.svg') }}" alt="Telepon Icon" class="w-4 h-4 object-contain">
                            <span>Hubungi Pengelola</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION: KUNJUNGI WARUNG KAMI --}}
    <section id="kontak" class="bg-tertiary py-12 sm:py-16 border-b-2 border-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                {{-- Left Side: Address Details & Contact Buttons --}}
                <div class="lg:col-span-6 space-y-6">
                    <div>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold font-headline text-secondary">
                            Kunjungi Warung Kami
                        </h2>
                        <p class="text-xs sm:text-sm font-body text-slate-700 mt-2">
                            Sudah cek ketersediaan barang yang dicari di website? Datang langsung ke kios kami, kami siap melayani dengan ramah!
                        </p>
                    </div>

                    <div class="space-y-3">
                        {{-- Location Card --}}
                        <div class="bg-white border-2 border-secondary rounded-2xl p-4 flex items-start gap-3.5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)]">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('assets/icons/mapKuning.svg') }}" alt="Alamat" class="w-10 h-10 object-contain">
                            </div>
                            <div>
                                <h4 class="font-headline font-bold text-sm text-secondary">Alamat Warung</h4>
                                <p class="text-xs font-body text-slate-600 mt-0.5 leading-relaxed">
                                    Jl. Melati Raya No. 12, RT 03/RW 07, Sukamaju, Depok (Dekat Gang Masjid Al-Barokah)
                                </p>
                            </div>
                        </div>

                        {{-- Operational Hours Card --}}
                        <div class="bg-white border-2 border-secondary rounded-2xl p-4 flex items-start gap-3.5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)]">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('assets/icons/waktu.svg') }}" alt="Jam Operasional" class="w-10 h-10 object-contain">
                            </div>
                            <div>
                                <h4 class="font-headline font-bold text-sm text-secondary">Jam Operasional</h4>
                                <p class="text-xs font-body text-slate-600 mt-0.5">
                                    Buka Setiap Hari: 07.00 – 21.00 WIB (Tetap buka saat tanggal merah)
                                </p>
                            </div>
                        </div>

                        {{-- Contact Card --}}
                        <div class="bg-white border-2 border-secondary rounded-2xl p-4 flex items-start gap-3.5 shadow-[4px_4px_0px_0px_rgba(35,35,35,1)]">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('assets/icons/pesanKuning.svg') }}" alt="Kontak" class="w-10 h-10 object-contain">
                            </div>
                            <div>
                                <h4 class="font-headline font-bold text-sm text-secondary">Kontak & Titip Pesan</h4>
                                <p class="text-xs font-body text-slate-600 mt-0.5">
                                    0812-3456-7890 (WhatsApp Bu Ani / Karyawan Kios)
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- CTA Buttons --}}
                    <div class="flex flex-wrap items-center gap-3 pt-1">
                        <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center gap-2 bg-secondary text-white font-headline font-bold text-xs sm:text-sm px-5 py-3 rounded-xl border-2 border-secondary shadow-[3px_3px_0px_0px_rgba(35,35,35,1)] hover:bg-slate-800 transition-all">
                            <img src="{{ asset('assets/icons/pesan.svg') }}" alt="Google Maps Icon" class="w-4 h-4 sm:w-5 sm:h-5 object-contain">Chat via WhatsApp
                        </a>
                        <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-2 bg-white text-secondary font-headline font-bold text-xs sm:text-sm px-5 py-3 rounded-xl border-2 border-secondary shadow-[3px_3px_0px_0px_rgba(35,35,35,1)] hover:bg-slate-100 transition-all">
                            <img src="{{ asset('assets/icons/map.svg') }}" alt="Google Maps Icon" class="w-4 h-4 sm:w-5 sm:h-5 object-contain">Petunjuk Google Maps
                        </a>
                    </div>
                </div>

                {{-- Right Side: Map Display Mockup --}}
                <div class="lg:col-span-6 flex justify-center">
                    <div class="w-full bg-white border-2 border-secondary rounded-2xl p-4 shadow-[8px_8px_0px_0px_rgba(35,35,35,1)]">
                        <div class="flex items-center justify-between border-b-2 border-secondary pb-3 mb-3">
                            <div class="flex items-center gap-1.5">
                                <span class="w-3 h-3 bg-red-400 rounded-full border border-secondary"></span>
                                <span class="w-3 h-3 bg-amber-400 rounded-full border border-secondary"></span>
                                <span class="w-3 h-3 bg-emerald-400 rounded-full border border-secondary"></span>
                            </div>
                            <span class="text-[10px] font-headline font-bold text-secondary tracking-wider uppercase">PETA WILAYAH KIOS WARUMA</span>
                        </div>

                        <div class="relative border-2 border-secondary rounded-xl overflow-hidden bg-slate-100 h-64 sm:h-72">
                            <iframe
                                class="w-full h-full border-0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.1328905844445!2d106.84000000000002!3d-6.377800000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMjInNDAuMSJTIDEwNsKwNTAnMjQuMCJF!5e0!3m2!1sid!2sid!4v1600000000000!5m2!1sid!2sid"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                        <div class="flex items-center justify-between pt-3 text-[10px] font-label font-bold text-slate-500 px-1">
                            <span>Akses motor & mobil nyaman</span>
                            <span>Parkir depan kios luas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest>
