<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-white bg-right-top bg-cover font-lexend">
        <div class="flex flex-col h-screen">
            {{-- alerts --}}
            @if (session('success'))
                <div id="successMessage" class="justify-center py-1 text-base text-center text-white bg-opacity-80 font-lexend bg-green">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div id="errorMessage" class="justify-center py-1 text-base text-center text-white bg-opacity-80 font-lexend bg-red">
                    {{ session('error') }}
                </div>
            @endif

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Set timeout to hide the success message after 5 seconds
                    setTimeout(function () {
                        var successMessage = document.getElementById('successMessage');
                        if (successMessage) {
                            successMessage.style.display = 'none';
                        }

                        // Set timeout to hide the error message after 5 seconds
                        var errorMessage = document.getElementById('errorMessage');
                        if (errorMessage) {
                            errorMessage.style.display = 'none';
                        }
                    }, 5000);
                });
            </script>
            @include('layouts.navigation')


        <!-- Page Heading -->
        @if (isset($header))
            <header class="text-3xl font-formula1 text-navy-blue">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif




        <!-- Page Content -->
        <main class="text-base bg-transparent text-lexend  max-w-[1440px] min-[1500px]:mx-auto mx-5">
            {{ $slot }}
        </main>

        <!-- Footer -->
        @include('layouts.footer')
    </div>
</body>

</html>
