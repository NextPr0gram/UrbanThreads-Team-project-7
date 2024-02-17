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

<body class="antialiased bg-white bg-right-top bg-cover font-lexend text-neutral-900 box-border">
    <div class="flex">
        @include('layouts.sidebar')
        <div class="flex flex-col h-screen mx-auto w-full">



            <!-- Page Content -->
            <main class="h-full flex flex-col w-full">
                <div class="w-auto flex items-center justify-between py-8 max-w-[1440px] min-[1500px]:mx-auto mx-5">
                    <img onclick="OpenSideBar()" class="hover:cursor-pointer absolute md:hidden"
                        src="{{ asset('icons/admin-dashboard/menu-icon.svg') }}" alt="">
                    <h6 class="text-xl w-full text-center font-formula1">@yield('title')</h6>

                </div>
                <div class="text-base bg-transparent text-lexend   w-auto  overflow-hidden mb-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>

</html>
