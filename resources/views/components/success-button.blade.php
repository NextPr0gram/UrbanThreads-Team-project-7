<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-3 md:px-4 lg:px-6 h-8 md:h-9 lg:h-10 text-base text-neutral-30 bg-success-300 rounded-sm hover:bg-success-400 active:bg-success-200 transition ease-in-out duration-150 ']) }}>
    {{ $slot }}
</button>

