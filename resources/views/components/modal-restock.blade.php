<div class="fixed inset-0 z-50 {{ $this->showModalRestock ? 'flex' : 'hidden' }} items-center justify-center bg-black/45 p-4 font-body">
    <div class="border-2.5 border-secondary rounded-2xl bg-white shadow-[5px_5px_0px_#232323] max-w-[95vw] w-[400px] overflow-hidden animate-in fade-in zoom-in-95 duration-150">
        <form wire:submit.prevent="submitRestock" class="p-4 sm:p-5 space-y-3">
            <h3 class="font-bold text-base font-headline">Restock {{ $this->restockNama }}</h3>
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
                <button type="button" wire:click="$set('showModalRestock', false)" class="border-2 border-secondary bg-white px-3.5 py-1.5 rounded-lg text-xs font-semibold shadow-[2px_2px_0px_#232323] cursor-pointer hover:bg-gray-100">Batal</button>
                <button type="submit" class="border-2 border-secondary bg-primary rounded-lg px-3.5 py-1.5 text-xs font-bold shadow-[2px_2px_0px_#232323] cursor-pointer hover:bg-amber-400">Tambah stok</button>
            </div>
        </form>
    </div>
</div>
