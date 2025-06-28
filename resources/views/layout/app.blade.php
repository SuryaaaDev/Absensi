<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="{{ asset('storage/image/logo-smk2klt.png') }}">
    <title>@yield('title', 'Absensi Siswa | RFID')</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav>
        @yield('navbar')
    </nav>

    <main>
        @yield('content')
    </main>
    @include('sweetalert::alert')
</body>
</html>