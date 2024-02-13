<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //To show wishlists to users
        public function show()
    {
        // Get the authenticated user
        $user = auth()->user();
        // Get the wishlist of the authenticated user
        if ($user) {
            $wishlists = Wishlists::where('user_id', $user->id)->first();


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
            //! Redirect to the wishlist page if the user is not authenticated
            return redirect()->route('login')->with('error', 'Login to view your wishlist');
        }
        
    }
  

    //RRoutes need to be added!!
}
