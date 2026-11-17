<div class="font-body">

  <!-- MAIN CONTAINER DASHBOARD KASIR -->
  <main class="flex-1 min-w-0 p-3 sm:p-5 md:p-6 space-y-5">

    <!-- HERO BANNER / HEADER DASHBOARD -->
    <section class="kartu p-5 sm:p-8 bg-primary">
      <div class="flex flex-wrap gap-2 mb-3 sm:mb-4">
        <span class="inline-flex items-center gap-1.5 rounded-lg bg-white/90 border-2 border-secondary px-2.5 py-1 text-[10px] font-black uppercase shadow-[1.5px_1.5px_0px_#232323] font-headline">
          <span class="w-2 h-2 rounded-full bg-green-600"></span> WARUNG BUKA
        </span>
        <span class="inline-flex items-center gap-1.5 rounded-lg bg-white/90 border-2 border-secondary px-2.5 py-1 text-[10px] font-black uppercase shadow-[1.5px_1.5px_0px_#232323] font-headline">
          <img src="{{ asset('assets/icons/catatanCeklist.svg') }}" alt="Kasir" class="w-3.5 h-3.5 object-contain shrink-0">
          <span>{{ $totalProduk }}</span> PRODUK TERSEDIA
        </span>
      </div>

      <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 sm:gap-6">
        <div>
          <h1 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight text-secondary font-headline leading-tight">
            Selamat Datang,<br />Ibu Ani! 👋
          </h1>
          <p class="mt-2 text-xs sm:text-sm text-secondary/80 font-semibold max-w-sm">
            Pencatatan kasir WaruMa siap digunakan. Penjualan hari ini bergerak sehat dengan margin rata-rata
            <strong class="font-black text-secondary">{{ $summary['avgMargin'] }}%</strong>.
          </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-2.5 sm:gap-3">
          <a href="{{ route('transaksi.index') }}" class="px-4 py-2.5 bg-white text-secondary border-2 border-secondary rounded-xl font-black text-xs sm:text-sm btn-brutal inline-flex items-center justify-center gap-2 shadow-[2px_2px_0px_#232323] font-headline">
            + Transaksi Baru
          </a>
          <a href="{{ route('barang.index') }}" class="px-4 py-2.5 bg-secondary text-white border-2 border-secondary rounded-xl font-black text-xs sm:text-sm btn-brutal inline-flex items-center justify-center gap-2 shadow-[2px_2px_0px_#232323] font-headline">
            + Tambah Barang
          </a>
        </div>
      </div>
    </section>

    <!-- RINGKASAN METRIK DASHBOARD (4 METRIK CARD) -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">

      <!-- CARD 1: OMZET -->
      <div class="kartu p-4 flex flex-col justify-between min-h-[135px] hover:-translate-y-0.5 transition-transform">
        <div>
          <div class="flex items-center justify-between gap-1 mb-1.5">
            <span class="text-[10px] font-black uppercase tracking-wider text-gray-500 font-headline">TOTAL OMZET HARI INI</span>
            <span class="p-1.5 bg-gray-100 border-2 border-secondary rounded-lg shadow-[1.5px_1.5px_0px_#232323]">
              <img src="{{ asset('assets/icons/kertas.svg') }}" alt="Omzet" class="w-3.5 h-3.5 object-contain" />
            </span>
          </div>
          <p class="text-xl xl:text-2xl font-black text-secondary leading-tight flex items-baseline gap-1 truncate whitespace-nowrap">
            <span class="text-xs xl:text-sm font-extrabold text-gray-400">Rp</span>{{ number_format($summary['omzet'], 0, ',', '.') }}
          </p>
        </div>
        <div class="pt-2 border-t border-gray-200 flex items-center gap-1.5 text-[10px] text-gray-600 font-extrabold">
          <span class="w-2 h-2 rounded-full bg-green-600"></span>
          <span><strong class="text-secondary font-black">{{ $summary['totalStruk'] }}</strong> Struk Berhasil</span>
        </div>
      </div>

      <!-- CARD 2: LABA / RUGI BERSIH -->
      @php
        $labaBersihDash = $summary['labaBersih'];
        $isDashRugi     = $labaBersihDash < 0;
      @endphp
      <div class="kartu p-4 flex flex-col justify-between min-h-[135px] hover:-translate-y-0.5 transition-all {{ $isDashRugi ? 'bg-[#CE1126] text-white' : 'bg-emerald-50/30' }}">
        <div>
          <div class="flex items-center justify-between gap-1 mb-1.5">
            <span class="text-[10px] font-black uppercase tracking-wider {{ $isDashRugi ? 'text-white/90' : 'text-gray-500' }} font-headline">
              {{ $isDashRugi ? 'LABA BERSIH HARI INI' : 'LABA BERSIH HARI INI' }}
            </span>

            @if($isDashRugi)
              <span class="px-2 py-0.5 rounded-md bg-white text-[#CE1126] border-2 border-secondary text-[9px] font-black uppercase shadow-[1.5px_1.5px_0px_#232323] font-headline">
                RUGI
              </span>
            @else
              <span class="p-1.5 bg-green-100 border-2 border-secondary rounded-lg shadow-[1.5px_1.5px_0px_#232323]">
                <img src="{{ asset('assets/icons/grafikNaikPenelusuran.svg') }}" alt="Laba Bersih" class="w-3.5 h-3.5 object-contain" />
              </span>
            @endif
          </div>

          <p class="text-xl xl:text-2xl font-black {{ $isDashRugi ? 'text-white' : 'text-green-700' }} leading-tight flex items-baseline gap-1 truncate whitespace-nowrap">
            @if($isDashRugi)
              <span class="text-base xl:text-lg font-black">-</span>
            @endif
            <span class="text-xs xl:text-sm font-extrabold {{ $isDashRugi ? 'text-white/90' : 'text-green-600' }}">Rp</span>{{ number_format(abs($labaBersihDash), 0, ',', '.') }}
          </p>
        </div>

        <div class="pt-2 border-t {{ $isDashRugi ? 'border-white/25 text-white/90' : 'border-emerald-100 text-gray-600' }} flex items-center justify-between text-[10px] font-extrabold">
          <span>HPP Modal: <strong class="{{ $isDashRugi ? 'text-white' : 'text-secondary' }}">Rp {{ number_format($summary['hpp'], 0, ',', '.') }}</strong></span>
          @if($isDashRugi)
            <span class="bg-white text-secondary px-1.5 py-0.5 rounded border border-secondary text-[9px] font-black">Minus</span>
          @endif
        </div>
      </div>

      <!-- CARD 3: KATALOG PRODUK -->
      <div class="kartu p-4 flex flex-col justify-between min-h-[135px] hover:-translate-y-0.5 transition-transform">
        <div>
          <div class="flex items-center justify-between gap-1 mb-1.5">
            <span class="text-[10px] font-black uppercase tracking-wider text-gray-500 font-headline">KATALOG PRODUK</span>
            <span class="p-1.5 bg-amber-50 border-2 border-secondary rounded-lg shadow-[1.5px_1.5px_0px_#232323]">
              <img src="{{ asset('assets/icons/katalogProduk.svg') }}" alt="Katalog" class="w-3.5 h-3.5 object-contain">
            </span>
          </div>
          <p class="text-xl xl:text-2xl font-black text-secondary leading-tight truncate whitespace-nowrap">
            {{ $totalProduk }} <span class="text-xs xl:text-sm font-extrabold text-gray-500">Produk</span>
          </p>
        </div>
        <div class="pt-2 border-t border-gray-200 flex items-center justify-between text-[10px] text-gray-600 font-extrabold">
          <span>Terbagi dalam <strong class="text-secondary font-black">{{ $totalKategori }}</strong> Kategori</span>
        </div>
      </div>

      <!-- CARD 4: PERLU RESTOCK -->
      <div class="kartu p-4 flex flex-col justify-between min-h-[135px] hover:-translate-y-0.5 transition-transform bg-red-50/40 border-red-500">
        <div>
          <div class="flex items-center justify-between gap-1 mb-1.5">
            <span class="text-[10px] font-black uppercase tracking-wider text-red-600 font-headline">PERLU RESTOCK</span>
            <span class="px-1.5 py-0.5 rounded-md bg-red-100 text-red-700 border border-red-300 text-[9px] font-black uppercase inline-flex items-center gap-1 font-headline">
              <img src="{{ asset('assets/icons/loncengMerah.svg') }}" alt="Kritis" class="w-3 h-3 object-contain"> KRITIS
            </span>
          </div>
          <p class="text-xl xl:text-2xl font-black text-red-600 leading-tight truncate whitespace-nowrap">
            {{ $barangKritis->count() }} <span class="text-xs xl:text-sm font-extrabold text-red-500">Barang</span>
          </p>
        </div>
        <div class="pt-2 border-t border-red-200 flex items-center justify-between text-[10px] text-red-600 font-extrabold">
          <span>Mencapai / di bawah limit aman</span>
        </div>
      </div>

    </section>

    <!-- PERINGATAN RESTOCK (HANYA STOK MENIPIS) -->
    @if($barangKritis->count() > 0)
      <section class="kartu p-4 sm:p-5 bg-amber-50 space-y-3">
        <!-- ALERT SUCCESS NOTIFIKASI -->
        <x-alert />
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
          <div class="flex items-center gap-3">
            <span class="p-2 bg-primary border-2 border-secondary rounded-xl shadow-[2px_2px_0px_#232323] shrink-0">
              <img src="{{ asset('assets/icons/lonceng.svg') }}" alt="Peringatan" class="w-4 h-4 object-contain">
            </span>
            <div>
              <h3 class="font-black text-xs sm:text-sm uppercase text-secondary font-headline">PERINGATAN STOK MENIPIS (RESTOCK ALERT)</h3>
              <p class="text-xs text-gray-600 font-semibold mt-0.5">
                Terdapat <strong class="text-red-600 font-black">{{ $barangKritis->count() }} produk</strong> yang sudah mendekati batas stok minimum!
              </p>
            </div>
          </div>
          <a href="{{ route('barang.index') }}" class="text-xs font-black uppercase text-secondary underline hover:text-black font-headline whitespace-nowrap">
            Buka Kelola Stok Lengkap →
          </a>
        </div>

        <hr class="border-t-2 border-secondary/20" />

        <!-- GRID PRODUK KRITIS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
          @foreach($barangKritis as $p)
            <div class="p-3 border-2 border-secondary rounded-xl bg-white flex items-center gap-3 shadow-[2px_2px_0px_#232323]">
              <div class="w-12 h-12 border-2 border-secondary rounded-xl bg-white p-0.5 overflow-hidden shrink-0 shadow-[1px_1px_0px_#232323]">
                <img src="{{ $p->foto ? asset('storage/' . $p->foto) : asset('assets/barang/beras.jpe') }}" alt="{{ $p->nama_barang }}" class="w-full h-full object-contain rounded-lg" />
              </div>

              <div class="overflow-hidden min-w-0 flex-1">
                <span class="text-[9px] font-black uppercase text-gray-400 tracking-wider font-headline block truncate">
                  {{ $p->kategori->nama_kategori ?? 'SEMBAKO' }}
                </span>
                <h4 class="text-xs font-extrabold text-secondary truncate font-headline">{{ $p->nama_barang }}</h4>
                <p class="text-[10px] text-gray-500 font-bold mt-0.5">
                  Sisa: <span class="text-red-600 font-black">{{ $p->stok }} {{ $p->satuan->nama_satuan ?? 'pcs' }}</span> (Min: {{ $p->min_stok }})
                </p>
              </div>

              <button wire:click="openRestockModal({{ $p->id }})" class="px-2.5 py-1.5 bg-primary border-2 border-secondary rounded-lg text-[10px] font-black text-secondary shadow-[1.5px_1.5px_0px_#232323] hover:translate-x-[-1px] hover:translate-y-[-1px] transition-all cursor-pointer font-headline shrink-0 flex items-center gap-1.5">
                <img src="{{ asset('assets/icons/keranjang.svg') }}" alt="Restock" class="w-3.5 h-3.5 object-contain" />
                <span>Restock</span>
              </button>
            </div>
          @endforeach
        </div>
      </section>
    @endif

    <!-- GRID DUA KOLOM SEIMBANG (50% : 50%) -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-5 items-stretch">

      <!-- KOLOM KIRI: TRANSAKSI TERAKHIR HARI INI -->
      <div class="kartu p-4 sm:p-5 flex flex-col justify-between gap-4">
        <div class="space-y-3.5">
          <div class="flex items-center justify-between gap-2 border-b-2 border-secondary pb-3">
            <div class="flex items-center gap-2">
              <img src="{{ asset('assets/icons/catatanCoklat.svg') }}" alt="Transaksi Terakhir" class="w-4 h-4 object-contain" />
              <h3 class="font-extrabold text-xs sm:text-sm uppercase text-secondary font-headline">TRANSAKSI TERAKHIR HARI INI</h3>
            </div>
            <span class="px-2.5 py-0.5 bg-gray-100 border border-secondary/30 rounded-lg text-[10px] font-black text-secondary font-headline">
              {{ $summary['totalStruk'] }} Struk
            </span>
          </div>

          <!-- LIST TRANSAKSI HARI INI -->
          <div class="space-y-3">
            @forelse($transaksiHariIni as $index => $trx)
              @php
                $nomorUrutHariIni = $transaksiHariIni->firstItem() + $index;
              @endphp
              <div class="p-3.5 border-2 border-secondary rounded-xl bg-white flex items-center justify-between gap-3 shadow-[2px_2px_0px_#232323] hover:bg-gray-50/70 transition-colors">
                <div class="flex items-center gap-3 overflow-hidden min-w-0">
                  <span class="w-8 h-8 bg-primary border-2 border-secondary rounded-lg text-xs font-black text-secondary flex items-center justify-center font-headline shrink-0">
                    #{{ $nomorUrutHariIni }}
                  </span>

                  <div class="overflow-hidden min-w-0">
                    <div class="flex items-center gap-1.5">
                      <h4 class="text-xs sm:text-sm font-black text-secondary font-headline truncate">
                        {{ $trx->kode_transaksi }}
                      </h4>
                      <span class="text-[10px] text-gray-400 font-semibold shrink-0">
                        • {{ \Carbon\Carbon::parse($trx->tanggal_transaksi)->format('H:i') }}
                      </span>
                    </div>
                    <p class="text-[11px] font-medium text-gray-500 truncate mt-0.5">
                      @foreach($trx->detailTransaksi as $dt)
                        {{ $dt->jumlah }}x {{ $dt->barang->nama_barang ?? 'Barang' }}@if(!$loop->last), @endif
                      @endforeach
                    </p>
                  </div>
                </div>

                <div class="text-right shrink-0 pl-2">
                  <span class="text-xs sm:text-sm font-black text-secondary font-headline">
                    Rp {{ number_format($trx->total_harga, 0, ',', '.') }}
                  </span>
                </div>
              </div>
            @empty
              <div class="p-8 text-center text-xs font-bold text-gray-400 border-2 border-dashed border-gray-300 rounded-xl">
                Belum ada transaksi berhasil tercatat hari ini.
              </div>
            @endforelse
          </div>
        </div>

        <!-- PAGINASI NEO-BRUTALIST -->
        <div class="pt-3 border-t border-gray-200">
          {{ $transaksiHariIni->links('components.pagination') }}
        </div>
      </div>

      <!-- KOLOM KANAN: PRODUK TERLARIS HARI INI (TOP 3) -->
      <div class="kartu p-4 sm:p-5 flex flex-col justify-between gap-4">
        <div class="space-y-3.5">
          <div class="flex items-center justify-between gap-2 border-b-2 border-secondary pb-3">
            <div class="flex items-center gap-2">
              <h3 class="font-extrabold text-xs sm:text-sm uppercase text-secondary font-headline">
                PRODUK TERLARIS HARI INI
              </h3>
            </div>
            <span class="px-2.5 py-0.5 bg-primary border-2 border-secondary rounded-lg text-[10px] font-black uppercase text-secondary shadow-[1.5px_1.5px_0px_#232323] font-headline">
              TOP 3
            </span>
          </div>

          <!-- LIST TOP 3 PRODUK (LEBIH LEGA & BERSIH) -->
          <div class="space-y-3">
            @forelse($produkTerlaris as $idx => $item)
              @php
                $rank = $idx + 1;
                $isFirst = $rank === 1;
                $rankBadge = $isFirst
                    ? 'bg-primary text-secondary'
                    : ($rank === 2 ? 'bg-gray-200 text-secondary' : 'bg-amber-100 text-secondary');
              @endphp
              <div class="p-3.5 border-2 border-secondary rounded-xl {{ $isFirst ? 'bg-amber-50/60' : 'bg-white' }} flex items-center justify-between gap-3.5 shadow-[2px_2px_0px_#232323] hover:bg-amber-50/40 transition-colors">
                <div class="flex items-center gap-3.5 overflow-hidden min-w-0">

                  <!-- FOTO PRODUK DENGAN NOMOR URUT RAPI DI SUDUT DALAM -->
                  <div class="relative w-12 h-12 border-2 border-secondary rounded-xl bg-white p-1 shrink-0 overflow-hidden">
                    <span class="absolute top-0 left-0 px-1.5 py-0.2 {{ $rankBadge }} border-r-2 border-b-2 border-secondary rounded-br-md text-[9px] font-black font-headline leading-tight">
                      #{{ $rank }}
                    </span>
                    <img
                      src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('assets/barang/beras.jpe') }}"
                      alt="{{ $item->nama_barang }}"
                      class="w-full h-full object-contain"
                    />
                  </div>

                  <!-- NAMA PRODUK & KATEGORI -->
                  <div class="overflow-hidden min-w-0">
                    <h4 class="text-xs sm:text-sm font-black text-secondary truncate font-headline">
                      {{ $item->nama_barang }}
                    </h4>
                    <p class="text-[11px] font-semibold text-gray-500 truncate mt-0.5">
                      {{ $item->nama_kategori ?? 'Umum' }}
                    </p>
                  </div>
                </div>

                <!-- QTY TERJUAL & KONTRIBUSI OMZET -->
                <div class="text-right shrink-0 pl-2">
                  <span class="inline-block px-2.5 py-0.5 bg-emerald-100 text-emerald-800 border border-emerald-400 rounded-lg text-xs font-black font-headline whitespace-nowrap">
                    {{ $item->total_terjual }} {{ strtolower($item->nama_satuan ?? 'pcs') }}
                  </span>
                  <p class="text-[10px] font-bold text-gray-500 mt-1 whitespace-nowrap">
                    Rp {{ number_format($item->total_kontribusi, 0, ',', '.') }}
                  </p>
                </div>
              </div>
            @empty
              <div class="p-8 text-center text-xs font-bold text-gray-400 border-2 border-dashed border-gray-300 rounded-xl">
                Belum ada produk terjual hari ini.
              </div>
            @endforelse
          </div>
        </div>

        <!-- FOOTER INFO RINGKAS AGAR TINGGI SEIMBANG DENGAN KOLOM KIRI -->
        <div class="pt-3 border-t border-gray-200 flex items-center justify-between text-[11px] font-semibold text-gray-500">
          <span>Berdasarkan jumlah unit terjual hari ini</span>
          <a href="{{ route('laporan.laba.rugi') }}" class="font-black text-secondary hover:underline font-headline">
            Lihat Laporan →
          </a>
        </div>
      </div>

    </section>

  </main>

  <!-- MODAL RESTOCK DENGAN RESET VALIDASI HARIAN -->
  <div class="fixed inset-0 z-50 {{ $showModalRestock ? 'flex' : 'hidden' }} items-center justify-center bg-black/45 p-4 font-body">
      <div class="border-2.5 border-secondary rounded-2xl bg-white shadow-[5px_5px_0px_#232323] max-w-[95vw] w-[400px] overflow-hidden animate-in fade-in zoom-in-95 duration-150">
          <form wire:submit.prevent="submitRestock" class="p-4 sm:p-5 space-y-3">
              <h3 class="font-bold text-base font-headline">Restock {{ $restockNama }}</h3>
              <p class="text-xs text-secondary/70 font-medium">Masukkan jumlah stok yang akan ditambahkan:</p>

              <div>
                  <input
                      wire:model="jumlahRestock"
                      type="number"
                      min="1"
                      placeholder="Masukkan jumlah stok..."
                      class="w-full border-2 @error('jumlahRestock') border-red-600 text-red-600 @else border-secondary text-secondary @enderror rounded-lg px-3 py-2 text-xs font-semibold bg-white focus:outline-none focus:ring-2 focus:ring-primary shadow-[2px_2px_0px_#232323]"
                  />
                  @error('jumlahRestock')
                      <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                  @enderror
              </div>

              <div class="flex justify-end gap-2 pt-2">
                  <button type="button" wire:click="closeRestockModal" class="border-2 border-secondary bg-white px-3.5 py-1.5 rounded-lg text-xs font-semibold shadow-[2px_2px_0px_#232323] cursor-pointer hover:bg-gray-100">Batal</button>
                  <button type="submit" class="border-2 border-secondary bg-primary rounded-lg px-3.5 py-1.5 text-xs font-bold shadow-[2px_2px_0px_#232323] cursor-pointer hover:bg-amber-400">Tambah stok</button>
              </div>
          </form>
      </div>
  </div>
</div>
