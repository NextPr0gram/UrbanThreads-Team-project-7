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
    <div class="grid grid-rows-1 mt-5 gap-10">

        {{-- Wishlist Items Container --}}
        @foreach($wishlistItems as $item)
        <div class="border-3 border-light-gray">

            {{-- Flex Container for Wishlist Item --}}
            <div class="flex flex-row items-center justify-between p-4">

                <div class="flex items-center">
                    {{-- Product Image --}}
                    <div class="w-28 aspect-square">
                        <img class="w-28 aspect-square" src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" title="{{ $item->product->name }}">
                    </div>

                    {{-- Product Details --}}
                    <div class="px-4 bg-white items-center">
                        <p class="text-base font-semibold">{{ $item->product->name }}</p>
                        <p>{{ $item->product->original_price }}</p>
                    </div>
                </div>

                {{-- Size Selector --}}
                <div class="w-56 justify-center">
                    <x-select id="size" name="size" class="w-full" required>
                        @foreach ($item->product->variations as $variation)
                        <option value="{{ $variation->id }}">
                            Size: {{ $variation->size }} @if ($variation->stock <= 0) - Out of stock @elseif ($variation->stock < 10) - Low stock ({{ $variation->stock }} left) @else - In stock @endif </option>
                                    @endforeach
                    </x-select>
                </div>

                {{-- Wishlist & Cart Action Buttons --}}
                <div class="flex flex-col justify-end"> <!-- items-center -->

                        {{-- Remove from Wishlist Button --}}
                        <form action="{{ route('wishlist.remove', $item->product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="px-4">
                                <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" alt="">
                            </button>
                        </form>

                    {{-- Add to Cart Button --}}
                    <form action="{{ route('basket.add', $item->product->id) }}" method="post">
                        <x-secondary-button>Add to cart</x-secondary-button>
                    </form>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>