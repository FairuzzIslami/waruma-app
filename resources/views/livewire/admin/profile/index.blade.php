<div class="space-y-6" x-data="{ showFotoModal: false }">

    {{-- HEADER PAGE --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b-2 border-secondary pb-4">
        <div>
            <h1 class="text-2xl font-extrabold font-headline text-secondary flex items-center gap-2">
                <img src="{{ asset('assets/icons/user.svg') }}" alt="User" class="w-7 h-7 object-contain">
                <span>Profil Pengguna</span>
            </h1>
            <p class="text-xs font-body text-slate-600 mt-1">
                Informasi data diri dan hak akses akun WaruMa milikmu.
            </p>
        </div>
    </div>

    {{-- ALERT SUKSES UPDATE PROFIL / PASSWORD --}}
    @if (session()->has('success'))
        <x-alert type="success" title="Berhasil!" :message="session('success')" />
    @endif

    {{-- KARTU UTAMA PROFIL --}}
    <div class="bg-white border-2 border-secondary rounded-2xl shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] p-5 sm:p-8">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 sm:gap-8">

            {{-- FOTO PROFILE (PENGUNCI UKURAN PASTI) --}}
            <div class="flex flex-col items-center shrink-0">
                <div class="rounded-full overflow-hidden border-2 border-secondary shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] shrink-0 bg-primary flex items-center justify-center"
                     style="width: 144px; height: 144px; min-width: 144px; min-height: 144px; max-width: 144px; max-height: 144px;">
                    @if ($user->foto)
                        <img src="{{ asset('storage/' . $user->foto) }}"
                             @click="showFotoModal = true"
                             alt="Foto Profil {{ $user->username }}"
                             class="hover:scale-105 transition-all cursor-pointer"
                             style="width: 100%; height: 100%; object-fit: cover; display: block;">
                    @else
                        <span class="font-bold font-headline text-4xl text-secondary select-none">
                            {{ strtoupper(substr($user->username ?? 'A', 0, 1)) }}
                        </span>
                    @endif
                </div>
                @if ($user->foto)
                    <p class="text-[10px] font-body text-gray-400 mt-2">Klik foto untuk memperbesar</p>
                @endif
            </div>

            {{-- INFO PROFILE (KANAN) --}}
            <div class="flex-1 w-full space-y-4 text-left min-w-0">
                <div class="space-y-1">
                    <h2 class="text-2xl sm:text-3xl font-black font-headline text-secondary truncate">
                        {{ ucfirst($user->username) }}
                    </h2>
                    <span class="inline-block bg-amber-100 border-2 border-secondary px-3 py-1 rounded-full text-xs font-bold font-headline text-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                        {{ ucfirst($user->role->nama_role ?? 'Owner / Admin Toko') }}
                    </span>
                </div>

                <hr class="border-secondary/20">

                <div class="space-y-2.5 text-xs font-body text-slate-700">
                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-1 sm:gap-2">
                        <span class="sm:col-span-4 font-headline font-bold text-secondary">Username:</span>
                        <span class="sm:col-span-8 font-semibold text-slate-800">{{ $user->username }}</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-1 sm:gap-2">
                        <span class="sm:col-span-4 font-headline font-bold text-secondary">Bergabung Sejak:</span>
                        <span class="sm:col-span-8 font-semibold text-slate-800">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-1 sm:gap-2">
                        <span class="sm:col-span-4 font-headline font-bold text-secondary">Hak Akses:</span>
                        <span class="sm:col-span-8 font-medium text-slate-600 leading-relaxed">
                            Mengelola seluruh sistem WaruMa (POS Kasir, Kelola Stok, Kategori, & Laporan Laba Rugi).
                        </span>
                    </div>
                </div>

                {{-- TOMBOL AKSI --}}
                <div class="pt-4 flex flex-wrap items-center gap-3">
                    <x-button tag="a" href="{{ route('profile.edit') }}" wire:navigate variant="primary" size="md" class="inline-flex items-center gap-2">
                        <span>Edit Profil</span>
                    </x-button>

                    <x-button tag="a" href="{{ route('profile.password') }}" wire:navigate variant="secondary" size="md" class="inline-flex items-center gap-2">
                        <span>Ubah Password</span>
                    </x-button>
                </div>
            </div>

        </div>
    </div>

    {{-- MODAL PREVIEW FOTO BESAR (UKURAN PROPOSIONAL & DENGAN TOMBOL CLOSE) --}}
    @if ($user->foto)
        <div x-show="showFotoModal"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs"
             style="display: none;"
             @keydown.escape.window="showFotoModal = false">

            <div class="relative bg-white border-2 border-secondary rounded-2xl p-4 shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] max-w-sm w-full mx-auto"
                 @click.outside="showFotoModal = false">

                {{-- Header Modal & Close Button --}}
                <div class="flex items-center justify-between pb-2 mb-3 border-b-2 border-secondary/20">
                    <h3 class="text-sm font-extrabold font-headline text-secondary">
                        Foto Profil
                    </h3>
                    <button type="button"
                            @click="showFotoModal = false"
                            class="w-7 h-7 rounded-lg bg-amber-400 hover:bg-amber-500 border-2 border-secondary font-extrabold flex items-center justify-center text-xs shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] active:translate-x-[1px] active:translate-y-[1px] active:shadow-none transition-all cursor-pointer">
                        ✕
                    </button>
                </div>

                {{-- Gambar Foto Profil Pas & Rapi --}}
                <div class="flex justify-center items-center bg-gray-50 rounded-xl border border-secondary/30 p-2 overflow-hidden">
                    <img src="{{ asset('storage/' . $user->foto) }}"
                         alt="Foto Profil {{ $user->username }}"
                         class="rounded-lg object-contain w-full max-h-[380px]">
                </div>
            </div>
        </div>
    @endif

</div>
