<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? 'WaruMa - Owner' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 min-h-screen flex">

    {{-- Sidebar (Opsional jika nanti membuat partials/sidebar.blade.php) --}}
    {{-- @include('partials.sidebar') --}}

    <div class="flex-1 flex flex-col min-h-screen">
        {{-- Navbar Admin/Owner --}}
        {{-- @include('partials.navbar-owner') --}}

        {{-- Konten Utama Dashboard Owner --}}
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>

</body>

</html>
