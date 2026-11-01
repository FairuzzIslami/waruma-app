<div class="bg-[#faf9f6] text-[#1a1a1a] antialiased min-h-screen flex flex-col font-sans">

  <!-- HERO SECTION -->
  <section class="relative overflow-hidden bg-[#f3f1ee] py-7 border-b-2 border-hitam">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 relative z-10">

      <div class="flex items-center justify-between gap-3 mb-6">
        <div class="flex items-center gap-2.5 font-poppins font-bold text-sm sm:text-base">
          <div class="w-8 h-8 shrink-0 flex items-center justify-center">
            <img src="{{ asset('assets/images/logoWaruma.svg') }}" alt="Logo WARUMA" class="w-full h-full object-contain" />
          </div>
          <span>WARUMA © 2026</span>
        </div>
        <small class="hidden sm:inline-block text-xs text-gray-500 font-medium">
          Sistem Kasir &amp; Inventaris Waruma
        </small>
      </div>

      <span class="inline-block px-3 py-1 bg-white border-2 border-hitam rounded-full text-[10px] font-poppins font-bold uppercase tracking-wider mb-3">
        Toko buka sekarang • 07.00 - 21.00 WIB
      </span>

      <h1 class="max-w-2xl text-2xl sm:text-4xl md:text-5xl font-poppins font-extrabold leading-tight mb-3">
        Cek Ketersediaan Stok &amp; Harga WaruMa Sebelum Datang
      </h1>
      <p class="max-w-xl text-gray-700 text-sm sm:text-base mb-5 leading-relaxed">
        Pantau stok kebutuhan sehari-hari Anda secara real-time dari rumah. Belanja ke warung Ibu Ani jadi tenang tanpa takut kehabisan barang.
      </p>

      <div class="inline-flex flex-wrap items-center gap-3 sm:gap-5 px-3.5 py-2 bg-white border-2 border-hitam rounded-xl shadow-[3px_3px_0px_#1a1a1a] text-xs font-semibold">
        <span class="flex items-center gap-1.5">
          <img src="{{ asset('assets/icons/mapCoklat.svg') }}" alt="Lokasi" class="w-4 h-4 object-contain shrink-0" />
          Jl. Melati No. 12 (Dekat Gang Masjid)
        </span>
        <span class="flex items-center gap-1.5">
          <img src="{{ asset('assets/icons/pesanHijau.svg') }}" alt="WhatsApp" class="w-4 h-4 object-contain shrink-0" />
          WhatsApp: 0812-3456-7890
        </span>
      </div>

    </div>
  </section>

  <!-- STICKY SEARCH & CHIP FILTER KATEGORI -->
  <div class="sticky top-0 z-30 py-3.5 bg-[#faf9f6] border-b-2 border-hitam">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 space-y-3">

      <!-- INPUT SEARCH -->
      <div class="relative flex items-center bg-white border-3 border-hitam rounded-xl px-3.5 shadow-[4px_4px_0px_#1a1a1a]">
        <img src="{{ asset('assets/icons/search.svg') }}" alt="Cari" class="w-4 h-4 mr-2.5 object-contain shrink-0" />
        <input
          wire:model.live.debounce.300ms="search"
          type="search"
          placeholder="Cari barang kebutuhan Anda (contoh: Beras, Minyak, Indomie, Sabun)..."
          class="w-full py-3 pr-8 text-xs sm:text-sm font-semibold bg-transparent border-none outline-none text-hitam placeholder-gray-400 [&::-webkit-search-cancel-button]:hidden"
        />

        @if(!empty($search))
          <button wire:click="clearSearch" aria-label="Hapus pencarian" class="absolute right-3 p-1 hover:bg-gray-100 rounded-md transition-all cursor-pointer">
            <img src="{{ asset('assets/icons/icon-close.svg') }}" alt="Hapus" class="w-3.5 h-3.5 object-contain" />
          </button>
        @endif
      </div>

      <!-- CHIP SCROLL KATEGORI -->
      <div class="flex items-center gap-2">
        <div id="chips" class="chip-scroll flex-1 flex items-center gap-2 overflow-x-auto py-1">

          <!-- TOMBOL SEMUA KATEGORI -->
          <button
            wire:click="setKategori('semua')"
            class="chip shrink-0 border-2 border-hitam rounded-full px-3 py-1 text-xs font-poppins font-semibold cursor-pointer flex items-center gap-2 transition-all {{ $kategoriAktif === 'semua' ? 'bg-kuning shadow-[2px_2px_0px_#1a1a1a] font-bold' : 'bg-white' }}">
            <span>Semua Produk</span>
            <i class="not-italic text-gray-500 font-bold text-[10px]">{{ $totalSemuaBarang }}</i>
          </button>

          <!-- LIST DARI DATABASE -->
          @foreach($kategoris as $cat)
            <button
              wire:click="setKategori({{ $cat->id }})"
              class="chip shrink-0 border-2 border-hitam rounded-full px-3 py-1 text-xs font-poppins font-semibold cursor-pointer flex items-center gap-2 transition-all {{ $kategoriAktif == $cat->id ? 'bg-kuning shadow-[2px_2px_0px_#1a1a1a] font-bold' : 'bg-white' }}">
              <span>{{ $cat->nama_kategori }}</span>
              <i class="not-italic text-gray-500 font-bold text-[10px]">{{ $cat->barang_count }}</i>
            </button>
          @endforeach

        </div>

        <div class="flex gap-1.5 shrink-0 ml-auto sm:ml-0">
          <button onclick="document.getElementById('chips').scrollBy({ left: -200, behavior: 'smooth' })" aria-label="Geser kiri" class="w-7 h-7 border-2 border-hitam rounded-lg bg-white text-xs font-bold btn-brutal flex items-center justify-center cursor-pointer">←</button>
          <button onclick="document.getElementById('chips').scrollBy({ left: 200, behavior: 'smooth' })" aria-label="Geser kanan" class="w-7 h-7 border-2 border-hitam rounded-lg bg-kuning text-xs font-bold btn-brutal flex items-center justify-center cursor-pointer">→</button>
        </div>
      </div>

    </div>
  </div>

  <!-- KATALOG GRID PRODUK -->
  <main class="max-w-5xl mx-auto px-4 sm:px-6 py-6 flex-1 w-full">

    <div class="flex items-center justify-between mb-5">
      <h2 class="font-poppins font-bold text-xs sm:text-sm uppercase tracking-wider">
        Katalog Produk Tersedia
      </h2>
    </div>

    <!-- GRID KATALOG BARANG -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3.5 sm:gap-4 pb-6">

      @forelse($barangs as $item)
        <article class="card kartu relative flex flex-col overflow-hidden">
          <span class="absolute top-2 left-2 border-2 border-hitam rounded px-1.5 py-0.5 bg-white text-[9px] font-poppins font-bold uppercase z-10 shadow-[1px_1px_0px_#1a1a1a]">
            {{ $item->kategori->nama_kategori ?? 'Umum' }}
          </span>

          <div class="w-full aspect-square bg-gray-100 border-b-2 border-hitam overflow-hidden">
            <img
              src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('assets/barang/beras.jpe') }}"
              alt="{{ $item->nama_barang }}"
              class="w-full h-full object-contain"
            />
          </div>

          <div class="p-3 flex-1 flex flex-col justify-between space-y-2">
            <div>
              <h3 class="font-poppins font-bold text-xs sm:text-sm text-hitam leading-snug truncate">{{ $item->nama_barang }}</h3>
              <p class="font-poppins font-extrabold text-sm sm:text-base text-cokelat mt-0.5">
                Rp {{ number_format($item->harga_jual, 0, ',', '.') }}<span class="font-sans font-normal text-xs text-gray-500"> / {{ $item->satuan->nama_satuan ?? 'pcs' }}</span>
              </p>
            </div>

            <div class="stok flex items-center justify-between pt-1 border-t border-gray-100 text-[11px] font-bold">
              @if($item->stok > $item->min_stok)
                <span class="border-2 border-hitam rounded-full bg-white px-2.5 py-0.5 text-hijau inline-flex items-center gap-1">
                   Stok: {{ $item->stok }}
                </span>
              @elseif($item->stok > 0)
                <span class="border-2 border-oranye rounded-full bg-[#fdefcf] px-2.5 py-0.5 text-oranye inline-flex items-center gap-1">
                    Sisa {{ $item->stok }}
                </span>
              @else
                <span class="border-2 border-merah rounded-full bg-red-50 px-2.5 py-0.5 text-merah inline-flex items-center gap-1">
                    Stok Habis
                </span>
              @endif
            </div>
          </div>
        </article>
      @empty
        <div class="col-span-full py-12 text-center text-gray-500 font-poppins font-medium text-sm border-2 border-dashed border-gray-300 rounded-2xl">
          Barang tidak ditemukan. Coba kata kunci lain.
        </div>
      @endforelse

    </div>

    <!-- PAGINASI -->
    <div class="pt-3 pb-8">
      @if(view()->exists('components.pagination'))
          {{ $barangs->links('components.pagination') }}
      @else
          {{ $barangs->links() }}
      @endif
    </div>

  </main>

  <!-- CTA FOOTER (TITIP BARANG VIA WHATSAPP & MAPS) -->
  <section class="bg-kuning py-12 border-t-2 border-hitam mt-auto">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
      <div class="neo-box p-6 sm:p-8 flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="space-y-2 max-w-xl">
          <h2 class="font-poppins font-extrabold text-xl sm:text-2xl text-hitam pt-1">
            Mau Titip Pisahkan Barang Dulu?
          </h2>
          <p class="text-xs sm:text-sm text-gray-700 leading-relaxed">
            Takut kehabisan saat jalan ke warung? Kirim pesan ke Bu Ani via WhatsApp, kami siapkan keranjang belanjaan Anda di meja kasir.
          </p>
          <p class="text-[11px] font-bold text-oranye pt-1 flex items-center gap-1.5">
            <img src="{{ asset('assets/icons/waktuCoklat.svg') }}" alt="Waktu" class="w-3.5 h-3.5 object-contain shrink-0" />
            <span>Harga dan ketersediaan stok diperbarui secara otomatis setiap ada transaksi di kasir.</span>
          </p>
        </div>

        <div class="flex flex-col gap-3 w-full sm:w-auto shrink-0 min-w-[240px]">
          <a href="https://wa.me/6281234567890" target="_blank" class="px-5 py-3 bg-emerald-600 text-white border-2.5 border-[#1a1a1a] rounded-xl shadow-[3px_3px_0px_#1a1a1a] text-xs font-poppins font-black flex items-center justify-center gap-2.5 btn-brutal hover:bg-emerald-700">
            <img src="{{ asset('assets/icons/pesanHijau.svg') }}" alt="WhatsApp" class="w-4 h-4 object-contain shrink-0 brightness-0 invert" />
            Hubungi Ibu Ani di WhatsApp
          </a>
          <a href="https://maps.google.com/?q=Jl.+Melati+No.+12" target="_blank" class="px-5 py-3 bg-white text-[#1a1a1a] border-2.5 border-[#1a1a1a] rounded-xl shadow-[3px_3px_0px_#1a1a1a] text-xs font-poppins font-black flex items-center justify-center gap-2.5 btn-brutal hover:bg-gray-100">
            <img src="{{ asset('assets/icons/mapCoklat.svg') }}" alt="Google Maps" class="w-4 h-4 object-contain shrink-0" />
            Petunjuk Arah Google Maps
          </a>
        </div>
      </div>
    </div>
  </section>

</div>
