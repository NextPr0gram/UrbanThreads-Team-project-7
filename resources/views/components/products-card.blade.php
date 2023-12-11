{{--
    ? This is the product card component
    ? It is used to display a product in the products page for each category
    ? It displays the product image, name, price and a button to add the product to the basket
    --}}

<div class="border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray transition-all duration-300 ease-in-out">
    <div class="w-64 aspect-square">
        {{--* The placeholder for the image of the product --}}
        <img class="w-64 aspect-square" src="{{ $image }}" alt="">
    </div>

    <div class="px-4 bg-white">
        {{--* The placeholders for the product name and price --}}
        <h1 class="font-formula1 text-md">{{ $title }}</h1>
        <p>{{ $price }}</p>
    </div>

    <div class="flex justify-end p-4 bg-white">
        {{--* Button to add the product to the basket --}}
        <x-primary-button-dark class="" href={{ $productLink }}>More info</x-primary-button-dark>
        {{--? The $productLink variable is the placeholder for the link to the product page of the specific product --}}
    </div>
</div>
