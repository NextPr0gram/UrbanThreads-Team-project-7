@extends('layouts.admin')

@section('title')
    <div class="flex items-center">
        <div class="flex-1 text-left pl-10 lg:pl-0">Discounts</div>
        <x-secondary-button adminDashboard="true" onclick="showAddDiscountForm()" class="font-lexend text-base">Add new
            discount</x-secondary-button>
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
            <div id="discountsTable" class="lg:col-span-2 rounded-lg overflow-hidden lg:col-span-1 col-span-2">
                <div class="rounded-lg border border-neutral-30 pl-4 pt-4 pr-4 h-full overflow-auto ">
                    <table class="table-auto w-full divide-y divide-neutral-20 text-base">
                        <thead class="divide-y divide-neutral-20">
                            <tr class="text-left text-lg font-formula1">
                                <th class="py-4">Discount Code</th>
                                <th class="py-4 text-center">Type</th>
                                <th class="py-4 text-right">Value</th>
                                <th class="py-4 text-right">More Details</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-20">

                            {{-- Field names
                            'code ' => 'required|string|unique:discount_codes,code',
                            'type' => 'required|in:fixed,percentage',
                            'value' => 'required|numeric',
                            'max_uses' => 'nullable|numeric',
                            'valid_from' => 'nullable|date',
                            'valid_to' => 'nullable|date',
                            --}}

                            {{-- add new discount form --}}
                            <div id="addDiscountForm" class="hidden z-50 absolute inset-0 flex justify-center items-center">
                                <div
                                    class="max-w-[800px]  bg-default-white border border-neutral-30 rounded-lg px-4 py-5 animate-jump-in animate-duration-150 animate-ease-in">
                                    <form id="" class="" action="{{ route('discount.add') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="flex justify-between gap-x-12 pb-4">
                                            <h1 id="title" class="font-formula1 text-lg">Add new discount</h1>
                                            <button type="button" onclick="hideAddDiscountForm()">Cancel</button>
                                        </div>
                                        <div class="w-full">
                                            <div class="grid grid-cols-2 gap-2">
                                                <div class="">
                                                    <x-input-label for="name" class="pb-2">Discount
                                                        Code</x-input-label>
                                                    <x-text-input adminDashboard="true" type="text"
                                                        id="addDiscountCodeField" name="code" class="w-full"
                                                        placeholder="Discount Code" required />
                                                </div>
                                                <div class="">
                                                    <x-input-label for="price" class="pb-2">Value</x-input-label>
                                                    <x-text-input adminDashboard="true" type="number"
                                                        id="addDiscountValueField" name="value" class="w-full"
                                                        placeholder="Value" required />
                                                </div>
                                            </div>
                                            {{-- discountType dropdown --}}
                                            <div class="mt-2">
                                                <input required type="hidden" id="type" name="type" value="">
                                                <div class="relative" id="discountTypeDropdownButton">
                                                    <x-input-label for="type" class="pb-2">Type</x-input-label>
                                                    <div id="discountTypeButton" onclick="toggleDiscountTypeDropdown()"
                                                        class="border-solid border-neutral-60 border-[1px] px-5 py-2 content-center rounded-sm cursor-pointer flex justify-between">
                                                        Discount Type
                                                        <img id="discountTypeUpArrow"
                                                            src="/images/filter icons/Chevron Down.svg">
                                                    </div>

                                                    <!-- this is the border for the dropdown options  -->
                                                    <div id="discountTypeDropdown"
                                                        class="rounded-md border-neutral-60 hidden bg-white">
                                                        <div
                                                            class="absolute z-10 w-full bg-default-white border-solid border-l border-r border-b border-neutral-60 rounded-bl-sm rounded-br-sm flex flex-col">
                                                            <!-- Dropdown content -->
                                                            <x-dropdown-link id="fixedOption"
                                                                onclick="setDiscountTypeOption(1, 'fixed')">Fixed</x-dropdown-link>
                                                            <x-dropdown-link id="percentageOption"
                                                                onclick="setDiscountTypeOption(2, 'percentage')">Percentage</x-dropdown-link>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function toggleDiscountTypeDropdown() {
                                                        let discountTypeDropdownButton = document.querySelector('#discountTypeDropdownButton');
                                                        let discountTypeUpArrow = document.querySelector('#discountTypeUpArrow');
                                                        let dropdown = document.querySelector('#discountTypeDropdown');
                                                        dropdown.classList.toggle("hidden");
                                                        if (dropdown.classList.contains("hidden")) {
                                                            discountTypeUpArrow.src = "/images/filter icons/Chevron Down.svg";
                                                        } else {
                                                            discountTypeUpArrow.src = "/images/filter icons/Vector.svg";
                                                        }
                                                    }

                                                    function setDiscountTypeOption(id, name) {
                                                        let button = document.querySelector('#discountTypeButton');
                                                        document.querySelector('#type').value = id;
                                                        button.innerText = name;
                                                        toggleDiscountTypeDropdown(); // Close the dropdown after selecting an option
                                                    }

                                                    function reset() {
                                                        document.getElementById("filter").reset();
                                                        document.querySelector("#discountTypeButton").textContent = "Options";
                                                    }

                                                    // Close dropdown when clicking outside
                                                    document.addEventListener('click', function(event) {
                                                        const discountTypeButton = document.getElementById('discountTypeDropdownButton');
                                                        const dropdown = document.getElementById('discountTypeDropdown');
                                                        const isClickInside = discountTypeButton.contains(event.target);

                                                        if (!isClickInside && !dropdown.classList.contains('hidden')) {
                                                            toggleDiscountTypeDropdown();
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2">
                                            <div class="col-span-2">
                                                <x-input-label for="maxUses" class="pb-2 pt-4 ">Max Uses
                                                    (Optional)</x-input-label>
                                                <x-text-input adminDashboard="true" type="number" id="max_uses"
                                                    name="max_uses" class="w-full " placeholder="Max Uses" />
                                            </div>
                                            <div class="">
                                                <x-input-label for="validFrom" class="pb-2 pt-4 ">Valid From
                                                    (Optional)</x-input-label>
                                                <x-text-input adminDashboard="true" type="date" id="valid_from"
                                                    name="valid_from" class="w-full " placeholder="Valid From" />
                                            </div>
                                            <div class="">
                                                <x-input-label for="validTo" class="pb-2 pt-4 ">Valid To
                                                    (Optional)</x-input-label>
                                                <x-text-input adminDashboard="true" type="date" id="valid_to"
                                                    name="valid_to" class="w-full " placeholder="Valid To" />
                                            </div>
                                        </div>

                                        <x-primary-button adminDashboard="true" id="addProductSaveChangesButton"
                                            type="submit" class=" w-full mt-4 bottom-0 shrink-0">Save
                                            changes</x-primary-button>
                                    </form>
                                </div>
                            </div>

                            @foreach ($discounts as $discount)
                                <tr class="h-10">
                                    <td class="py-4">{{ $discount->code }}</td>
                                    <td class="py-4 text-center">{{ $discount->type }}</td>
                                    <td class="py-4 text-right">
                                        @if ($discount->type == 'percentage')
                                            {{ $discount->value }}%
                                        @else
                                            £{{ $discount->value }}
                                        @endif
                                    </td>
                                    <td class="py-4 text-right">
                                        <button adminDashboard="true" class="underline"
                                            onclick="showDetails('{{ $discount->code }}', {{ $discount->value }}, '{{ $discount->max_uses }}', '{{ $discount->valid_from }}', '{{ $discount->valid_to }}', '{{ route('discount.update', $discount->id) }}', '{{ route('discount.delete', $discount->id) }}')">
                                            More Details
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Form --}}
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

                    {{-- Title and cancel button --}}

                    <form id="updateDiscountForm" class="p-0 m-0 lg:flex lg:flex-col lg:h-full lg:content-around"
                        action="" method="POST">
                        @csrf
                        @method('POST')

                        <div class="flex justify-between pb-4">
                            <h1 id="title" class="font-formula1 text-lg">Edit Discount Code</h1>
                            <button type="button" onclick="hideForm()">Cancel</button>
                        </div>
                        {{-- Discount code fields --}}
                        <div class="flex flex-col w-full h-fit">
                            <div class="flex flex-row justify-center gap-5">
                                <div class="w-full">
                                    <x-input-label for="name" class="pb-2">Discount
                                        Code</x-input-label>
                                    <x-text-input adminDashboard="true" type="text" id="discountCodeField"
                                        name="code" class="w-full" placeholder="Discount Code" />
                                </div>
                                <div class="w-full">
                                    <x-input-label for="price" class="pb-2">Value</x-input-label>
                                    <x-text-input adminDashboard="true" type="number" id="discountValueField"
                                        name="value" class="w-full" placeholder="Value" />
                                </div>
                            </div>
                            <div class="w-full">
                                <x-input-label for="maxUses" class="pb-2 pt-4 ">Max Uses
                                    (Optional)</x-input-label>
                                <x-text-input adminDashboard="true" type="number" id="maxUsesField" name="max_uses"
                                    class="w-full " placeholder="Max Uses" />
                            </div>
                            <div class="flex flex-row justify-center gap-5">
                                <div class="w-full">
                                    <x-input-label for="validFrom" class="pb-2 pt-4 ">Valid From
                                        (Optional)</x-input-label>
                                    <x-text-input adminDashboard="true" type="date" id="validFromField"
                                        name="valid_from" class="w-full " placeholder="Valid From" />
                                </div>
                                <div class="w-full">
                                    <x-input-label for="validTo" class="pb-2 pt-4 ">Valid To
                                        (Optional)</x-input-label>
                                    <x-text-input adminDashboard="true" type="date" id="validToField" name="valid_to"
                                        class="w-full " placeholder="Valid To" pattern="" />
                                </div>
                            </div>
                            <div class="flex flex-row justify-center gap-5">
                                <x-primary-button adminDashboard="true" id="saveChangesButton" type="submit"
                                    form="updateDiscountForm" class=" w-1/2 mt-4 bottom-0 shrink-0">Save
                                    changes</x-primary-button>
                                <x-danger-button adminDashboard="true" onclick="" type="submit"
                                    form="deleteDiscountForm" class="w-1/2 mt-4 bottom-0 shrink-0">Delete
                                    Discount</x-danger-button>
                            </div>
                    </form>
                    <form id="deleteDiscountForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <script>
                        function hideForm() {
                            let editDetailsForm = document.getElementById("editDetails");
                            let formOverlay = document.getElementById("formOverlay");
                            let discountsTable = document.getElementById("discountsTable");

                            editDetails.classList.add("translate-y-full");
                            editDetails.classList.add("lg:w-0");
                            editDetails.classList.add("border-none");
                            editDetails.classList.add("lg:translate-y-0");
                            editDetails.classList.add("col-start-3");

                            editDetails.classList.add("overflow-hidden");
                            editDetails.classList.add("h-0");
                            editDetails.classList.add("md:h-auto");

                            formOverlay.classList.add("hidden");

                            discountsTable.classList.add("lg:col-span-2");
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showDetails(code, value, max_uses, valid_from, valid_to, action, action2) {

            console.log(action);
            // Show menu
            let editDetailsForm = document.getElementById("editDetails");
            let formOverlay = document.getElementById("formOverlay");
            let discountsTable = document.getElementById("discountsTable");

            editDetails.classList.remove("translate-y-full");
            editDetails.classList.remove("lg:w-0");
            editDetails.classList.remove("border-none");
            editDetails.classList.remove("lg:translate-y-0");
            editDetails.classList.remove("col-start-3");


            editDetails.classList.remove("overflow-hidden");
            editDetails.classList.remove("h-0");
            editDetails.classList.remove("md:h-auto");



            formOverlay.classList.remove("hidden");

            discountsTable.classList.remove("lg:col-span-2");

            // Update fields
            let discountCode = document.getElementById("discountCodeField");
            let discountValue = document.getElementById("discountValueField");
            let maxUses = document.getElementById("maxUsesField");
            let validFrom = document.getElementById("validFromField");
            let validTo = document.getElementById("validToField");
            let updateDiscountForm = document.getElementById("updateDiscountForm");
            let deleteDiscountForm = document.getElementById("deleteDiscountForm");

            discountCode.value = code;
            discountValue.value = value;
            maxUses.value = max_uses;
            validFrom.value = valid_from;
            validTo.value = valid_to;
            updateDiscountForm.action = action;
            deleteDiscountForm.action = action2;

            let saveChangesButton = document.getElementById("saveChangesButton");

            // Check if any field has changed
            let fields = [code, discountValue, maxUses, validFrom, validTo];
            let hasChanged = fields.some(field => field.value !== field.defaultValue);

            // Show or hide save changes button based on changes
            if (hasChanged) {
                saveChangesButton.classList.remove("hidden");
            } else {
                saveChangesButton.classList.add("block");
            }
        }


        function showAddDiscountForm() {
            hideForm();
            let addDiscountForm = document.getElementById("addDiscountForm");
            let formOverlay = document.getElementById("formOverlay");
            addDiscountForm.classList.toggle("hidden");
            formOverlay.classList.toggle("hidden");
            formOverlay.classList.toggle("lg:hidden");
        }

        function hideAddDiscountForm() {
            let addDiscountForm = document.getElementById("addDiscountForm");
            let formOverlay = document.getElementById("formOverlay");
            addDiscountForm.classList.toggle("hidden");
            formOverlay.classList.toggle("hidden");
            formOverlay.classList.toggle("lg:hidden");
        }
    </script>
@endsection
