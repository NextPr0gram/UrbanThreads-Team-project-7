<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="w-fit mt-16 flex flex-col items-center lg:flex-row bg-white bg-opacity-40 backdrop-blur-sm shadow-md border-2 border-navy-blue">
            <div class=" w-80  md:w-[30rem] aspect-square bg-snow-white ">
                <img src="{{ $product->image }}" alt="">
            </div>
            {{-- content --}}
            <div class=" mt-10 lg:mt-0 md:px-7 xl:px-20">
                <div>
                    <h1 class="font-formula1 text-4xl text-bluish-purple">{{ $product->name }}</h1>
                    <p class="mb-8 font-bold">£{{ $product->selling_price }}</p>
                </div>
                <div class="">
                    <h1 class="font-formula1 text-xl text-bluish-purple">Description</h1>
                    <p class="max-w-xl whitespace-normal break-words">
                        {{ $product->description }}
                    </p>
                </div>
                <div class="text-center my-10">
                    <form action="{{ route('basket.add', ['productId' => $product->id]) }}" method="post">
                        @csrf
                        <x-primary-button-dark class="w-full px-5">Add to Basket</x-primary-button-dark>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
