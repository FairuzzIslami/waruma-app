<div class="max-w-2xl mx-auto space-y-6">

    <div class="flex items-center justify-between border-b-2 border-secondary pb-4">
        <div>
            <h1 class="text-2xl font-extrabold font-headline text-secondary">Edit Informasi Profil</h1>
            <p class="text-xs font-body text-slate-600 mt-1">Perbarui username dan foto profil akun kamu.</p>
        </div>
        <x-button tag="a" href="{{ route('profile') }}" wire:navigate variant="secondary" size="sm">
            &larr; Kembali
        </x-button>
    </div>

    <div class="bg-white border-2 border-secondary rounded-2xl shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] p-6 space-y-5">
        <form wire:submit="save" class="space-y-4">
            {{-- Foto Profile Preview & Input --}}
            <div class="space-y-2">
                <label class="block font-label font-bold text-xs text-secondary tracking-wider">Foto Profil</label>
                <div class="flex items-center gap-4">
                    @if ($foto)
                        <img src="{{ $foto->temporaryUrl() }}" class="w-16 h-16 rounded-full border-2 border-secondary object-cover shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                    @elseif ($existingFoto)
                        <img src="{{ asset('storage/' . $existingFoto) }}" class="w-16 h-16 rounded-full border-2 border-secondary object-cover shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                    @else
                        <div class="w-16 h-16 rounded-full bg-primary border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] flex items-center justify-center font-bold text-xl text-secondary">
                            {{ strtoupper(substr($username ?? 'A', 0, 1)) }}
                        </div>
                    @endif

                    <div class="flex-1">
                        <input type="file" wire:model="foto" accept="image/*" class="text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-2 file:border-secondary file:text-xs file:font-bold file:bg-primary file:text-secondary cursor-pointer">
                        @error('foto') <span class="text-red-500 text-xs font-bold block mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Username Input --}}
            <div class="space-y-1.5">
                <label class="block font-label font-bold text-xs text-secondary tracking-wider">Username</label>
                <input type="text" wire:model="username" class="w-full px-3.5 py-2.5 bg-white border-2 @error('username') border-red-500 @else border-secondary @enderror rounded-xl font-headline text-xs font-bold text-secondary focus:outline-none focus:ring-2 focus:ring-primary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                @error('username') <span class="text-red-500 text-xs font-semibold block mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="pt-2 flex items-center gap-3">
                <x-button type="submit" variant="primary" size="md" wire:loading.attr="disabled">
                    <span>Simpan Perubahan</span>
                </x-button>
                <x-button tag="a" href="{{ route('profile') }}" wire:navigate variant="secondary" size="md">
                    <span>Batal</span>
                </x-button>
            </div>
        </form>
    </div>

</div>
