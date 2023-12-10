<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    //
    public function addToOrder($productId)
    {
        // Get the authenticated user
        $user = auth()->user();
    }
}
