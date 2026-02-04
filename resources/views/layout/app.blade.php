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

<body class="relative min-h-screen font-sans antialiased">
    <div class="fixed inset-0 opacity-10 pointer-events-none -z-50"
        style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'20\' height=\'20\' viewBox=\'0 0 20 20\'><circle cx=\'2\' cy=\'2\' r=\'2\' fill=\'%23048a55\' opacity=\'0.8\'/></svg>');">
    </div>
    <nav>
        @yield('navbar')
    </nav>

    <main>
        @yield('content')
    </main>
    @include('sweetalert::alert')

    <script>
        function checkScanAPI() {
            $.ajax({
                url: 'api/scan',
                method: 'GET',
                success: function(response) {
                    if (response.refresh) {
                        window.location.reload();
                    }
                }
            });
        }

        setInterval(checkScanAPI, 3000);
    </script>
</body>
</html>
