<x-app-layout>

    <!-- Header Container -->
    <div class="flex justify-center items-center h-20 bg-gray-100">
        <h1 class="text-white text-3xl font-formula1">My Basket</h1>
    </div>

    <!-- Product Cards Container -->
    <div class="flex flex-wrap justify-start mt-8 pl-4 space-y-8 md:space-y-0 md:space-x-4">

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
  <button class="QuantityButton" style="width: 40px; height: 40px; padding: 8px; border: 3px #D6F2FF solid; justify-content: center; align-items: center; display: flex">
    <div class="PlusIcon" style="font-size: 18px; color: #323377;">+</div>
  </button>
  <div class="BodyText" style="padding-left: 8px; padding-right: 8px; padding-top: 9px; padding-bottom: 9px; border-left: 3px solid; border-right: 3px solid; justify-content: center; align-items: center; gap: 10px; display: flex">
    <div class="BodyText" style="color: black; font-size: 14px; font-family: Lexend Deca; font-weight: 500; word-wrap: break-word">1</div>
  </div>
  <button class="QuantityButton" style="width: 40px; height: 40px; padding: 8px; border: 3px #D6F2FF solid; justify-content: center; align-items: center; display: flex">
    <div class="MinusIcon" style="font-size: 18px; color: #323377;">-</div>
  </button>
</div>


<!-- Price -->
<div class="BodyText" style="padding-left: 8px; padding-right: 8px; padding-top: 9px; padding-bottom: 9px; justify-content: center; align-items: center; gap: 10px; display: flex">
  <div class="BodyText" style="color: black; font-size: 14px; font-family: Lexend Deca; font-weight: 500; word-wrap: break-word">£123</div>
</div>
<!-- remove button -->
<button class="RemoveButton" style="width: 24px; height: 24px; padding: 4px; justify-content: center; align-items: center; display: flex">
  <div class="RemoveIcon" style="font-size: 18px; color: #FF0000;">X</div>
</button>
</div>



        <!-- Cart Summary Container -->
        <div class="w-full md:w-[414px] bg-white bg-opacity-40 border-3 border-navy-blue backdrop-blur-[18px] p-4">            <!-- Subtotal, Discount, Total -->
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
            <div class="self-stretch justify-center mt-4">
                <a href="{{ route('checkout') }}"><x-primary-button-dark class="w-full mt-5">Checkout</x-primary-button-dark></a>
            </div>
        </div>

    </div>
</x-app-layout>
