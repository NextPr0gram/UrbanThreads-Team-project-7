<x-app-layout>

    <!-- Container for "Basket" at the top middle of the page -->
    <div class="flex justify-center items-center h-20 bg-gray-100">
        <h1 class="text-white text-3xl font-formula1">My Basket</h1>
    </div>

    <!-- Container for product cards in the cart -->
    <div class="flex flex-wrap justify-start mt-8 pl-4"> <!-- Added pl-4 for left margin -->

        <!-- Sample product card for demonstration -->
        <div class="w-2/3 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 p-2 border-2 border-black shadow-md" style="width: 1000px; height: 150px; display: flex; align-items: center;">

            <!-- Product Image -->
            <img src="path/to/product-image.jpg" alt="Product Image" class="w-1/5 h-full object-cover object-center mb-4">

            <!-- Product Details -->
            <div class="w-4/5 pl-4 flex items-center justify-between">

                <!-- Product Name and Quantity Controls -->
                <div class="flex items-center">
                    <h2 class="text-black font-bold text-lg mr-2">Product Name</h2>

                    <!-- Quantity Controls -->
                    <div class="flex items-center space-x-2"> <!-- Added space-x-2 for equal spacing -->
                        <button class="bg-black text-white w-6 h-6 rounded-none border border-black">-</button>
                        <span class="text-black">1</span>
                        <button class="bg-black text-white w-6 h-6 rounded-none border border-black">+</button>
                    </div>
                </div>

                <!-- Price -->
                <p class="text-black font-bold text-lg mr-2">$19.99</p>

                <!-- Remove Button -->
                <button class="bg-red-500 text-white px-3 py-2 rounded-full font-bold">X</button> <!-- Made the button thicker and bold -->
            </div>
        </div>

        <!-- Add more product cards as necessary -->

    </div>

    <!-- Additional content for the cart page can be added here -->

</x-app-layout>
