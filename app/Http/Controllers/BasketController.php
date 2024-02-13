<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use App\Models\Discount;

/**
 ** Made by Kishan Jethwa
 */

/**
 *? The basket controller is responsible for showing the user's basket and deleting the user's basket
 *? Basket creation is handled by the basket item controller
 */

class BasketController extends Controller
{
    //* Show the user's basket
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
                $discountAmount = $basket->discount_amount;

                //? If the basket has items, calculate the total price of the basket items and pass the basket items and total price to the basket view
                if (count($basketItems) > 0) {
                    // Calculate the total price of the basket items
                    $subTotal = 0.00;
                    $totalAmount = 0.00;
                    foreach ($basketItems as $basketItem) {
                        // For each item in the basket, add the price of the product multiplied by the quantity to the total price
                        $subTotal += $basketItem->product->selling_price * $basketItem->quantity;
                    }
                    $basket->total_amount = $subTotal - $discountAmount;
                    $basket->save();
                    $totalAmount = $subTotal - $discountAmount;
                    return view('basket.show', compact('basketItems', 'subTotal', 'totalAmount', 'discountAmount')); //* Pass the basket items to the view as well as the total price
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

    //* Delete the user's basket
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
            return redirect()->route('home')->with('success', 'Basket cleared');
        } else {
            //! Redirect to the login page if the user is not authenticated
            return redirect()->route('login')->with('error', 'Register to view your basket');
        }
    }

    //* Apply a discount to the user's basket
    public function validateDiscount(Request $request) {
        // Get the authenticated user
        $user = auth()->user();
        // Get the basket of the authenticated user
        if ($user) {
            $basket = Basket::where('user_id', $user->id)->first();
            // Get the discount code from the request
            $discountCode = $request->input('discount_code');
            // Get the discount from the database
            $discount = Discount::where('code', $discountCode)->first();
            // If the discount exists, apply the discount to the basket
            if ($discount) {
                if($discount->uses >= $discount->max_uses) {
                    //! Redirect to the basket and display an error message that the discount has been used the maximum number of times
                    return redirect()->back()->with('error', 'Discount has been used the maximum number of times');
                } else if($discount->valid_from > now() || $discount->valid_to < now()) {
                    //! Redirect to the basket and display an error message that the discount is not valid
                    return redirect()->back()->with('error', 'Discount is not valid');
                } else if($basket->discount_amount > 0) {
                    //! Redirect to the basket and display an error message that the discount has already been applied
                    return redirect()->back()->with('error', 'Discount has already been applied');
                } else {
                    $discount->uses += 1;
                    $discount->save();
                }
            }
            if ($discount) {
                if($discount->type == 'fixed') {
                    $basket->discount_amount = $discount->value;
                    $basket->save();
                } else if($discount->type == 'percentage') {
                    $basket->discount_amount = $basket->total_amount * $discount->percentage;
                    $basket->save();
                }
                //* Redirect to the basket and display a success message that the discount was applied
                return redirect()->back()->with('success', 'Discount applied')->with('discountAmount', $basket->discount_amount);
            } else {
                //! Redirect to the basket and display an error message that the discount does not exist
                return redirect()->back()->with('error', 'Discount does not exist');
            }
        } else {
            //! Redirect to the login page if the user is not authenticated
            return redirect()->route('login')->with('error', 'Register to view your basket');
        }
    }
}
