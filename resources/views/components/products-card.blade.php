{{--
    ? This is the product card component
    ? It is used to display a product in the products page for each category
    ? It displays the product image, name, price and a button to add the product to the basket
    --}}

<div class="transition-all duration-300 ease-in-out border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray">
    <div class="w-64 aspect-square">
        {{--* The placeholder for the image of the product --}}
        <img class="w-64 aspect-square" src="{{ $image }}" alt="">
    </div>

    <div class="px-4 bg-white">
        {{--* The placeholders for the product name and price --}}
        <h1 class="font-formula1 text-md">{{ $title }}</h1>
        <p>{{ $price }}1</p>
    </div>

    {{-- Heart Button to Add to Wishlist --}}
    <div class="p-3">
        <form action="{{$route}}" method="post">
            <button type="submit"  x-data="{ clicked: false }" @click="clicked = !clicked">
                <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" :class="{ 'hidden': clicked }" alt="">
                <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" x-show="clicked" alt="">
            </button>
        </form>
    </div>

    <div class="flex justify-end p-4 bg-white">
        {{--* Button to add the product to the basket --}}
        <x-primary-button class="" href={{ $productLink }}>More info</x-primary-button>
        {{--? The $productLink variable is the placeholder for the link to the product page of the specific product --}}
    </div>
</div>