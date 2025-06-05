<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan - @yield('title')</title>

    {{-- Bootstrap CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Vite for custom app styles/scripts (Tailwind, if needed)
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light"> --}}

    {{-- Navbar Pelanggan --}}
    @include('layouts.navbar-pelanggan')

    {{-- Main Content --}}
    <main class="py-4 container">
        @yield('content')
    </main>

    {{-- Bootstrap JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

