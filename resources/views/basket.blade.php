<x-app-layout>

    <!-- Header Container -->
    <div class="flex justify-center items-center h-20 bg-gray-100">
        <h1 class="text-white text-3xl font-formula1">My Basket</h1>
    </div>

    <!-- Main Container -->
    <div class="flex flex-col items-center mt-8 space-y-8 md:space-x-4 md:flex-row md:justify-center">
        <!-- Cart items container -->
        <div class="w-full md:w-[1037px]">
            {{-- TODO: backend code --}}
            <x-basket-item>
                <x-slot name="productName">
                    Hoodie {{-- TODO: backend code, fetch name --}}
                </x-slot>
                <x-slot name="price">
                    $420 {{-- TODO: backend code, fetch price --}}
                </x-slot>
                <x-slot name="size">
                    Large {{-- TODO: backend code, fetch size --}}
                </x-slot>
                <x-slot name="colour">
                    Blue {{-- TODO: backend code, fetch colour --}}
                </x-slot>
            </x-basket-item>
        </div>

        <!-- Gap between Product Cards and Cart Summary (visible only on larger screens) -->
        <div class="hidden md:w-8 md:block"></div>

        <!-- Cart Summary Container -->
        <div class="w-full md:w-[414px] p-4 bg-white bg-opacity-40 border-3 border-navy-blue backdrop-blur-[18px]">
            <!-- Subtotal, Discount, Total -->
            <div class="self-stretch h-12 px-4 justify-between items-center flex">
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-lexend-deca">Subtotal</div>
                </div>
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-lexend-deca subtotal-value">£123</div>
                </div>
            </div>
            <div class="self-stretch h-12 px-4 justify-between items-center flex">
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-lexend-deca">Discount</div>
                </div>
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-lexend-deca">-£0</div>
                </div>
            </div>
            <div class="self-stretch h-12 px-4 justify-between items-center flex">
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-bold font-lexend-deca">Total</div>
                </div>
                <div class="px-2 py-2 justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-bold font-lexend-deca total-value">£123</div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Get the elements
    const quantityElement = document.querySelector('.QuantityValue');
    const plusButton = document.querySelector('.PlusIcon');
    const minusButton = document.querySelector('.MinusIcon');
    const removeButton = document.querySelector('.RemoveIcon');
    const productPriceElement = document.querySelector('.ProductPrice');
    const subtotalElement = document.querySelector('.subtotal-value');
    const totalElement = document.querySelector('.total-value');

    // Initial quantity value
    let quantity = 1;

    // Function to update the quantity display and calculate total price
    function updateQuantityAndPrice() {
        const productCard = document.querySelector('.CartItem');
        if (!productCard) {
            // No items in the cart, update subtotal and total to 0
            subtotalElement.textContent = '£0.00';
            totalElement.textContent = '£0.00';
            return;
        }

        const productPrice = parseFloat(productCard.dataset.price); // Get the actual product price

        quantityElement.textContent = quantity;
        const totalPrice = quantity * productPrice;
        productPriceElement.textContent = `£${totalPrice.toFixed(2)}`;

        // Update subtotal and total in the cart summary
        subtotalElement.textContent = `£${totalPrice.toFixed(2)}`;
        totalElement.textContent = `£${totalPrice.toFixed(2)}`;
    }

    // Event listener for the plus button
    plusButton.addEventListener('click', function () {
        quantity++;
        updateQuantityAndPrice();
    });

    // Event listener for the minus button
    minusButton.addEventListener('click', function () {
        if (quantity > 1) {
            quantity--;
            updateQuantityAndPrice();
        }
    });

    // Event listener for the remove button
    removeButton.addEventListener('click', function () {
        // Assuming your sample product is the parent div with class "CartItem"
        const cartItem = removeButton.closest('.CartItem');
        cartItem.remove();
        updateQuantityAndPrice(); // Update price after removing the item
    });
});

</script>
