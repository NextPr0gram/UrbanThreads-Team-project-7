{{--
    ? This is the page that shows the order confirmation
    ? It is used to display the products in the order and allows the customer to:
    ?   Continue shopping
--}}

<x-app-layout>

    <!-- Header Container -->
    <x-slot name="header">
        Order ID: {{ $order->id }}
    </x-slot>

    <p class="text-center text-xl font-lexend">Thank you for placing your order!</p>

    <!-- Main Container -->
    <div class="grid grid-rows-2 items-center mt-4 mx-10 space-y-8 md:flex-row md:justify-center">
        <!-- Order items container -->
        <div
            class="w-full max-w-[600px] gap-10 md:w-[1037px] p-5 max-sm:p-10 border-2 border-navy-blue backdrop-blur-sm">
            {{-- * Loops through all basket items in the user's basket --}}
            @foreach ($order->items as $item)
                <x-order-item>
                    <x-slot name="productImage">
                        {{ $item->product->image }}
                    </x-slot>
                    <x-slot name="productName">
                        {{ $item->product->name }}
                    </x-slot>
                    <x-slot name="sellingPrice">
                        {{ $item->product->selling_price }}
                    </x-slot>
                    <x-slot name="quantity">
                        {{ $item->quantity }}
                    </x-slot>
                    <x-slot name="size">
                        {{ $item->variation->size }}
                    </x-slot>
                </x-order-item>
            @endforeach
        </div>
        <div class="w-full max-w-[600px] p-5 max-sm:p-10 border-2 border-navy-blue backdrop-blur-sm">
            <!-- Total -->
            <div class="py-2 mt-6 border-t border-b border-bluish-purple">
                <div class="flex justify-between items-center">
                    <p class="text-lg font-medium text-gray-900">Number of items</p>
                    <p class="font-semibold text-lg text-gray-900">{{ $order->items->count() }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-lg font-medium text-gray-900">Order Status</p>
                    <p class="font-semibold text-lg text-gray-900">{{ $order->status }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-lg font-medium text-gray-900">Subtotal</p>
                    <p class="font-semibold text-lg text-gray-900">£{{ $subTotal }}</p>
                </div>
                @if ($discountAmount > 0)
                    <div class="flex justify-between items-center">
                        <p class="text-lg font-medium text-gray-900">Discount</p>
                        <p class="font-semibold text-lg text-gray-900">-£{{ $discountAmount }}</p>
                    </div>
                @endif
            </div>
            <div class="flex justify-between items-center mt-6">
                <p class="text-2xl font-semibold text-gray-900">Total</p>
                <p class="text-2xl font-semibold text-gray-900">£{{ $order->total }}</p>
            </div>
            <div class="flex justify-center mt-6">
                <a href="{{ route('home') }}">
                    <x-primary-button>Continue Shopping</x-primary-button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
