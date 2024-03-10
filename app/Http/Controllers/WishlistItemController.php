<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlists;
use App\Models\Product;
use App\Models\WishlistItems;

// Route
// Route::post('/like', 'LikeController@toggleLike');

class WishlistItemController extends Controller
/*
*Responsible for showing items in wishlist, adding and deleting item
*/
{
    //Other functions to add, find product, wishlist etc...
    //route will need to be added as well

    // To add an item to the user's wishlist
    public function addToWishlist(Request $request, $productId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // If the user isn't logged in, they are redirected to a page that allows them to login, register or continue shopping
        // They are also shown an error message saying that they must be logged in to add items to their wishlist
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to your wishlist.');
        }

        // Get the product ID from the request
        $productId = $request->input('productId');

        // Find or create the wishlist for the user
        $wishlist = Wishlists::firstOrCreate(['user_id' => $user->id]);

        // Check if the product is already in the wishlist
        $existingWishlistItem = $wishlist->products()->where('product_id', $productId)->first();

        if ($existingWishlistItem) {
            // Product is already in the wishlist, so remove it
            $wishlist->products()->detach($productId);
            return response()->json(['message' => 'Product removed from the wishlist.'], 200);
        } else {
            // Product is not in the wishlist, so add it
            $wishlist->products()->attach($productId);
            return response()->json(['message' => 'Product added to the wishlist.'], 200);
        }
    }


    // To remove a product from the user's wishlist 
    public function removeFromWishlist($productId)
    {
        // Ensure the user is authenticated
        $user = auth()->user();

        // Find the wishlist for the user
        $wishlist = Wishlists::where('user-_id', $user->id)->first();

        // Optionally get the wishlist items of the wishlist if the wishlist exists
        $wishlistItems = optional($wishlist)->items;

        // Find the product
        $product = Product::findOrFail($productId);

        // Find the wishlist item for the user
        $wishlistItem = WishlistItems::where('wishlists_id', $wishlist->id)
            ->where('product_id', $product->id)
            ->first();

        if (count($wishlistItems) == 1) {
            // Removes the item from the wishlist
            $wishlistItem->delete();
            // Deletes the wishlist
            $wishlist->delete();
            // Redirect to the homepage with a success alert saying that all items have been removed from the wishlist
            return redirect()->route('home')->with('success', 'All items removed from the wishlist.');
        } else {

            // Removes the item from the wishlist
            $wishlistItem->delete();
            // Otherwise, redirect back to the wishlist page with a success alert saying that an item has been removed from the wishlist
            return redirect()->route('wishlist.show')->with('success', 'Item(s) removed from wishlist.');
        }
    }
}
