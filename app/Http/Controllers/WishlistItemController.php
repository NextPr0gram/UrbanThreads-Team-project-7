<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistItemController extends Controller
/*
*Responsible for showing items in whislist, adding and deleting item
*/
{
    //Other functions to add, find product, wishlist etc...
    //route will need to be added as well
    
    //To add an item to wishlist
    public function addToWishlist($productId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // If the user isn't logged in, they are redirected to a page that allows them to login, register or continue shopping
        // They are also shown an error message saying that they must be logged in to add items to their basket
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to your basket.');
        }

        // Find or create the wishlist for the user
        $wishlists = Wishlists::firstOrCreate(['user_id' => $user->id]);
        // Find the product
        $product = Product::findOrFail($productId);

        /*
        *Check wishlist type (Heart i.e, click add, click again remove...)
        *Controller will need changing
        */

        // Check if the product is already in the basket
        $existingWishlistItems = WishlistItems::where('wishlists_id', $wishlists->id)
            ->where('wishlists_id', $product->id)
            ->first();
            if ($existingBasketItem) {
                // May want to delete
            } else {
                // Add the product to the wishlist
                $wishlistsItems = WishlistItems::create([
                    'wishlists_id' => $wishlists->id, // Wishlist id for wishlist found or created for the user
                    'product_id' => $product->id, // The product ID is the ID of the product that was added to the wishlist
                ]);
            }
    
            // Redirect to the wishlist page with a success message to reflect changes
            return redirect()->route('wishlist.show')->with('success', 'Item added to the wishlist.');
    }

 
}
