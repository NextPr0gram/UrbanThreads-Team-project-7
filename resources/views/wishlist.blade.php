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
            <div class="grid grid-rows-1 mt-5 gap-10 md:w-[600px] lg:w-[800px] xl:w-[1000px] 2xl:w-[1200px]">

                {{-- Wishlist Items Container --}}
                @foreach ($wishlistItems as $item)
                    <div class="border-2 border-gray-0 rounded-md">

                        {{-- Flex Container for Wishlist Item --}}
                        <div class="flex flex-col md:flex-row items-center justify-between p-4 gap-4">

                            <div class="flex flex-col md:flex-row items-center w-full md:w-auto">
                                {{-- Product Image --}}
                                <div class="w-24 aspect-square">
                                    <img class="w-24 aspect-square rounded-md" src="{{ asset($item->product->image) }}"
                                        alt="{{ $item->product->name }}" title="{{ $item->product->name }}">
                                </div>

                                {{-- Product Details --}}
                                <div class="pt-2 md:px-4 bg-white items-center">
                                    <div class="text-center md:text-left">
                                        <p class="text-base font-semibold">{{ $item->product->name }}</p>
                                        <p>{{ $item->product->selling_price }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Size Selector --}}
                            <form id="addToBasket" class="w-full md:w-auto"
                                action="{{ route('basket.add', ['productId' => $item->product->id]) }}" method="post">
                                @csrf
                                <x-select id="size" name="size" class="w-full" required>
                                    @foreach ($item->product->variations as $variation)
                                        <option value="{{ $variation->id }}">Size: {{ $variation->size }}
                                            @if ($variation->stock <= 0)
                                                - Out of stock
                                            @elseif ($variation->stock < 10)
                                                - Low stock ({{ $variation->stock }} left)
                                            @else
                                                - In stock
                                            @endif
                                        </option>
                                    @endforeach
                                </x-select>
                            </form>


                            {{-- Wishlist & Cart Action Buttons --}}
                            <div class="flex flex-row items-center md:flex-col md:items-end gap-5">
                                {{-- Remove from Wishlist Button --}}
                                <form id="removeFromWishlist"
                                    action="{{ route('wishlist.remove', $item->product->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="px-4" form="removeFromWishlist">
                                        <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5"
                                            alt="">
                                    </button>
                                </form>

                                {{-- Add to Cart Button --}}
                                <div class="md:px-4">
                                    <x-secondary-button form="addToBasket" class="whitespace-nowrap">Add to
                                        Basket</x-secondary-button>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
