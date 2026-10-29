<div x-data="{ modalSukses: false }"
     x-on:buka-modal-sukses.window="modalSukses = true"
     x-on:tutup-modal-sukses.window="modalSukses = false">

    <!-- MODAL SUKSES & CETAK STRUK -->
    <div x-show="modalSukses"
         x-cloak
         class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-3 sm:p-4 overflow-y-auto">

        <div class="neo-box bg-white max-w-sm w-full p-5 text-center space-y-4 animate-pop my-auto">

            <div class="w-14 h-14 bg-hijau-muda border-3 border-hitam rounded-full flex items-center justify-center mx-auto shadow-[3px_3px_0px_#1a1a1a]">
                <span class="text-hijau text-2xl font-black">✓</span>
            </div>

            <div>
                <span class="inline-block px-2.5 py-0.5 bg-kuning-muda border border-hitam rounded-full text-[10px] font-bold uppercase tracking-wider text-cokelat mb-1">
                    Pembayaran Selesai
                </span>
                <h3 class="font-extrabold text-lg text-hitam">Transaksi Berhasil!</h3>
            </div>

            <!-- TEMPLATE NOTA PRINTER THERMAL -->
            <div id="areaStrukPrint" class="bg-white border-2 border-dashed border-gray-300 rounded-lg p-4 text-left font-mono text-[11px] leading-relaxed text-black shadow-inner">

                <div class="text-center space-y-0.5 pb-2 border-b border-dashed border-gray-400">
                    <h4 class="font-bold text-sm text-black uppercase tracking-wider">WARUMA STORE</h4>
                    <p class="text-[10px]">Jl. Kencur No. 19, Batam</p>
                    <p class="text-[10px]">Telp/WA: 0856 736 2982</p>
                </div>

                @if($transaksiSelesai)
                <div class="py-2 border-b border-dashed border-gray-400 space-y-0.5 text-[10px]">
                    <div class="flex justify-between">
                        <span>Tanggal:</span>
                        <span>{{ \Carbon\Carbon::parse($transaksiSelesai->tanggal_transaksi)->format('Y-m-d H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Kasir  :</span>
                        <span>{{ $transaksiSelesai->user->name ?? 'Admin' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Plg.   :</span>
                        <span>Umum</span>
                    </div>
                    <div class="flex justify-between">
                        <span>No.Trx :</span>
                        <span>{{ $transaksiSelesai->kode_transaksi }}</span>
                    </div>
                </div>

                <div class="py-2 space-y-1.5 border-b border-dashed border-gray-400">
                    @foreach($transaksiSelesai->detailTransaksi as $detail)
                    <div class="space-y-0.5">
                        <div class="font-bold">{{ $detail->barang->nama_barang ?? 'Barang' }}</div>
                        <div class="flex justify-between text-[10px]">
                            <span>{{ number_format($detail->harga_satuan, 0, ',', '.') }} x {{ $detail->jumlah }}</span>
                            <span>{{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="py-2 space-y-0.5 text-[11px]">
                    <div class="flex justify-between">
                        <span>Sub Total</span>
                        <span>Rp {{ number_format($transaksiSelesai->total_harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between font-bold text-black border-t border-dashed border-gray-300 pt-1 mt-1">
                        <span>Total Tagihan</span>
                        <span>Rp {{ number_format($transaksiSelesai->total_harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Dibayar (Tunai)</span>
                        <span>Rp {{ number_format($transaksiSelesai->bayar, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between font-bold text-black">
                        <span>Kembali</span>
                        <span>Rp {{ number_format($transaksiSelesai->kembali, 0, ',', '.') }}</span>
                    </div>
                </div>
                @endif

                <div class="pt-2 border-t border-dashed border-gray-400 text-center text-[9.5px] space-y-0.5 text-gray-700">
                    <p>Terima kasih telah berbelanja!</p>
                    <p>Kepuasan Anda adalah kebanggaan kami.</p>
                </div>

            </div>

            <div class="flex flex-col gap-2 pt-1 no-print">
                <button onclick="window.print()" class="w-full btn-brutal bg-kuning py-2.5 rounded-xl font-extrabold text-xs text-hitam flex items-center justify-center gap-2 cursor-pointer">
                    Cetak Struk Nota
                </button>
                <button wire:click="transaksiBaru" class="w-full btn-brutal bg-white py-2.5 rounded-xl font-extrabold text-xs text-hitam hover:bg-gray-100 cursor-pointer">
                    Transaksi Baru
                </button>
            </div>

        </div>
    </div>

    <!-- MAIN POS CONTAINER -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">

        <!-- KATALOG & FILTER (KIRI) -->
        <section class="lg:col-span-7 xl:col-span-8 space-y-3.5">

            <!-- SEARCH BAR DENGAN BADGE CTRL+K DI SEBELAH KANAN DALAM -->
            <div class="kartu p-2.5 sm:p-3 flex items-center gap-2">
                <label class="relative flex-1 flex items-center gap-2 border-2 border-hitam rounded-xl px-3 bg-white cursor-text">
                    <img src="{{ asset('assets/icons/search.svg') }}" alt="Cari" class="w-4 h-4 object-contain shrink-0" />
                    <input type="text"
                           id="inputCari"
                           wire:model.live.debounce.300ms="search"
                           placeholder="Ketik Nama atau Kode Barang (misal: BRG-005 atau Indomie)..."
                           class="w-full py-2 pr-16 text-xs font-semibold bg-transparent border-none outline-none text-hitam placeholder-gray-400" />

                    <kbd class="hidden md:inline-flex items-center gap-0.5 absolute right-2.5 px-2 py-0.5 text-[10px] font-mono font-bold text-gray-500 bg-gray-100 border border-gray-300 rounded-md shadow-sm pointer-events-none">
                        Ctrl + K
                    </kbd>
                </label>
            </div>

            <!-- CHIP KATEGORI DENGAN SCROLL PANAH -->
            <div class="flex flex-wrap sm:flex-nowrap items-center gap-2 pt-1">
                <span class="text-[10px] font-extrabold text-gray-600 shrink-0 uppercase tracking-wider">KATEGORI:</span>
                <div class="chip-scroll flex-1 flex gap-2 overflow-x-auto py-1" id="chip-wadah">
                    <button wire:click="setKategori('semua')"
                            class="chip-item shrink-0 border-[1.5px] border-hitam rounded-full text-[11px] font-bold px-3 py-1 cursor-pointer {{ $kategoriAktif === 'semua' ? 'bg-kuning shadow-[2px_2px_0px_#1a1a1a]' : 'bg-abu' }}">
                        Semua
                    </button>
                    @foreach($kategoris as $kat)
                    <button wire:click="setKategori({{ $kat->id }})"
                            class="chip-item shrink-0 border-[1.5px] border-hitam rounded-full text-[11px] font-bold px-3 py-1 cursor-pointer {{ $kategoriAktif == $kat->id ? 'bg-kuning shadow-[2px_2px_0px_#1a1a1a]' : 'bg-abu' }}">
                        {{ $kat->nama_kategori }}
                    </button>
                    @endforeach
                </div>
                <div class="flex gap-1.5 shrink-0 ml-auto sm:ml-0">
                    <button class="w-7 h-7 bg-white text-xs font-bold btn-brutal flex items-center justify-center cursor-pointer" onclick="document.getElementById('chip-wadah').scrollBy({ left: -200, behavior: 'smooth' })">
                        <img src="{{ asset('assets/icons/panahKiri.svg') }}" alt="Ke Kiri" class="w-3.5 h-3.5 object-contain" />
                    </button>
                    <button class="w-7 h-7 bg-kuning text-xs font-bold btn-brutal flex items-center justify-center cursor-pointer" onclick="document.getElementById('chip-wadah').scrollBy({ left: 200, behavior: 'smooth' })">
                        <img src="{{ asset('assets/icons/panahKanan.svg') }}" alt="Ke Kanan" class="w-3.5 h-3.5 object-contain" />
                    </button>
                </div>
            </div>

            <!-- GRID PRODUK KATALOG -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                @forelse($barangs as $barang)
                    @if($barang->stok > 0)
                    <!-- BARANG READY / MENIPIS -->
                    <div wire:click="tambahKeKeranjang({{ $barang->id }})"
                        class="item-produk kartu overflow-hidden cursor-pointer hover:border-kuning transition flex flex-col justify-between group active:scale-95">
                        <div>
                            <div class="relative bg-amber-50 p-2 border-b-2 border-hitam flex justify-between items-center">
                                <span class="bg-white border-[1.5px] border-hitam rounded px-1.5 py-0.5 text-[9px] font-extrabold">{{ $barang->kode_barang }}</span>
                                @if($barang->stok <= $barang->min_stok)
                                    <span class="border-[1.5px] border-amber-700 bg-amber-100 text-amber-800 text-[9px] font-bold px-2 py-0.5 rounded-full whitespace-nowrap inline-block">
                                        {{ $barang->stok }} {{ $barang->satuan->nama_satuan ?? 'pcs' }}
                                    </span>
                                @else
                                    <span class="border-[1.5px] border-green-700 bg-green-100 text-green-700 text-[9px] font-bold px-2 py-0.5 rounded-full whitespace-nowrap inline-block">
                                        {{ $barang->stok }} {{ $barang->satuan->nama_satuan ?? 'pcs' }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-2.5 text-center">
                                <img src="{{ $barang->foto ? asset('storage/'.$barang->foto) : asset('assets/barang/beras.jpe') }}" alt="{{ $barang->nama_barang }}" class="w-20 h-20 mx-auto object-contain mb-2 group-hover:scale-105 transition-transform" />
                                <span class="text-[9px] font-extrabold uppercase text-gray-500 tracking-wider block text-left">{{ $barang->kategori->nama_kategori ?? 'UMUM' }}</span>
                                <h3 class="font-bold text-xs sm:text-sm text-hitam text-left leading-snug line-clamp-2">{{ $barang->nama_barang }}</h3>
                            </div>
                        </div>
                        <div class="p-2.5 pt-0 flex items-center justify-between">
                            <p class="font-black text-sm sm:text-base text-hitam">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</p>
                            <span class="text-[10px] bg-kuning border border-hitam font-bold px-1.5 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity">+ Tambah</span>
                        </div>
                    </div>
                    @else
                    <!-- BARANG HABIS (MERAH) -->
                    <div class="kartu overflow-hidden bg-gray-100 opacity-80 cursor-not-allowed flex flex-col justify-between">
                        <div>
                            <div class="relative bg-gray-200 p-2 border-b-2 border-hitam flex justify-between items-center">
                                <span class="bg-white border-[1.5px] border-hitam rounded px-1.5 py-0.5 text-[9px] font-extrabold">{{ $barang->kode_barang }}</span>
                                <span class="border-[1.5px] border-red-700 bg-red-100 text-red-700 text-[9px] font-bold px-2 py-0.5 rounded-full whitespace-nowrap inline-block">Habis</span>
                            </div>
                            <div class="p-2.5 text-center">
                                <img src="{{ $barang->foto ? asset('storage/'.$barang->foto) : asset('assets/barang/telur.jpe') }}" alt="{{ $barang->nama_barang }}" class="w-20 h-20 mx-auto object-contain grayscale mb-2" />
                                <span class="text-[9px] font-extrabold uppercase text-gray-500 tracking-wider block text-left">{{ $barang->kategori->nama_kategori ?? 'UMUM' }}</span>
                                <h3 class="font-bold text-xs sm:text-sm text-gray-700 text-left leading-snug line-clamp-2">{{ $barang->nama_barang }}</h3>
                            </div>
                        </div>
                        <div class="p-2.5 space-y-2">
                            <p class="font-bold text-sm text-gray-500 line-through">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</p>
                            <button class="w-full border-2 border-hitam rounded-lg bg-white text-gray-400 py-1 text-[11px] font-bold cursor-not-allowed">🚫 Stok Habis</button>
                        </div>
                    </div>
                    @endif
                @empty
                    <div class="col-span-3 py-10 text-center text-gray-400 font-bold text-xs">
                        Barang tidak ditemukan.
                    </div>
                @endforelse
            </div>

            <!-- PAGINASI NEO-BRUTALIST -->
            <div class="pt-3">
                @if(view()->exists('components.pagination'))
                    {{ $barangs->links('components.pagination') }}
                @else
                    {{ $barangs->links() }}
                @endif
            </div>
        </section>

        <!-- KERANJANG BELANJA (KANAN - STICKY) -->
        <section id="sectionKeranjang" class="lg:col-span-5 xl:col-span-4 kartu p-0 overflow-hidden bg-white sticky top-[75px]">

            <!-- HEADER KERANJANG -->
            <div class="bg-kuning border-b-2 border-hitam p-3 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 bg-white btn-brutal rounded-lg flex items-center justify-center p-1">
                        <img src="{{ asset('assets/icons/toko.svg') }}" alt="Keranjang" class="w-full h-full object-contain" />
                    </span>
                    <div>
                        <h2 class="font-black text-sm text-hitam leading-none">Keranjang Kasir</h2>
                        <span class="text-[10px] font-bold text-hitam/70">
                            #{{ $this->kodeTransaksiBerikutnya }}
                        </span>
                    </div>
                </div>
                <button wire:click="resetKeranjang" title="Kosongkan Keranjang" class="w-8 h-8 bg-white btn-brutal rounded-lg flex items-center justify-center p-1.5 cursor-pointer">
                    <img src="{{ asset('assets/icons/hapusNoBg.svg') }}" alt="Hapus" class="w-full h-full object-contain" />
                </button>
            </div>

            <!-- INFO KASIR & WAKTU CARBON -->
            <div class="bg-gray-100 border-b-2 border-hitam p-2.5 px-3 flex justify-between text-[11px] font-bold text-gray-600">
                <span>Kasir: <strong>{{ auth()->user()->name ?? 'Ibu Ani' }}</strong></span>
                <span>{{ \Carbon\Carbon::now()->translatedFormat('d M Y, H:i') }}</span>
            </div>

            <!-- EMBEDDED KOMPONEN ALERT DI ATAS ITEM KERANJANG -->
            <div class="p-3 pb-0">
                <x-alert type="error" />
            </div>

            <!-- LIST ITEM KERANJANG -->
            <div class="p-3 space-y-2.5 max-h-[260px] overflow-y-auto divide-y divide-gray-100">
                @forelse($keranjang as $id => $item)
                <div class="cart-item pt-2 space-y-1 border-t border-gray-100 first:border-none">
                    <div class="flex justify-between items-start">
                        <div class="pr-2">
                            <h4 class="font-extrabold text-xs text-hitam leading-tight">{{ $item['nama_barang'] }}</h4>
                            <p class="text-[10px] text-gray-500">@Rp {{ number_format($item['harga_jual'], 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="font-black text-xs text-hitam block">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</span>
                            <button wire:click="hapusItem({{ $id }})" class="text-[10px] text-red-600 font-bold hover:underline cursor-pointer">✕ Hapus</button>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 pt-1">
                        <button wire:click="updateQty({{ $id }}, 'kurang')" class="w-6 h-6 btn-brutal rounded bg-white font-bold text-xs flex items-center justify-center cursor-pointer">-</button>
                        <span class="font-black text-xs min-w-[20px] text-center">{{ $item['qty'] }}</span>
                        <button wire:click="updateQty({{ $id }}, 'tambah')" class="w-6 h-6 btn-brutal rounded bg-white font-bold text-xs flex items-center justify-center cursor-pointer">+</button>
                    </div>
                </div>
                @empty
                <div class="py-10 text-center space-y-2">
                    <p class="text-xs font-bold text-gray-400">Keranjang masih kosong</p>
                    <p class="text-[10px] text-gray-400">Klik produk di kiri untuk menambahkan ke transaksi</p>
                </div>
                @endforelse
            </div>

            <!-- PERHITUNGAN & PEMBAYARAN -->
            <div class="bg-gray-50 border-t-2 border-hitam p-3 space-y-3">
                <div class="space-y-1 text-xs font-bold border-b border-gray-200 pb-2">
                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal Transaksi ({{ $this->totalItem }} items)</span>
                        <span>Rp {{ number_format($this->totalHarga, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-[11px] text-gray-400">
                        <span>HPP Modal (Internal)</span>
                        <span>Rp {{ number_format($this->totalHpp, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="flex justify-between items-center bg-white p-2.5 rounded-xl border-2 border-hitam shadow-[2px_2px_0px_#1a1a1a]">
                    <span class="font-black text-xs uppercase tracking-wider text-hitam">TOTAL TAGIHAN</span>
                    <span class="font-black text-xl text-hitam">Rp {{ number_format($this->totalHarga, 0, ',', '.') }}</span>
                </div>

                <div class="space-y-1">
                    <label class="block text-[10px] font-extrabold uppercase text-gray-600">Metode Pembayaran</label>
                    <div class="w-full btn-brutal bg-kuning py-1.5 text-xs font-black rounded-lg flex items-center justify-center gap-1.5 cursor-default">
                        <img src="{{ asset('assets/icons/uang.svg') }}" alt="Tunai" class="w-4 h-4 object-contain shrink-0" />
                        Tunai / Cash
                    </div>
                </div>

                <div class="space-y-1.5">
                    <div class="flex justify-between text-[10px] font-extrabold uppercase">
                        <span class="text-gray-600">UANG TUNAI DITERIMA</span>
                        <span wire:click="setUangPas" class="text-amber-800 cursor-pointer hover:underline">Uang Pas (Rp {{ number_format($this->totalHarga, 0, ',', '.') }})</span>
                    </div>

                    <!-- INPUT Uang Tunai (PLACEHOLDER TEXT) -->
                    <div class="border-2 border-hitam rounded-xl p-2 bg-white flex items-center">
                        <span class="font-black text-sm mr-1 text-gray-400">Rp</span>
                        <input type="text"
                               x-data="{ value: @entangle('bayar').live }"
                               x-init="$watch('value', val => value = val ? String(val).replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.') : '')"
                               x-model="value"
                               placeholder="Masukkan nominal bayar..."
                               class="w-full font-black text-lg outline-none bg-transparent text-hitam placeholder-gray-300" />
                    </div>

                    <!-- QUICK CASH BUTTONS -->
                    <div class="grid grid-cols-4 gap-1 pt-0.5">
                        <button wire:click="setBayar(10000)" class="btn-brutal rounded py-1 text-[10px] font-bold cursor-pointer {{ (int)str_replace('.', '', (string)$bayar) == 10000 ? 'bg-kuning' : 'bg-white' }}">10.000</button>
                        <button wire:click="setBayar(20000)" class="btn-brutal rounded py-1 text-[10px] font-bold cursor-pointer {{ (int)str_replace('.', '', (string)$bayar) == 20000 ? 'bg-kuning' : 'bg-white' }}">20.000</button>
                        <button wire:click="setBayar(50000)" class="btn-brutal rounded py-1 text-[10px] font-bold cursor-pointer {{ (int)str_replace('.', '', (string)$bayar) == 50000 ? 'bg-kuning' : 'bg-white' }}">50.000</button>
                        <button wire:click="setBayar(100000)" class="btn-brutal rounded py-1 text-[10px] font-bold cursor-pointer {{ (int)str_replace('.', '', (string)$bayar) == 100000 ? 'bg-kuning' : 'bg-white' }}">100.000</button>
                    </div>

                    @php
                        $cleanBayar = (int) str_replace('.', '', (string) $bayar);
                    @endphp

                    <div class="border-2 rounded-xl p-2.5 flex justify-between items-center transition-colors {{ $cleanBayar >= $this->totalHarga && $this->totalHarga > 0 ? 'border-hijau bg-hijau-muda text-hijau' : ($cleanBayar < $this->totalHarga && $cleanBayar > 0 ? 'border-merah bg-merah-muda text-merah' : 'border-hitam bg-white text-hitam') }}">
                        <div>
                            <span class="block text-[9px] font-extrabold uppercase text-gray-500">KEMBALIAN KONSUMEN</span>
                        </div>
                        <span class="font-black text-lg">Rp {{ number_format($this->kembali, 0, ',', '.') }}</span>
                    </div>
                </div>

                <!-- TOMBOL SELESAIKAN & CETAK NOTA -->
                <button wire:click="simpanTransaksi"
                        class="w-full btn-brutal bg-kuning py-3 rounded-xl font-black text-sm text-hitam flex items-center justify-center gap-2 cursor-pointer">
                    Selesaikan & Cetak Nota
                </button>
            </div>
        </section>
    </div>
</div>
