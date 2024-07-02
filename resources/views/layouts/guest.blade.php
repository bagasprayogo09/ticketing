<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/guest.css') }}" rel="stylesheet">

        <style>
            body {
                background-color: #1e3a8a; /* Ganti dengan warna latar belakang yang diinginkan */
            }
            .background-custom {
                background-image: url(https://img.freepik.com/free-vector/winter-blue-pink-gradient-background-vector_53876-117276.jpg);
                background-size: cover; /* Menyesuaikan ukuran gambar untuk selalu mencakup seluruh area */
                background-repeat: no-repeat; /* Menghindari pengulangan gambar */            }
            .custom-font-color {
                color: rgb(0, 0, 0);
            }
            .logo {
                margin-right: 20px; /* Memberikan ruang di antara logo dan div custom */
                margin-top: 20px; /* Tambahkan margin atas untuk menjaga jarak antara logo dan atas halaman */
            }
            .custom-div {
                /* Lebar penuh untuk semua ukuran layar */
                width: 500%; /* Atau bisa juga menggunakan max-width: 100%; */
                /* Lebar minimum atau maksimum pada ukuran tertentu */
                max-width: 550px; /* Ganti dengan lebar yang diinginkan */
                padding: 0 1px; /* Sesuaikan dengan lebar gutters yang diinginkan */
            }
            .background-custom {
                background-color: rgb(4, 57, 117); /* Ganti dengan warna latar belakang yang diinginkan */
            }
            /* Atur warna latar belakang untuk keseluruhan halaman */
            body {
                background-color: #1e3a8a; /* Ganti dengan warna latar belakang yang diinginkan */
            }
        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

        <title>{{ config('app.name', 'TICKETING HELPDESK') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 background-custom">
            <div class="logo">
                <x-application3-logo class="w-20 h-20 fill-current text-gray-500"/>
            </div>
            <div class="custom-div">
                {{ $slot }}
            </div>
            @include('sweetalert::alert')
        </div>
    </body>
</html>
