<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | WARUMA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FBFAF7] font-body min-h-screen flex items-center justify-center p-4 selection:bg-primary selection:text-secondary">

    <!-- CONTAINER PRINCIPAL -->
    <div class="max-w-md w-full bg-white border-2.5 border-secondary rounded-3xl shadow-[8px_8px_0px_#232323] overflow-hidden text-center p-6 sm:p-8 animate-in fade-in zoom-in-95 duration-200 relative">
        <!-- HERO ICON & ANGKA 404 -->
        <div class="relative w-28 h-28 mx-auto mb-6">
            <!-- Box Bayangan Belakang -->
            <div class="absolute inset-0 bg-secondary rounded-3xl translate-x-1.5 translate-y-1.5"></div>
            <!-- Box Depan Utama -->
            <div class="relative w-full h-full bg-primary border-2.5 border-secondary rounded-3xl flex flex-col items-center justify-center p-2">
                <span class="font-black text-4xl text-secondary font-headline tracking-tighter leading-none">404</span>
                <span class="text-[10px] font-extrabold text-secondary/80 uppercase tracking-widest mt-1">NOT FOUND</span>
            </div>
        </div>

        <!-- TEKS UTAMA -->
        <h1 class="text-xl sm:text-2xl font-black text-secondary font-headline mb-2 leading-tight">
            Waduh, Halaman Gak Ditemukan!
        </h1>
        <p class="text-xs sm:text-sm text-gray-600 font-medium mb-7 leading-relaxed max-w-xs mx-auto">
            Alamat URL yang kamu tuju gak ada atau mungkin udah dipindah. Yuk balik ke dashboard warung!
        </p>

        <!-- BUTTON GROUP -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <button onclick="history.back()" class="w-full sm:w-1/2 border-2 border-secondary bg-white py-2.5 px-4 rounded-xl text-xs font-black text-secondary shadow-[3px_3px_0px_#232323] hover:bg-gray-100 active:translate-x-[1px] active:translate-y-[1px] transition-all cursor-pointer">
                Kembali
            </button>
            <a href="{{ route('dashboard') }}" class="w-full sm:w-1/2 border-2 border-secondary bg-primary py-2.5 px-4 rounded-xl text-xs font-black text-secondary shadow-[3px_3px_0px_#232323] hover:bg-amber-400 active:translate-x-[1px] active:translate-y-[1px] transition-all inline-flex items-center justify-center gap-1.5 cursor-pointer">
                Ke Dashboard
            </a>
        </div>

        <!-- FOOTER BRANDING -->
        <div class="mt-8 pt-4 border-t border-gray-100 flex items-center justify-center gap-2 text-gray-400 text-[10px] font-bold">
            <img src="{{ asset('assets/images/logoWaruma.svg') }}" alt="WARUMA" class="w-4 h-4 object-contain opacity-60" />
            <span>WARUMA POS SYSTEM</span>
        </div>

    </div>

</body>
</html>
