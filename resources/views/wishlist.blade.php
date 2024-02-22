{{--
    ? This is the wislist page
    ? It is used to display the products that are added into the wishlist
    ? It displays the product image, name, price and a button to remove from wishlist
    --}}

<x-app-layout>

    <x-slot name="header">
        <h2 class="">
            Wishlist
        </h2>
    </x-slot>

    {{-- Wishlist Items Container --}}
    <div class="flex justify-center">
        <div class="grid grid-cols-1 gap-20 mt-5 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">

            {{-- Item 1 Container --}}
            <div class="transition-all duration-300 ease-in-out border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray">
                <div class="w-64 aspect-square">
                    <!-- {{--* The placeholder for the image of the product --}} -->
                    <img class="w-64 aspect-square" src="{{ asset('images/product-images/hoodies/comfy-hoodie.png') }}" alt="">
                </div>

                <div class="px-4 bg-white">
                    {{--* The placeholders for the product name, price and availability --}}
                    <p class="text-base font-formula1">Comfy Hoodie</p>
                    <p>£50.00</p>
                    <p>In Stock</p>
                </div>

                <div class="pt-4 pl-4">
                    {{-- *Button to remove from the wishlist --}}
                    <button x-data="{ clicked: false }" @click="clicked = !clicked">
                        <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" :class="{ 'hidden': clicked }" alt="">
                        <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" x-show="clicked" alt="">
                    </button>
                </div>

                <div class="flex justify-end p-4 bg-white">
                    {{--* Button to add the product to the basket --}}
                    <x-primary-button class="" href={{ $productLink }}>Add to cart</x-primary-button>
                    {{--? The $productLink variable is the placeholder for the link to the product page of the specific product --}}
                </div>
            </div>

            {{-- Item 2 Container --}}
            <div class="transition-all duration-300 ease-in-out border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray">
                <div class="w-64 aspect-square">
                    {{--* The placeholder for the image of the product --}}
                    <img class="w-64 aspect-square" src="{{ asset('images/product-images/jackets/cropped-puffer-jacket.png') }}" alt="">
                </div>

                <div class="px-4 bg-white">
                    {{--* The placeholders for the product name, price and availability --}}
                    <p class="text-base font-formula1">Cropped Puffer Jacket</p>
                    <p>£50.00</p>
                    <p>In Stock</p>
                </div>

                <div class="pt-4 pl-4">
                    {{-- *Button to remove from the wishlist --}}
                    <button x-data="{ clicked: false }" @click="clicked = !clicked">
                        <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" :class="{ 'hidden': clicked }" alt="">
                        <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" x-show="clicked" alt="">
                    </button>
                </div>

                <div class="flex justify-end p-4 bg-white">
                    {{--* Button to add the product to the basket --}}
                    <x-primary-button class="" href={{ $productLink }}>Add to cart</x-primary-button>
                    {{--? The $productLink variable is the placeholder for the link to the product page of the specific product --}}
                </div>
            </div>


            {{-- Item 3 Container --}}
            <div class="transition-all duration-300 ease-in-out border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray">
                <div class="w-64 aspect-square">
                    {{--* The placeholder for the image of the product --}}
                    <img class="w-64 aspect-square" src="{{ asset('images/product-images/accessories/socks.png') }}" alt="">
                </div>

                <div class="px-4 bg-white">
                    {{--* The placeholders for the product name, price and availability --}}
                    <p class="text-base font-formula1">Socks</p>
                    <p>£50.00</p>
                    <p>In Stock</p>
                </div>

                <div class="pt-4 pl-4">
                    {{-- *Button to remove from the wishlist --}}
                    <button x-data="{ clicked: false }" @click="clicked = !clicked">
                        <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" :class="{ 'hidden': clicked }" alt="">
                        <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" x-show="clicked" alt="">
                    </button>
                </div>

                <div class="flex justify-end p-4 bg-white">
                    {{--* Button to add the product to the basket --}}
                    <x-primary-button class="" href={{ $productLink }}>Add to cart</x-primary-button>
                    {{--? The $productLink variable is the placeholder for the link to the product page of the specific product --}}
                </div>
            </div>

            {{-- Item 4 Container --}}
            <div class="transition-all duration-300 ease-in-out border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray">
                <div class="w-64 aspect-square">
                    {{--* The placeholder for the image of the product --}}
                    <img class="w-64 aspect-square" src="{{ asset('images/product-images/trousers/shorts.png') }}" alt="">
                </div>

                <div class="px-4 bg-white">
                    {{--* The placeholders for the product name, price and availability --}}
                    <p class="text-base font-formula1">Shorts</p>
                    <p>£50.00</p>
                    <p>In Stock</p>
                </div>

                <div class="pt-4 pl-4">
                    {{-- *Button to remove from the wishlist --}}
                    <button x-data="{ clicked: false }" @click="clicked = !clicked">
                        <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" :class="{ 'hidden': clicked }" alt="">
                        <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" x-show="clicked" alt="">
                    </button>
                </div>

                <div class="flex justify-end p-4 bg-white">
                    {{--* Button to add the product to the basket --}}
                    <x-primary-button class="" href={{ $productLink }}>Add to cart</x-primary-button>
                    {{--? The $productLink variable is the placeholder for the link to the product page of the specific product --}}
                </div>
            </div>

            {{-- Item 5 Container --}}
            <div class="transition-all duration-300 ease-in-out border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray">
                <div class="w-64 aspect-square">
                    {{--* The placeholder for the image of the product --}}
                    <img class="w-64 aspect-square" src="{{ asset('images/product-images/jackets/leather-jacket.png') }}" alt="">
                </div>

                <div class="px-4 bg-white">
                    {{--* The placeholders for the product name, price and availability --}}
                    <p class="text-base font-formula1">Leather Jacket</p>
                    <p>£50.00</p>
                    <p>In Stock</p>
                </div>

                <div class="pt-4 pl-4">
                    {{-- *Button to remove from the wishlist --}}
                    <button x-data="{ clicked: false }" @click="clicked = !clicked">
                        <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" :class="{ 'hidden': clicked }" alt="">
                        <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" x-show="clicked" alt="">
                    </button>
                </div>

                <div class="flex justify-end p-4 bg-white">
                    {{--* Button to add the product to the basket --}}
                    <x-primary-button class="" href={{ $productLink }}>Add to cart</x-primary-button>
                    {{--? The $productLink variable is the placeholder for the link to the product page of the specific product --}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>