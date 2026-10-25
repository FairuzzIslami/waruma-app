<div>
    <div class="space-y-4 font-body">

        <!-- HEADER HALAMAN -->
        <header class="kartu p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white border-2 border-secondary rounded-2xl shadow-[4px_4px_0px_#232323]">
            <div class="space-y-1">
                <h1 class="text-lg sm:text-2xl font-bold flex items-center gap-2 font-headline">
                    <span class="inline-flex shrink-0">
                        <img src="{{ asset('assets/images/logoWaruma.svg') }}" alt="Logo WARUMA" class="w-8 h-8 sm:w-10 sm:h-10 object-contain" />
                    </span>
                    Kelola Stok &amp; Inventaris Barang
                </h1>
                <p class="text-xs sm:text-sm text-gray-600">Pantau kuantitas real-time, batas minimum stok, HPP modal, dan kategori produk warung Anda.</p>
            </div>
            <button wire:click="openModalTambah" class="btn-brutal rounded-xl bg-primary px-4 py-2.5 text-xs sm:text-sm font-black text-secondary inline-flex items-center justify-center gap-2 shrink-0 self-start sm:self-auto cursor-pointer border-2 border-secondary shadow-[2px_2px_0px_#232323] hover:translate-x-[-1px] hover:translate-y-[-1px] active:translate-x-[1px] active:translate-y-[1px] transition-all">
                + Tambah Barang Baru
            </button>
        </header>

        <!-- FLASH MESSAGE NOTIFIKASI -->
        @if (session()->has('message'))
            <x-alert type="success" :message="session('message')" />
        @endif

        <!-- KARTU STATISTIK -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
            <div class="kartu p-4 flex flex-col justify-between min-h-[110px] bg-white border-2 border-secondary rounded-2xl shadow-[4px_4px_0px_#232323]">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-extrabold tracking-wider text-gray-500 uppercase font-headline">TOTAL KATALOG</span>
                    <div class="w-7 h-7 shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/icons/tumpukan.svg') }}" alt="Total Katalog" class="w-full h-full object-contain" />
                    </div>
                </div>
                <div class="my-auto">
                    <p class="text-2xl lg:text-3xl font-extrabold text-secondary leading-tight"><span>{{ $statTotal }}</span> <span class="text-lg font-bold text-gray-500">Produk</span></p>
                </div>
            </div>

            <div class="kartu p-4 flex flex-col justify-between min-h-[110px] bg-white border-2 border-secondary rounded-2xl shadow-[4px_4px_0px_#232323]">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-extrabold tracking-wider text-green-700 uppercase font-headline">STOK AMAN</span>
                    <div class="w-7 h-7 shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/icons/bener.svg') }}" alt="Stok Aman" class="w-full h-full object-contain" />
                    </div>
                </div>
                <div class="my-auto">
                    <p class="text-2xl lg:text-3xl font-extrabold text-green-700 leading-tight"><span>{{ $statAman }}</span> <span class="text-lg font-bold text-green-700/70">Produk</span></p>
                </div>
            </div>

            <div class="kartu p-4 flex flex-col justify-between min-h-[110px] bg-white border-2 border-secondary rounded-2xl shadow-[4px_4px_0px_#232323]">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-extrabold tracking-wider text-amber-600 uppercase font-headline">PERLU RESTOCK</span>
                    <div class="w-7 h-7 shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/icons/peringatan.svg') }}" alt="Perlu Restock" class="w-full h-full object-contain" />
                    </div>
                </div>
                <div class="my-auto">
                    <p class="text-2xl lg:text-3xl font-extrabold text-amber-600 leading-tight"><span>{{ $statRestock }}</span> <span class="text-lg font-bold text-amber-600/70">Produk</span></p>
                </div>
            </div>

            <div class="kartu p-4 flex flex-col justify-between min-h-[110px] bg-white border-2 border-secondary rounded-2xl shadow-[4px_4px_0px_#232323]">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-extrabold tracking-wider text-gray-500 uppercase font-headline">TOTAL NILAI HPP</span>
                    <div class="w-7 h-7 shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/icons/dompet2.svg') }}" alt="Nilai HPP" class="w-full h-full object-contain" />
                    </div>
                </div>
                <div class="my-auto">
                    <p class="text-xl lg:text-2xl xl:text-3xl font-extrabold text-secondary leading-tight flex items-baseline gap-1 truncate">
                        <span class="text-lg font-bold text-gray-500">Rp</span><span>{{ number_format($statHpp, 0, ',', '.') }}</span>
                    </p>
                </div>
            </div>
        </section>

        <!-- PENCARIAN & FILTER -->
        <section class="kartu p-3.5 space-y-3.5 bg-white border-2 border-secondary rounded-2xl shadow-[4px_4px_0px_#232323]">
            <div class="flex flex-col sm:flex-row gap-2.5">
                <label class="flex-1 flex items-center gap-2 border-2 border-secondary rounded-xl px-3 bg-white cursor-text">
                    <img src="{{ asset('assets/icons/search.svg') }}" alt="Cari" class="w-4 h-4 object-contain" />
                    <input type="text" id="inputCari" wire:model.live.debounce.300ms="search" placeholder="Cari berdasarkan nama atau kode barang (mis. BRG-001)..." class="w-full py-2.5 text-xs bg-transparent border-none outline-none font-semibold text-secondary placeholder-gray-400" />
                    <kbd class="hidden md:inline-block px-1.5 py-0.5 text-[10px] font-bold text-gray-500 bg-gray-100 border border-gray-300 rounded shrink-0">Ctrl + K</kbd>
                </label>

                <div class="relative flex items-center bg-white border-2 border-secondary rounded-xl px-3 shrink-0 shadow-[2px_2px_0px_#232323]">
                    <img src="{{ asset('assets/icons/gelas.svg') }}" alt="Filter" class="w-4 h-4 mr-2 object-contain" />
                    <select wire:model.live="filterStatus" class="bg-transparent border-none outline-none text-xs font-bold text-secondary py-2.5 w-full cursor-pointer appearance-none pr-4">
                        <option value="semua">Semua Status</option>
                        <option value="tersedia">Tersedia</option>
                        <option value="menipis">Menipis</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>
            </div>

            <!-- CHIP KATEGORI DENGAN PANAH SCROLL KIRI/KANAN -->
            <div x-data="{
                scrollLeft() { $refs.katContainer.scrollBy({ left: -200, behavior: 'smooth' }) },
                scrollRight() { $refs.katContainer.scrollBy({ left: 200, behavior: 'smooth' }) }
            }" class="flex items-center gap-2 pt-1">
                <span class="text-[10px] font-bold text-gray-600 shrink-0 uppercase tracking-wider font-headline">KATEGORI:</span>

                <div x-ref="katContainer" class="flex-1 flex gap-2 overflow-x-auto py-1 scroll-smooth no-scrollbar">
                    <button wire:click="$set('filterKategori', 'semua')" class="shrink-0 border-2 border-secondary rounded-full {{ $filterKategori === 'semua' ? 'bg-primary shadow-[2px_2px_0px_#232323] font-black' : 'bg-white font-bold' }} text-[11px] px-3.5 py-1 cursor-pointer transition-all">Semua</button>
                    @foreach($kategoris as $kat)
                        <button wire:click="$set('filterKategori', '{{ $kat->id }}')" class="shrink-0 border-2 border-secondary rounded-full {{ $filterKategori == $kat->id ? 'bg-primary shadow-[2px_2px_0px_#232323] font-black' : 'bg-white font-bold' }} text-[11px] px-3.5 py-1 cursor-pointer transition-all">{{ $kat->nama_kategori }}</button>
                    @endforeach
                </div>

                <!-- TOMBOL NAVIGASI SCROLL PANAH KANAN KIRINYA -->
                <div class="flex items-center gap-1 shrink-0 pl-1">
                    <button @click="scrollLeft()" type="button" class="w-7 h-7 rounded-xl border-2 border-secondary bg-white text-secondary grid place-items-center shadow-[2px_2px_0px_#232323] font-black text-xs hover:bg-amber-100 active:translate-x-[1px] active:translate-y-[1px] cursor-pointer">←</button>
                    <button @click="scrollRight()" type="button" class="w-7 h-7 rounded-xl border-2 border-secondary bg-primary text-secondary grid place-items-center shadow-[2px_2px_0px_#232323] font-black text-xs hover:bg-amber-400 active:translate-x-[1px] active:translate-y-[1px] cursor-pointer">→</button>
                </div>
            </div>
        </section>

        <!-- TABEL DATA -->
        <section class="kartu bg-white border-2 border-secondary rounded-2xl shadow-[4px_4px_0px_#232323] overflow-hidden">
            <!-- BAR ATAS TABEL -->
            <div class="flex items-center gap-3.5 p-3 bg-tertiary border-b-2 border-secondary text-xs">
                <label class="flex items-center gap-2 cursor-pointer font-bold">
                    <input type="checkbox" wire:model.live="selectAll" class="w-4 h-4 accent-primary cursor-pointer" />
                    <span>Pilih Semua Baris</span>
                </label>
                <span class="flex-1 text-gray-600 pl-3 border-l border-gray-300 font-semibold">{{ count($selectedBarang) }} barang dipilih</span>

                <!-- Tombol Hapus Selalu Tampil -->
                <button wire:click="confirmDeleteBatch" class="border-2 border-red-600 rounded-lg text-red-600 bg-white px-3 py-1 text-xs font-bold shadow-[2px_2px_0px_#dc2626] hover:bg-red-50 inline-flex items-center gap-1.5 cursor-pointer active:translate-x-[1px] active:translate-y-[1px]">
                    <img src="{{ asset('assets/icons/sampah.svg') }}" alt="Hapus" class="w-3.5 h-3.5 object-contain shrink-0" />
                    Hapus
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[980px] text-xs">
                    <thead>
                        <tr class="bg-gray-100 border-b-2 border-secondary text-[10px] font-extrabold tracking-wider text-secondary uppercase text-left font-headline">
                            <th class="p-3">#</th>
                            <th class="p-3">FOTO</th>
                            <th class="p-3">KODE</th>
                            <th class="p-3">NAMA BARANG</th>
                            <th class="p-3">KATEGORI</th>
                            <th class="p-3">SATUAN</th>
                            <th class="p-3 text-right">HPP MODAL</th>
                            <th class="p-3 text-right">HARGA JUAL</th>
                            <th class="p-3 text-center">STOK</th>
                            <th class="p-3 text-center">MIN</th>
                            <th class="p-3 text-center">STATUS</th>
                            <th class="p-3 text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($barangList as $item)
                            <tr class="hover:bg-amber-50/40 transition">
                                <td class="p-3 whitespace-nowrap"><input type="checkbox" wire:model.live="selectedBarang" value="{{ $item->id }}" class="w-4 h-4 accent-primary cursor-pointer" /></td>
                                <td class="p-3 whitespace-nowrap">
                                    <div class="w-10 h-10 border-2 border-secondary rounded-xl bg-white p-0.5 overflow-hidden">
                                        <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('assets/barang/beras.jpe') }}" alt="{{ $item->nama_barang }}" class="w-full h-full object-contain rounded-lg" />
                                    </div>
                                </td>
                                <td class="p-3 whitespace-nowrap"><span class="border-[1.5px] border-secondary rounded bg-gray-100 text-[10px] font-bold px-2 py-0.5 whitespace-nowrap inline-block">{{ $item->kode_barang }}</span></td>
                                <td class="p-3 font-bold text-xs whitespace-nowrap text-secondary">{{ $item->nama_barang }}</td>
                                <td class="p-3 whitespace-nowrap"><span class="border-[1.5px] border-secondary rounded-full bg-gray-100 text-[10px] font-bold px-2.5 py-0.5 whitespace-nowrap inline-block">{{ $item->kategori->nama_kategori ?? '-' }}</span></td>
                                <td class="p-3 whitespace-nowrap"><span class="border-[1.5px] border-secondary rounded bg-gray-100 text-[10px] font-bold px-2 py-0.5 whitespace-nowrap inline-block uppercase">{{ $item->satuan->nama_satuan ?? '-' }}</span></td>
                                <td class="p-3 text-right text-[11px] font-medium whitespace-nowrap">Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                <td class="p-3 text-right text-[11px] font-extrabold whitespace-nowrap text-secondary">Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                                <td class="p-3 text-center text-xs font-extrabold whitespace-nowrap">{{ $item->stok }}</td>
                                <td class="p-3 text-center text-xs text-gray-500 font-semibold whitespace-nowrap">{{ $item->min_stok }}</td>
                                <td class="p-3 text-center whitespace-nowrap">
                                    @if($item->stok == 0)
                                        <span class="border-[1.5px] border-red-700 bg-red-100 text-red-700 text-[10px] font-bold px-3 py-0.5 rounded-full whitespace-nowrap inline-block">● Habis</span>
                                    @elseif($item->stok <= $item->min_stok)
                                        <span class="border-[1.5px] border-amber-700 bg-amber-100 text-amber-800 text-[10px] font-bold px-3 py-0.5 rounded-full whitespace-nowrap inline-block">● Menipis</span>
                                    @else
                                        <span class="border-[1.5px] border-green-700 bg-green-100 text-green-700 text-[10px] font-bold px-3 py-0.5 rounded-full whitespace-nowrap inline-block">● Tersedia</span>
                                    @endif
                                </td>
                                <!-- KOLOM AKSI: HANYA RESTOCK DAN EDIT -->
                                <td class="p-3 text-center whitespace-nowrap">
                                    <button wire:click="openModalRestock({{ $item->id }})" class="bg-primary border-2 border-secondary rounded-md text-[10px] font-bold px-2.5 py-1 mr-1 shadow-[1.5px_1.5px_0px_#232323] inline-flex items-center gap-1 cursor-pointer whitespace-nowrap active:translate-x-[1px] active:translate-y-[1px]"><img src="{{ asset('assets/icons/tambah.svg') }}" alt="Restock" class="w-3 h-3 object-contain" /> Restock</button>
                                    <button wire:click="openModalEdit({{ $item->id }})" class="w-7 h-7 bg-white border-2 border-secondary rounded-md text-xs font-bold shadow-[1.5px_1.5px_0px_#232323] inline-flex items-center justify-center cursor-pointer whitespace-nowrap active:translate-x-[1px] active:translate-y-[1px]"><img src="{{ asset('assets/icons/pencil.svg') }}" alt="Edit" class="w-3.5 h-3.5 object-contain" /></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="p-6 text-center text-gray-500 font-bold">Tidak ada data barang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

           <!-- FOOTER TABLE DENGAN PAGINATION COMPONENT -->
            <div class="p-3.5 border-t-2 border-secondary bg-white">
                {{ $barangList->links('components.pagination') }}
            </div>
        </section>

    </div>

    <!-- KOMPONEN MODAL -->
    <x-modal-barang :kategoris="$kategoris" :satuans="$satuans" />
    <x-modal-restock />
    <x-modal-delete />
</div>
