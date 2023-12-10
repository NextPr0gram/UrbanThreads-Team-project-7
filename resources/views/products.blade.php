{{-- products.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ $category }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-20 mt-5">
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
