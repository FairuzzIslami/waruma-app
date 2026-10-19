<!-- HEADER NAVBAR -->
<header class="w-full bg-white border-b-2 border-secondary px-3 sm:px-4 py-2.5 flex items-center justify-between sticky top-0 z-30"
        x-data="{ openDropdown: false, openLogoutModal: false }">

    <div class="flex items-center gap-2 sm:gap-3">
        {{-- Tombol Toggle Sidebar --}}
        <button id="openBtn" class="p-2 bg-primary rounded-lg font-headline font-bold border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] active:translate-x-[1px] active:translate-y-[1px] active:shadow-none flex items-center justify-center shrink-0 cursor-pointer" aria-label="Menu">
            <img src="{{ asset('assets/icons/humburgerMenu.svg') }}" alt="Menu" class="w-4 h-4 object-contain">
        </button>

        {{-- Shift Clock Info --}}
        <div class="flex items-center gap-1.5 sm:gap-2 bg-gray-100 rounded-full px-2.5 sm:px-3 py-1.5 text-[11px] sm:text-xs font-bold font-headline border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
            <img src="{{ asset('assets/icons/waktuNobg.svg') }}" alt="Shift Clock" class="w-3.5 h-3.5 object-contain shrink-0">
            <span class="truncate">Shift Pagi: 07.00 - 15.00</span>
        </div>
    </div>

    {{-- User Dropdown Area --}}
    <div class="relative">
        <button @click="openDropdown = !openDropdown"
                @click.outside="openDropdown = false"
                class="flex items-center gap-2 bg-gray-50 hover:bg-gray-100 p-1 pr-3 rounded-full border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] active:translate-x-[1px] active:translate-y-[1px] active:shadow-none transition-all cursor-pointer">

            {{-- Foto Profile / Avatar Fallback --}}
            @if (Auth::user() && Auth::user()->foto)
                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Profile" class="w-7 h-7 rounded-full border border-secondary object-cover shrink-0">
            @else
                <div class="w-7 h-7 rounded-full bg-primary border border-secondary flex items-center justify-center font-bold text-xs shrink-0 text-secondary">
                    {{ strtoupper(substr(Auth::user()->username ?? 'A', 0, 1)) }}
                </div>
            @endif

            <span class="text-xs font-headline font-bold text-secondary hidden sm:inline-block">
                {{ ucfirst(Auth::user()->username ?? 'Ibu Ani') }}
            </span>

            {{-- Icon Panah Dropdown Menggunakan IMG --}}
            <img src="{{ asset('assets/icons/chevron-down.svg') }}"
                 alt="Dropdown Arrow"
                 class="w-4 h-4 object-contain transition-transform duration-200"
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
             class="absolute right-0 mt-2 w-52 bg-white rounded-2xl border-2 border-secondary shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] py-2 z-50 overflow-hidden"
             style="display: none;">

            {{-- Info User --}}
            <div class="px-4 py-2 border-b-2 border-secondary/20 bg-amber-50/50">
                <p class="text-xs font-bold font-headline text-secondary leading-tight truncate">
                    {{ ucfirst(Auth::user()->username ?? 'Ibu Ani') }}
                </p>
                <p class="text-[10px] font-body text-gray-500 font-medium">
                    {{ Auth::user()->role->nama_role ?? 'Owner' }}
                </p>
            </div>

            {{-- Link Edit Profil --}}
            <a href="{{ Route::has('profile') ? route('profile') : '#' }}"
               class="flex items-center gap-2 px-4 py-2 text-xs font-headline font-bold text-secondary hover:bg-amber-100 transition-colors">
                <img src="{{ asset('assets/icons/user.svg') }}" alt="Profile" class="w-4 h-4 object-contain">
                <span>Edit Profil & Password</span>
            </a>

            <hr class="border-secondary/20 my-1">

            {{-- Tombol Buka Modal Logout --}}
            <button type="button"
                    @click="openDropdown = false; openLogoutModal = true"
                    class="w-full flex items-center gap-2.5 px-4 py-2 text-xs font-headline font-bold text-red-600 hover:bg-red-50 transition-colors cursor-pointer text-left">
                <img src="{{ asset('assets/icons/log-out.svg') }}" alt="Logout Icon" class="w-4 h-4 object-contain">
                <span>Logout</span>
            </button>
        </div>
    </div>

    {{-- Panggil Component Modal Logout --}}
    <x-modal-logout />
</header>
