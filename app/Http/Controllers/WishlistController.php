<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishlistItems;
use App\Models\Product;
use App\Models\Wishlists;

/**
 * Class WishlistController
 * show method: responsible for showing items in wishlist
 * addToWishlist method: responsible for adding item to wishlist
 * removeFromWishlist method: responsible for removing item from wishlist
 */
class WishlistController extends Controller
/*
*Responsible for showing items in wishlist, adding and deleting item
*/
{
    public function show()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Get the wishlist of the authenticated user
        if ($user) {
            $wishlists = Wishlists::where('user_id', $user->id)->first();

            if ($wishlists) {

                // Optionally get the wishlist items of the wishlist if the wishlist exists
                $wishlistItems = optional($wishlists)->items;

                //* Pass the wishlist items to the view
                return view('wishlist.show', compact('wishlistItems'));
            } else {

                //! Redirect to the previous page and displays an error message that the user does not have any items in their wishlist
                return redirect()->back()->with('error', 'You do not have any items in your wishlist');
            }
        } else {
            //?? Really should be on when users try to add onto wishlist so could delete in future...
            //! Redirect to the login page if the user is not authenticated
            return redirect()->route('login')->with('error', 'Login to view your wishlist');
        }
    }
    //Other functions to add, find product, wishlist etc...
    //route will need to be added as well

    // To add an item to the user's wishlist
    public function addToWishlist(Request $request, $productId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // If the user isn't logged in, they are redirected to a page that allows them to login, register or continue shopping
        // They are also shown an error message saying that they must be logged in to add items to their basket
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to your basket.');
        }

        // Find the product
        $product = Product::findOrFail($productId);

        // Find or create the wishlist for the user
        $wishlist = Wishlists::firstOrCreate(['user_id' => $user->id]);

        // Check if the product is already in the wishlist
        $existingWishlistItem = $wishlist->products()->where('product_id', $productId)->first();

        if ($existingWishlistItem) {
            // Product is already in the wishlist, so remove it
            $wishlist->products()->detach($productId);
            return redirect()->back()->with('success', 'Item removed from Wishlist');
        } else {
            // Product is not in the wishlist, so add it
            $wishlist->products()->attach($productId);
            return redirect()->back()->with('success', 'Item added from Wishlist');
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
