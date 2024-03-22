{{-- products.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ $category }} {{-- * Title for the category of clothing --}}
        </h2>
    </x-slot>

    <!-- ALL OF THE BELOW IS FOR THE FILTER -->
    <form id="filter" action="{{ route('sort', ['category' => $category]) }}" method="GET">
        <input type="hidden" id="sortOption" name="sort" value="">
        <div
            class="flex flex-wrap md:flex-nowrap items-start space-x-6 mt-5 mb-12 sm:mb-24 min-h-[30rem] justify-center">
            <div class="flex flex-nowrap">
                <div
                    class="p-4 bg-white bg-opacity-40 border-solid border-neutral-30 border-2 rounded-lg inline-block mb-4 flex-col object-left mt-5">

                    <div class="relative" id="dropdownButton">
                        <x-input-label for="sort" class="pb-2">Sort</x-input-label>
                        <div id="button" onclick="toggleDropdown()"
                            class="border-solid border-neutral-60 border-[1px] px-5 py-2 rounded-sm cursor-pointer flex ">
                            Options
                            <img id="upArrow" src="/images/filter icons/Chevron Down.svg">
                        </div>

                        <!-- this is the border for the dropdown options  -->
                        <div id="dropdown" class="rounded-md border-neutral-60 hidden ">
                            <div
                                class="bg-white bg-opacity-40 border-solid border-l border-r border-b border-neutral-60 rounded-bl-sm rounded-br-sm flex flex-col">
                                <!-- Dropdown content -->
                                <x-dropdown-link id="Low to High" onclick="setSortOption('Low to High')">Low to
                                    High</x-dropdown-link>
                                <x-dropdown-link id="High to Low" onclick="setSortOption('High to Low')">High to
                                    low</x-dropdown-link>
                                <x-dropdown-link id="Popularity"
                                    onclick="setSortOption('Popularity')">Popularity</x-dropdown-link>

                            </div>
                        </div>
                    </div>


                    <!-- these are the checkboxes for men women and unisex and when selected they are stored in the selected genders array -->
                    <x-input-label for="checkbox" class="py-3 flex items-center">
                        <span class=" flex-grow mr-60">Men</span>
                        <x-checkbox id="Men" name="selectedGenders[]" value="Men"></x-checkbox>
                    </x-input-label>


                    <x-input-label for="checkbox" class="pb-3 flex items-center">
                        <span class="flex-grow mr-52">Women</span>
                        <x-checkbox id="Women" name="selectedGenders[]" value="Women"></x-checkbox>
                    </x-input-label>


                    <x-input-label for="checkbox" class="pb-3 flex items-center">
                        <span class="flex-grow mr-52">Unisex</span>
                        <x-checkbox id="unisex" name="selectedGenders[]" value="unisex"></x-checkbox>
                    </x-input-label>

                    <!-- Reset and apply buttons  -->
                    <div class="flex space-x-4 ml-24 pt-3">
                        <x-secondary-button type="button" onclick="reset()">Reset</x-secondary-button>
                        <x-primary-button type="submit" id="applyFilters">Apply</x-primary-button>
                    </div>

                    <!-- this is the javascript for the dropdown to allow the options to be shown when the arrow is pressed and an up arrow is shown when the options are shown-->
                    <script>
                        function toggleDropdown() {
                            let dropdownButton = document.querySelector('#dropdownButton, #dropdown');
                            let upArrow = document.querySelector('#upArrow');
                            dropdown.classList.toggle("hidden");
                            if (dropdown.classList.contains("hidden")) {
                                upArrow.src = "/images/filter icons/Chevron Down.svg";

                            } else {
                                upArrow.src = "/images/filter icons/Vector.svg";
                            }
                        }


                        function setSortOption(option) {
                            document.querySelector('#button').innerText = option;
                            document.querySelector('#sortOption').value = option;
                            toggleDropdown();
                        }


                        function reset() {
                            document.getElementById("filter").reset();
                            document.querySelector("#button").textContent = "Options";
                        }
                    </script>
                </div>
            </div>
    </form>

    <!-- ALL OF THE ABOVE IS FOR THE FILTER -->


    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="grid grid-cols-1 gap-20 mt-5 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
                {{--
                    * Loops through all products in the category of clothing and generates a product card for each product
                    * The product card includes the product image, name, price and a button that goes to the page for that specific product
                    * which allows the user to add the product to their basket
                    --}}
                @foreach ($products as $product)
                    <div class="mb-4 text-neutral-900">
                        <a href="{{ route('show', ['slug' => $product->slug]) }}">
                            <div
                                class="transition-all rounded-lg duration-300 ease-in-out border-2 border-neutral-30 hover:border-primary-300 w-fit hover:bg-neutral-20 {{-- hover:outline hover:outline-3 hover:outline-neutral-20 --}}">
                                <div class="w-64 aspect-auto p-2">
                                    {{-- * The placeholder for the image of the product --}}
                                    <img class="w-64 aspect-auto rounded-lg" src="{{ $product->image }}" alt="">
                                </div>

                                <div class="px-2 py-2">
                                    {{-- * The placeholders for the product name and price --}}
                                    <div class="flex flex-row justify-between">
                                        <h1 class="text-base">{{ $product->name }}</h1>
                                        {{-- Heart Button to Add to Wishlist --}}
                                        <form action="{{ route('wishlist.add', ['productId' => $product->id]) }}"
                                            method="post" class="flex">
                                            @csrf
                                            @if ($product->inWishlist())
                                                <button type="submit">
                                                    <img src="{{ asset('icons/utility/heart-default.svg') }}"
                                                        class="w-6 h-5" alt="">
                                                </button>
                                            @else
                                                <button type="submit">
                                                    <img src="{{ asset('icons/utility/heart-hover.svg') }}"
                                                        class="w-6 h-5" alt="">
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                    <p class="font-formula1 text-lg">{{ $product->selling_price }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ending div for the filter -->
    </div>
</x-app-layout>
