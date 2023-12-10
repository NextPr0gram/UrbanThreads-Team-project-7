<?php

namespace App\Http\Controllers;

use App\Models\Basket;

/**
 ** Made by Kishan Jethwa
 */

/**
 *? The basket controller is responsible for showing the user's basket and deleting the user's basket
 *? Basket creation is handled by the basket item controller
 */

class BasketController extends Controller
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
                    // Calculate the total price of the basket items
                    $totalPrice = 0;
                    foreach ($basketItems as $basketItem) {
                        // For each item in the basket, add the price of the product multiplied by the quantity to the total price
                        $totalPrice += $basketItem->product->selling_price * $basketItem->quantity;
                    }
                    return view('basket.show', compact('basketItems', 'totalPrice')); //* Pass the basket items to the view as well as the total price
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

    public function destroy()
    {
        // Get the authenticated user
        $user = auth()->user();
        // Get the basket of the authenticated user
        if ($user) {
            $basket = Basket::where('user_id', $user->id)->first();
            // Delete the basket
            $basket->delete();
            //* Redirect to the basket and display a success message that the basket was deleted
            return redirect()->route('home')->with('success', 'Basket deleted');
        } else {
            //! Redirect to the login page if the user is not authenticated
            return redirect()->route('login')->with('error', 'Register to view your basket');
        }
    }
}
