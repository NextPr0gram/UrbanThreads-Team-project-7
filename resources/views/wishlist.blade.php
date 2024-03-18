{{--
    ? This is the wislist page
    ? It is used to display the products that are added into the wishlist
    ? It displays the product image, name, price and a button to remove from wishlist
    --}}

<x-app-layout>

    <x-slot name="header">
        <h2 class="">
            Wishlist
        </h2>
    </x-slot>

    <!-- Main Container -->
    <div class="flex justify-center">
        <!--   Wishlist Items Container -->
        <div class="grid grid-cols-1 gap-20 mt-5 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
            <!-- Item Container -->
            @foreach ($wishlistItems as $item)
                <div
                    class="transition-all duration-300 ease-in-out border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray">
                    <div class="w-64 aspect-square">
                        {{-- * The placeholder for the image of the product --}}
                        <img class="w-64 aspect-square" src="{{ asset($item->product->image) }}"
                            alt="{{ $item->product->name }}" title="{{ $item->product->name }}">
                    </div>


                    <div class="px-4 py-4 bg-white">
                        {{-- * The placeholders for the product name, price and availability --}}
                        <p class="text-base font-formula1">{{ $item->product->name }}</p>
                        <p>{{ $item->product->original_price }}</p>
                    </div>

                    <div class="pt-4 pl-4">
                        {{-- *Button to remove from the wishlist --}}
                        <form action="{{ route('wishlist.remove', $item->product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" x-data="{ clicked: false }" @click="clicked = !clicked">
                                <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5"
                                    :class="{ 'hidden': clicked }" alt="">
                                <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" x-show="clicked"
                                    alt="">
                            </button>
                        </form>

                    </div>

                    <div class="flex justify-end p-4 bg-white">
                        {{-- * Button to add the product to the basket --}}
                        <form action="{{ route('basket.add', $item->product->id) }}" method="post">
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
                            <x-primary-button class="" href={{ $productLink }}>Add to cart</x-primary-button>
                        </form>
                        {{-- ? The $productLink variable is the placeholder for the link to the product page of the specific product --}}
                    </div>

                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
