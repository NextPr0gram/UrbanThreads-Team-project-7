<x-app-layout>
    <div
        class="mt-10 flex flex-col items-center lg:flex-row bg-white bg-opacity-40 backdrop-blur-sm border-3 border-bluish-purple">
        <div class="m-10 w-64  md:w-[30rem] aspect-square bg-snow-white ">
            {{-- image --}}
        </div>

        {{-- content --}}
        <div class="px-10 xl:px-40">
            <div>
                <h1 class=" font-formula1 text-4xl text-bluish-purple">{{ $product->name }}</h1>
                <p class="mb-8 font-bold">£{{ $product->selling_price }}</p>
            </div>
            <div>
                <h1 class="font-formula1 text-xl text-bluish-purple">Description</h1>
                <p>
                    {{ $product->description }}
                </p>
            </div>
            <div class="text-center">
                <x-primary-button-dark class="my-10">Add to cart</x-primary-button-dark>
            </div>
        </div>
    </div>
</x-app-layout>
