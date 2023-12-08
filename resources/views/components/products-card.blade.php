<div class="flex flex-col items-center">
    <div
        class="inline-flex flex-col justify-center items-center gap-26 w-64 h-64 mx-4 border-x-3 border-t-3 border-navy-blue bg-snow-white bg-opacity-60">
        Image goes here
    </div>
    <div
        class="inline-flex flex-col justify-center items-center gap-26 w-64 h-24 mx-4 border-3 border-navy-blue bg-snow-white bg-opacity-60">
        <h1 class="text-black font-Lexend Deca leading-normal text-sm text-left mt-2">{{ $title }}</h1>
        <h1 class="text-black font-Lexend Deca leading-normal text-sm text-left">{{ $price }}</h1>
        <x-primary-button-dark class="w-40 h-10 my-2" href={{ $productLink }}>View Product</x-primary-button-dark>
    </div>
</div>
