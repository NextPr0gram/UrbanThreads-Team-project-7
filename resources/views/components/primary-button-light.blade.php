<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-32 h-11 border-3 border-snow-white text-base text-snow-white hover:bg-snow-white text-snow-white hover:text-bluish-purple transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>

