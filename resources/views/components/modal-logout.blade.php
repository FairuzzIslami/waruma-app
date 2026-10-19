<!-- MODAL LOGOUT POPUP -->
<div x-show="openLogoutModal"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95"
     class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-xs"
     style="display: none;"
     @keydown.escape.window="openLogoutModal = false">

    <!-- Modal Card (Neobrutalism Style) -->
    <div class="relative w-full max-w-sm bg-white rounded-2xl border-2 border-secondary shadow-[6px_6px_0px_0px_rgba(35,35,35,1)] p-5 sm:p-6 space-y-4 text-center overflow-hidden"
         @click.outside="openLogoutModal = false">

        <!-- Header Badge / Icon Warning -->
        <div class="mx-auto w-12 h-12 rounded-2xl bg-amber-100 border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] flex items-center justify-center">
            <img src="{{ asset('assets/icons/peringatanMerah.svg') }}" alt="Peringatan" class="w-6 h-6 object-contain">
        </div>

        <!-- Content Text -->
        <div class="space-y-1.5">
            <h3 class="text-base sm:text-lg font-extrabold font-headline text-secondary leading-tight">
                Konfirmasi Keluar
            </h3>
            <p class="text-xs font-body text-slate-600 leading-relaxed">
                Apakah kamu yakin ingin keluar dari aplikasi WaruMa? Kamu harus login kembali untuk mengakses kasir.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-2.5 pt-2">
            <!-- Tombol Batal -->
            <button type="button"
                    @click="openLogoutModal = false"
                    class="flex-1 px-4 py-2.5 bg-white hover:bg-slate-100 text-secondary font-headline font-bold text-xs rounded-xl border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] active:translate-x-[1px] active:translate-y-[1px] active:shadow-none transition-all cursor-pointer">
                Batal
            </button>

            <!-- Form & Tombol Ya, Logout -->
            <form action="{{ route('logout') }}" method="POST" class="flex-1 m-0">
                @csrf
                <button type="submit"
                        class="w-full px-4 py-2.5 bg-red-500 hover:bg-red-600 text-white font-headline font-bold text-xs rounded-xl border-2 border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] active:translate-x-[1px] active:translate-y-[1px] active:shadow-none transition-all cursor-pointer">
                    Ya, Keluar
                </button>
            </form>
        </div>
    </div>
</div>
