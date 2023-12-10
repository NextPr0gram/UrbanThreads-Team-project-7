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
    <body class="font-lexend antialiased bg-white bg-right-top bg-cover">
        <div class="flex flex-col h-screen">
            @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="font-formula1 text-3xl text-navy-blue">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        @if (session('success'))
            <div class="text-md font-lexend bg-green bg-opacity-80 rounded-md text-center my-5 justify-center">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="text-md font-lexend bg-red bg-opacity-80 rounded-md text-center my-5 justify-center">
                {{ session('error') }}
            </div>
        @endif

        <!-- Page Content -->
        <main class=" text-base text-lexend bg-transparent sm:mx-12 lg:mx-40 ">
            {{ $slot }}
        </main>

        <!-- Footer -->
        @include('layouts.footer')
    </div>
</body>

</html>
