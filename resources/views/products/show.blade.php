<x-app-layout>

    <div class="">
        <h1 class="mt-5 ml-20 font-formula1 text-6xl">{{ $product->name }}</h1>
        <h1 class="mt-5 ml-20 font-formula1 text-6xl">£{{ $product->selling_price }}</h1>
        <h1 class="mt-5 ml-20 font-formula1 text-6xl">{{ $product->description }}</h1>
    </div>


</x-app-layout>
