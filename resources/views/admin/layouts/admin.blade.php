<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UrbanThreads Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-white bg-right-top bg-cover font-lexend">
    <div class="flex">
        @include('admin.layouts.sidebar')
        <div class="flex flex-col h-screen grow">


            <!-- Page Content -->
            <main class="text-base bg-transparent text-lexend  max-w-[1440px] min-[1500px]:mx-auto mx-5">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
