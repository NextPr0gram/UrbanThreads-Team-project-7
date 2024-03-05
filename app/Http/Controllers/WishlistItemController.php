<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Route
Route::post('/like', 'LikeController@toggleLike');

class WishlistItemController extends Controller
/*
*Responsible for showing items in whislist, adding and deleting item
*/
{
    //Other functions to add, find product, wishlist etc...
    //route will need to be added as well
    
    //To add an item to wishlist
    public function addToWishlist(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();
    
        // If the user isn't logged in, redirect them to the login page
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to your wishlist.');
        }
    
        // Get the product ID from the request
        $productId = $request->input('productId');
    
        // Find or create the wishlist for the user
        $wishlist = Wishlist::firstOrCreate(['user_id' => $user->id]);
    
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
    

 
}
