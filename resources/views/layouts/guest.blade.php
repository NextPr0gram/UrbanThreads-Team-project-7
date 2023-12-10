<x-app-layout>
    <div class="flex sm:justify-center items-center sm:pt py-32 ">
        <div class="hidden lg:block h-[40rem] -translate-x-[35rem] absolute">
            <img src="images/auth/lady-image-auth.png" alt="">
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 b bg-white bg-opacity-40  backdrop-blur-sm overflow-hidden shadow-md border-2 border-navy-blue">
            <div class="shrink-0 flex items-center justify-center py-8">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block h-9 mx-2" />
                </a>
            </div>
            {{ $slot }}
        </div>
        <div class="hidden lg:block h-[40rem] absolute translate-x-[35rem]">
            <img src="images/auth/man-image-auth.png" alt="">
        </div>
    </div>
</x-app-layout>
