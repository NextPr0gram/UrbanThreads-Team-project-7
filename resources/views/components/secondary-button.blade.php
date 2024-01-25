<button {{ $attributes->merge(['type' => 'submit', 'class' => 'border-2 border-primary-300 px-3 md:px-4 lg:px-6 h-8 md:h-9 lg:h-10 text-base text-primary-300 active:text-primary-100 bg-transparent rounded-sm hover:bg-primary-50 active:border-primary-100 transition ease-in-out duration-150 ']) }}>
    {{ $slot }}
</button>

