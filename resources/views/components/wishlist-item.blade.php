{{--
    ? This is the wishlist page item component
    ? It is used to display a product in the wishlist and allows the customer to remove the product from the wishlist
    --}}
<div class="flex justify-center">
    <div class="grid grid-cols-1 gap-20 mt-5 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
        <div class="transition-all duration-300 ease-in-out border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray">
            <div class="w-64 aspect-square">
                <img class="w-64 aspect-square" src="" alt=""> {{--* This is the placeholder for the image link for the specific product fetched from the database --}}
            </div>

            <div class="px-4 bg-white">
                <p class="text-base font-formula1"></p>
                <p class="text-base text-left">£</p>
            </div>

            <div class="pt-4 pl-4">
                <button x-data="{ clicked: false }" @click="clicked = !clicked">
                    <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" :class="{ 'hidden': clicked }" alt="">
                    <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" x-show="clicked" alt="">
                    /button>
            </div>

            <div class="flex justify-end p-4 bg-white">
                <x-primary-button class="" :href="route('addToCart', ['id' => $item->id])">Add to cart</x-primary-button>
            </div>
        </div>
    </div>
</div>