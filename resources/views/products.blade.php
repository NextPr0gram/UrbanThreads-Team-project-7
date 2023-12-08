{{-- products.blade.php --}}

<x-app-layout>
    <div class="">
        <h1 class="mt-5 ml-20 font-formula1 text-6xl">{{ $category }}</h1> <!-- This is the category title fetched by the product controller -->
        <div class="grid grid-cols-3 mt-5 place-items-center justify-center content-center gap-y-5">
            @foreach ($products as $product) <!-- This is the products array fetched by the product controller for all products in the category -->
                <div>
                    <a href="{{ route('show', ['slug' => $product->slug]) }}"> <!-- This is the route to the page for each individual product -->
                        <x-products-card title='{{ $product->name }}' price='£{{ $product->selling_price }}'></x-products-card></a>
                        <!-- This is the products image component, which is a card with the product name and price -->
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
