{{-- products.blade.php --}}

<x-app-layout>
    <div class="container mx-auto">
        <h1 class="mt-5 ml-4 md:ml-20 font-formula1 text-6xl">{{ $category }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-20 mt-5">
            @foreach ($products as $product)
                <div class="mb-4">
                    <a href="{{ route('show', ['slug' => $product->slug]) }}">
                        <x-products-card title='{{ $product->name }}' price='£{{ $product->selling_price }}'></x-products-card>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
