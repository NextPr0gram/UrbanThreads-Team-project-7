@extends('layouts.admin')

@section('title')
    Products
@endsection

@section('content')
    <div class="w-full h-full">


        {{-- 2 column gird --}}
        <div class=" grid grid-cols-2 grid-rows-1 gap-4 h-full w-full px-5  sm:px-8">
            <div id="productsTable" class="lg:col-span-2 rounded-lg overflow-hidden lg:col-span-1 col-span-2">
                <div class="rounded-lg border border-neutral-30 pl-4 pt-4 pr-4 h-full overflow-auto ">
                    <table class="table-auto w-full divide-y divide-neutral-20 text-base">
                        <thead>
                            <tr class="text-left text-lg font-formula1">
                                <th>Product Name</th>
                                <th class="text-center">Total Stocks</th>
                                <th class="text-right">More Details</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-20">
                            <tr class=" ">
                                <td colspan="3" class="text-center "> <button
                                        class="w-full h-full py-5 hover:bg-secondary-50 rounded-md transition-all ease-in-out  text-secondary-500">Add
                                        new product</button></td>

                            </tr>

                            @foreach ($products as $product)
                                <tr class="h-10">
                                    <td class="align-middle flex items-center h-10  gap-4 ">
                                        <div class="w-6 aspect-square bg-primary-50 rounded-sm overflow-hidden"><img
                                                src={{ $product->image }} alt="">
                                        </div>{{ $product->name }}
                                    </td>
                                    <td class="text-center">{{ $product->totalStock }}</td>
                                    <td class="text-right">
                                        <button class="underline"
                                            onclick="showDetails('{{ $product->image }}',  '{{ $product->name }}', {{ $product->selling_price }}, {{ $product->variations }}, '{{ $product->description }}', '{{ route('product.update', ['productId' => $product->id]) }}')">
                                            More details
                                        </button>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Form --}}
            <div id="formOverlay"
                class="hidden absolute top-0 left-0 lg:hidden w-full h-screen opacity-50 bg-default-black transition-all duration-150 ease-in-out">
            </div>

            {{-- second column --}}
            <div id="editDetails"
                class="overflow-hidden h-0 md:h-auto translate-y-full lg:w-0 border-none lg:translate-y-0 col-start-3 justify-self-end absolute bottom-0 left-0 border border-neutral-30 rounded-t-lg lg:rounded-lg bg-default-white w-full max-h-3/4  transition-all duration-150 ease-in-out lg:static">
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

                    {{-- Title and cancel button --}}

                    <form id="updateProductForm" class="p-0 m-0 lg:flex lg:flex-col lg:h-full" action=""
                        method="POST">
                        @csrf
                        @method('POST')

                        <div class="flex justify-between pb-4">
                            <h1 id="title" class="font-formula1 text-lg">Edit Product Details</h1>
                            <button type="button" onclick="hideForm()">Cancel</button>
                        </div>
                        {{-- image, name and price fields --}}
                        <div class="flex w-full h-fit">
                            <div
                                class="bg-primary-50 aspect-square w-[9.375rem] sm:w-[9.625rem] md:w-[10.125rem]  rounded-md flex-initial overflow-hidden">
                                <img id="imageField" class="w-full h-full" src="" alt="">
                            </div>
                            <div class="w-full flex-1 pl-4 min-w-[12]">
                                <x-input-label for="name" class="pb-2">Name</x-input-label>
                                <x-text-input adminDashboard="true" type="text" id="nameField" name="name"
                                    class="w-full " placeholder="Name" />
                                <x-input-label for="price" class="pb-2 pt-4">Price</x-input-label>
                                <x-text-input adminDashboard="true" type="number" id="priceField" name="price"
                                    class="w-full " placeholder="Price" />
                            </div>
                        </div>

                        <x-input-label id="StockForSLabel" for="stockForS" class="pb-2 pt-4">Stock For S</x-input-label>
                        <x-text-input adminDashboard="true" type="number" id="StockForSInput" name="stockForS"
                            class="w-full " placeholder="Stock For S" />

                        <x-input-label id="StockForMLabel" for="stockForM" class="pb-2 pt-4">Stock For M</x-input-label>
                        <x-text-input adminDashboard="true" type="number" id="StockForMInput" name="stockForM"
                            class="w-full " placeholder="Stock For M" />

                        <x-input-label id="StockForLLabel" for="stockForL" class="pb-2 pt-4">Stock For L</x-input-label>
                        <x-text-input adminDashboard="true" type="number" id="StockForLInput" name="stockForL"
                            class="w-full " placeholder="Stock For L" />


                        <x-input-label for="description" class="pb-2 pt-4 ">Description</x-input-label>
                        <x-text-area adminDashboard="true" type="text" id="descriptionField" name="description"
                            class="text-base lg:grow w-full h-auto " placeholder="Write your description here" required />


                        <x-primary-button id="saveChangesButton" type="submit" class=" w-full mt-4 bottom-0 shrink-0">Save
                            changes</x-primary-button>


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

                            editDetails.classList.add("overflow-hidden");
                            editDetails.classList.add("h-0");
                            editDetails.classList.add("md:h-auto");




                            formOverlay.classList.add("hidden");


                            productsTable.classList.add("lg:col-span-2");
                        }
                    </script>
                </div>
            </div>


        </div>

    </div>
    <script>
        function showDetails(image, name, price, variations, description, action) {

            console.log(action);
            // Show menu
            let editDetailsForm = document.getElementById("editDetails");
            let formOverlay = document.getElementById("formOverlay");
            let productsTable = document.getElementById("productsTable");


            editDetails.classList.remove("translate-y-full");
            editDetails.classList.remove("lg:w-0");
            editDetails.classList.remove("border-none");
            editDetails.classList.remove("lg:translate-y-0");
            editDetails.classList.remove("col-start-3");


            editDetails.classList.remove("overflow-hidden");
            editDetails.classList.remove("h-0");
            editDetails.classList.remove("md:h-auto");



            formOverlay.classList.remove("hidden");

            productsTable.classList.remove("lg:col-span-2");

            // Update fields
            let title = document.getElementById("title");
            let nameField = document.getElementById("nameField");
            let priceField = document.getElementById("priceField");
            let descriptionField = document.getElementById("descriptionField");
            let imageField = document.getElementById("imageField");
            let updateProductForm = document.getElementById("updateProductForm");

            title.innerHTML = name;
            nameField.value = name;
            priceField.value = price;
            descriptionField.value = description;
            imageField.src = image;
            updateProductForm.action = action;





            // Variations S
            let StockForSLabel = document.getElementById("StockForSLabel");
            let StockForSInput = document.getElementById("StockForSInput");

            // Variations M
            let StockForMLabel = document.getElementById("StockForMLabel");
            let StockForMInput = document.getElementById("StockForMInput");

            // Variations L
            let StockForLLabel = document.getElementById("StockForLLabel");
            let StockForLInput = document.getElementById("StockForLInput");

            if (variations[0]) {
                StockForSInput.value = variations[0].stock;

                StockForMLabel.classList.add("hidden");
                StockForMInput.classList.add("hidden");

                StockForLLabel.classList.add("hidden");
                StockForLInput.classList.add("hidden");
            }

            if (variations[1]) {
                StockForMInput.value = variations[1].stock;

                StockForMLabel.classList.remove("hidden");
                StockForMInput.classList.remove("hidden");

                StockForLLabel.classList.add("hidden");
                StockForLInput.classList.add("hidden");
            }

            if (variations[2]) {
                StockForLInput.value = variations[2].stock;

                StockForMLabel.classList.remove("hidden");
                StockForMInput.classList.remove("hidden");

                StockForLLabel.classList.remove("hidden");
                StockForLInput.classList.remove("hidden");

            }



            let saveChangesButton = document.getElementById("saveChangesButton");

            // Check if any field has changed
            let fields = [nameField, priceField, descriptionField, StockForSInput, StockForMInput, StockForLInput];
            let hasChanged = fields.some(field => field.value !== field.defaultValue);

            // Show or hide save changes button based on changes
            if (hasChanged) {
                saveChangesButton.classList.remove("hidden");
            } else {
                saveChangesButton.classList.add("block");
            }






        }
    </script>
@endsection
