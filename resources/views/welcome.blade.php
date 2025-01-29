<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
    <style>
        /* Sembunyikan konten utama sampai loading selesai */
        #main-content {
            display: none;
        }
    </style>
</head>

<body class="bg-base-100">

    <div class="flex justify-center items-center h-screen" id="loading">
        <span class="loading loading-dots text-warning loading-lg"></span>
    </div>

    <main class="pt-6 max-w-screen  min-h-screen" id="main-content">
        @include('pages.header')
        @yield('content')
        @include('pages.footer')
    </main>
    <!-- Include the footer -->

    <script>
        // Setelah halaman dimuat, delay sebelum menyembunyikan loading dan menampilkan konten
        window.onload = function() {
            setTimeout(function() {
                document.getElementById('loading').style.display = 'none';
                document.getElementById('main-content').style.display = 'block';
            }, 1000); // Delay dalam milidetik (1000 ms = 1 detik)
        };
    </script>
</body>

</html>
