<!-- HEADER NAVBAR -->
<header class="w-full bg-white border-b-2 border-secondary px-3 sm:px-4 py-2.5 flex items-center justify-between sticky top-0 z-30 font-body"
        x-data="{ openDropdown: false, openLogoutModal: false }">

    <!-- BAGIAN KIRI: Toggle Sidebar & Status Aplikasi -->
    <div class="flex items-center gap-2 sm:gap-3">
        {{-- Tombol Toggle Sidebar --}}
        <button id="openBtn" class="p-2 bg-primary rounded-xl font-headline font-bold border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] active:translate-x-[1px] active:translate-y-[1px] active:shadow-none flex items-center justify-center shrink-0 cursor-pointer hover:bg-amber-400 transition-colors" aria-label="Menu">
            <img src="{{ asset('assets/icons/humburgerMenu.svg') }}" alt="Menu" class="w-4 h-4 object-contain">
        </button>

        {{-- Indikator Hari & Tanggal --}}
        <div class="hidden md:flex items-center gap-1.5 bg-gray-100 rounded-xl px-3 py-1.5 text-xs font-bold text-gray-700 border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
            <span class="font-headline font-black text-secondary">{{ \Carbon\Carbon::now()->translatedFormat('l, d M Y') }}</span>
        </div>
    </div>

    <!-- BAGIAN KANAN: Tanggal & Profil User -->
    <div class="flex items-center gap-2.5">
        {{-- User Dropdown Area --}}
        <div class="relative">
            <button @click="openDropdown = !openDropdown"
                    @click.outside="openDropdown = false"
                    class="flex items-center gap-2 bg-white hover:bg-amber-50/60 p-1 pr-3 rounded-full border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] active:translate-x-[1px] active:translate-y-[1px] active:shadow-none transition-all cursor-pointer">

                {{-- Foto Profile / Avatar Fallback --}}
                @if (Auth::user() && Auth::user()->foto)
                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Profile" class="w-7 h-7 rounded-full border border-secondary object-cover shrink-0">
                @else
                    <div class="w-7 h-7 rounded-full bg-primary border-1.5 border-secondary flex items-center justify-center font-black text-xs shrink-0 text-secondary">
                        {{ strtoupper(substr(Auth::user()->username ?? 'A', 0, 1)) }}
                    </div>
                @endif

                <span class="text-xs font-headline font-black text-secondary hidden sm:inline-block truncate max-w-[120px]">
                    {{ ucfirst(Auth::user()->username ?? 'Admin Warung') }}
                </span>

                {{-- Icon Panah Dropdown --}}
                <img src="{{ asset('assets/icons/chevron-down.svg') }}"
                     alt="Dropdown Arrow"
                     class="w-3.5 h-3.5 object-contain transition-transform duration-200 shrink-0"
                     :class="openDropdown ? 'rotate-180' : ''">
            </button>

            {{-- Dropdown Menu --}}
            <div x-show="openDropdown"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-56 bg-white rounded-2xl border-2 border-secondary shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] py-2 z-50 overflow-hidden"
                 style="display: none;">

                {{-- Info User & Badge Role --}}
                <div class="px-4 py-2.5 border-b-2 border-secondary/20 bg-amber-50/60 flex items-center justify-between gap-2">
                    <div class="overflow-hidden">
                        <p class="text-xs font-black font-headline text-secondary leading-tight truncate">
                            {{ ucfirst(Auth::user()->username ?? 'Admin Warung') }}
                        </p>
                        <p class="text-[10px] font-body text-gray-500 font-bold mt-0.5">
                            Akun Terhubung
                        </p>
                    </div>
                    <span class="border-1.5 border-secondary bg-primary text-[9px] font-extrabold px-2 py-0.5 rounded-full text-secondary uppercase shrink-0 font-headline">
                        {{ Auth::user()->role->nama_role ?? 'Owner' }}
                    </span>
                </div>

                {{-- Link Pengaturan Profil --}}
                <a href="{{ route('profile') }}"
                   class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-headline font-bold text-secondary hover:bg-amber-100 transition-colors">
                    <img src="{{ asset('assets/icons/user.svg') }}" alt="Profile" class="w-4 h-4 object-contain shrink-0">
                    <span>Pengaturan Akun</span>
                </a>

                <hr class="border-secondary/20 my-1">

                {{-- Tombol Logout --}}
                <button type="button"
                        @click="openDropdown = false; openLogoutModal = true"
                        class="w-full flex items-center gap-2.5 px-4 py-2.5 text-xs font-headline font-extrabold text-red-600 hover:bg-red-50 transition-colors cursor-pointer text-left">
                    <img src="{{ asset('assets/icons/log-out.svg') }}" alt="Logout Icon" class="w-4 h-4 object-contain shrink-0">
                    <span>Keluar Akun</span>
                </button>
            </div>
        </div>
    </div>

    {{-- Component Modal Logout --}}
    <x-modal-logout />
</header>
