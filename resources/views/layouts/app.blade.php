<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'WARUMA - Dashboard Admin' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body x-data="{ openLogoutModal: false }" class="bg-[#f9f8f0] text-secondary font-headline antialiased min-h-screen flex flex-col">

    {{-- NAVBAR APP --}}
    @include('partials.navbar-app')

    <!-- WRAPPER UTAMA -->
    <div class="flex flex-1 relative min-h-[calc(100vh-57px)]">

        {{-- SIDEBAR APP --}}
        @include('partials.sidebar-app')

        <!-- MAIN CONTENT -->
        <main class="flex-1 min-w-0 p-3 sm:p-5 md:p-6 space-y-5 sm:space-y-6">
            {{ $slot }}
        </main>
    </div>

    <!-- TARUH MODAL LOGOUT DI PALING BAWAH LAYOUT UTAMA (DI LUAR CONTAINER FLEX) -->
    <x-modal-logout />

    @livewireScripts
    <!-- JS TOGGLE SIDEBAR CONTROLLER -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sb = document.getElementById('sidebar'),
                  bd = document.getElementById('backdrop'),
                  texts = document.querySelectorAll('.sb-text'),
                  openBtn = document.getElementById('openBtn'),
                  closeBtn = document.getElementById('closeBtn');

            let isMin = false;

            const toggleMobile = (show) => {
                if (sb) sb.classList.toggle('-translate-x-full', !show);
                if (bd) bd.classList.toggle('hidden', !show);
            };

            if (openBtn) {
                openBtn.onclick = () => {
                    if (window.innerWidth < 768) {
                        toggleMobile(true);
                    } else if (sb) {
                        isMin = !isMin;
                        sb.classList.toggle('w-60', !isMin);
                        sb.classList.toggle('w-16', isMin);
                        texts.forEach(t => t.classList.toggle('hidden', isMin));
                    }
                };
            }

            if (closeBtn) closeBtn.onclick = () => toggleMobile(false);
            if (bd) bd.onclick = () => toggleMobile(false);
        });
    </script>
</body>
</html>
