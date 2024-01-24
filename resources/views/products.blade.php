{{-- products.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ $category }} {{--* Title for the category of clothing --}}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="grid grid-cols-1 gap-20 mt-5 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
                {{--
                    * Loops through all products in the category of clothing and generates a product card for each product
                    * The product card includes the product image, name, price and a button that goes to the page for that specific product
                    * which allows the user to add the product to their basket
                    --}}
                @foreach ($products as $product)
                    <div class="mb-4">
                        <a href="{{ route('show', ['slug' => $product->slug]) }}">
                            <x-products-card image='{{ $product->image }}' title='{{ $product->name }}' price='£{{ $product->selling_price }}'></x-products-card>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
