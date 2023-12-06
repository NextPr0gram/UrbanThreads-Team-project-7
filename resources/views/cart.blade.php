<x-app-layout>

    <!-- Header Container -->
    <div class="flex justify-center items-center h-20 bg-gray-100">
        <h1 class="text-white text-3xl font-formula1">My Basket</h1>
    </div>

    <!-- Product Cards Container -->
    <div class="flex flex-wrap justify-start mt-8 pl-4">

        <!-- Sample Product Card -->
        <div class="w-2/3 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 p-2 border-2 border-gray-300 shadow-md" style="width: 1000px; height: 150px; display: flex; align-items: center; background-color: #f0f0f0;">

            <!-- Product Image -->
            <img src="path/to/product-image.jpg" alt="Product Image" class="w-1/5 h-full object-cover object-center mb-4">

            <!-- Product Details -->
            <div class="w-4/5 pl-4 flex items-center justify-between">

                <!-- Product Name and Quantity Controls -->
                <div class="flex items-center space-x-4">
                    <h2 class="text-black font-bold text-lg mr-4">Product Name</h2>
                    <div class="flex items-center space-x-4">
                        <button class="bg-black text-black w-8 h-8 squared border border-black font-bold">-</button>
                        <span class="text-black font-bold">1</span>
                        <button class="bg-black text-black w-8 h-8 squared border border-black font-bold">+</button>
                    </div>
                </div>

                <!-- Price and Remove Button -->
                <p class="text-black font-bold text-lg mr-2">$19.99</p>
                <button class="bg-red-500 text-red px-3 py-2 rounded-full font-bold">X</button>
            </div>
        </div>

        <!-- Cart Summary Container -->
        <div class="w-[414px] h-56 px-4 py-[15px] bg-white bg-opacity-40 border-2 border-neutral-400 backdrop-blur-[18px] flex-col justify-start items-center inline-flex">
            <!-- Subtotal, Discount, Total -->
            <div class="self-stretch h-12 px-[21px] justify-between items-center inline-flex">
                <div class="px-2 py-[9px] justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-['Lexend Deca']">Subtotal</div>
                </div>
                <div class="px-2 py-[9px] justify-center items-center gap-2.5 flex">
                    <div class="text-black text-sm font-medium font-['Lexend Deca']">£123</div>
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
                    <div class="text-black text-sm font-bold font-['Lexend Deca']">£123</div>
                </div>
            </div>

            <!-- Checkout Button -->
            <div class="self-stretch justify-center items-center inline-flex mt-4">
                <button class="grow shrink basis-0 h-[46px] px-[26px] py-3.5 border-2 border-indigo-900 justify-center items-center gap-2.5 flex">
                    <div class="text-indigo-900 text-sm font-normal font-['Lexend Deca']">Checkout</div>
                </button>
            </div>
        </div>

    </div>
</x-app-layout>
