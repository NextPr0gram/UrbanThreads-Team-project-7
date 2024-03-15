<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishlistItems;
use Illuminate\Http\Request;
use App\Models\Wishlists;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //To show wishlists to users
    public function show(){
        //ToDo returns a json response of the shortlisted products
        $user = auth()->user();
        // Get the wishList$wishList of the authenticated user
        if ($user) {
            $wishList = Wishlists::where('user_id', $user->id)->first();
            if ($wishList) {
                // Optionally get the wishList$wishList items of the wishList$wishList if the wishList$wishList exists
                $wishListItems = optional($wishList)->items;
                return view('wishlists.show', compact('wishListItems'));
            } else {
                return redirect()->back()->with('error', 'Wishlists is empty!');
                //! Redirect to the wishList$wishList and display an error message that the user does not have a wishList$wishList
            }
        } else {
            //! Redirect to the login page if the user is not authenticated
            return redirect()->route('login')->with('error', 'Login to view your wishList$wishList');
        }
    }

    public function addToWishListTest(){
        $products = Product::all();
        return view('Testpages.wishListAddTest', compact('products'));
    }

    public function removeFromWishListTest(){
        $user = Auth::user();
        $wishList = Wishlists::where('user_id', '=', $user->id)->first();
        $wishListItems = optional($wishList)->items;
        return view('Testpages.wishListRemoveTest', compact('wishListItems'));
    }
  

    //Routes need to be added in web php for full functionality!!
}
