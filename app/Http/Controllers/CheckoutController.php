<?php

namespace App\Http\Controllers;

use App\Models\Basket;

class CheckoutController extends Controller
{

    public function show()
    {
        // Get the authenticated user
        $user = auth()->user();
        // Get the basket of the authenticated user
        if ($user) {
            $basket = Basket::where('user_id', $user->id)->first();
            if ($basket) {
                // Optionally get the basket items of the basket if the basket exists
                $basketItems = optional($basket)->items;

                if ($basketItems) {
                    // Variable for the total price of the basket
                    $totalPrice = 0;
                    // Variable to keep track of the number of items in the basket (including the quantity of each item)
                    $itemCount = 0;
                    foreach ($basketItems as $basketItem) {
                        // For each item in the basket, add the price of the product multiplied by the quantity to the total price
                        $totalPrice += $basketItem->product->selling_price * $basketItem->quantity;
                        $itemCount += $basketItem->quantity;
                    }
                    return view('checkout.show', compact('basketItems', 'totalPrice', 'itemCount')); //* Pass the basket items to the view as well as the total price
                } else {
                    return redirect()->back()->with('error', 'You do not have any items in your basket');
                    //! Redirect to the previous page and displays an error message that the user does not have any items in their basket
                }
            } else {
                return redirect()->back()->with('error', 'Basket is empty!');
                //! Redirect to the basket and display an error message that the user does not have a basket
            }
        } else {
            //! Redirect to the login page if the user is not authenticated
            return redirect()->route('login')->with('error', 'Login to view your basket');
        }
    }
}
