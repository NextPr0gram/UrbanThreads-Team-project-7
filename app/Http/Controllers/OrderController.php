<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(){
        //by Neha based on Baskets Controller
             // Get the authenticated user  
     $user = auth()->user();

     // Get the user's basket and associated items
     $basket = Basket::where('user_id', $user->id)->first();
     $basketItems = optional($basket)->items;

     //functions so when the basket is checked out Order is created
     //

 
    }
}
