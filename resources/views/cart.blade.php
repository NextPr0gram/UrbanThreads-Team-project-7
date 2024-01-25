<x-app-layout>

    <!-- Header Container -->
    <div class="flex justify-center items-center h-20 bg-gray-100">
        <h1 class="text-3xl text-white font-formula1">My Basket</h1>
    </div>

    <!-- Product Cards Container -->
    <div class="flex flex-wrap justify-start pl-4 mt-8 space-y-8 md:space-y-0 md:space-x-4">

        <!-- Sample Product Card -->
        <div class="CartItem" style="width: 1037px; height: 135px; padding-left: 21px; padding-right: 21px; background: rgba(255, 255, 255, 0.40); border: 3px #A1A1A1 solid; backdrop-filter: blur(18px); justify-content: space-between; align-items: center; display: inline-flex">

            <!-- Product Image -->
            <div class="ProductImage" style="width: 118px; height: 118px; position: relative; background: #D6F2FF"></div>

            <!-- Product Name -->
            <div class="BoldText" style="padding-left: 8px; padding-right: 8px; padding-top: 9px; padding-bottom: 9px; justify-content: center; align-items: center; gap: 10px; display: flex">
                <div class="BoldText" style="color: black; font-size: 14px; font-family: Lexend Deca; font-weight: 700; word-wrap: break-word">Product name</div>
            </div>

            <!-- Quantity Control Buttons  -->
            <div class="Counter" style="justify-content: center; align-items: center; gap: 6px; display: flex">
                <button class="QuantityButton PlusIcon" style="width: 40px; height: 40px; padding: 8px; border: 3px #D6F2FF solid; justify-content: center; align-items: center; display: flex">
                    <div style="font-size: 18px; color: #323377;">+</div>
                </button>
                <div class="BodyText" style="padding-left: 8px; padding-right: 8px; padding-top: 9px; padding-bottom: 9px; border-left: 3px solid; border-right: 3px solid; justify-content: center; align-items: center; gap: 10px; display: flex">
                    <div class="QuantityValue" style="color: black; font-size: 14px; font-family: Lexend Deca; font-weight: 500; word-wrap: break-word">1</div>
                </div>
                <button class="QuantityButton MinusIcon" style="width: 40px; height: 40px; padding: 8px; border: 3px #D6F2FF solid; justify-content: center; align-items: center; display: flex">
                    <div style="font-size: 18px; color: #323377;">-</div>
                </button>
            </div>

            <!-- Price -->
            <div class="BodyText ProductPrice" style="padding-left: 8px; padding-right: 8px; padding-top: 9px; padding-bottom: 9px; justify-content: center; align-items: center; gap: 10px; display: flex">
                <div style="color: black; font-size: 14px; font-family: Lexend Deca; font-weight: 500; word-wrap: break-word">£123</div>
            </div>
            <!-- remove button -->
            <button class="RemoveButton" style="width: 24px; height: 24px; padding: 4px; justify-content: center; align-items: center; display: flex">
                <div class="RemoveIcon" style="font-size: 18px; color: #FF0000;">X</div>
            </button>
        </div>

        <!-- Cart Summary Container -->
        <div class="w-full md:w-[414px] bg-white bg-opacity-40 border-3 border-navy-blue backdrop-blur-[18px] p-4">
            <!-- Subtotal, Discount, Total -->
            <div class="self-stretch h-12 px-[21px] justify-between items-center inline-flex">
                <div class="px-2 py-[9px] justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-['Lexend Deca']">Subtotal</div>
                </div>
                <div class="px-2 py-[9px] justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-['Lexend Deca'] subtotal-value">£123</div>
                </div>
            </div>
            <div class="self-stretch h-12 px-[21px] justify-between items-center inline-flex">
                <div class="px-2 py-[9px] justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-['Lexend Deca']">Discount</div>
                </div>
                <div class="px-2 py-[9px] justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-['Lexend Deca']">-£0</div>
                </div>
            </div>
            <div class="self-stretch h-12 px-[21px] justify-between items-center inline-flex">
                <div class="px-2 py-[9px] justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-bold font-['Lexend Deca']">Total</div>
                </div>
                <div class="px-2 py-[9px] justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-bold font-['Lexend Deca'] total-value">£123</div>
                </div>
            </div>

            <!-- Checkout Button -->
            <div class="justify-center self-stretch mt-4">
                <a href="{{ route('checkout') }}"><x-primary-button-dark class="mt-5 w-full">Checkout</x-primary-button-dark></a>
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

        // Initial quantity value and product price
        let quantity = 1;
        const productPrice = 123; // Change this to the actual product price

        // Function to update the quantity display and calculate total price
        function updateQuantityAndPrice() {
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

