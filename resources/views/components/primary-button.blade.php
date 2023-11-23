<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center w-32 h-11 border-2 border-bluish-purple text-base text-bluish-plurple hover:bg-bluish-purple text-bluish-purple hover:text-snow-white transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
