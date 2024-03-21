<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
        <p class="text-gray-500 text-lg font-lexend max-sm:text-base">This page allows you to view the orders you have placed. You can
            also check the status of an order and cancel it if it hasn't been dispatched yet.</p>
    </x-slot>

    <div>
        @if ($orders->isEmpty())
            <p class="text-center text-lg font-lexend">You have not placed any orders yet.</p>
        @else
            @foreach ($orders as $order)
                <x-order-card>
                    <x-slot name="orderId">
                        {{ $order->id }}
                    </x-slot>
                    <x-slot name="orderDate">
                        {{ $order->created_at->format('d/m/Y') }}
                    </x-slot>
                    <x-slot name="orderStatus">
                        {{ $order->status }}
                    </x-slot>
                    <x-slot name="totalPrice">
                        {{ $order->total }}
                    </x-slot>
                    <x-slot name="itemsInOrder">
                        {{ $order->getTotalItems() }}
                    </x-slot>
                    <x-slot name="orderLink">
                        {{ route('view-order', ['id' => $order->id]) }}
                    </x-slot>
                </x-order-card>
            @endforeach
        @endif
    </div>

</x-app-layout>
