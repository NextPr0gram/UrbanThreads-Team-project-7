<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to wishlist</title>
</head>
<body>
<h1>{{Auth::user()->name}}'s wishlist</h1>
    <ul>
        @foreach($products as $product)
            <li>
                <h5>{{ $product->name }}</h5>
                <form action="{{ route('wishlist.add', $product->id) }}" method="post">
                    @csrf
                    <input type="submit" value="Add to wishlist">
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>