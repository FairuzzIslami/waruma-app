<!-- MODAL FORM OPERASIONAL (TAMBAH / EDIT) -->
<div class="fixed inset-0 z-50 {{ $this->showModalOperasional ? 'flex' : 'hidden' }} items-center justify-center bg-black/40 p-3 sm:p-4 font-body">
    <div class="border-2.5 border-secondary rounded-2xl bg-white shadow-[6px_6px_0px_#232323] max-w-[95vw] w-[520px] max-h-[90vh] flex flex-col overflow-hidden animate-in fade-in zoom-in-95 duration-150">

        <!-- HEADER MODAL -->
        <div class="bg-primary border-b-2 border-secondary p-3.5 sm:p-4 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-secondary inline-block"></span>
                <h3 class="font-extrabold text-sm sm:text-base text-secondary font-headline uppercase">
                    {{ $this->isEditMode ? 'Edit Keperluan Toko' : 'Catat Keperluan Toko' }}
                </h3>
            </div>
            <button type="button" wire:click="$set('showModalOperasional', false)" class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl border-2 border-secondary bg-white grid place-items-center font-black text-secondary shadow-[2px_2px_0px_#232323] text-xs hover:bg-red-100 cursor-pointer transition-colors">✕</button>
        </div>

        <!-- FORM BODY -->
        <form wire:submit.prevent="saveOperasional" class="flex flex-col min-h-0 flex-1">
            <div class="p-4 sm:p-5 space-y-4 overflow-y-auto flex-1 custom-scrollbar">

                <!-- NAMA KEPERLUAN -->
                <div>
                    <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">KEPERLUAN / NAMA BIAYA</label>
                    <input type="text"
                           wire:model="keperluan"
                           placeholder="Contoh: Token Listrik Kulkas..."
                           class="w-full p-2.5 text-xs bg-white border-2 @error('keperluan') border-red-600 text-red-600 @else border-secondary text-secondary @enderror rounded-2xl font-bold outline-none shadow-[3px_3px_0px_#232323] focus:bg-amber-50/50" />
                    @error('keperluan')
                        <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                    @enderror
                </div>

                <!-- TANGGAL OPERASIONAL -->
                <div>
                    <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">TANGGAL BIAYA</label>
                    <input type="date"
                           wire:model="tanggal_operasional"
                           class="w-full p-2.5 text-xs bg-white border-2 @error('tanggal_operasional') border-red-600 text-red-600 @else border-secondary text-secondary @enderror rounded-2xl font-bold outline-none shadow-[3px_3px_0px_#232323] cursor-pointer" />
                    @error('tanggal_operasional')
                        <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NOMINAL BIAYA (FORMAT CURRENCY) -->
                <div>
                    <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">NOMINAL BIAYA (RP)</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3.5 text-xs font-black @error('nominal') text-red-500 @else text-slate-500 @enderror">Rp</span>
                        <input type="text"
                               x-data="{ value: @entangle('nominal').live }"
                               x-init="$watch('value', val => value = val ? String(val).replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.') : '')"
                               x-model="value"
                               placeholder="0"
                               class="w-full pl-10 pr-3.5 py-2.5 text-xs bg-white border-2 @error('nominal') border-red-600 text-red-600 @else border-secondary text-slate-700 @enderror rounded-2xl font-black outline-none shadow-[3px_3px_0px_#232323]" />
                    </div>
                    @error('nominal')
                        <p class="text-[11px] font-extrabold text-red-600 mt-1 leading-tight">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CATATAN TAMBAHAN -->
                <div>
                    <label class="block text-[10px] font-extrabold text-secondary uppercase tracking-wider mb-1 font-headline">CATATAN TAMBAHAN (OPSIONAL)</label>
                    <textarea wire:model="catatan"
                              rows="3"
                              placeholder="Catatan shift, lokasi pembelian, dll..."
                              class="w-full p-2.5 text-xs bg-white border-2 border-secondary text-secondary rounded-2xl font-semibold outline-none shadow-[3px_3px_0px_#232323] resize-none focus:bg-amber-50/50"></textarea>
                </div>

            </div>

            <!-- FOOTER MODAL -->
            <div class="p-3.5 sm:p-4 bg-gray-50 border-t-2 border-secondary flex items-center justify-end gap-2 shrink-0">
                @if($this->isEditMode)
                    <button type="button"
                            wire:click="confirmDeleteOperasional({{ $this->operasionalId }})"
                            class="border-2 border-red-600 bg-red-100 px-4 py-2 rounded-xl text-xs font-bold text-red-600 shadow-[2px_2px_0px_#232323] cursor-pointer hover:bg-red-200">
                        Hapus
                    </button>
                @endif
                <button type="button"
                        wire:click="$set('showModalOperasional', false)"
                        class="border-2 border-secondary bg-white px-4 py-2 rounded-xl text-xs font-bold text-secondary shadow-[2px_2px_0px_#232323] cursor-pointer hover:bg-gray-100">
                    Batal
                </button>
                <button type="submit"
                        wire:loading.attr="disabled"
                        class="border-2 border-secondary bg-primary px-5 py-2 rounded-xl text-xs font-black text-secondary shadow-[2px_2px_0px_#232323] cursor-pointer hover:translate-x-[-1px] hover:translate-y-[-1px] active:translate-x-[1px] active:translate-y-[1px] transition-all">
                    Simpan Biaya
                </button>
            </div>
        </form>

    </div>
</div>

<!-- MODAL KONFIRMASI HAPUS OPERASIONAL -->
<div class="fixed inset-0 z-50 {{ $this->showModalDeleteOperasional ? 'flex' : 'hidden' }} items-center justify-center bg-black/40 p-3 font-body">
    <div class="border-2.5 border-secondary rounded-2xl bg-white shadow-[6px_6px_0px_#232323] max-w-sm w-full overflow-hidden animate-in fade-in zoom-in-95 duration-150">

        <div class="bg-primary border-b-2 border-secondary p-3.5 flex items-center justify-between">
            <h3 class="font-extrabold text-sm text-secondary font-headline uppercase">Konfirmasi Hapus</h3>
            <button type="button" wire:click="$set('showModalDeleteOperasional', false)" class="w-7 h-7 rounded-xl border-2 border-secondary bg-white grid place-items-center font-black text-secondary shadow-[2px_2px_0px_#232323] text-xs hover:bg-red-100 cursor-pointer">✕</button>
        </div>

        <div class="p-5 text-center space-y-4">
            <p class="text-xs font-extrabold text-secondary">Apakah Anda yakin ingin menghapus catatan biaya operasional ini?</p>
            <div class="flex items-center justify-center gap-2 pt-1">
                <button type="button" wire:click="$set('showModalDeleteOperasional', false)" class="border-2 border-secondary bg-white px-4 py-2 rounded-xl text-xs font-bold text-secondary shadow-[2px_2px_0px_#232323] cursor-pointer hover:bg-gray-100">Batal</button>
                <button type="button" wire:click="deleteOperasional" class="border-2 border-secondary bg-red-600 text-white px-4 py-2 rounded-xl text-xs font-black shadow-[2px_2px_0px_#232323] cursor-pointer hover:bg-red-700">Ya, Hapus</button>
            </div>
        </div>

    </div>
</div>
