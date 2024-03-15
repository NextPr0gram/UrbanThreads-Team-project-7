<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Discount;
use App\Models\Product;

/**
 ** Class CheckoutController
 *? The checkout controller is responsible for showing the user's basket on the checkout page and placing the order
 */
class CheckoutController extends Controller
{

    //* Show the user's basket on the checkout page
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
                    $totalAmount = $basket->total_amount;
                    // Variable for the subtotal of the basket
                    $subTotal = $totalAmount + $basket->discount_amount;
                    // Variable for the discount amount of the basket
                    $discountAmount = $basket->discount_amount;
                    // Variable to keep track of the number of items in the basket (including the quantity of each item)
                    $itemCount = 0;
                    foreach ($basketItems as $basketItem) {
                        // For each item in the basket, add the quantity to the item count
                        $itemCount += $basketItem->quantity;
                    }
                    return view('checkout.show', compact('basketItems', 'subTotal', 'totalAmount', 'itemCount', 'discountAmount')); //* Pass the basket items to the view as well as the total price
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

    //* Handles placing the order. Handles the checkout form validation and creates the order if the form is valid
    public function placeOrder(Request $request)
    {
        //* Checkout form validation
        $validated = $request->validate([
            // Name fields
            'first_name' => 'required',
            'last_name' => 'required',
            // Address fields
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'county' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            // Payment fields
            'card_number' => 'required|digits:16',
            'expiry_date' => 'required|date_format:m/y',
            'security_code' => 'required|digits:3',
            'cardholder_name' => 'required'
        ]);

        // Get the authenticated user
        $user = auth()->user();
        // Get the basket of the authenticated user
        $basket = Basket::where('user_id', $user->id)->first();
        // Get the items in the basket
        $basketItems = $basket->items;
        // Calculate the total amount of the order
        $totalAmount = $basket->total_amount;
        $itemCount = 0;
        foreach ($basketItems as $basketItem) {
            $itemCount += $basketItem->quantity;
        }

        // Get the address from the database if it exists
        $address = Address::where('address_line_1', $request->address_line_1)
            ->where('address_line_2', $request->address_line_2)
            ->where('city', $request->city)
            ->where('county', $request->county)
            ->where('postcode', $request->postcode)
            ->first();
        // If the address exists, get the ID of the address
        if ($address) {
            $addressId = $address->id;
            // Otherwise, create the address and get the ID of the address
        } else {
            $newAddress = Address::create([
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'city' => $request->city,
                'county' => $request->county,
                'postcode' => $request->postcode,
            ]);
            $addressId = $newAddress->id;
        }

        // Create an order
        $newOrder = Order::create([
            'user_id' => $user->id,
            'total' => $totalAmount,
            'address_id' => $addressId,
        ]);
        // Iterate through the items in the basket
        foreach ($basketItems as $basketItem) {
            // Create an order item for each item in the basket
            OrderItems::create([
                'order_id' => $newOrder->id,
                'product_id' => $basketItem->product_id,
                'quantity' => $basketItem->quantity,
                'variation_id' => $basketItem->variation_id
            ]);
            // Decrement the stock of the variation by the quantity of the basket item
            $basketItem->variation->decrement('stock', $basketItem->quantity);

            //this finds the productID for the product which has been bought
            $product = Product::findOrFail($basketItem->product_id);
            //this increments the sales column for the item whihc has been bought 
            $product->increment('sales', $basketItem->quantity);
        }
        // Get the order that was just created
        $order = Order::where('id', $newOrder->id)->first();
        // Get the items in the order
        $orderItems = optional($order)->items;
    
        // Delete the basket
        $basket->delete();
        // Returns the page that tells the user that the order has been placed and sends the order items,  total amount and item count
        return view('checkout.success', compact('orderItems', 'totalAmount', 'order', 'itemCount'));
    }
}
