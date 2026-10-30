<!-- MODAL LOGOUT POPUP (WARUMA NEO-BRUTALIST STYLE) -->
<div x-show="openLogoutModal"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95"
     class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs font-body"
     style="display: none;"
     @keydown.escape.window="openLogoutModal = false">

    <!-- Modal Card -->
    <div class="relative w-full max-w-sm bg-white rounded-2xl border-2.5 border-secondary shadow-[6px_6px_0px_0px_#232323] overflow-hidden"
         @click.outside="openLogoutModal = false">

        <!-- Modal Header dengan Warna Primary Yellow WaruMa -->
        <div class="bg-primary border-b-2.5 border-secondary p-3.5 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-lg bg-white border-2 border-secondary flex items-center justify-center shadow-[1.5px_1.5px_0px_0px_#232323]">
                    <img src="{{ asset('assets/icons/peringatanMerah.svg') }}" alt="Peringatan" class="w-3.5 h-3.5 object-contain">
                </div>
                <h3 class="font-black text-xs sm:text-sm text-secondary uppercase font-headline">
                    Konfirmasi Keluar
                </h3>
            </div>
            <button type="button"
                    @click="openLogoutModal = false"
                    class="w-6 h-6 rounded-lg border-2 border-secondary bg-white grid place-items-center font-black text-secondary shadow-[1.5px_1.5px_0px_0px_#232323] text-xs hover:bg-red-100 cursor-pointer">
                ✕
            </button>
        </div>

        <!-- Content Body -->
        <div class="p-5 text-center space-y-4">
            <p class="text-xs font-bold text-secondary leading-relaxed">
                Apakah kamu yakin ingin keluar dari aplikasi <strong class="font-black uppercase">WaruMa</strong>? Kamu harus login kembali untuk mengakses kasir.
            </p>

            <!-- Action Buttons -->
            <div class="flex items-center justify-center gap-2.5 pt-1">
                <!-- Tombol Batal -->
                <button type="button"
                        @click="openLogoutModal = false"
                        class="flex-1 px-4 py-2 bg-white hover:bg-gray-100 text-secondary font-headline font-black text-xs rounded-xl border-2 border-secondary shadow-[2px_2px_0px_0px_#232323] active:translate-x-[1px] active:translate-y-[1px] cursor-pointer">
                    Batal
                </button>

                <!-- Form & Tombol Ya, Logout -->
                <form action="{{ route('logout') }}" method="POST" class="flex-1 m-0">
                    @csrf
                    <button type="submit"
                            class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-headline font-black text-xs rounded-xl border-2 border-secondary shadow-[2px_2px_0px_0px_#232323] active:translate-x-[1px] active:translate-y-[1px] cursor-pointer">
                        Ya, Keluar
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
