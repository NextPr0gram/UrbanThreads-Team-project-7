<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WishListTest</title>
</head>

<body>
    <h1>{{Auth::user()->name}}'s wishlist</h1>
    <ul>
        @if($wishListItems)
        @foreach($wishListItems as $item)
        <li>
            <h5>{{ $item->product->name }}</h5>
            <form action="{{ route('wishlist.remove', $item->product->id) }}" method="post">
                @csrf
                @method('Delete')
                <input type="submit" value="Remove from wishlist">
            </form>
        </li>
        @endforeach
        @endif

    </ul>

</body>

</html>