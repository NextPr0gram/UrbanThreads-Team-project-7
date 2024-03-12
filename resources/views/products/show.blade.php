<x-app-layout>
    <div class="flex justify-center items-center">
        <div
            class="flex flex-col items-center mt-16 bg-white bg-opacity-40 border-2 shadow-md backdrop-blur-sm w-fit lg:flex-row border-navy-blue">
            <div class="w-80 md:w-[30rem] aspect-square bg-snow-white">
                <img src="{{ $product->image }}" alt="">
            </div>
            <div class="mt-10 lg:mt-0 md:px-7 xl:px-20">
                <div>
                    <h1 class="text-4xl font-formula1 text-bluish-purple">{{ $product->name }}</h1>
                    <p class="mb-8 text-lg font-bold font-formula1">£{{ $product->selling_price }}</p>
                </div>
                <div>
                    <h1 class="text-xl font-formula1 text-bluish-purple">Description</h1>
                    <p class="max-w-xl whitespace-normal break-words">
                        {{ $product->description }}
                    </p>
                </div>
                <div class="my-10 text-center">
                    <form action="{{ route('basket.add', ['productId' => $product->id]) }}" method="post">
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

                        <x-primary-button class="px-5 w-full mt-5">Add to Basket</x-primary-button>
                    </form>
                </div>
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
