{{-- home page --}}
<x-app-layout>
    {{-- hero section --}}
    <div class="flex justify-between items-center lg:px-10 ">
        {{-- hero text --}}
        <div class="pl-4 py-10">
            <h1 class="px-2 my-5 bg-background-image bg-clip-text text-transparent  text-3xl font-formula1 leading-tight sm:text-4xl lg:text-6xl">
                Welcome to <br>
                UrbanThreads
            </h1>
            <p class="border-l-3 border-bluish-purple px-2 mx-2 my-5">Elevate Your Style. Discover the latest trends in
                fashion.</p>
            <div class="px-2 my-5"><a href="{{ route('all') }}"><x-primary-button-dark> Shop now </x-primary-button-dark></a></div>
        </div>

        {{-- hero image --}}
        <div>
            <img src="images/home-page/hero-image.png" alt="" class="hidden sm:block max-h-[40rem]">
        </div>
    </div>


    <!-- Container for the product category cards -->
    <div class="flex flex-wrap justify-center mt-3 mb-12 sm:mb-24 min-h-[30rem]">
        <!-- Container for first product category -->
        <a class="text-2xl hover:text-5xl bg-[url('../../../public/images/home-page/hoodie-category-image.png')] bg-cover bg-center inline-flex justify-center items-center md:mx-5 w-full  md:w-64 h-[25rem] bg-snow-white mb-9 md:hover:w-80 md:hover:h-[27rem] transition- ease-in-out duration-300 border-3 border-light-gray hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray"
            href="{{ route('hoodies') }}">
            <h2 class="text-white mix-blend-difference font-formula1">
                Hoodies
            </h2>
        </a>


        <!-- Container for second product category -->
        <a class="text-2xl hover:text-5xl bg-[url('../../../public/images/home-page/tshirt-category-image.png')] bg-cover bg-center inline-flex justify-center items-center md:mx-5 w-full  md:w-64 h-[25rem] bg-snow-white mb-9 md:hover:w-80 md:hover:h-[27rem] transition- ease-in-out duration-300 border-3 border-light-gray hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray"
            href="{{ route('tshirts') }}">
            <h3 class="text-white mix-blend-difference font-formula1">
                T-Shirts
            </h3>
        </a>

        <!-- Container for third product category -->
        <a class="text-2xl hover:text-5xl bg-[url('../../../public/images/home-page/trousers-category-image.png')] bg-cover bg-center inline-flex justify-center items-center md:mx-5 w-full  md:w-64 h-[25rem] bg-snow-white mb-9 md:hover:w-80 md:hover:h-[27rem] transition- ease-in-out duration-300 border-3 border-light-gray hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray"
            href="{{ route('trousers') }}">
            <h3 class="text-white mix-blend-difference font-formula1">
                Trousers
            </h3>
        </a>

        <!-- Container for fourth product category -->
        <a class="text-2xl hover:text-5xl bg-[url('../../../public/images/home-page/jacket-category-image.png')] bg-cover bg-center inline-flex justify-center items-center md:mx-5 w-full  md:w-64 h-[25rem] bg-snow-white mb-9 md:hover:w-80 md:hover:h-[27rem] transition- ease-in-out duration-300 border-3 border-light-gray hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray"
            href="{{ route('jackets') }}">
            {{-- TODO: soon to be changed to hats --}}
            <h3 class="text-white mix-blend-difference font-formula1">
                Jackets
            </h3>
        </a>

        <!-- Container for fifth product category-->
        <a class="text-2xl hover:text-5xl bg-[url('../../../public/images/home-page/accessories-category-image.png')] bg-cover bg-center inline-flex justify-center items-center md:mx-5 w-full  md:w-64 h-[25rem] bg-snow-white mb-9 md:hover:w-80 md:hover:h-[27rem] transition- ease-in-out duration-300 border-3 border-light-gray hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray"
            href="{{ route('accessories') }}">
            {{-- soon to be changed to hats --}}
            <h3 class="text-white mix-blend-difference font-formula1">
                Accessories
            </h3>
        </a>
    </div>
</x-app-layout>
