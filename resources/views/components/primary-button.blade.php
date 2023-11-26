<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-32 h-11 border-3 border-bluish-purple text-base text-bluish-plurple hover:bg-bluish-purple text-bluish-purple hover:text-snow-white transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
