@extends('layouts.admin')

@section('title')
    Products
@endsection

@section('content')
    <div class="w-full h-full">
        <div class=" grid grid-cols-2 grid-rows-1 gap-4 h-full w-full px-5  sm:px-8">
            <div id="productsTable"  class="rounded-lg border border-neutral-30 pl-4 pt-4 pr-4 h-full overflow-auto lg:col-span-1 col-span-2">
                <table class="table-auto w-full divide-y divide-neutral-20 text-base">
                    <thead>
                        <tr class="text-left text-lg font-formula1">
                            <th>Product Name</th>
                            <th class="text-center">Total Stocks</th>
                            <th class="text-right">More Details</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-20">
                        <tr class="h-10">
                            <td class="align-middle flex items-center h-10  gap-4 ">
                                <div class="w-6 aspect-square bg-primary-50 rounded-sm"><img src="" alt="">
                                </div>$product->name
                            </td>
                            <td class="text-center">$product->totalStock</td>
                            <td class="text-right"><button class="underline">More details</button></td>
                        </tr>
                        @foreach ($products as $product)
                            <tr class="h-10">
                                <td class="align-middle flex items-center h-10  gap-4 ">
                                    <div class="w-6 aspect-square bg-primary-50 rounded-sm"><img src=""
                                            alt="">
                                    </div>{{ $product->name }}
                                </td>
                                <td class="text-center">{{ $product->totalStock }}</td>
                                <td class="text-right"><button class="underline" id="moreDetailsBtn"
                                        data-product-id="{{ $product->id }}" product-name="{{ $product->name }}"
                                        variations="{{ $product->variations }}">More details</button></td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>

            {{-- Form --}}
            <div id="formOverlay"
                class="absolute top-0 left-0 lg:hidden w-full h-screen opacity-50 bg-default-black transition-all duration-150 ease-in-out">
            </div>

            {{-- second column --}}
            <div id="editDetails" class="justify-self-end overflow-hidden absolute bottom-0 left-0 border border-neutral-30 rounded-t-lg lg:rounded-lg bg-default-white w-full max-h-3/4  transition-all duration-150 ease-in-out lg:static">
                <div
                    class=" overflow-y-auto py-4 px-5 h-full">
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

                    {{-- Title and cancel button --}}

                    <form class="p-0 m-0 lg:flex lg:flex-col lg:h-full" action="">
                        <div class="flex justify-between pb-4">
                            <h1 class="font-formula1 text-lg">T-shirt</h1>
                            <button type="button" onclick="hideForm()">Cancel</button>
                        </div>
                        {{-- image, name and price fields --}}
                        <div class="flex w-full h-fit">
                            <div
                                class="bg-primary-50 aspect-square w-[9.375rem] sm:w-[9.625rem] md:w-[10.125rem]  rounded-md flex-initial">
                                <img src="" alt="">
                            </div>
                            <div class="w-full flex-1 pl-4 min-w-[12]">
                                <x-input-label for="first_name" class="pb-2">First Name</x-input-label>
                                <x-text-input type="text" id="name" name="name" class="w-full "
                                    placeholder="Name" />
                                <x-input-label for="first_name" class="pb-2 pt-4">Price</x-input-label>
                                <x-text-input type="number" id="name" name="price" class="w-full "
                                    placeholder="Price" />
                            </div>
                        </div>

                        <x-input-label for="StockForS" class="pb-2 pt-4">Stock For S</x-input-label>
                        <x-text-input type="text" id="StockForS" name="StockForS" class="w-full "
                            placeholder="Stock For S" />

                        <x-input-label for="StockForM" class="pb-2 pt-4">Stock For M</x-input-label>
                        <x-text-input type="text" id="StockForM" name="StockForM" class="w-full "
                            placeholder="Stock For M" />

                        <x-input-label for="StockForL" class="pb-2 pt-4">Stock For L</x-input-label>
                        <x-text-input type="text" id="StockForL" name="StockForL" class="w-full "
                            placeholder="Stock For L" />

                        <x-input-label for="Description" class="pb-2 pt-4 ">Description</x-input-label>
                        <x-text-area type="text" id="Description" name="Description" class="lg:grow w-full h-auto "
                            placeholder="Write your description here" required />


                        <x-primary-button type="submit" class=" w-full mt-4 bottom-0 shrink-0">Save changes</x-primary-button>

                    </form>

                    <script>
                        function hideForm() {
                            let editDetailsForm = document.getElementById("editDetails");
                            let formOverlay = document.getElementById("formOverlay");
                            let productsTable = document.getElementById("productsTable");

                            editDetails.classList.add("translate-y-full");
                            editDetails.classList.add("lg:w-0");
                            editDetails.classList.add("border-none");
                            editDetails.classList.add("lg:translate-y-0");
                            editDetails.classList.add("col-start-3");

                            formOverlay.classList.add("hidden");

                            productsTable.classList.add("lg:col-span-2");
                        }
                    </script>
                </div>
            </div>


        </div>

    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const moreDetailsButtons = document.getElementById("moreDetailsBtn");
        const productDetailsForm = document.getElementById('productDetailsForm');
        const closeFormBtn = document.getElementById('closeFormBtn');

        moreDetailsButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                // Fetch product details by productId and populate form fields
                // For now, let's just show/hide the form
                productDetailsForm.classList.toggle('hidden');
            });
        });

        closeFormBtn.addEventListener('click', function() {
            productDetailsForm.classList.add('hidden');
        });
    });

    function showDetails() {

    }
</script>
