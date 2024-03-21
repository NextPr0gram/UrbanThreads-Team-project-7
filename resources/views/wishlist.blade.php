{{--
    ? This is the wislist page
    ? It is used to display the products that are added into the wishlist
    ? It displays the product image, name, price and a button to remove from wishlist
    --}}

<x-app-layout>
    <x-slot name="header">
        <h2>Wishlist</h2>
    </x-slot>

    {{-- Main Container --}}
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="grid grid-rows-1 mt-5 gap-10 md:w-[900px] xl:w-[1200px]">

                {{-- Wishlist Items Container --}}
                @foreach($wishlistItems as $item)
                <div class="border-2 border-gray-0 rounded-md">

                    {{-- Flex Container for Wishlist Item --}}
                    <div class="flex flex-col md:flex-row items-center justify-between p-4 gap-4">

                        <div class="flex flex-col md:flex-row items-center w-full md:w-auto">
                            {{-- Product Image --}}
                            <div class="w-24 aspect-square">
                                <img class="w-24 aspect-square" src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" title="{{ $item->product->name }}">
                            </div>

                            {{-- Product Details --}}
                            <div class="pt-2 md:px-4 bg-white items-center">
                                <div class="text-center md:text-left">
                                    <p class="text-base font-semibold">{{ $item->product->name }}</p>
                                    <p>{{ $item->product->original_price }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Size Selector --}}
                        <div x-data="{ open: false, selected: '' }" @click.away="open = false" class="relative text-neutral-900">
                            <button @click="open = !open" class="flex justify-between items-center w-32 text-left px-2 py-1 bg-white border-2 border-gray-0 rounded-md md:px-4 md:py-2 md:w-52">
                                <span x-text="selected === '' ? 'Select size' : selected"></span>
                                <img :src="open ? '{{ asset('icons/utility/dropdown-arrow-up.svg') }}' : '{{ asset('icons/utility/dropdown-arrow-down.svg') }}'" alt="Toggle Dropdown" class="w-4 h-4 ml-2">
                            </button>
                            <div x-show="open" class="absolute w-52 rounded-md bg-white shadow-lg z-10">
                                <ul class="py-1 text-sm border-2 border-gray-0 rounded-md">
                                    @foreach ($item->product->variations as $variation)
                                    <li @click="selected = '{{ $variation->size }}'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                                        Size: {{ $variation->size }} @if ($variation->stock <= 0) - Out of stock @elseif ($variation->stock < 10) - Low stock ({{ $variation->stock }} left) @else - In stock @endif </li>
                                                @endforeach
                                </ul>
                            </div>
                        </div>


                        {{-- Wishlist & Cart Action Buttons --}}
                        <div class="flex flex-row items-center md:flex-col md:items-end">
                            {{-- Remove from Wishlist Button --}}
                            <form action="{{ route('wishlist.remove', $item->product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="px-4">
                                    <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" alt="">
                                </button>
                            </form>

                            {{-- Add to Cart Button --}}
                            <div class="px-4">
                                <form action="{{ route('basket.add', $item->product->id) }}" method="post" class="md:pt-4">
                                    <x-secondary-button class="whitespace-nowrap">Add to cart</x-secondary-button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>