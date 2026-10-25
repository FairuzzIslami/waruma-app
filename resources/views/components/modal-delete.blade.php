<div class="fixed inset-0 z-50 {{ $this->showModalDelete ? 'flex' : 'hidden' }} items-center justify-center bg-black/45 p-4 font-body">
    <div class="border-2.5 border-secondary rounded-2xl bg-white shadow-[5px_5px_0px_#232323] max-w-[95vw] w-[400px] overflow-hidden animate-in fade-in zoom-in-95 duration-150">
        <div class="bg-primary border-b-2 border-secondary p-3 flex items-center justify-between">
            <h3 class="font-extrabold text-sm text-secondary font-headline">Konfirmasi Hapus</h3>
            <button type="button" wire:click="$set('showModalDelete', false)" class="w-7 h-7 rounded-lg border-2 border-secondary bg-white grid place-items-center font-extrabold text-secondary shadow-[2px_2px_0px_#232323] text-xs cursor-pointer">✕</button>
        </div>
        <div class="p-5 text-center space-y-4">
            <p class="text-xs font-bold text-secondary">Apakah Anda yakin ingin menghapus {{ count($this->selectedBarang) }} data produk ini?</p>
            <div class="flex items-center justify-center gap-2 pt-2">
                <button type="button" wire:click="$set('showModalDelete', false)" class="border-2 border-secondary bg-white px-4 py-1.5 rounded-lg text-xs font-bold text-secondary shadow-[2px_2px_0px_#232323] cursor-pointer">Batal</button>
                <button type="button" wire:click="deleteSelected" class="border-2 border-secondary bg-red-600 text-white px-4 py-1.5 rounded-lg text-xs font-bold shadow-[2px_2px_0px_#232323] cursor-pointer">Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>
