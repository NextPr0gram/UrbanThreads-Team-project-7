<x-app-layout>

<div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32 bg-white bg-opacity-60 mb-5 mt-8 w-fit lg:mt-12 xl:mt-16">
    <!-- ... -->
    <div class="px-4 pt-8">
        <div class="mt-2 space-y-3 px-2 py-4 sm:px-6 bg-snow-white max-sm:text-center box-content h-80 w-72 p-4 w-px"></div>
        <!-- Image will go here -->
    </div>
    <div class="max-sm:px-4">
        <!-- Product details -->
        <h1 class="mt-5 ml-20 font-formula1 text-lg text-left color-bluish-purple text-bluish-purple">{{ $product->name }}</h1>
        <h2 class="mt-5 ml-20 font-lexend text-base text-left text-color-black ">£{{ $product->selling_price }}</h2>
        <h1 class="mt-5 ml-20 font-formula1 text-lg text-left text-bluish-purple"> Description</h1>
        <h2 class="mt-5 ml-20 font-lexend text-xs text-left">{{ $product->description }}</h2>
        <div class="flex flex-col justify-center items-center mt-5 ml-24 mb-5">
            <!-- Functionality to add to basket -->
            <a href="{{ route('home') }}"><x-primary-button-dark class="w-full px-5">Add To Cart</x-primary-button-dark></a>
        </div>
    </div>
</div>
</x-app-layout>
