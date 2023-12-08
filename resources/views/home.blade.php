<x-app-layout>
    <!-- Container for "Welcome to UrbanThreads" -->
    <div class="ml-16 sm:ml-6 mt-16 sm:pl-1 justify-center gap-y-2.5">
        <h1
            class="px-2 py-3 text-bluish-purple text-3xl font-formula1 sm:text-5xl sm:ml-20"
        >
            <div class="block">Welcome to</div>
            <div class="block">UrbanThreads</div>
        </h1>
    </div>

    <div
        class="flex mt-3 ml-16 text-black text-sm font-medium font-lexend leading-normal relative"
    >
        <!-- Heading 2 "Elevate Your Style. Discover the latest trends in fashion" -->

        <div class="float-left w-2/3">
            <!-- Pruple line to the left of the text (heading 2) -->
            <span
                class="absolute left-0 inline-block px-0.5 h-10 sm:h-8 bg-bluish-purple ml-2 sm:ml-14"
            ></span>
            <h2 class="mb-6 ml-4 sm:ml-16 sm:pt-1">
                Elevate Your Style. Discover the latest trends in fashion.
            </h2>
        </div>
    </div>

    <!-- Container for "Shop now" button component -->
    <div class="mt-3 sm:mt-4 ml-16 sm:ml-28 pl-2">
        <a href="{{ route('products') }}">
            <x-primary-button-dark> Shop now </x-primary-button-dark>
        </a>
    </div>

    <!-- Container for the people representing UrbanThreads -->
    <div
        class="hidden xl:block absolute top-28 ml-12 right-4"
        style="top: 100px"
    >
        <img
            src="icons/utility/home-page-hero-image.png"
            alt="Image of people representing UrbanThreads"
            class="float-right w-2/3 h-2/3"
        />
    </div>

    <!-- Container for the product cards -->
    <div
        class="flex flex-col sm:flex-row items-center justify-evenly mt-36 sm:mt-80 mb-12 sm:mb-24"
    >
        <!-- Container for first product -->
        <div
            class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9"
        >
            <a href="{{ route('products') }}">
                <img src="" alt="" class="" />
                <h3
                    class="text-black font-formula1 leading-normal font-medium px-6 py-6"
                >
                    Hoodies
                </h3>
            </a>
        </div>

        <!-- Container for second product -->
        <div
            class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9"
        >
            <a href="{{ route('products') }}">
                <img src="" alt="" class="" />
                <h3
                    class="text-black font-formula1 leading-normal font-medium px-6 py-6"
                >
                    Shirts
                </h3>
            </a>
        </div>

        <!-- Container for third product -->
        <div
            class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9"
        >
            <a href="{{ route('products') }}">
                <img src="" alt="" class="" />
                <h3
                    class="text-black font-formula1 leading-normal font-medium px-6 py-6"
                >
                    Trousers
                </h3>
            </a>
        </div>

        <!-- Container for fourth product -->
        <div
            class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9"
        >
            <a href="{{ route('products') }}">
                <img src="" alt="" class="" />
                <h3
                    class="text-black font-formula1 leading-normal font-medium px-6 py-6"
                >
                    Hats
                </h3>
            </a>
        </div>
    </div>
</x-app-layout>
