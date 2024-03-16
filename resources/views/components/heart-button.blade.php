<div class="p-3">
    <button x-data="{ clicked: false }" @click="clicked = !clicked">
        <img src="{{ asset('icons/utility/heart-hover.svg') }}" class="w-6 h-5" :class="{ 'hidden': clicked }" alt="">
        <img src="{{ asset('icons/utility/heart-default.svg') }}" class="w-6 h-5" x-show="clicked" alt="">
    </button>
</div>