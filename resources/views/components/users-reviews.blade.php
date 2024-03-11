<!--$review not recognised-->
<div class="flex">
    @foreach($reviews as $review)
    <div class="mt-10 bg-white rounded-lg bg-opacity-40 backdrop-blur-sm lg:flex-row shadow-sd border-primary-50 shadow-gray mix-blend-darken bg-gray md:container">
        <div class="flex flex-col justify-start mx-3">
            <p class="text-left font-lexend text-black size-xs text-neutral-70">{{ $review->created_at->format('d/m/Y') }}</p>
            <!--Not sure if this will work-->
            <x-bladewind.rating name="user-rating" rating="{{ $review->rating }}" />
        </div>
        <div>
            <p class="text-left font-lexend text-black size-xs text-black m-3 mb-2">{{ $review->description }}</p>
        </div>
    </div>
   
    @endforeach
</div>
