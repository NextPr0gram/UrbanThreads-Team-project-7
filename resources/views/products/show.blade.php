<x-app-layout>
    <div class="flex mt-10">
        <div class="flex flex-col border-2 w-fit lg:flex-row border-neutral-50 rounded-lg items-center">
            <div class="w-80 md:w-[30rem] aspect-square p-10">
                <div>
                    <img src="{{ $product->image }}" alt="" class="rounded-lg">
                </div>
            </div>
            <div class="xl:px-20 max-sm:px-5 py-10">
                <div class="mb-10">
                    <h1 class="text-4xl font-formula1 text-primary-300">{{ $product->name }}</h1>
                    <p class="mt-4 text-lg font-bold font-lexend">£{{ $product->selling_price }}</p>
                </div>
                <div class="mb-10">
                    <h1 class="text-3xl font-formula1 text-primary-300">Description</h1>
                    <p class="max-w-xl whitespace-normal break-words">
                        {{ $product->description }}
                    </p>
                </div>
                <form action="{{ route('basket.add', ['productId' => $product->id]) }}" method="post" class="items-end">
                    @csrf

                    <x-select id="size" name="size" class="w-full" required>
                        @foreach ($variations as $variation)
                            <option value="{{ $variation->id }}">Size: {{ $variation->size }}
                                @if ($variation->stock <= 0)
                                    - Out of stock
                                @elseif ($variation->stock < 10)
                                    - Low stock ({{ $variation->stock }} left)
                                @else
                                    - In stock
                                @endif
                            </option>
                        @endforeach
                    </x-select>

                    <x-secondary-button class="px-5 w-full mt-5">Add to Basket</x-secondary-button>
                </form>
            </div>
        </div>
    </div>
    <!--Recall product for each review card-->
    <x-review>
        <x-slot name="reviewProductId">{{ $product->id }}</x-slot>
        <x-slot name="productRating">{{ $averageRating }}</x-slot>
        <x-slot name="fiveStarPercentage">{{ $fiveStarPercentage }}</x-slot>
        <x-slot name="fourStarPercentage">{{ $fourStarPercentage }}</x-slot>
        <x-slot name="threeStarPercentage">{{ $threeStarPercentage }}</x-slot>
        <x-slot name="twoStarPercentage">{{ $twoStarPercentage }}</x-slot>
        <x-slot name="oneStarPercentage">{{ $oneStarPercentage }}</x-slot>
        <x-slot name="totalProductReviews">{{ $totalProductReviews }}</x-slot>
    </x-review>
    <x-write-review name="review-modal">
        <x-slot name="reviewProductId">{{ $product->id }}</x-slot>
    </x-write-review>
    <div class="flex flex-col pl-2">
        @foreach ($reviews as $review)
            <x-users-reviews :review="$review" />
        @endforeach
    </div>
</x-app-layout>
