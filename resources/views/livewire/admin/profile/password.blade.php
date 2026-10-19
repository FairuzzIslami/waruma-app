<div class="max-w-2xl mx-auto space-y-6">

    {{-- HEADER PAGE --}}
    <div class="flex items-center justify-between border-b-2 border-secondary pb-4">
        <div>
            <h1 class="text-2xl font-extrabold font-headline text-secondary flex items-center gap-2">
                Ubah Password
            </h1>
            <p class="text-xs font-body text-slate-600 mt-1">Ganti password lama kamu demi keamanan akun WaruMa.</p>
        </div>
        <x-button tag="a" href="{{ route('profile') }}" wire:navigate variant="secondary" size="sm">
            &larr; Kembali
        </x-button>
    </div>

    {{-- FORM UBAH PASSWORD --}}
    <div class="bg-white border-2 border-secondary rounded-2xl shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] p-6 space-y-5">
        <form wire:submit="save" class="space-y-4">

            {{-- Password Saat Ini --}}
            <div class="space-y-1.5">
                <label class="block font-label font-bold text-xs text-secondary tracking-wider">
                    Password Saat Ini
                </label>
                <div class="relative" x-data="{ show: false }">
                    <input :type="show ? 'text' : 'password'"
                           wire:model="current_password"
                           placeholder="masukkan password saat ini"
                           class="w-full pl-4 pr-10 py-2.5 bg-white border-2 @error('current_password') border-red-500 @else border-secondary @enderror text-secondary rounded-xl font-headline text-xs font-bold focus:outline-none focus:ring-2 focus:ring-primary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all">

                    <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-secondary focus:outline-none cursor-pointer">
                        <img src="{{ asset('assets/icons/eye.svg') }}" alt="Show Password" class="w-5 h-5 opacity-60" x-show="!show">
                        <img src="{{ asset('assets/icons/eye-off.svg') }}" alt="Hide Password" class="w-5 h-5 opacity-60" x-show="show" x-cloak>
                    </button>
                </div>
                @error('current_password')
                    <span class="text-red-500 text-xs font-semibold block mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password Baru --}}
            <div class="space-y-1.5">
                <label class="block font-label font-bold text-xs text-secondary tracking-wider">
                    Password Baru
                </label>
                <div class="relative" x-data="{ show: false }">
                    <input :type="show ? 'text' : 'password'"
                           wire:model="new_password"
                           placeholder="minimal 6 karakter"
                           class="w-full pl-4 pr-10 py-2.5 bg-white border-2 @error('new_password') border-red-500 @else border-secondary @enderror text-secondary rounded-xl font-headline text-xs font-bold focus:outline-none focus:ring-2 focus:ring-primary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all">

                    <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-secondary focus:outline-none cursor-pointer">
                        <img src="{{ asset('assets/icons/eye.svg') }}" alt="Show Password" class="w-5 h-5 opacity-60" x-show="!show">
                        <img src="{{ asset('assets/icons/eye-off.svg') }}" alt="Hide Password" class="w-5 h-5 opacity-60" x-show="show" x-cloak>
                    </button>
                </div>
                @error('new_password')
                    <span class="text-red-500 text-xs font-semibold block mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Konfirmasi Password Baru --}}
            <div class="space-y-1.5">
                <label class="block font-label font-bold text-xs text-secondary tracking-wider">
                    Konfirmasi Password Baru
                </label>
                <div class="relative" x-data="{ show: false }">
                    <input :type="show ? 'text' : 'password'"
                           wire:model="new_password_confirmation"
                           placeholder="ulangi password baru"
                           class="w-full pl-4 pr-10 py-2.5 bg-white border-2 border-secondary text-secondary rounded-xl font-headline text-xs font-bold focus:outline-none focus:ring-2 focus:ring-primary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all">

                    <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-secondary focus:outline-none cursor-pointer">
                        <img src="{{ asset('assets/icons/eye.svg') }}" alt="Show Password" class="w-5 h-5 opacity-60" x-show="!show">
                        <img src="{{ asset('assets/icons/eye-off.svg') }}" alt="Hide Password" class="w-5 h-5 opacity-60" x-show="show" x-cloak>
                    </button>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="pt-2 flex items-center gap-3">
                <x-button type="submit" variant="dark" size="md" wire:loading.attr="disabled">
                    <span>Perbarui Password</span>
                </x-button>
                <x-button tag="a" href="{{ route('profile') }}" wire:navigate variant="secondary" size="md">
                    <span>Batal</span>
                </x-button>
            </div>
        </form>
    </div>

</div>
