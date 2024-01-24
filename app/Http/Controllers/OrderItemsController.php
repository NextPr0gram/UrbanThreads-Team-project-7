<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    //function to add all basket_items as order_items
    public function addToOrder($productId)
    {
        // Get the authenticated user
        $user = auth()->user();
    }
}
