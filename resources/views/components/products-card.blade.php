{{-- <div class="flex flex-col items-center">
    <div
        class="inline-flex flex-col justify-center items-center gap-26 w-64 h-64 mx-4 border-x-3 border-t-3 border-navy-blue bg-snow-white bg-opacity-60">
        Image goes here
    </div>
    <div
        class="bg-snow-white">
        <h1 class="text-black font-lexend text-sm mt-2">{{ $title }}</h1>
        <h1 class="text-black font-lexend text-sm">{{ $price }}</h1>

        <div class="flex w-full items-center justify-end p-4">
            <x-primary-button-dark class="" href={{ $productLink }}>Add to basket</x-primary-button-dark>
        </div>
    </div>
</div> --}}
<div class="border-3 border-light-gray w-fit hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray transition-all duration-300 ease-in-out">
    {{-- image --}}
    <div class="w-64 aspect-square">
        <img class="w-64 aspect-square" src="{{ $image }}" alt="">
    </div>

    {{-- description --}}
    <div class="px-4 bg-white">
        <h1 class="pt-2 font-formula1 text-md">{{ $title }}</h1>
        <p>{{ $price }}</p>
    </div>

    {{-- button --}}
    <div class="flex justify-end p-4 bg-white">
        <x-primary-button-dark class="" href={{ $productLink }}>Add to basket</x-primary-button-dark>
    </div>
</div>
