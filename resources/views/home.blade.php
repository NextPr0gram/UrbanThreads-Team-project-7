    <x-app-layout>

            <!-- Container for "Welcome to UrbanThreads" -->
            <div class="ml-12 mt-16 justify-center gap-y-2.5 sm:ml-6">
                <h1 class="px-2 py-3 text-bluish-purple text-3xl font-formula1 sm:text-5xl sm:ml-20">
                    <div class="block">Welcome to</div>
                    <div class="block">UrbanThreads</div>
                </h1>
            </div>

            <div class="ml-14 text-black text-sm font-medium font-lexend leading-normal relative">
                
                <!-- Heading 2 "Elevate Your Style. Discover the latest trends in fashion" -->
            
                <div class="mb-4 ml-4 sm:ml-20 flex flex-wrap py-3">
                <h2 class="sm:hidden">
                    <span class="absolute left-0 inline-block px-0.5 ml-1 h-12 bg-bluish-purple sm:ml-20"></span>
                    <div class="pt-1 pr-1">Elevate Your Style. Discover the latest</div>
                    <div class="-pt-4">trends in fashion.</div>
                    </h2>

                    <h2 class="hidden sm:flex">
                    <span class="absolute left-0 inline-block px-0.5 h-8 bg-bluish-purple sm:ml-16"></span>
                    <div class="pt-1 -ml-1">Elevate Your Style. Discover the latest trends in fashion.</div>
                    </h2>
                </div>

                <!-- div width smaller, text wrap around apply on div -->

                    <!-- Container for "Shop now" component -->
                    <div class="mt-7 ml-1 sm:ml-16">
                        <a href="{{ route('layouts.products') }}">
                <x-primary-button-dark>
                    Shop now
                </x-primary-button-dark>
            </a>
                </div>

                </div>

            <!-- Container for the people representing UrbanThreads -->
            <div class="hidden lg:block absolute top-28 ml-12 right-4" style="top: 100px;">
                <img src="icons/utility/home-page-hero-image.png" alt="Image of people representing UrbanThreads"
                    class="float-right w-2/3 h-2/3" />
            </div>

            <!-- Container for the product cards -->
            <div class="flex flex-col sm:flex-row items-center justify-evenly mt-36 sm:mt-80 mb-12 sm:mb-24">

                <!-- Container for first product --> 
                <div class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9">
            
                    <a href="{{ route('layouts.products') }}">
                        <img src="" alt="" class=""/>
                        <h3 class="text-black font-formula1 leading-normal font-medium px-6 py-6">Hoodies</h3>
                    </a>
                    </div>

                <!-- Container for second product -->
                <div class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9">
                
                    <a href="{{ route('layouts.products') }}">
                        <img src="" alt="" class=""/>
                        <h3 class="text-black font-formula1 leading-normal font-medium px-6 py-6">Shirts</h3>
                    </a>
                    </div>

                <!-- Container for third product -->
                <div class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9">
                
                    <a href="{{ route('layouts.products') }}">
                        <img src="" alt="" class=""/>
                        <h3 class="text-black font-formula1 leading-normal font-medium px-6 py-6">Trousers</h3>
                    </a>
                    </div>

                <!-- Container for fourth product -->
                <div class="inline-flex justify-center items-center w-56 h-72 bg-snow-white mb-9">
                
                    <a href="{{ route('layouts.products') }}">
                        <img src="" alt="" class=""/>
                        <h3 class="text-black font-formula1 leading-normal font-medium px-6 py-6">Hats</h3>
                    </a>

                    </div>

            </div>

    </x-app-layout>
