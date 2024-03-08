<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Wishlists;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function __construct()
    {
        $this->middleware('login_required');
    }
    //To show wishlists to users
    public function show(){
        //ToDo returns a json response of the shortlisted products
    }

    public function addToWishList(int $productId){
        $product = Product::find($productId);
        $user = Auth::user();
        foreach($user->products as $storedProduct){
            if(($product == $storedProduct)){
                return back('error', "This product has already been added to your wishlist");
            }
        }
        $user->products->create($product);
        return back()->with('success', "the product $product->name has been added to your wishlist");
    }

    public function removeFromWishList(int $productId){
        $product = Product::find($productId);
        $user = Auth::user();
        $user->products->remove($product);
    }
  

    //Routes need to be added in web php for full functionality!!
}
