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

    {{-- Wishlist Sections --}}

    <div class="flex justify-center items-center ">
        <div class="transition-all duration-300 ease-in-out border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray">
            <div class="w-64 aspect-square">
                <!-- {{--* The placeholder for the image of the product --}} -->

                <img class="w-64 aspect-square" src="#" alt="">
            </div>

            <div class="px-4 py-1 bg-white">
                {{--* The placeholders for the product name, price and availability --}}
                <p class="text-base font-formula1">Pink Hoodie</p>
                <p>£50.00</p>
                <p>In Stock</p>
            </div>

            <div class="pl-4 pt-4">
                {{-- *Button to remove from the wishlist --}}
                <button x-data="{ clicked: false }" @click="clicked = !clicked">
                    <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" :class="{ 'hidden': clicked }" alt="">
                    <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" x-show="clicked" alt="">
                </button>
            </div>

            <div class="flex justify-end p-4 bg-white">
                {{--* Button to add the product to the basket --}}
                <x-primary-button class="" href={{ $productLink }}>More info</x-primary-button>
                {{--? The $productLink variable is the placeholder for the link to the product page of the specific product --}}
            </div>

        </div>
    </div>


</x-app-layout>

<!-- <div class="flex flex-col">

    {{-- Wishlist Item 1 --}}
    <div class="flex flex-col font-lexend text-sm not-italic leading-4 text-neutral-900 border-b-2 border-solid border-neutral-30 py-4">
        <div class="flex items-center py-3">
            <img src="#" alt="" class="w-20 h-20 bg-primary-75 rounded-sm">
            <div class="flex flex-col pl-5">
                <p class="font-bold pb-2">Pink Hoodie</p>
                <p class="pb-1">In stock</p>
                <p class="">£ 24.99</p>
            </div>
        </div>

        <div class="flex items-center relative py-5">
            <x-secondary-button class="absolute left-24 font-lexend text-sm not-italic font-normal leading-4 text-primary-300">Add to cart</x-secondary-button>
            <button class="absolute right-0"><img src="{{ asset('icons/utility/bin-icon.svg') }}" alt="" class="w-5 h-5"></button>
        </div>
    </div>

</div> -->