<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TICKETING HELPDESK') }}</title>

        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css" rel="stylesheet">
         <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
        <style>
            .table-small {
                width: auto; /* Set width to auto to make it fit content */
                font-size: 0.875rem; /* Smaller font size */
            }

            .table-small td {
                padding: 0.25rem 0.5rem; /* Smaller padding */
            }
        </style>

    </head>
    <body class="font-sans antialiased">
                @include('sweetalert::alert')
        <div class="bg-regal-blue">
            <!-- Konten di sini -->
          </div>
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <!-- Footer -->
    <footer class="bg-gray-900 py-4 text-white text-center">
        <div class="container mx-auto">
            <p>&copy; 2024 Your Website. All rights reserved.</p>
        </div>
    </footer>
    <!-- End Footer -->
        </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    </body>
</html>
