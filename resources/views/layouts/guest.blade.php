<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Urban Threads</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-lexend-deca bg-white text-blue-950 antialiased">

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-bluish-purple dark:bg-bluish-purple">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 b bg-light-gray bg-opacity-40 shadow-md backdrop-blur-sm overflow-hidden border-2 border-navy-blue">
    {{ $slot }}
</div>


        </div>
    </body>

</html>
