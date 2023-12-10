<x-app-layout>

    <!-- Header Container -->
    <div class="flex justify-center items-center h-20 bg-gray-100">
        <h1 class="text-white text-3xl font-formula1">My Basket</h1>
    </div>

    <!-- Main Container -->
    <div class="flex flex-col items-center mt-4 space-y-8 md:space-x-4 md:flex-row md:justify-center">
        <!-- Cart items container -->
        <div
            class="w-full gap-10 md:w-[1037px] p-3 sm:p-10 border-3 border-bluish-purple bg-white bg-opacity-40 backdrop-blur-sm">
            @foreach ($basketItems as $item)
                <x-basket-item>
                    <x-slot name="productName">
                        {{ $item->product->name }}
                    </x-slot>
                    <x-slot name="counter">
                        <form action="{{ route('decrementQuantity', ['productId' => $item->product->id]) }}"
                            method="post">
                            @csrf
                            <button
                                class="bg-black mr-3 text-black w-8 h-8 squared border border-black font-bold">-</button>
                        </form>
                        <span class="flex font-bold items-center">{{ $item->quantity }}</span>
                        <form action="{{ route('incrementQuantity', ['productId' => $item->product->id]) }}"
                            method="post">
                            @csrf
                            <button
                                class="bg-black ml-3 text-black w-8 h-8 squared border border-black font-bold">+</button>
                        </form>
                    </x-slot>
                    <x-slot name="price">
                        {{ $item->product->selling_price }}
                    </x-slot>
                    <x-slot name="remove">
                        <form action="{{ route('basket.remove', $item->product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div x-data="{ showRemoveText: window.innerWidth > 768 }" x-init="() => { window.addEventListener('resize', () => { showRemoveText = window.innerWidth > 768 }); }">
                                <button type="submit" class="text-red" x-show="showRemoveText">Remove</button>
                                <button type="submit" class="text-red text-2xl font-formula1" x-show="!showRemoveText"><img src="{{asset('icons/utility/cancel-icon.png')}}" alt=""></button>
                            </div>
                        </form>
                    </x-slot>
                </x-basket-item>
            @endforeach
        </div>

        <!-- Gap between Product Cards and Cart Summary (visible only on larger screens) -->
        <div class="hidden md:w-8 md:block"></div>

        <!-- Cart Summary Container -->
        <div class="w-full md:w-[414px] p-4 bg-white bg-opacity-40 border-3 border-navy-blue backdrop-blur-[18px]">
            <!-- Subtotal, Discount, Total -->
            <div class="self-stretch h-12 px-4 justify-between items-center flex border-b-2 border-snow-white">
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-lexend-deca">Subtotal</div>
                </div>
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-lexend-deca subtotal-value">{{ $totalPrice }}
                    </div>
                </div>
            </div>
            <div class="self-stretch h-12 px-4 justify-between items-center flex border-b-2 border-snow-white">
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex ">
                    <div class="text-black text-sm font-medium font-lexend-deca">Discount</div>
                </div>
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-lexend-deca">£0</div>
                </div>
            </div>
            <div class="self-stretch h-12 px-4 justify-between items-center flex">
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-bold font-lexend-deca">Total</div>
                </div>
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-bold font-lexend-deca total-value">{{ $totalPrice }}</div>
                </div>
            </div>

            <!-- Checkout Button -->
            <div class="self-stretch justify-center mt-4">
                <a href="{{ route('checkout') }}">
                    <x-primary-button-dark class="w-full mt-5">Checkout</x-primary-button-dark>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
