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
            // Optionally get the basket items of the basket if the basket exists
            $basketItems = optional($basket)->items;

            // Calculate the total price of the basket items
            $totalPrice = 0;
            foreach ($basketItems as $basketItem) {
                // For each item in the basket, add the price of the product multiplied by the quantity to the total price
                $totalPrice += $basketItem->product->selling_price * $basketItem->quantity;
            }

            if ($basketItems) {
                return view('checkout.show', compact('basketItems', 'totalPrice')); //* Pass the basket items to the view as well as the total price
            } else {
                return redirect()->back()->with('error', 'You do not have a basket');
                //! Redirect to the basket and display an error message that the user does not have a basket
            }
        } else {
            //! Redirect to the login page if the user is not authenticated
            return redirect()->route('login')->with('error','Register to view your basket');
        }
    }
}
