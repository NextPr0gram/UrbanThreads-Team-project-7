<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\WishlistItems;
use App\Models\Wishlists;
use Illuminate\Support\Facades\Auth;

class NavigationLayout extends Component{
    
    public function render(){
        $user = Auth::user();
        if($user){
            $wishList = Wishlists::where('user_id', $user->id);
            $wishListItems = WishlistItems::where('user_id', $user->id)
                ->limit(3)
                ->get();
            return view('layouts.navigation', compact('wishListItems'));
        }else{
            return view('layouts.navigation');
        }
    }

}

?>