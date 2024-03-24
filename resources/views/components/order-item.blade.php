{{--
    ? This is the order item component
    ? It is used to display an order item in the order confirmation page
    --}}

<div class="flex items-center justify-between border-b border-primary-300 mt-2 max-sm:mx-5">
    <img class="object-cover object-center m-2 h-16 sm:h-24 aspect-square rounded-lg" src="{{ $productImage }}" alt={{ $productName }} />
    <div class="flex flex-col p-4 w-full">
        <div class="flex flex-col gap-2">
            <h2 class="text-md sm:text-lg font-formula1 text-left">{{ $productName }}</h2>
            <div class="flex flex-row justify-between">
                <p class="text-base sm:text-lg text-left">Price: £{{ $sellingPrice }}</p>
                </p>
                <p class="text-base sm:text-lg text-right">Quantity: {{ $quantity }}</p>
            </div>
            <p class="text-base sm:text-lg text-left">Size: {{ $size }}</p>
        </div>
    </div>
</div>
