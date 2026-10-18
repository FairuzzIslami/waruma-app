<footer class="bg-neutral-custom border-t-2 border-secondary pt-12 pb-6 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Top Grid Section --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 pb-10">

            <div class="md:col-span-5 space-y-4">
                <a href="/" class="inline-block">
                    <img src="{{ asset('assets/images/logoWaruma.svg') }}" alt="Logo WaruMa" class="h-9 sm:h-10 w-auto">
                </a>
                <p class="text-xs sm:text-sm font-body text-slate-600 leading-relaxed max-w-sm">
                    Warung sembako modern andalan warga sekitar. Menyediakan sembako murah, lengkap, dan segar setiap
                    hari dengan sistem kasir transparan.
                </p>
                <div class="flex items-center gap-2 pt-1">
                    <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span class="text-xs sm:text-sm font-headline font-bold text-secondary">
                        Status: Buka Hari Ini
                    </span>
                </div>
            </div>

            <div class="md:col-span-3 space-y-3">
                <h4
                    class="text-xs sm:text-sm font-headline font-extrabold text-secondary uppercase tracking-wider pb-2 border-b-2 border-secondary">
                    JAM OPERASIONAL
                </h4>
                <ul class="space-y-1.5 text-xs sm:text-sm font-body text-slate-600">
                    <li>Senin – Jumat: 07.00 – 21.30</li>
                    <li>Sabtu – Minggu: 07.00 – 22.00</li>
                </ul>
            </div>

            <div class="md:col-span-4 space-y-3">
                <h4
                    class="text-xs sm:text-sm font-headline font-extrabold text-secondary uppercase tracking-wider pb-2 border-b-2 border-secondary">
                    KONTAK & ALAMAT
                </h4>
                <ul class="space-y-1.5 text-xs sm:text-sm font-body text-slate-600">
                    <li>Jl. Melati Raya No. 42, RT 03/RW 07, Sukamaju, Depok</li>
                    <li>WhatsApp: +62 812-3456-7890</li>
                    <li>Email: halo@waruma.id</li>
                </ul>
            </div>
        </div>

        <div
            class="border-t border-slate-300 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-body text-slate-600">
            <p class="text-center sm:text-left">
                © {{ date('Y') }} <span class="font-headline font-bold text-secondary">Waru<span
                        class="text-primary">Ma</span></span>. Hak Cipta Dilindungi. Sembako Warga Nyaman.
            </p>
            <div class="flex items-center gap-4 font-headline font-semibold">
                <a href="#" class="hover:text-secondary transition-colors">Syarat & Ketentuan</a>
                <a href="#" class="hover:text-secondary transition-colors">Privasi</a>
            </div>
        </div>
    </div>
</footer>
