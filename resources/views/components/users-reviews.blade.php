{{-- ! This doesn't have to be a component because it will only be used in one page (the show page for the specific product). --}}

{{-- Loops through the array of reviews for the specific product and  --}}
<div
    class="mt-10 bg-white rounded-lg bg-opacity-40 backdrop-blur-sm lg:flex-row shadow-sd border-primary-50 shadow-gray mix-blend-darken bg-gray md:container">
    <div class="flex flex-col justify-start mx-3">
        <p class="text-left font-lexend text-black size-xs text-neutral-70">
            {{ $review->created_at->format('d/m/Y') }}</p> <!-- Date of review -->
        <x-bladewind.rating name="user-rating" rating="{{ $review->rating }}" /> <!-- Rating given by user -->
    </div>
    <div>
        <p class="text-left font-lexend text-black size-xs text-black m-3 mb-2">{{ $review->description }}</p>
        <!-- Review description -->
    </div>
</div>
