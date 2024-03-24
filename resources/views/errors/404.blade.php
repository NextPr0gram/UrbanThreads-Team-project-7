<x-app-layout>
    <div class="flex justify-center py-20">
        <div class="flex flex-col justify-center py-16 bg-neutral-20 backdrop-blur sm:flex-row w-fit border-2 border-neutral-50 rounded-lg">
            <div class="px-8"><img src="\images\errors\sad-pepe-404.svg" alt=""></div>
            <div class="block self-center px-8">
                <h1 class="text-6xl font-formula1 text-primary-300 py-2">404</h1>
                <h2 class="py-2 text-3xl font-bold font-lexend text-primary-300">UH OH! You are lost.</h2>
                <p class="py-2 font-lexend">The page you are looking for does not exist.<br> How you got here is a
                    mystery. Click on the button below to go to the homepage.
                </p>
                <div class="py-2">
                    <a href="{{ route('home') }}"><x-primary-button>Home</x-primary-button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>