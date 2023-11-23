<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center display: flex;
w-149 py-26 px-14 pt-2 pb-2 justify-center items-center gap-10  bg-black 3px border-2 border border-bluish-purple font-semibold text-14 text-bluish-purple tracking-widest hover:bg-bluish-purple hover:text-snow-white focus:bg-snow-white active:bg-snow-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
