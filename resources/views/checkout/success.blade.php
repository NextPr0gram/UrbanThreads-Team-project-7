{{--
    ? This is the page that shows the order confirmation
    ? It is used to display the products in the order and allows the customer to:
    ?   Continue shopping
--}}

<x-app-layout>

    <!-- Header Container -->
    <x-slot name="header">
        Order Successful
    </x-slot>

    <p class="text-center text-xl font-lexend">Thank you for your order!</p>

    <!-- Main Container -->
    <div class="flex items-center mt-4 mx-10 space-y-8 md:space-x-4 md:flex-row md:justify-center">
        @if ($orderItems)
            <!-- Basket items container -->
            <div
                class="w-full max-w-[600px] gap-10 md:w-[1037px] p-3 sm:p-10 border-2 border-navy-blue bg-white bg-opacity-40 backdrop-blur-sm">
                {{-- * Loops through all basket items in the user's basket --}}
                @foreach ($orderItems as $item)
                    <x-order-item class="mb-4 p-4 border rounded-md shadow-md">
                        <x-slot name="image">
                            {{ $item->product->image }}
                        </x-slot>
                        <x-slot name="productName">
                            {{ $item->product->name }}
                        </x-slot>
                        <x-slot name="price">
                            {{ $item->product->selling_price }}
                        </x-slot>
                        <x-slot name="quantity">
                            {{ $item->quantity }}
                        </x-slot>
                    </x-order-item>
                @endforeach
            </div>
    </div>
    <div class="p-4 mt-10 space-y-6 bg-white border-2 sm:px-6 border-navy-blue">
        <!-- Total -->
        <div class="py-2 mt-6 border-t border-b  border-bluish-purple">
            <div class="flex justify-between items-center">
                <p class="text-sm font-medium text-gray-900">Number of items</p>
                <p class="font-semibold text-gray-900">{{ $itemCount }}</p>
            </div>
        </div>
        <div class="flex justify-between items-center mt-6">
            <p class="text-2xl font-semibold text-gray-900">Total</p>
            <p class="text-2xl font-semibold text-gray-900">£{{ $totalAmount }}</p>
        </div>
        <x-primary-button class="mt-5 w-full">Continue Shopping</x-primary-button>
    </div>
    @endif
</x-app-layout>
