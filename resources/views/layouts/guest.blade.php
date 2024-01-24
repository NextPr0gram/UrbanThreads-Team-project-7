<x-app-layout>
    <div class="flex items-center py-32 sm:justify-center sm:pt">
        <div class="hidden lg:block h-[40rem] -translate-x-[35rem] absolute">
            <img src="images/auth/lady-image-auth.png" alt="">
        </div>
        <div class="overflow-hidden px-6 py-4 mt-6 w-full bg-white bg-opacity-40 border-2 shadow-md backdrop-blur-sm sm:max-w-md b border-navy-blue">
            <div class="flex justify-center items-center py-8 shrink-0">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block mx-2 h-9" />
                </a>
            </div>
            {{ $slot }}
        </div>
        <div class="hidden lg:block h-[40rem] absolute translate-x-[35rem]">
            <img src="images/auth/man-image-auth.png" alt="">
        </div>
    </div>
</x-app-layout>
