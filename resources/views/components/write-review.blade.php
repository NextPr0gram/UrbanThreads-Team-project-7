
<div class="flex justify-center">
    <div class="p-3 m-10 bg-white rounded-lg bg-opacity-40 border-2 backdrop-blur-sm lg:flex-row shadow-sd border-neutral-50 right-3/4 shadow-light-gray-50 mix-blend-darken">
        <div class="flex flex-center justify-between items-center">
            <h1 class="lg text-left font-formula1 text-black"> Write a Review </h1>
            <div class="flex justify-end">
                <x-secondary-button class=" bg-default-white border-none">Back</x-secondary-button>

            </div>
        </div>
        <p class="mt-2 ml-2 text-sm font-lexend"> Rate out of 5 </p>
        <x-bladewind.rating name="rating" size="small" clickable />
        <p class="mt-2 mb-2 ml-2 text-sm font-lexend"> Review </p>
        <x-text-area class="px-3 pt-3 w-60 md:w-[30rem] aspect-square bg-white border-light-grey border-2 text-light-gray border-light-gray mx-4 mb-5 rounded-lg placeholder:text-neutral-50 placeholder:italic" placeholder="Write your review here" type="text"  >  </x-text-area>
        <x-primary-button class="bottom-0 right-0">Add Review</x-primary-button>

  </div>

    </div>
</div>