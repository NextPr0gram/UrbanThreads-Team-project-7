<div class="flex justify-center items-center pt-16">
    <div
        class="bg-primary-50 rounded-lg bg-opacity-40 border-2 backdrop-blur-sm shadow-sd border-primary-50 shadow-gray mix-blend-darken bg-gray w-96 mx-auto md:flex md:flex-col md:w-full md:pl-7 md:pt-3">
        <div class="flex justify-between items-center pl-5 py-3">
            <h1 class="font-formula1 text-black mb-2 mt-2 text-lg"> Reviews </h1>
        </div>

        <div class="grid grid-cols-2 max-md:grid-cols-1 pb-5 px-5">
            <div class="grid grid-cols-2 pb-6 items-center max-md:grid-cols-1">
                <div class="flex flex-col content-center">
                    <div class="flex flex-row max-sm:flex-col justify-between max-md:gap-5 max-md:items-center">
                        <p class="font-formula1 text-6xl text-primary-300 pt-3">{{ $productRating }}</p>
                        <div class="flex-col max-md:flex max-md:flex-col max-md:gap-3 items-center max-md:mt-5">
                            <x-bladewind.rating name="product-rating" rating="{{ $productRating }}" clickable="false"
                                class="text-center" />
                            <p class="font-lexend text-base text-primary-300"> {{ $totalProductReviews }}
                                Reviews </p>
                        </div>
                    </div>
                    <x-primary-button class="w-full mt-5" onclick="showModal('review-modal')">
                        Write A Review
                    </x-primary-button>
                </div>
            </div>

            <div class="pr-5 lg:pr-96 w-full items-center max-sm:pb-5">
                <x-bladewind.horizontal-line-graph label="5 Stars " percentage="{{ $fiveStarPercentage }}" />
                <x-bladewind.horizontal-line-graph label="4 Stars " percentage="{{ $fourStarPercentage }}" />
                <x-bladewind.horizontal-line-graph label="3 Stars " percentage="{{ $threeStarPercentage }}" />
                <x-bladewind.horizontal-line-graph label="2 Stars " percentage="{{ $twoStarPercentage }}" />
                <x-bladewind.horizontal-line-graph label="1 Star " percentage="{{ $oneStarPercentage }}" />
            </div>
        </div>
    </div>
</div>
