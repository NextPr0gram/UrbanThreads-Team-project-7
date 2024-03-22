{{-- resources/views/checkout.blade.php --}}

{{--
    This is the checkout page. It is only accessible to authenticated users.
    It displays the items in the basket, the total price, and a form to enter
    delivery and payment information.
--}}

<x-app-layout>

    <x-slot name="header">
        Checkout
    </x-slot>
    @auth
        <div class="sm:grid lg:grid-cols-2 lg:px-20 xl:px-32">
            <form method="post" action="{{ route('place-order') }}" name="checkout_form" id="checkout_form">
                @csrf
                @method('POST')
                {{-- Order summary --}}
                <div class="sm:px-4 sm:pt-8">
                    <div
                        class="mt-2 space-y-3 w-full bg-white bg-opacity-60 border-2 sm:px-6 border-neutral-50 rounded-lg max-sm:text-center pb-5">

                        {{-- Basket items --}}
                        @foreach ($basketItems as $item)
                            <x-order-item>
                                <x-slot name="productImage">
                                    {{ $item->product->image }} {{-- * The product image is placed in the image placeholder --}}
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
                    <div class="p-4 mt-5 space-y-6 bg-white bg-opacity-60 border-2 border-neutral-50 rounded-lg">
                        <h1 class="text-lg font-bold">Delivery Information</h1>
                        <div class="flex flex-col items-center mt-2 sm:flex-row sm:space-x-6">
                            <div class="w-full">
                                <x-input-label for="first_name">First Name</x-input-label>
                                <x-text-input type="text" id="first_name" name="first_name"
                                    class="w-full text-sm shadow-sm font-lexend" placeholder="John" :value="old('first_name')" />
                                <x-input-error :messages="$errors->checkoutValidation->get('first_name')" class="pt-2" />
                            </div>
                            <div class="pt-6 w-full sm:pt-0">
                                <x-input-label for="last_name">Last Name</x-input-label>
                                <x-text-input type="text" id="last_name" name="last_name"
                                    class="w-full text-sm shadow-sm font-lexend" placeholder="Doe" :value="old('last_name')" />
                                <x-input-error :messages="$errors->checkoutValidation->get('last_name')" class="pt-2" />
                            </div>
                        </div>
                        <div class="relative mt-2">
                            <x-input-label for="address_line_1">Address Line 1</x-input-label>
                            <x-text-input type="text" id="address_line_1" name="address_line_1"
                                class="w-full text-sm shadow-sm" placeholder="123 Main Street" :value="old('address_line_1')" />
                            <x-input-error :messages="$errors->checkoutValidation->get('address_line_1')" class="pt-2" />
                        </div>
                        <div class="relative mt-2">
                            <x-input-label for="address_line_2">Address Line 2 (Optional)</x-input-label>
                            <x-text-input type="text" id="address_line_2" name="address_line_2"
                                class="w-full text-sm shadow-sm" placeholder="Apartment 420" :value="old('address_line_2')" />
                            <x-input-error :messages="$errors->checkoutValidation->get('address_line_2')" class="pt-2" />
                        </div>
                        <div class="relative mt-2">
                            <x-input-label for="county">County</x-input-label>
                            <x-text-input type="text" id="county" name="county" class="w-full text-sm shadow-sm"
                                placeholder="West Midlands" :value="old('county')" />
                            <x-input-error :messages="$errors->checkoutValidation->get('county')" class="pt-2" />
                        </div>
                        <div class="flex flex-col gap-5 mt-2 sm:flex-row">
                            <div class="w-full">
                                <x-input-label for="city">Town/City</x-input-label>
                                <x-text-input type="text" id="city" name="city" class="w-full text-sm shadow-sm"
                                    placeholder="Birmingham" :value="old('city')" />
                                <x-input-error :messages="$errors->checkoutValidation->get('city')" class="pt-2" />
                            </div>
                            <div class="w-full">
                                <x-input-label for="postcode">Postcode</x-input-label>
                                <x-text-input type="text" id="postcode" name="postcode" class="w-full text-sm shadow-sm"
                                    placeholder="B4 7ET" :value="old('postcode')" />
                                <x-input-error :messages="$errors->checkoutValidation->get('postcode')" class="pt-2" />
                            </div>
                        </div>
                    </div>

                    {{-- Payment information form --}}
                    <div class="p-4 mt-5 space-y-6 bg-white bg-opacity-60 border-2 border-neutral-50 rounded-lg">
                        <h1 class="text-lg font-bold">Payment Information</h1>
                        <div class="relative w-full">
                            <x-input-label for="card_number">Card Number</x-input-label>
                            <x-text-input id="card_number" name="card_number" class="w-full text-sm shadow-sm"
                                placeholder="1234 5678 9012 3456" />
                            <x-input-error :messages="$errors->checkoutValidation->get('card_number')" class="pt-2" />
                        </div>
                        <div class="flex flex-col sm:flex-row sm:space-x-6">
                            <div class="w-full">
                                <x-input-label for="expiry_date">Expiry Date (MM/YY)</x-input-label>
                                <x-text-input id="expiry_date" name="expiry_date" class="w-full text-sm shadow-sm"
                                    placeholder="MM/YY" />
                                <x-input-error :messages="$errors->checkoutValidation->get('expiry_date')" class="pt-2" />
                            </div>
                            <div class="pt-6 w-full sm:pt-0">
                                <x-input-label for="security_code">Security Code (CVC/CVV)</x-input-label>
                                <x-text-input id="security_code" name="security_code" class="w-full text-sm shadow-sm"
                                    placeholder="123" />
                                <x-input-error :messages="$errors->checkoutValidation->get('security_code')" class="pt-2" />
                            </div>
                        </div>
                        <div class="relative">
                            <x-input-label for="cardholder_name">Cardholder Name</x-input-label>
                            <x-text-input type="text" id="cardholder_name" name="cardholder_name"
                                class="w-full text-sm shadow-sm" placeholder="Mr John Doe" :value="old('cardholder_name')" />
                            <x-input-error :messages="$errors->checkoutValidation->get('cardholder_name')" class="pt-2" />
                        </div>
                    </div>
                </div>
            </form>

            <div class="">
                <div class="p-4 mt-10 space-y-6 bg-white border-2 sm:px-6 border-neutral-50 rounded-lg">
                    <h1 class="text-lg font-bold">Order Summary</h1>
                    <!-- Total -->
                    <div class="py-2 mt-6 border-t border-b border-primary-300">
                        <div class="flex justify-between items-center">
                            <p class="text-sm font-medium text-gray-900">Number of items</p>
                            <p class="font-semibold text-gray-900">{{ $itemCount }}</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-sm font-medium text-gray-900">Subtotal</p>
                            <p class="font-semibold text-gray-900">£{{ $subTotal }}</p>
                        </div>
                        @if ($discountAmount)
                            <div class="flex justify-between items-center">
                                <p class="text-sm font-medium text-gray-900">Discount - {{$discountCode}}</p>
                                <p class="font-semibold text-gray-900">-£{{ $discountAmount }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <p class="text-2xl font-semibold text-gray-900">Total</p>
                        <p class="text-2xl font-semibold text-gray-900">£{{ $totalAmount }}</p>
                    </div>
                    <x-primary-button class="mt-5 w-full" form="checkout_form">Place Order</x-primary-button>
                </div>
            </div>
        </div>
    @endauth
</x-app-layout>
