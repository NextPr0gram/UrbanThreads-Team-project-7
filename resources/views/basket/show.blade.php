<x-app-layout>
    <div class="flex justify-center items-center h-20 bg-gray-100">
        <h1 class="text-white text-3xl font-formula1">My Basket</h1>
    </div>

    @if (session('success'))
        <div class="text-lg font-lexend bg-green bg-opacity-80 rounded-md text-center my-5 justify-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-center items-center">
        <div class="grid grid-cols-1 gap-5 bg-white bg-opacity-60 p-10">
            @foreach ($basketItems as $item)
                <div class="flex items-center">
                    <h2 class="text-black font-bold text-lg mr-4">{{ $item->product->name }}</h2>
                    <div class="flex items-center space-x-4">
                        <button class="bg-black text-black w-8 h-8 squared border border-black font-bold">-</button>
                        <span class="text-black font-bold">{{ $item->quantity }}</span>
                        <button class="bg-black text-black w-8 h-8 squared border border-black font-bold">+</button>
                        <h2 class="text-black font-bold text-lg mr-4">Price:
                            {{ $item->product->selling_price * $item->quantity }}</h2>
                        <form action="{{ route('basket.remove', $item->product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-remove-item />
                        </form>
                    </div>
                </div>
            @endforeach
            <h1 class="text-bluish-purple text-5xl font-formula1">Total: {{ $totalPrice }}</h1>
        </div>
    </div>


    <div class="flex content-center justify-center flex-col mt-5 py-3 mx-96 bg-white bg-opacity-60">
        <div class="flex justify-center">
            <a href="{{ route('checkout') }}"><x-primary-button-dark class="mt-5">Checkout</x-primary-button-dark></a>
        </div>
        <div class="flex justify-center">
            <a href="{{ route('hoodies') }}"><x-primary-button-dark class="mt-5">Hoodies</x-primary-button-dark></a>
        </div>
    </div>
</x-app-layout>
