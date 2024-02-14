{{--
    ? This is the order item component
    ? It is used to display an order item in the order confirmation page
    --}}

<div class="flex items-center justify-between border-b-2 border-snow-white">
    <img class="object-cover object-center m-2 h-16 sm:h-24 aspect-square border-3 border-bluish-purple"
        src="{{ $image }}" {{-- * This is the placeholder for the image link for the specific product fetched from the database --}} alt="" />
    <div class="flex flex-col p-4 w-full">
        <div class="flex flex-col">
            <h2 class="text-md sm:text-lg font-formula1">{{ $productName }}</h2> {{-- * This is the placeholder for the product name --}}
            <div class="flex flex-center justify-between">
                <p class="text-base text-left">Price: £{{ $price }}</p> {{-- * This is the placeholder for the price of the product --}}
                <p class="text-base text-right">Quantity: {{ $quantity }}</p> {{-- * This is the placeholder for the quantity of the product --}}
            </div>
            <p class="text-base text-left">Size: {{ $size }}</p> {{-- * This is the placeholder for the quantity of the product --}}
        </div>
    </div>
</div>
