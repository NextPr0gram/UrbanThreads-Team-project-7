<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Wishlists;
use App\Models\WishlistItems;

class WishlistController extends Controller
{
    //To show wishlists to users
    public function show()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Get the wishlist of the authenticated user
        if ($user) {
            $wishlists = WishlistItems::where('user_id', $user->id)->first();

            if ($wishlists) {
                // Optionally get the basket items of the basket if the basket exists
                $wishlistItems = optional($wishlists)->items;

                return view('wishlists.show', compact('wishlistItems')); //* Pass the basket items to the view
            } else {
                return redirect()->back()->with('error', 'You do not have any items in your wishlist');
                //! Redirect to the previous page and displays an error message that the user does not have any items in their basket
            }
        } else {
            //?? Really should be on when users try to add onto wishlist so could delete in future...
            //! Redirect to the login page if the user is not authenticated
            return redirect()->route('login')->with('error', 'Login to view your wishlist');
        }
    }

    public function addToWishlist(Request $request, $productId)
    {
        // Ensure the user is authenticated
        $user = $request->user();

        // Check if the product is already in the wishlist to prevent duplicates
        $exists = WishlistItems::where('user_id', $user->id)->where('products_id', $productId)->exists();

        if (!$exists) {
            WishlistItems::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);

            // Redirect back to the wishlist and display a success message that the product was added to the wishlist
            return redirect()->back()->with('success', 'Product added to wishlist.');
            // } else {
            // return redirect()->back()->with('info', 'Product is already in your wishlist.');
        }
    }

    public function removeFromWishlist(Request $request, $productId)
    {
        // Ensure the user is authenticated
        $user = $request->user();
        WishlistItems::where('user_id', $user->id)->where('product_id', $productId)->delete();

        // Redirect back to the wishlist and display a success message that the product was removed from the wishlist
        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }

    //  Routes need to be added in web php for full functionality!!
}
