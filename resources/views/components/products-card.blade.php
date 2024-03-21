{{--
    ? This is the product card component
    ? It is used to display a product in the products page for each category
    ? It displays the product image, name, price and a button to add the product to the basket
    --}}

<div
    class="transition-all rounded-lg duration-300 ease-in-out border-2 border-neutral-50 w-fit hover:bg-neutral-20">
    <div class="w-64 aspect-auto p-2">
        {{-- * The placeholder for the image of the product --}}
        <img class="w-64 aspect-auto rounded-lg" src="{{ $image }}" alt="">
    </div>

    <div class="px-2 py-5">
        {{-- * The placeholders for the product name and price --}}
        <div class="flex flex-row justify-between">
            <h1 class="font-formula1-light text-lg">{{ $title }}</h1>
            {{-- Heart Button to Add to Wishlist --}}
            <form action="{{ $route }}" method="post" class="flex">
                <button type="submit" x-data="{ clicked: false }" @click="clicked = !clicked">
                    <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5"
                        :class="{ 'hidden': clicked }" alt="">
                    <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" alt="">
                </button>
            </form>
        </div>
        <p class="font-formula1 text-lg">{{ $price }}</p>
    </div>
</div>
