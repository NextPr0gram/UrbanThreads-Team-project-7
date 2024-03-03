@props([
    // name of the modal. used to uniquely identify the modal in css and js
    'name' => 'bw-modal-' . uniqid(),

    // text to display on secondary button. default is Cancel
    'cancel_button_label' => 'Cancel',
    'cancelButtonLabel' => 'Cancel',

    // action to perform when primary button is clicked. default is close.
    // provide a custom js function as a string to execute that function. example "confirmAction"
    'cancel_button_action' => 'close',
    'cancelButtonAction' => 'close',

    // determines if clicking on the backdrop can close the modal. default is true
    // when set to false, only the action buttons can close the modal.
    // in this case ensure you have set "close" as an action for one of your action buttons
    'backdrop_can_close' => true,
    'backdropCanClose' => true,

    // should the backdrop of the modal be blurred
    'blur_backdrop' => true,
    'blurBackdrop' => true,
])
@php
    $backdrop_can_close = filter_var($backdrop_can_close, FILTER_VALIDATE_BOOLEAN);
    $backdropCanClose = filter_var($backdropCanClose, FILTER_VALIDATE_BOOLEAN);
    $blur_backdrop = filter_var($blur_backdrop, FILTER_VALIDATE_BOOLEAN);
    $blurBackdrop = filter_var($blurBackdrop, FILTER_VALIDATE_BOOLEAN);

    if (!$backdropCanClose) {
        $backdrop_can_close = $backdropCanClose;
    }

    if ($blurBackdrop) {
        $blur_backdrop = $blurBackdrop;
    }
    //-------------------------------------------------------------------

    $name = str_replace(' ', '-', $name);
    $okAction = $cancelAction = "hideModal('{$name}')";
    if ($cancel_button_action !== 'close') {
        $cancelAction = $cancel_button_action . ($close_after_action ? ';' . $cancelAction : '');
    }
@endphp

@php
    //this is intentional // required, so tailwindCSS will compile the styles in
@endphp
<span class="sm:w-1/6 sm:w-1/5 sm:w-1/4 sm:w-1/3 sm:w-2/5 sm:w-2/3 sm:w-11/12"></span>

<div data-name="{{ $name }}" data-backdrop-can-close="{{ $backdrop_can_close }}"
    class="w-full h-full bg-white/40 fixed left-0 top-0 @if ($blur_backdrop) backdrop-blur-md @endif z-40 flex bw-modal bw-{{ $name }}-modal hidden">
    <div class="w-full p-4 m-auto bw-{{ $name }} animate__faster">
        <div class="flex justify-center grow">
            <div
                class="p-5 bg-white rounded-lg border-2 backdrop-blur-sm lg:flex-row shadow-md border-neutral-50 shadow-light-gray-50 mix-blend-darken">
                <div class="flex flex-center justify-between items-center">
                    <h1 class="text-lg text-left font-formula1 text-black"> Write a Review </h1>
                    <div class="flex justify-end">
                        <x-secondary-button class=" bg-default-white border-none"
                            onclick="{!! $cancelAction !!}">Cancel</x-secondary-button>
                    </div>
                </div>
                <form action="{{route('reviews.add', ['productId' => $reviewProductId]) }}" method="post">
                    @csrf
                    <div class="text-left">
                        <p class="mt-2 ml-2 text-md font-lexend-bold"> Rate out of 5 </p>
                        <x-bladewind.rating name="rating" size="small" clickable />
                    </div>
                    <p class="mt-2 mb-2 ml-2 text-md font-lexend-bold text-left">Review</p>
                    <x-text-area
                        class="pt-3 w-60 md:w-[30rem] bg-white border-light-grey border-2 text-light-gray border-light-gray mb-5 rounded-lg placeholder:text-neutral-50"
                        placeholder="Write your review here" name="description" required/>
                    <div class="flex justify-end w-full">
                        <x-primary-button class="text-right">Add Review</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<span class="overflow-hidden"></span>

<script>
    dom_el('.bw-{{ $name }}-modal').addEventListener('click', function(e) {
        let backdrop_can_close = this.getAttribute('data-backdrop-can-close');
        if (backdrop_can_close) hideModal('{{ $name }}');
    });

    dom_el('.bw-{{ $name }}').addEventListener('click', function(e) {
        e.stopImmediatePropagation();
    });

    // close modal when escape key is pressed
    document.addEventListener('keyup', function(e) {
        if (e.key === "Escape") {
            if (current_modal !== undefined && current_modal.length > 0) {
                let modal_name = current_modal[(current_modal.length - 1)];
                if (dom_el(`.bw-${modal_name}-modal`).getAttribute('data-backdrop-can-close') === '1') {
                    hideModal(modal_name);
                    e.stopImmediatePropagation();
                }
            }
        }
    })
</script>
