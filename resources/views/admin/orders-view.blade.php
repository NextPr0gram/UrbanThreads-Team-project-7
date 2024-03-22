@extends('layouts.admin')

@section('title')
    <div class="flex items-center">
        <div class="flex-1 text-left pl-10 lg:pl-0">Orders</div>
    </div>
@endsection

@section('content')
    {{-- form overlay, basically make everything dark behind the form --}}
    <div id="formOverlay"
        class="z-40 hidden absolute top-0 left-0 lg:hidden w-full h-screen opacity-50 bg-default-black transition-all duration-150 ease-in-out">
    </div>

    <div class="w-full h-full">


        {{-- 2 column gird --}}
        <div class=" grid grid-cols-2 grid-rows-1 gap-4 h-full w-full px-5  sm:px-8">
            <div id="ordersTable" class="lg:col-span-2 rounded-lg overflow-hidden lg:col-span-1 col-span-2">
                <div class="rounded-lg border border-neutral-30 pl-4 pt-4 pr-4 h-full overflow-auto ">
                    <table class="table-auto w-full divide-y divide-neutral-20 text-base">
                        <thead class="divide-y divide-neutral-20">
                            <tr class="text-left text-lg font-formula1">
                                <th class="py-4">Order ID</th>
                                <th class="py-4 text-center">Items in Order</th>
                                <th class="py-4 text-right">Total</th>
                                <th class="py-4 text-right">Status</th>
                                <th class="py-4 text-right"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-20">
                            @foreach ($orders as $order)
                                <tr class="h-10">
                                    <td class="text-left px-1">
                                        {{ $order->id }}
                                    </td>
                                    <td class="text-center px-1">
                                        {{ $order->items->count() }}
                                    </td>
                                    <td class="text-right px-1">
                                        {{ $order->total }}
                                    </td>
                                    <td class="text-right px-1">
                                        {{ $order->status }}
                                    </td>
                                    <td class="text-right">
                                        <button class="underline" id="viewOrderButton"
                                            onclick="showDetails('{{ $order->getOrderDetails() }}',  {{ $order->total }}, '{{ $order->status }}', {{ $order->discount_amount }}, '{{ route('order.process', ['orderId' => $order->id]) }}')">
                                            View Order
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- second column --}}
            <div id="editDetails"
                class="z-50 overflow-hidden h-0 md:h-auto translate-y-full lg:w-0 border-none lg:translate-y-0 col-start-3 justify-self-end absolute bottom-0 left-0 border border-neutral-30 rounded-t-lg lg:rounded-lg bg-default-white w-full max-h-3/4  transition-all duration-150 ease-in-out lg:static">
                <div class=" overflow-y-auto py-4 px-5 h-full">
                    <style>
                        #editDetails::-webkit-scrollbar-thumb {
                            background-color: blue;
                            /* color of the scroll thumb */
                            border-radius: 20px;
                            /* roundness of the scroll thumb */
                            border: 999px solid orange;
                            /* creates padding around scroll thumb */
                        }

                        @media screen and (max-width: 1024px) {
                            #editDetails::-webkit-scrollbar {
                                display: none;
                            }

                            /* Hide scrollbar for IE, Edge and Firefox */
                            #editDetails {
                                -ms-overflow-style: none;
                                /* IE and Edge */
                                scrollbar-width: none;
                                /* Firefox */
                            }
                        }
                    </style>

                    <form id="processOrderForm" class="p-0 m-0 lg:flex lg:flex-col lg:h-full" action="" method="POST">
                        @csrf
                        @method('POST')

                        {{-- Order details --}}
                        <div class="flex justify-between">
                            <h1 id="title" class="font-formula1 text-lg">Order Details</h1>
                            <button type="button" onclick="hideForm()">Cancel</button>
                        </div>

                        <div class="w-full h-fit gap-2 py-5">
                            <p class="text-lg font-formula1">Items</p>
                            <p id="order-items" class="font-lexend"></p>
                        </div>

                        <div class="flex justify-between w-full h-fit text-lg">
                            <p class="font-formula1">Subtotal</p>
                            <p id="order-subtotal" class="font-lexend"></p>
                        </div>
                        <div class="flex justify-between w-full h-fit text-lg" id="discount">
                            <p class="font-formula1">Discount</p>
                            <p id="order-discount" class="font-lexend"></p>
                        </div>
                        <div class="flex justify-between w-full h-fit text-lg">
                            <p class="font-formula1">Total</p>
                            <p id="order-total" class="font-lexend"></p>
                        </div>
                        <div class="flex justify-between w-full h-fit text-lg">
                            <p class="font-formula1">Status</p>
                            <p id="order-status" class="font-lexend"></p>
                        </div>
                        <x-primary-button adminDashboard="true" id="processOrderButton" type="submit"
                            class=" w-full mt-4 bottom-0 shrink-0">Process Order</x-primary-button>
                    </form>

                    <script>
                        function hideForm() {
                            let editDetailsForm = document.getElementById("editDetails");
                            let formOverlay = document.getElementById("formOverlay");
                            let ordersTable = document.getElementById("ordersTable");

                            editDetails.classList.add("translate-y-full");
                            editDetails.classList.add("lg:w-0");
                            editDetails.classList.add("border-none");
                            editDetails.classList.add("lg:translate-y-0");
                            editDetails.classList.add("col-start-3");

                            editDetails.classList.add("overflow-hidden");
                            editDetails.classList.add("h-0");
                            editDetails.classList.add("md:h-auto");

                            formOverlay.classList.add("hidden");
                            ordersTable.classList.add("lg:col-span-2");
                        }
                    </script>
                </div>
            </div>


        </div>

    </div>
    <script>
        function showDetails(items, total, status, discount, action) {

            console.log(action);
            // Show menu
            let editDetailsForm = document.getElementById("editDetails");
            let formOverlay = document.getElementById("formOverlay");
            let ordersTable = document.getElementById("ordersTable");

            editDetails.classList.remove("translate-y-full");
            editDetails.classList.remove("lg:w-0");
            editDetails.classList.remove("border-none");
            editDetails.classList.remove("lg:translate-y-0");
            editDetails.classList.remove("col-start-3");


            editDetails.classList.remove("overflow-hidden");
            editDetails.classList.remove("h-0");
            editDetails.classList.remove("md:h-auto");

            formOverlay.classList.remove("hidden");

            ordersTable.classList.remove("lg:col-span-2");

            // Update fields: items, total, status, action
            let itemsField = document.getElementById("order-items");
            let subTotalField = document.getElementById("order-subtotal");
            let discountDiv = document.getElementById("discount");
            let discountField = document.getElementById("order-discount");
            let totalField = document.getElementById("order-total");
            let statusField = document.getElementById("order-status");
            let processOrderForm = document.getElementById("processOrderForm");

            itemsField.innerHTML = items;
            if (discount == 0) {
                subTotalField.innerHTML = "£" + total;
                discountDiv.classList.add("hidden");
            } else {
                subTotalField.innerHTML = "£" + (total + discount);
                discountField.innerHTML = "£" + discount;
                discountDiv.classList.remove("hidden");
            }
            totalField.innerHTML = "£" + total;
            statusField.innerHTML = status;
            processOrderForm.action = action;

            if (status == "Delivered" || status == "Cancelled" || status == "Returned") {
                let processOrderButton = document.getElementById("processOrderButton");
                processOrderButton.classList.add("hidden");
            }
        }
    </script>
@endsection
