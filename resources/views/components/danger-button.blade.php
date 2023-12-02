<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-32 h-11 border-3 border-red text-base text-bluish-plurple hover:bg-red text-red hover:text-snow-white transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
