<x-app-layout>
    {{-- hero section --}}
    <div class="flex justify-between items-center lg:px-10">
        {{-- hero text --}}
        <div class="pl-4 py-10">
            <h1 class="px-2 my-5 text-bluish-purple text-3xl font-formula1 leading-tight sm:text-4xl lg:text-6xl">
                Welcome to <br>
                UrbanThreads
            </h1>
            <p class="border-l-3 border-bluish-purple px-2 mx-2 my-5">Elevate Your Style. Discover the latest trends in fashion.</p>
            <div class="px-2 my-5"><x-primary-button-dark> Shop now </x-primary-button-dark></div>
        </div>

        {{-- hero image --}}
        <div>
            <img src="images/hero-image.png" alt="" class="hidden sm:block max-h-[40rem]">
        </div>
    </div>


    <!-- Container for the product category cards -->
    <div class="flex flex-col sm:flex-row items-center justify-evenly mt-36 sm:mt-80 mb-12 sm:mb-24">
        <!-- Container for first product category -->
        <div class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9">
            <a href="{{ route('hoodies') }}">
                <img src="" alt="" class="" />
                <h3 class="text-black font-formula1 leading-normal font-medium px-6 py-6">
                    Hoodies
                </h3>
            </a>
        </div>

        <!-- Container for second product category -->
        <div class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9">
            <a href="{{ route('tshirts') }}">
                <img src="" alt="" class="" />
                <h3 class="text-black font-formula1 leading-normal font-medium px-6 py-6">
                    T-Shirts
                </h3>
            </a>
        </div>

        <!-- Container for third product category -->
        <div class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9">
            <a href="{{ route('trousers') }}">
                <img src="" alt="" class="" />
                <h3 class="text-black font-formula1 leading-normal font-medium px-6 py-6">
                    Trousers
                </h3>
            </a>
        </div>

        <!-- Container for fourth product category -->
        <div class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9">
            {{-- soon to be changed to hats --}}
            <a href="{{ route('jackets') }}">
                <img src="" alt="" class="" />
                <h3 class="text-black font-formula1 leading-normal font-medium px-6 py-6">
                    jackets
                </h3>
            </a>
        </div>

        <!-- Container for fifth product category-->
        <div class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9">
            {{-- soon to be changed to hats --}}
            <a href="{{ route('accessories') }}">
                <img src="" alt="" class="" />
                <h3 class="text-black font-formula1 leading-normal font-medium px-6 py-6">
                    Accessories
                </h3>
            </a>
        </div>
    </div>
</x-app-layout>
