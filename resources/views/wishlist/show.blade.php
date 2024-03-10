<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            Wishlist
        </h2>
    </x-slot>

    <!-- Main Container -->
    <div class="flex justify-center">
        <!-- Wishlist Items Container -->
        <div class="grid grid-cols-1 gap-20 mt-5 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
            @if ($wishlistItems && $wishlistItems->count() > 0)
            @foreach ($wishlistItems as $item)
            <div class="transition-all duration-300 ease-in-out border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray">
                <div class="w-64 aspect-square">
                    {{-- Placeholder for the image of the product --}}
                    <img class="w-64 aspect-square" src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                </div>
                <div class="px-4 bg-white">
                    {{-- Placeholders for the product name and price --}}
                    <p class="text-base font-formula1">{{ $item->product->name }}</p>
                    <p>£{{ number_format($item->product->price, 2) }}</p>
                </div>
                <div class="pt-4 pl-4">
                    {{-- Button to remove from the wishlist --}}
                    <form action="{{ route('wishlist.remove', ['productId' => $item->product->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" alt="Remove from wishlist">
                        </button>
                    </form>
                </div>
                <div class="flex justify-end p-4 bg-white">
                    {{-- Button to add the product to the basket --}}
                    <a href="{{ route('basket.add', ['productId' => $item->product->id]) }}" class="px-4 py-2 bg-blue-500 text-white rounded">
                        Add to cart
                    </a>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-span-full text-center">
                <p>Your wishlist is empty.</p>
            </div>
            @endif
        </div>
    </div>

</x-app-layout>