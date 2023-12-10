{{--
    ? This is the basket item component
    ? It is used to display a product in the basket and allows the customer to increment/decrement the quantity of the product
    ? and remove the product from the basket
    --}}

<div class="flex items-center border-b-2 border-snow-white ">
    <img class="m-2 h-16 sm:h-24 aspect-square border-3 border-bluish-purple object-cover object-center"
        src="{{ $image }}" {{--* This is the placeholder for the image link for the specific product fetched from the database --}}
        alt="" />
    <div class="flex w-full flex-col p-4">
        <div class="flex justify-between items-center max-w-lg lg:max-w-full">
            <div class="flex justify-between flex-col">
                <h2 class="text-md sm:text-lg font-formula1">{{ $productName }}</h2> {{--* This is the placeholder for the product name --}}
                <p class="text-base font-formula1 text-left">{{ $price }}</p> {{--* This is the placeholder for the price of the product --}}
            </div>
            <div class="flex">
                {{ $counter }} {{--* This is the placeholder for the counter that allows for incrementing and decrementing the quantity of a product --}}
            </div>
            <div>
                <div class="">
                    {{ $remove }} {{--* This is the placeholder for the functionality of removing an item fully from the basket --}}
                </div>
            </div>
        </div>
    </div>
</div>
