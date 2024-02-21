<div class="flex ">

    <div
        class="mt-10 bg-white rounded-lg bg-opacity-40 backdrop-blur-sm lg:flex-row shadow-sd border-primary-50 shadow-gray mix-blend-darken bg-gray md:container">
        <div class="flex flex-col justify-start mx-3">
            <h1 class="text-left font-lexend text-black"> #UsersName </h1>
            <p class="text-left font-lexend text-black size-xs text-neutral-70"> dd/mm/yyyy</p> {{--(Get date of review
            and use that here) --}}
            <x-bladewind.rating name="user-rating" rating="5" /> {{--(Get rating of review and use that here) --}}
        </div>

        <div class="">

            <p class="text-left font-lexend text-black size-xs text-black m-3 mb-2"> The purpose of lorem ipsum is to
                create a natural looking block of text (sentence, paragraph, page, etc.) that doesn't distract from the
                layout. A practice not without controversy, laying out pages with meaningless filler text can be very
                useful when the focus is meant to be on design, not content. </p>
        </div>
    </div>
</div>