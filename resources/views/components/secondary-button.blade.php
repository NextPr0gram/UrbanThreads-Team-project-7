<button {{ $attributes->merge(['type' => 'button', 'class' => 'w-32 h-11 border-3 border-light-gray text-base text-bluish-plurple hover:bg-light-gray text-light-gray hover:text-snow-white transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
