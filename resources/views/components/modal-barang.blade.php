@props(['kategoris', 'satuans'])

<div class="fixed inset-0 z-50 {{ $this->showModalForm ? 'flex' : 'hidden' }} items-center justify-center bg-black/40 p-3 sm:p-4 font-body">
    <div class="border-2.5 border-secondary rounded-2xl bg-white shadow-[6px_6px_0px_#232323] max-w-[95vw] w-[560px] max-h-[90vh] flex flex-col overflow-hidden animate-in fade-in zoom-in-95 duration-150">

        <!-- HEADER MODAL -->
        <div class="bg-primary border-b-2 border-secondary p-3.5 sm:p-4 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-secondary inline-block"></span>
                <h3 class="font-extrabold text-sm sm:text-base text-secondary font-headline">
                    {{ $this->isEditMode ? 'Edit Data Barang' : 'Tambah Barang Baru' }}
                </h3>
            </div>
            <button type="button" wire:click="$set('showModalForm', false)" class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl border-2 border-secondary bg-white grid place-items-center font-black text-secondary shadow-[2px_2px_0px_#232323] text-xs hover:bg-red-100 cursor-pointer transition-colors">✕</button>
        </div>

        <!-- FORM BODY -->
        <form wire:submit.prevent="saveBarang" class="flex flex-col min-h-0 flex-1">
            <div class="p-4 sm:p-5 space-y-4 overflow-y-auto flex-1 custom-scrollbar">

                <!-- UPLOAD FOTO PRODUK -->
                <div>
                    <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1.5 font-headline">FOTO PRODUK (WAJIB ADA)</label>

                    <label class="relative flex flex-col items-center justify-center w-full min-h-[130px] p-4 bg-[#F8F7F0] border-2 @error('foto') border-red-600 bg-red-50/30 @else border-dashed border-secondary @enderror rounded-2xl cursor-pointer hover:bg-amber-50/60 transition-all text-center group">

                        @if ($this->foto)
                            <div class="w-16 h-16 sm:w-20 sm:h-20 border-2 border-secondary rounded-2xl bg-white p-0.5 overflow-hidden shadow-[3px_3px_0px_#232323] mb-2">
                                <img src="{{ $this->foto->temporaryUrl() }}" class="w-full h-full object-cover rounded-xl" />
                            </div>
                            <p class="text-xs font-extrabold text-secondary font-headline">Foto Terpilih</p>
                            <p class="text-[10px] font-semibold text-gray-500">Klik lagi untuk mengganti foto</p>

                        @elseif ($this->oldFoto)
                            <div class="w-16 h-16 sm:w-20 sm:h-20 border-2 border-secondary rounded-2xl bg-white p-0.5 overflow-hidden shadow-[3px_3px_0px_#232323] mb-2">
                                <img src="{{ asset('storage/' . $this->oldFoto) }}" class="w-full h-full object-cover rounded-xl" />
                            </div>
                            <p class="text-xs font-extrabold text-secondary font-headline">Foto Saat Ini</p>
                            <p class="text-[10px] font-semibold text-gray-500">Klik untuk mengganti foto</p>

                        @else
                            <div class="w-12 h-12 border-2 border-secondary rounded-2xl bg-white flex items-center justify-center shadow-[3px_3px_0px_#232323] mb-2 group-hover:scale-105 transition-transform">
                                <img src="{{ asset('assets/icons/camera.svg') }}" alt="Kamera" class="w-6 h-6 object-contain" />
                            </div>
                            <p class="text-xs font-extrabold text-secondary font-headline">Pilih file foto produk</p>
                            <p class="text-[10px] font-semibold text-gray-500 mt-0.5">Format PNG/JPG maksimal 2MB</p>
                        @endif

                        <input type="file" wire:model="foto" accept="image/*" class="hidden" />
                    </label>

                    @error('foto')
                        <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                    @enderror
                </div>

                <!-- KODE BARANG & NAMA BARANG -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">KODE BARANG</label>
                        <input type="text" wire:model="kode_barang" readonly class="w-full p-2.5 text-xs bg-gray-100 border-2 border-secondary rounded-2xl font-black text-secondary outline-none cursor-not-allowed shadow-[3px_3px_0px_#232323]" />
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">NAMA BARANG</label>
                        <input type="text" wire:model="nama_barang" placeholder="Masukkan nama barang..." class="w-full p-2.5 text-xs bg-white border-2 @error('nama_barang') border-red-600 text-red-600 @else border-secondary text-secondary @enderror rounded-2xl font-bold outline-none shadow-[3px_3px_0px_#232323] focus:bg-amber-50/50" />
                        @error('nama_barang')
                            <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- KATEGORI & SATUAN -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">KATEGORI</label>
                        <select wire:model="kategori_id" class="w-full p-2.5 text-xs bg-white border-2 @error('kategori_id') border-red-600 text-red-600 @else border-secondary text-secondary @enderror rounded-2xl font-bold outline-none shadow-[3px_3px_0px_#232323] cursor-pointer">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">SATUAN</label>
                        <select wire:model="satuan_id" class="w-full p-2.5 text-xs bg-white border-2 @error('satuan_id') border-red-600 text-red-600 @else border-secondary text-secondary @enderror rounded-2xl font-bold outline-none shadow-[3px_3px_0px_#232323] cursor-pointer uppercase">
                            <option value="">-- Pilih Satuan --</option>
                            @foreach($satuans as $sat)
                                <option value="{{ $sat->id }}">{{ $sat->nama_satuan }}</option>
                            @endforeach
                        </select>
                        @error('satuan_id')
                            <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- HARGA BELI (HPP) & HARGA JUAL -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">HARGA BELI (HPP MODAL)</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-xs font-black @error('harga_beli') text-red-500 @else text-slate-500 @enderror">Rp</span>
                            <input
                                type="text"
                                x-data="{ value: @entangle('harga_beli').live }"
                                x-init="$watch('value', val => value = val ? String(val).replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.') : '')"
                                x-model="value"
                                placeholder="0"
                                class="w-full pl-10 pr-3.5 py-2.5 text-xs bg-white border-2 @error('harga_beli') border-red-600 text-red-600 @else border-secondary text-slate-700 @enderror rounded-2xl font-black outline-none shadow-[3px_3px_0px_#232323]"
                            />
                        </div>
                        @error('harga_beli')
                            <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">HARGA JUAL</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-xs font-black @error('harga_jual') text-red-500 @else text-slate-500 @enderror">Rp</span>
                            <input
                                type="text"
                                x-data="{ value: @entangle('harga_jual').live }"
                                x-init="$watch('value', val => value = val ? String(val).replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.') : '')"
                                x-model="value"
                                placeholder="0"
                                class="w-full pl-10 pr-3.5 py-2.5 text-xs bg-white border-2 @error('harga_jual') border-red-600 text-red-600 @else border-secondary text-slate-700 @enderror rounded-2xl font-black outline-none shadow-[3px_3px_0px_#232323]"
                            />
                        </div>
                        @error('harga_jual')
                            <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- STOK AWAL & BATAS MINIMUM STOK -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">STOK AWAL</label>
                        <input type="number" wire:model="stok" placeholder="0" class="w-full px-3.5 py-2.5 text-xs bg-white border-2 @error('stok') border-red-600 text-red-600 @else border-secondary text-slate-700 @enderror rounded-2xl font-black outline-none shadow-[3px_3px_0px_#232323]" />
                        @error('stok')
                            <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">BATAS MINIMUM STOK</label>
                        <input type="number" wire:model="min_stok" placeholder="0" class="w-full px-3.5 py-2.5 text-xs bg-white border-2 @error('min_stok') border-red-600 text-red-600 @else border-secondary text-slate-700 @enderror rounded-2xl font-black outline-none shadow-[3px_3px_0px_#232323]" />
                        @error('min_stok')
                            <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>

            <!-- FOOTER MODAL -->
            <div class="p-3.5 sm:p-4 bg-gray-50 border-t-2 border-secondary flex items-center justify-end gap-2 shrink-0">
                <button type="button" wire:click="$set('showModalForm', false)" class="border-2 border-secondary bg-white px-4 py-2 rounded-xl text-xs font-bold text-secondary shadow-[2px_2px_0px_#232323] cursor-pointer hover:bg-gray-100">Batal</button>
                <button type="submit" wire:loading.attr="disabled" class="border-2 border-secondary bg-primary px-5 py-2 rounded-xl text-xs font-black text-secondary shadow-[2px_2px_0px_#232323] cursor-pointer hover:translate-x-[-1px] hover:translate-y-[-1px] active:translate-x-[1px] active:translate-y-[1px] transition-all inline-flex items-center gap-1.5">
                    Simpan Data
                </button>
            </div>
        </form>

    </div>
</div>
