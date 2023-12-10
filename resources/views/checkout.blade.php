{{-- resources/views/checkout.blade.php --}}

<x-app-layout>
    @auth
        <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
            {{-- Order summary --}}
            <div class="px-4 pt-8">
                <div class="mt-2 space-y-3 px-2 py-4 sm:px-6 bg-white bg-opacity-60 border-3 border-navy-blue max-sm:text-center">
                    <h1 class="text-4xl font-formula1 text-bluish-purple">Items</h1>

                    {{-- basket items --}}
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
                        </x-basket-item>
                    @endforeach
                </div>

                <div class="bg-white bg-opacity-60 p-3 mt-5 border-navy-blue border-3 text-bluish-purple">
                    <h1 class="text-4xl font-formula1 text-bluish-purple">Delivery Information</h1>
                    <div class="mt-2 flex flex-col sm:flex-row gap-5">
                        <div class="w-full">
                            <x-input-label for="first_name">First Name</x-input-label>
                            <x-text-input type="text" id="first_name" name="first_name" class="font-lexend text-sm shadow-sm w-full"
                                placeholder="John" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="last_name">Last Name</x-input-label>
                            <x-text-input type="text" id="last_name" name="last_name" class="text-sm shadow-sm w-full"
                                placeholder="Doe" />
                        </div>
                    </div>
                    <div class="relative mt-2">
                        <x-input-label for="address_line1">Address Line 1</x-input-label>
                        <x-text-input type="text" id="address_line1" name="address_line1"
                            class="text-sm shadow-sm w-full" placeholder="123 Main Street" />
                    </div>
                    <div class="relative mt-2">
                        <x-input-label for="address_line2">Address Line 2 (Optional)</x-input-label>
                        <x-text-input type="text" id="address_line2" name="address_line2"
                            class="text-sm shadow-sm w-full" placeholder="Apartment 420" />
                    </div>
                    <div class="relative mt-2">
                        <x-input-label for="country">Country</x-input-label>
                        <x-text-input type="text" id="country" name="country" class="text-sm shadow-sm w-full"
                            placeholder="United Kingdom" />
                    </div>
                    <div class="fmt-2 flex flex-col sm:flex-row gap-5">
                        <div class="w-full">
                            <x-input-label for="city">Town/City</x-input-label>
                            <x-text-input type="text" id="city" name="city" class="text-sm shadow-sm w-full"
                                placeholder="Birmingham" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="postcode">Postcode</x-input-label>
                            <x-text-input type="text" id="postcode" name="postcode" class="text-sm shadow-sm w-full"
                                placeholder="B4 7ET" />
                        </div>
                    </div>
                </div>

                {{-- Payment information form --}}
                <div class="bg-white bg-opacity-60 p-3 mt-5 border-navy-blue border-3 text-bluish-purple">
                    <h1 class="text-4xl font-formula1 text-bluish-purple">Payment Information</h1>
                    <div class="relative mt-2 w-full">
                        <x-input-label for="card_number">Card Number</x-input-label>
                        <x-text-input type="text" id="card_number" name="card_number"
                            class="text-sm shadow-sm w-full" placeholder="1234 5678 9012 3456" />
                    </div>
                    <div class="flex flex-col sm:flex-row gap-5 mt-2">
                        <div class="w-full">
                            <x-input-label for="expiry_date">Expiry Date</x-input-label>
                            <x-text-input type="text" id="expiry_date" name="expiry_date"
                                class="text-sm shadow-sm w-full" placeholder="MM/YY" />
                        </div>
                        <div class="w-full">
                            <x-input-label for="security_code">Security Code (CVC/CVV)</x-input-label>
                            <x-text-input type="text" id="security_code" name="security_code"
                                class="text-sm shadow-sm w-full" placeholder="123" />
                        </div>
                    </div>
                    <div class="relative mt-2">
                        <x-input-label for="cardholder_name">Cardholder Name</x-input-label>
                        <x-text-input type="text" id="cardholder_name" name="cardholder_name"
                            class="text-sm shadow-sm w-full" placeholder="Mr John Doe" />
                    </div>
                </div>
            </div>

            <div class="max-sm:px-4">
                <div class="mt-10 space-y-3 px-2 py-4 sm:px-6 bg-white bg-opacity-60 border-3 border-navy-blue">
                    <h1 class="text-4xl font-formula1 text-bluish-purple">Order Summary</h1>
                    <!-- Discount code input -->
                    <form class="grid gap-6 mt-5">
                        <div class="flex flex-col space-x-3 sm:flex-row">
                            <x-text-input type="text" name="discount-code" class="w-full text-sm shadow-sm"
                                placeholder="Enter a discount code here" />
                            <div class="max-sm:mt-2 flex justify-center"><x-primary-button-dark
                                    type="submit">Apply</x-primary-button-dark></div>
                        </div>
                    </form>

                    <!-- Total -->
                    <div class="mt-6 border-t border-b border-bluish-purple py-2">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Number of items</p>
                            <p class="font-semibold text-gray-900">3</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Subtotal</p>
                            <p class="font-semibold text-gray-900">£399.00</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Delivery</p>
                            <p class="font-semibold text-gray-900">£2.99</p>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between">
                        <p class="text-2xl font-semibold text-gray-900">Total</p>
                        <p class="text-2xl font-semibold text-gray-900">£401.99</p>
                    </div>
                    <x-primary-button-dark class="w-full mt-5">Place Order</x-primary-button-dark>
                </div>
            </div>
        </div>
    @else
        <div class="flex justify-center py-20">
            <div class="flex flex-col sm:flex-row justify-center py-16 w-fit bg-white bg-opacity-40 backdrop-blur border-3 border-navy-blue">
                <div class="block self-center px-8">
                    <h1 class="font-formula1 text-6xl text-bluish-purple ">You are not logged in!</h1>
                    <div class="flex flex-col sm:flex-row gap-5 mt-5">
                        <div class="w-full">
                            <x-input-label class="flex justify-center">If you are an existing customer:</x-input-label>
                            <a href="{{ route('login') }}"><x-primary-button-dark
                                    class="w-full mt-5">Login</x-primary-button-dark></a>
                        </div>
                        <div class="w-full">
                            <x-input-label class="flex justify-center">If you are a new customer:</x-input-label>
                            <a href="{{ route('register') }}"><x-primary-button-dark
                                    class="w-full mt-5">Register</x-primary-button-dark></a>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center mt-5">
                        <a href="{{ route('home') }}"><x-primary-button-dark class="w-full">Continue
                                Shopping</x-primary-button-dark></a>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</x-app-layout>
