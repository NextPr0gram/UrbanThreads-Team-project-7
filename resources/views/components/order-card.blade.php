{{--
    ? This is the order card component
    ? It is used to display an order card which has some order details (e.g. order ID, order date, order status, and total price) and a button to view more information about the order
    --}}
<div class="flex items-center justify-items-center mt-2 max-sm:mx-5 p-5 bg-default-white border-2 border-neutral-50 hover:bg-neutral-20 hover:border-primary-300 transition-all rounded-lg duration-300 ease-in-out">
    <div class="grid grid-cols-4 justify-items-center p-4 w-full gap-3 items-center">
        <div>
            <h2 class="text-md sm:text-lg font-formula1 text-left">Order ID: {{ $orderId }}</h2>
            <h2 class="text-md sm:text-lg font-lexend text-left">Order Placed: {{ $orderDate }}</h2>
        </div>
        <div class="col-span-2 text-center">
            <h2 class="text-md sm:text-lg font-lexend">Order Status: {{ $orderStatus }}</h2>
            <h2 class="text-md sm:text-lg font-lexend">Items in order: {{ $itemsInOrder }}</h2>
            <h2 class="text-md sm:text-lg font-lexend">Total Price: {{ $totalPrice }}</h2>
        </div>
        <form action="{{ $orderLink }}" method="GET">
            <x-secondary-button>
                View Order
            </x-secondary-button>
        </form>
    </div>
</div>
