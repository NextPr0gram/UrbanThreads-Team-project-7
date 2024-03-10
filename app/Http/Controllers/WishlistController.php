<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlists;
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
}
