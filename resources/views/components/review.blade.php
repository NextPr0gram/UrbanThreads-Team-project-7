<div class="mt-10 grid-cols-2 flex max-sm:pr-5">
    <div
        class="bg-primary-50 rounded-lg bg-opacity-40 border-2 backdrop-blur-sm shadow-sd border-primary-50 shadow-gray mix-blend-darken bg-gray w-96 mx-auto md:flex md:flex-col md:w-full md:pl-7 md:pt-3">
        <div class="flex justify-between items-center pl-5 py-3">
            <h1 class="font-formula1 text-black mb-2 mt-2 text-lg"> Reviews </h1>
        </div>

        <div class="grid grid-cols-2 max-sm:grid-cols-1 pl-5 pb-5 gap-x-5">
            <div class="justify-items-stretch items-center max-sm:px-5 lg:pr-96 max-sm:flex">
                <div class="grid grid-rows-2 grid-cols-2 pb-6 items-center">
                    <p class="font-formula1 text-6xl text-primary-300">{{ $productRating }}</p>
                    <div class="col-span-1">
                        <x-bladewind.rating name="product-rating" rating="{{ $productRating }}" clickable="false" />
                        <p class="font-lexand text-xs text-primary-300"> {{ $totalProductReviews }} Reviews </p>
                    </div>
                    <x-primary-button class="col-span-2 w-full items-center mt-5"
                        onclick="showModal('review-modal')">Write A
                        Review</x-primary-button>
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
