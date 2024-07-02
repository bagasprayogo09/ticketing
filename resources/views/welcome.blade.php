    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Helpdesk Jakarta Utara</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gradient text-black/50 dark:text-white/50">
            <!-- Logo di kiri pojok atas -->
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiiaJIKGdAPJjJ1DtcW1JxSkjFmw8bSPf-fVcmsZ7oMZ3a8c2Zq-oQxCyOoS-kPcIA_Q4c84e1t0ukKnHwYKRe9jBR2UuEW8PVZAl-QQocd5pkrslSUGakGtV3_-D2zFKWPXX6YCPubcavoV9vr6tYM8yAUe2OpPro9W2U31C4hrRxwiY0KxQihkg/s1000/GKL6_logo_kota_jakarta_utara%20-%20Koleksilogo.com.png" alt="Logo Kiri" class="logo-top-left">
            <!-- Logo di kanan pojok atas -->
            <img src="https://1.bp.blogspot.com/-XVS2yUn6Pqs/XhYfCiU4CEI/AAAAAAAADNs/rx40QuMzmkQTWtcAgZZdSFELBKdBItUvACLcBGAsYHQ/s1600/PROV%2BDKI%2BJAKARTA_PNG.png" alt="Logo Kanan" class="logo-top-right">

            <div class="flex lg:justify-left lg:col-start-1 relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="flex lg:justify-center lg:col-start-2">
                    <img src="https://www.pngmart.com/files/7/Helpdesk-PNG-Clipart.png" alt="Logo" style="width: 300px; height: auto;" class="img-fluid">
                </div>
                <!-- Teks baru di bawah logo -->
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl text-center">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <h1 class="text" style="color: rgb(94, 94, 94); font-size: 55px;">HELPDESK TICKETING JAKARTA UTARA </h1>
                    </div>
                    <div class="flex lg:justify-center lg:col-start-2">
                        <h5 class="text" style="color: rgb(94, 94, 94); font-size: 20px;">Get instant support for your internet connection </h5>
                    </div>
                    <div class="flex flex-col items-center gap-2 py-10">
                        @if (Route::has('login'))
                            <nav class="flex flex-col items-center space-y-4">
                                <div class="flex justify-between w-full max-w-xs space-x-4">
                                    @auth
                                        @php
                                            $usertype = Auth::user()->usertype;
                                            $division_id = Auth::user()->division_id;
                                        @endphp

                                        @if ($usertype == 'admin')
                                            <a
                                                href="{{ route('dashboard') }}"
                                                class="text-xl font-semibold btn-login rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-gray/80 dark:focus-visible:ring-silver"
                                            >
                                                Dashboard Admin
                                            </a>
                                        @elseif ($usertype == 'client')
                                            <a
                                                href="{{ route('clientdashboard') }}"
                                                class="text-xl font-semibold btn-login rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-gray/80 dark:focus-visible:ring-silver"
                                            >
                                                Dashboard Klien
                                            </a>
                                        @elseif ($division_id == 1)
                                            <a
                                                href="{{ route('aplikasi.dashboard') }}"
                                                class="text-xl font-semibold btn-login rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-gray/80 dark:focus-visible:ring-silver"
                                            >
                                                Dashboard Petugas Aplikasi
                                            </a>
                                        @elseif ($division_id == 2)
                                            <a
                                                href="{{ route('ID.dashboard') }}"
                                                class="text-xl font-semibold btn-login rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-gray/80 dark:focus-visible:ring-silver"
                                            >
                                                Dashboard Petugas ID
                                            </a>
                                        @elseif ($division_id == 3)
                                            <a
                                                href="{{ route('KIP.dashboard') }}"
                                                class="text-xl font-semibold btn-login rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-gray/80 dark:focus-visible:ring-silver"
                                            >
                                                Dashboard Petugas KIP
                                            </a>
                                        @else
                                            <a
                                                href="{{ url('/dashboard') }}"
                                                class="text-xl font-semibold btn-login rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-gray/80 dark:focus-visible:ring-silver"
                                            >
                                                Dashboard User
                                            </a>
                                        @endif
                                    @else
                                        <a
                                            href="{{ route('login') }}"
                                            class="text-xl font-semibold btn-login rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-gray/80 dark:focus-visible:ring-silver"
                                        >
                                            LOGIN ADMIN
                                        </a>
                                        <a
                                            href="{{ route('petugaslogin') }}"
                                            class="text-xl font-semibold btn-login rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-gray/80 dark:focus-visible:ring-silver"
                                        >
                                            LOGIN PETUGAS
                                        </a>
                                        <a
                                            href="{{ route ('clientlogin') }}"
                                            class="text-xl font-semibold btn-login rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-gray/80 dark:focus-visible:ring-silver"
                                        >
                                            LOGIN KLIEN
                                        </a>
                                    @endauth
                                </div>

                                @if (Route::has('tickets'))
                                    <h2 style="color: rgb(0, 0, 0);" class="text-xl font-semibold text-black dark:text-black mt-4">
                                        BUAT TIKET KHUSUS KLIEN
                                    </h2>
                                    <a
                                        href="{{ route('tickets') }}"
                                        class="text-xl font-semibold btn-login rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-gray/80 dark:focus-visible:ring-silver"
                                    >
                                        TICKET
                                    </a>
                                @endif
                            </nav>
                        @endif
                    </div>

                </div>
            </div>
            <!-- Footer -->
            <footer class="absolute bottom-0 w-full bg-gray-900 py-4 text-white text-center">
                <div class="container mx-auto">
                    <p>&copy; 2024 | Helpdesk Kantor Walikota Administrasi Jakarta Utara</p>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </body>
    </html>
