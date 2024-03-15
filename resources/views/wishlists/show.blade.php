<x-app-layout>
    <div class="container">
        <h2>{{ Auth::user()->name }}'s items</h2>
        <ul>
            @foreach($wishListItems as $item)
                <li>{{ $item->product->name }}</li>
                <li>{{ $item->product->original_price }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>