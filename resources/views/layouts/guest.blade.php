<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? 'WaruMa' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white text-gray-900 min-h-screen flex flex-col" style="zoom: 90%;">

    {{-- navbar --}}
    @unless (request()->routeIs('login'))
        @include('partials.navbar-guest')
    @endunless


    <main class="flex-1">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    @unless (request()->routeIs('login'))
        @include('partials.footer')
    @endunless

    {{-- Floating Buttons WA & Scroll Top --}}
    @unless (request()->routeIs('login'))
        @include('partials.floating-buttons')
    @endunless

</body>
</html>
