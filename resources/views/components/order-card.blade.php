{{--
    ? This is the order card component
    ? It is used to display an order card which has some order details (e.g. order ID, order date, order status, and total price) and a button to view more information about the order
    --}}
<div class="flex items-center justify-items-center mt-2 max-sm:mx-5 bg-primary-50 p-5 shadow-md border-snow-white">
    <div class="grid grid-cols-4 justify-items-center p-4 w-full gap-2 items-center">
        <div>
            <h2 class="text-md sm:text-lg font-formula1 text-left">Order ID: {{ $orderId }}</h2>
            <h2 class="text-md sm:text-lg font-lexend text-left">Order Placed: {{ $orderDate }}</h2>
        </div>
        <div class="col-span-2">
            <h2 class="text-md sm:text-lg font-lexend text-left">Order Status: {{ $orderStatus }}</h2>
            <h2 class="text-md sm:text-lg font-lexend text-left">Items in order: {{ $itemsInOrder }}</h2>
            <h2 class="text-md sm:text-lg font-lexend text-left">Total Price: {{ $totalPrice }}</h2>
        </div>
        <form action="{{ $orderLink }}" method="GET">
            <x-primary-button>
                View Order
            </x-primary-button>
        </form>
    </div>
</div>
