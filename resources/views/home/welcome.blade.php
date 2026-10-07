<x-guest title="WaruMa - Landing Page">

    {{-- Section 1: Hero / Home --}}
    <section id="home" class="bg-[#232323] text-white py-24 px-6 relative overflow-hidden">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="bg-[#F6B90E]/20 text-[#F6B90E] text-sm font-semibold px-4 py-1.5 rounded-full font-nunito">
                    Toko Kelontong Modern
                </span>
                <h1 class="text-4xl md:text-5xl font-bold font-poppins mt-4 leading-tight">
                    Belanja Kebutuhan Harian di <span class="text-[#F6B90E]">WaruMa</span>
                </h1>
                <p class="text-gray-300 font-nunito mt-4 text-lg">
                    Menyediakan berbagai produk sembako dan kebutuhan rumah tangga secara lengkap, cepat, dan dengan harga yang bersahabat.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#aboutWaruma" class="bg-[#F6B90E] hover:bg-yellow-500 text-[#232323] font-bold font-poppins px-6 py-3 rounded-xl transition shadow-lg">
                        Tentang Kami
                    </a>
                    <a href="#lokasi" class="border border-white/30 hover:border-[#F6B90E] hover:text-[#F6B90E] font-semibold font-poppins px-6 py-3 rounded-xl transition">
                        Cek Lokasi
                    </a>
                </div>
            </div>

            {{-- Placeholder Visual --}}
            <div class="relative flex justify-center">
                <div class="w-full h-80 bg-gray-800 rounded-2xl border-2 border-[#F6B90E]/30 flex items-center justify-center text-gray-500 font-poppins">
                    [ Area Foto / Ilustrasi Warung ]
                </div>
            </div>
        </div>
    </section>

    {{-- Section 2: About Waruma --}}
    <section id="aboutWaruma" class="bg-white py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-3xl font-bold font-poppins text-[#232323]">
                    Mengapa Memilih <span class="text-[#F6B90E]">WaruMa</span>?
                </h2>
                <p class="text-gray-600 font-nunito mt-2">
                    Kami hadir untuk memberikan pengalaman belanja kebutuhan harian yang praktis dan terpercaya.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Card 1 --}}
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-[#F6B90E]/20 text-[#F6B90E] rounded-xl flex items-center justify-center font-bold text-xl mb-4">
                        📦
                    </div>
                    <h3 class="text-xl font-bold font-poppins text-[#232323] mb-2">Produk Lengkap</h3>
                    <p class="text-gray-600 font-nunito text-sm leading-relaxed">
                        Mulai dari beras, minyak, bumbu dapur, hingga jajanan harian tersedia lengkap untuk memenuhi kebutuhan keluarga.
                    </p>
                </div>

                {{-- Card 2 --}}
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-[#F6B90E]/20 text-[#F6B90E] rounded-xl flex items-center justify-center font-bold text-xl mb-4">
                        💰
                    </div>
                    <h3 class="text-xl font-bold font-poppins text-[#232323] mb-2">Harga Bersahabat</h3>
                    <p class="text-gray-600 font-nunito text-sm leading-relaxed">
                        Nikmati harga eceran yang terjangkau dan transparan tanpa perlu khawatir kantong jebol.
                    </p>
                </div>

                {{-- Card 3 --}}
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-[#F6B90E]/20 text-[#F6B90E] rounded-xl flex items-center justify-center font-bold text-xl mb-4">
                        ⚡
                    </div>
                    <h3 class="text-xl font-bold font-poppins text-[#232323] mb-2">Pelayanan Cepat</h3>
                    <p class="text-gray-600 font-nunito text-sm leading-relaxed">
                        Sistem pengelolaan toko terorganisir memastikan proses transaksi ramah, cepat, dan tanpa ribet.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 3: Lokasi --}}
    <section id="lokasi" class="bg-gray-50 py-20 px-6 border-t border-gray-100">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold font-poppins text-[#232323]">
                    Lokasi <span class="text-[#F6B90E]">Toko Kami</span>
                </h2>
                <p class="text-gray-600 font-nunito mt-3">
                    Mampir langsung ke toko fisik kami untuk belanja secara langsung. Kami siap melayani Anda setiap hari.
                </p>

                <div class="mt-6 space-y-4 font-nunito">
                    <div class="flex items-start gap-3">
                        <span class="text-[#F6B90E] text-xl">📍</span>
                        <div>
                            <h4 class="font-bold text-[#232323] font-poppins">Alamat Toko</h4>
                            <p class="text-gray-600 text-sm">Jl. Kelontong Raya No. 123, Indonesia</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="text-[#F6B90E] text-xl">⏰</span>
                        <div>
                            <h4 class="font-bold text-[#232323] font-poppins">Jam Operasional</h4>
                            <p class="text-gray-600 text-sm">Senin - Minggu (07.00 - 21.00 WIB)</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Placeholder Embed Google Maps --}}
            <div class="w-full h-72 bg-gray-200 rounded-2xl overflow-hidden border border-gray-300 flex items-center justify-center text-gray-500 font-poppins">
                [ Embed Google Maps di Sini ]
            </div>
        </div>
    </section>
</x-guest>
