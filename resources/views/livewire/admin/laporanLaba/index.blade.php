<div class="font-body">
    <!-- MODAL POPUP OPERASIONAL TERPISAH -->
    @include('livewire.admin.laporanLaba.modal-operasional')

    <!-- MAIN CONTAINER LAPORAN FINANSIAL -->
    <main class="flex-1 min-w-0 p-3 sm:p-5 md:p-6 space-y-4 sm:space-y-5">

      <!-- JUDUL HALAMAN -->
      <header class="kartu p-4 sm:p-5">
        <p class="text-[10px] sm:text-xs font-extrabold text-gray-500 tracking-wider uppercase font-headline">WARUNG IBU ANI / LAPORAN FINANSIAL UC-005</p>
        <h1 class="text-xl sm:text-2xl md:text-3xl font-black tracking-tight mt-0.5 text-secondary font-headline">LABA RUGI & HPP PENJUALAN</h1>
        <p class="text-xs sm:text-sm text-gray-600 mt-1 font-semibold">Pantau margin keuntungan bersih, biaya operasional toko, dan omzet harian secara otomatis.</p>
      </header>

      <!-- FILTER PERIODE LAPORAN & CUSTOM TANGGAL -->
      <section class="kartu p-3 sm:p-4 space-y-3">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-3">

          <!-- Periode Cepat -->
          <div id="filter-btns" class="flex flex-wrap gap-1.5 sm:gap-2 text-xs font-bold">
            <button wire:click="setPeriode('hari_ini')" class="px-3 py-2 border-2 border-secondary rounded-xl {{ $periode === 'hari_ini' ? 'bg-primary shadow-[2px_2px_0px_#232323]' : 'bg-gray-100' }} btn-brutal cursor-pointer font-headline">Hari Ini</button>
            <button wire:click="setPeriode('minggu_ini')" class="px-3 py-2 border-2 border-secondary rounded-xl {{ $periode === 'minggu_ini' ? 'bg-primary shadow-[2px_2px_0px_#232323]' : 'bg-gray-100' }} btn-brutal cursor-pointer font-headline">Minggu Ini</button>
            <button wire:click="setPeriode('bulan_ini')" class="px-3 py-2 border-2 border-secondary rounded-xl {{ $periode === 'bulan_ini' ? 'bg-primary shadow-[2px_2px_0px_#232323]' : 'bg-gray-100' }} btn-brutal cursor-pointer font-headline">Bulan Ini</button>
          </div>

          <!-- Custom Date Input -->
          <div class="flex flex-wrap items-center gap-2 text-xs font-bold w-full sm:w-auto">
            <div class="flex-1 sm:flex-none border-2 border-secondary rounded-xl px-2.5 py-1.5 bg-white flex items-center shadow-[2px_2px_0px_#232323]">
              <span class="text-gray-400 text-[10px] mr-1.5 uppercase font-black font-headline">DARI:</span>
              <input type="date" wire:model="startDate" class="bg-transparent font-extrabold text-xs outline-none w-full cursor-pointer text-secondary">
            </div>
            <span class="text-xs font-black text-secondary font-headline">s/d</span>
            <div class="flex-1 sm:flex-none border-2 border-secondary rounded-xl px-2.5 py-1.5 bg-white flex items-center shadow-[2px_2px_0px_#232323]">
              <input type="date" wire:model="endDate" class="bg-transparent font-extrabold text-xs outline-none w-full cursor-pointer text-secondary">
            </div>
            <button wire:click="applyCustomDate" class="w-full sm:w-auto px-4 py-2 bg-secondary text-white border-2 border-secondary rounded-xl font-black uppercase btn-brutal text-xs cursor-pointer shadow-[2px_2px_0px_#232323] font-headline">Terapkan</button>
          </div>

        </div>
      </section>

      <!-- RINGKASAN METRIK (5 CARD METRIK) -->
      <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3.5">

        <!-- CARD 1: OMZET -->
        <div class="kartu p-4 flex flex-col justify-between min-h-[135px] hover:-translate-y-0.5 transition-transform">
          <div>
            <div class="flex items-center justify-between gap-1 mb-1.5">
              <span class="text-[10px] font-black uppercase tracking-wider text-gray-500 font-headline">1. OMZET PENJUALAN</span>
              <span class="p-1.5 bg-gray-100 border-2 border-secondary rounded-lg shadow-[1.5px_1.5px_0px_#232323]">
                <img src="{{ asset('assets/icons/toko.svg') }}" alt="Omzet" class="w-3.5 h-3.5 object-contain" />
              </span>
            </div>
            <p class="text-xl xl:text-2xl font-black text-secondary leading-tight flex items-baseline gap-1 truncate whitespace-nowrap">
              <span class="text-xs xl:text-sm font-extrabold text-gray-400">Rp</span>{{ number_format($summary['omzet'], 0, ',', '.') }}
            </p>
          </div>
          <div class="pt-2 border-t border-gray-200 flex items-center gap-1.5 text-[10px] text-gray-600 font-extrabold">
            <span class="w-2 h-2 rounded-full bg-green-600"></span>
            <span><strong class="text-secondary font-black">{{ $summary['totalStruk'] }}</strong> Struk lunas</span>
          </div>
        </div>

        <!-- CARD 2: HPP -->
        <div class="kartu p-4 flex flex-col justify-between min-h-[135px] hover:-translate-y-0.5 transition-transform">
          <div>
            <div class="flex items-center justify-between gap-1 mb-1.5">
              <span class="text-[10px] font-black uppercase tracking-wider text-gray-500 font-headline">2. MODAL TERJUAL (HPP)</span>
              <span class="p-1.5 bg-red-50 border-2 border-secondary rounded-lg shadow-[1.5px_1.5px_0px_#232323]">
                <img src="{{ asset('assets/icons/arsip.svg') }}" alt="HPP" class="w-3.5 h-3.5 object-contain" />
              </span>
            </div>
            <p class="text-xl xl:text-2xl font-black text-secondary leading-tight flex items-baseline gap-1 truncate whitespace-nowrap">
              <span class="text-xs xl:text-sm font-extrabold text-gray-400">Rp</span>{{ number_format($summary['hpp'], 0, ',', '.') }}
            </p>
          </div>
          <div class="pt-2 border-t border-gray-200 flex items-center justify-between text-[10px] font-extrabold">
            <span class="text-red-600 bg-red-50 px-1.5 py-0.5 rounded border border-red-300">Σ (Kulakan x Qty)</span>
          </div>
        </div>

        <!-- CARD 3: OPERASIONAL -->
        <div class="kartu p-4 flex flex-col justify-between min-h-[135px] hover:-translate-y-0.5 transition-transform">
          <div>
            <div class="flex items-center justify-between gap-1 mb-1.5">
              <span class="text-[10px] font-black uppercase tracking-wider text-gray-500 font-headline">3. OPERASIONAL TOKO</span>
              <span class="p-1.5 bg-amber-50 border-2 border-secondary rounded-lg shadow-[1.5px_1.5px_0px_#232323]">
                <img src="{{ asset('assets/icons/catatanCoklat.svg') }}" alt="Operasional" class="w-3.5 h-3.5 object-contain" />
              </span>
            </div>
            <p class="text-xl xl:text-2xl font-black text-secondary leading-tight flex items-baseline gap-1 truncate whitespace-nowrap">
              <span class="text-xs xl:text-sm font-extrabold text-gray-400">Rp</span>{{ number_format($summary['operasional'], 0, ',', '.') }}
            </p>
          </div>
          <div class="pt-2 border-t border-gray-200 flex items-center justify-between text-[10px] text-gray-600 font-extrabold">
            <span>Beban Pengeluaran</span>
            <span class="bg-gray-100 px-1.5 py-0.5 rounded border border-secondary/20 text-secondary font-black">{{ count($operasionalList) }} Pos</span>
          </div>
        </div>

        <!-- CARD 4: LABA KOTOR -->
        <div class="kartu p-4 flex flex-col justify-between min-h-[135px] hover:-translate-y-0.5 transition-transform bg-emerald-50/30">
          <div>
            <div class="flex items-center justify-between gap-1 mb-1.5">
              <span class="text-[10px] font-black uppercase tracking-wider text-gray-500 font-headline">4. LABA KOTOR (GROSS)</span>
              <span class="p-1.5 bg-green-100 border-2 border-secondary rounded-lg shadow-[1.5px_1.5px_0px_#232323]">
                <img src="{{ asset('assets/icons/grafikNaikPenelusuran.svg') }}" alt="Laba Kotor" class="w-3.5 h-3.5 object-contain" />
              </span>
            </div>
            <p class="text-xl xl:text-2xl font-black text-green-700 leading-tight flex items-baseline gap-1 truncate whitespace-nowrap">
              <span class="text-xs xl:text-sm font-extrabold">Rp</span>{{ number_format($summary['labaKotor'], 0, ',', '.') }}
            </p>
          </div>
          <div class="pt-2 border-t border-emerald-100 flex items-center text-[10px] font-extrabold">
            <span class="text-green-700 bg-green-100 px-1.5 py-0.5 rounded border border-green-300">Omzet - HPP Modal</span>
          </div>
        </div>

        <!-- CARD 5: LABA BERSIH (HERO CARD) -->
        <div class="kartu p-4 bg-primary flex flex-col justify-between min-h-[135px] hover:-translate-y-0.5 transition-transform relative overflow-hidden">
          <div>
            <div class="flex items-center justify-between gap-1 mb-1.5">
              <span class="px-2 py-0.5 border-2 border-secondary rounded-lg bg-white text-[9px] font-black uppercase shadow-[1.5px_1.5px_0px_#232323] font-headline">5. HASIL BERSIH</span>
              <span class="p-1.5 bg-white border-2 border-secondary rounded-lg shadow-[1.5px_1.5px_0px_#232323]">
                <img src="{{ asset('assets/icons/uang.svg') }}" alt="Hasil Bersih" class="w-3.5 h-3.5 object-contain" />
              </span>
            </div>
            <p class="text-xl xl:text-2xl font-black text-secondary leading-tight flex items-baseline gap-1 truncate whitespace-nowrap mt-1">
              <span class="text-xs xl:text-sm font-extrabold">Rp</span>{{ number_format($summary['labaBersih'], 0, ',', '.') }}
            </p>
          </div>
          <div class="pt-2 border-t border-secondary/20 flex items-center justify-between text-[10px] font-black text-secondary">
            <span class="font-headline">KAS RIIL TOKO</span>
            <span class="bg-white/90 px-1.5 py-0.5 rounded-md border border-secondary text-[9px]">Tepat</span>
          </div>
        </div>

      </section>

      <!-- DUA KOLOM LAPORAN DETIL -->
      <section class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-5 items-start">

        <!-- KOLOM KIRI: BEBAN OPERASIONAL -->
        <div class="lg:col-span-5 kartu p-4 space-y-3">
          <div class="flex items-center justify-between gap-2 border-b-2 border-secondary pb-2.5">
            <div class="flex items-center gap-2">
              <img src="{{ asset('assets/icons/loncengMerah.svg') }}" alt="Beban" class="w-4 h-4 object-contain" />
              <h3 class="font-extrabold text-xs sm:text-sm uppercase text-secondary font-headline">POS BEBAN OPERASIONAL</h3>
            </div>
            <button wire:click="openModalTambah" class="px-2.5 py-1 bg-primary border-2 border-secondary rounded-lg text-xs font-extrabold text-secondary shadow-[2px_2px_0px_#232323] hover:translate-x-[-1px] hover:translate-y-[-1px] transition-all cursor-pointer font-headline">+ Catat Biaya</button>
          </div>
          <p class="text-[11px] font-semibold text-gray-500 leading-snug">Pengeluaran harian penunjang operasional yang mengurangi laba kotor.</p>

          <x-alert />

          <!-- DAFTAR BEBAN -->
          <div class="space-y-2">
            @forelse($operasionalList as $item)
              <div class="p-2.5 sm:p-3 border-2 border-secondary rounded-xl bg-white flex items-center justify-between gap-2 shadow-[2px_2px_0px_#232323]">
                <div class="flex items-start gap-2.5 sm:gap-3 overflow-hidden">
                  <img src="{{ asset('assets/icons/catatan.svg') }}" alt="Biaya" class="w-5 h-5 mt-0.5 shrink-0 object-contain" />
                  <div class="overflow-hidden">
                    <h4 class="text-xs font-extrabold truncate text-secondary font-headline">{{ $item->keperluan }}</h4>
                    <p class="text-[9px] sm:text-[10px] text-gray-500 font-semibold truncate">
                      {{ \Carbon\Carbon::parse($item->tanggal_operasional)->translatedFormat('d M Y') }} • {{ $item->catatan ?? '-' }}
                    </p>
                  </div>
                </div>
                <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                  <span class="text-xs font-black text-red-600">Rp {{ number_format($item->nominal, 0, ',', '.') }}</span>
                  <button wire:click="openModalEdit({{ $item->id }})" class="w-6 h-6 sm:w-7 sm:h-7 border-2 border-secondary rounded-lg bg-white flex items-center justify-center shadow-[1.5px_1.5px_0px_#232323] cursor-pointer hover:bg-amber-50">
                    <img src="{{ asset('assets/icons/pencil.svg') }}" alt="Edit" class="w-3 h-3 object-contain" />
                  </button>
                </div>
              </div>
            @empty
              <div class="p-4 text-center text-xs font-bold text-gray-400 border-2 border-dashed border-gray-300 rounded-xl">
                Belum ada catatan operasional pada periode ini.
              </div>
            @endforelse
          </div>

          <div class="pt-3 border-t-2 border-secondary flex items-center justify-between font-headline">
            <span class="font-black text-xs sm:text-sm uppercase text-secondary">TOTAL BEBAN:</span>
            <span class="text-base sm:text-lg font-black text-red-600">Rp {{ number_format($summary['operasional'], 0, ',', '.') }}</span>
          </div>
        </div>

        <!-- KOLOM KANAN: RINCIAN TRANSAKSI PENJUALAN -->
        <div class="lg:col-span-7 kartu p-4 space-y-3.5">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b-2 border-secondary pb-2.5">
            <div class="flex items-center gap-2">
              <img src="{{ asset('assets/icons/catatanCoklat.svg') }}" alt="Transaksi" class="w-4 h-4 object-contain" />
              <h3 class="font-extrabold text-xs sm:text-sm uppercase text-secondary font-headline">RINCIAN TRANSAKSI PENJUALAN</h3>
            </div>
            <div class="relative w-full sm:w-auto">
              <input type="text" wire:model.live.debounce.300ms="searchStruk" placeholder="Cari No. Struk..." class="w-full sm:w-40 pl-7 pr-2 py-1 border-2 border-secondary rounded-xl text-xs font-bold bg-white outline-none shadow-[2px_2px_0px_#232323]">
              <img src="{{ asset('assets/icons/search.svg') }}" alt="Cari" class="w-3 h-3 object-contain absolute left-2.5 top-2 text-gray-400" />
            </div>
          </div>

          <!-- TABEL TRANSAKSI -->
          <div class="overflow-x-auto">
            <table class="w-full text-left text-xs min-w-[320px]">
              <thead>
                <tr class="border-b-2 border-secondary text-secondary font-black uppercase text-[10px] font-headline">
                  <th class="py-2 px-1">NO. STRUK / WAKTU</th>
                  <th class="py-2 px-1">ITEM TERJUAL</th>
                  <th class="py-2 px-1 text-right">TOTAL</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @forelse($transaksiList as $trx)
                  <tr>
                    <td class="py-2.5 px-1 align-top">
                      <div class="font-black text-secondary">{{ $trx->kode_transaksi }}</div>
                      <div class="text-[9px] sm:text-[10px] font-semibold text-gray-500">
                        {{ \Carbon\Carbon::parse($trx->tanggal_transaksi)->translatedFormat('H:i \W\I\B • d M Y') }}
                      </div>
                    </td>
                    <td class="py-2.5 px-1 align-top">
                      @foreach($trx->detailTransaksi as $dt)
                        <div class="font-bold text-secondary">{{ $dt->barang->nama_barang ?? 'Barang Dihapus' }} (x{{ $dt->jumlah }})</div>
                      @endforeach
                    </td>
                    <td class="py-2.5 px-1 align-top text-right font-black text-secondary">
                      Rp {{ number_format($trx->total_harga, 0, ',', '.') }}
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3" class="py-4 text-center font-bold text-gray-400">Tidak ada transaksi ditemukan.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <!-- PAGINASI NEO-BRUTALIST -->
          <div class="pt-3 border-t border-gray-200">
            @if(view()->exists('components.pagination'))
                {{ $transaksiList->links('components.pagination') }}
            @else
                {{ $transaksiList->links() }}
            @endif
          </div>
        </div>

      </section>

    </main>
</div>
