{{-- home page --}}
<x-app-layout>
    {{-- hero section --}}
    <div class="flex justify-between items-center lg:px-10">
        {{-- hero text --}}
        <div class="py-10 pl-4">
            <h1
                class="px-2 my-5 text-3xl leading-tight text-default-transparent bg-clip-text bg-gradient-to-r from-primary-300 to-secondary-300 font-formula1 sm:text-4xl lg:text-6xl">
                Welcome to <br>
                UrbanThreads
            </h1>
            <p class="px-2 mx-2 my-5 border-l-3 border-primary-300">Elevate Your Style. Discover the latest trends in
                fashion.</p>
            <div class="px-2 my-5">
                <a href="{{ route('all-products') }}"><x-primary-button> Shop now </x-primary-button></a>
            </div>
        </div>

        {{-- hero image --}}
        <div>
            <img src="images/home-page/hero-image.png" alt="" class="hidden sm:block max-h-[40rem]">
        </div>
    </div>



    <h1 class="px-2 my-5 text-3xl leading-tight text-center text-neutral-900  font-formula1 sm:text-2xl lg:text-4xl">
        Featured Products
    </h1>
    <div class="grid grid-cols-3 grid-rows-1 gap-3 pb-12 h-96">
        <a class="bg-[url('/images/product-images/hoodies/comfy-hoodie.png')] bg-center" href="{{ route('show', ['slug' => 'cozy-comfort-hoodie']) }}">
            <h3 class="text-white text-xl max-sm:text-base mix-blend-difference font-formula1 p-4">
                CozyComfort Hoodie
            </h3>
        </a>
        <a class="bg-[url('/images/product-images/trousers/cargos.png')] bg-center" href="{{ route('show', ['slug' => 'cargo-ready-cargos']) }}">
            <h3 class="text-white text-xl max-sm:text-base mix-blend-difference font-formula1 p-4">
                CargoReady Cargos
            </h3>
        </a>
        <a class="bg-[url('/images/product-images/t-shirt/boxy-t-shirt.png')] bg-center" href="{{ route('show', ['slug' => 'street-smart-boxy-tee']) }}">
            <h3 class="text-white text-xl max-sm:text-base mix-blend-difference font-formula1 p-4">
                StreetSmart Boxy Tee
            </h3>
        </a>
    </div>


    <h1 class="px-2 my-5 text-3xl leading-tight text-center text-neutral-900  font-formula1 sm:text-2xl lg:text-4xl">
        Featured Categories
    </h1>
    <div class="grid grid-cols-3 grid-rows-3 gap-4 h-[2000px]">
        <a href="{{ route('hoodies') }}"
            class="col-span-3 bg-[url('/images/home-page/hoodie-category-image.png')] bg-cover bg-center ">
            <h3 class="text-white text-xl max-sm:text-base mix-blend-difference font-formula1 p-4">
                Hoodies
            </h3>1
        </a>
        <a href="{{ route('tshirts') }}"
            class="row-start-2 bg-[url('/images/product-images/t-shirt/slim-fit-t-shirt.png')] bg-cover bg-center">
            <h3 class="text-white text-xl max-sm:text-base mix-blend-difference font-formula1 p-4">
                Tshirts
            </h3>
        </a>
        <a href="{{ route('trousers') }}"
            class="row-start-2 bg-[url('/images/product-images/trousers/joggers.png')] bg-cover bg-center">
            <h3 class="text-white text-xl max-sm:text-base mix-blend-difference font-formula1 p-4">
                Trousers
            </h3>3
        </a>
        <a href="{{ route('jackets') }}"
            class="row-start-2 bg-[url('/images/product-images/jackets/denim-jacket.png')] bg-cover bg-center">
            <h3 class="text-white text-xl max-sm:text-base mix-blend-difference font-formula1 p-4">
                Jackets
            </h3>
        </a>
        <a href="{{ route('accessories') }}"
            class="col-span-3 row-start-3 bg-[url('/images/product-images/accessories/aviator-glasses.png')] bg-cover bg-center">
            <h3 class="text-white text-xl max-sm:text-base mix-blend-difference font-formula1 p-4">
                Accessories
            </h3>
        </a>
    </div>



</x-app-layout>
