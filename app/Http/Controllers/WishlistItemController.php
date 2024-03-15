<?php

namespace App\Http\Controllers;

use App\Models\WishlistItems;
use Illuminate\Http\Request;
use App\Models\Wishlists;
use App\Models\Product;

// Route
//Route::post('/like', 'LikeController@toggleLike');

class WishlistItemController extends Controller
/*
*Responsible for showing items in whislist, adding and deleting item
*/
{
    //Other functions to add, find product, wishlist etc...
    //route will need to be added as well

    //To add an item to wishlist
    public function addToWishlist(Request $request, $productId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // If the user isn't logged in, they are redirected to a page that allows them to login, register or continue shopping
        // They are also shown an error message saying that they must be logged in to add items to their wi$wishList
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to your wi$wishList.');
        }

        // Find the product
        $product = Product::findOrFail($productId);

        // Get the variation of the product
        // Find or create the wi$wishList for the user
        $wishList = Wishlists::firstOrCreate(['user_id' => $user->id]);

        // Check if the product is already in the wi$wishList
        $existingWishlistItem = WishlistItems::where('wishlists_id', $wishList->id)
            ->where('product_id', $product->id)
            ->first();

        if ($existingWishlistItem) {
            return back()->with('error', 'you have already added this item to your wishlist');
        } else {
            // Add the product to the wi$wishList
            WishlistItems::create([
                'wishlists_id' => $wishList->id, // The wi$wishList ID is the ID of the wi$wishList that was found or created for the user
                'product_id' => $product->id, // The product ID is the ID of the product that was added to the wi$wishList
                'user_id' => $user->id
            ]);
        }

        // Redirect to the wi$wishList page with a success message to reflect changes
        return redirect()->route('wishlist.show')->with('success', 'Item(s) added to the wishList.');

    }

    public function removeFromWishList($productId)
    {
        $user = auth()->user();

        // Find the wi$wishList for the user
        $wishList = Wishlists::where('user_id', $user->id)->first();

        // Optionally get the wi$wishList items of the wi$wishList if the wi$wishList exists
        $wishListsItems = optional($wishList)->items;

        // Find the product
        $product = Product::findOrFail($productId);

        // Find the wi$wishList item
        $wishListItem = WishlistItems::where('wishlists_id', $wishList->id)
            ->where('product_id', $product->id)
            ->first();

        if (count($wishListsItems) == 1) {
            // Removes the item from the wi$wishList
            $wishListItem->delete();
            // Deletes the wi$wishList
            $wishList->delete();
            // Redirect to the homepage with a success alert saying that all items have been removed from the wi$wishList
            return redirect()->route('home')->with('success', 'All items removed from the wishlist.');
        } else {
            // Removes the item from the wi$wishList
            $wishListItem->delete();
            // Otherwise, redirect back to the wi$wishList page with a success alert saying that an item has been removed from the wi$wishList
            return redirect()->route('wishlist.show')->with('success', 'Item(s) removed from wishlist.');
        }
    }
}
