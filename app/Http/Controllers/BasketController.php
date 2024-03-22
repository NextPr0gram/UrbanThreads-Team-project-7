<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;
use App\Models\BasketItem;
use App\Models\ProductVariation;
use App\Models\Order;

/**
 ** Made by Kishan Jethwa
 */

/**
 *? The basket controller is responsible for:
 *? showing the user's basket
 *? deleting the user's basket
 *? adding a product to the user's basket
 *? removing a product from the user's basket
 *? incrementing/decrementing the quantity of a product in the user's basket
 *? applying a discount to the user's basket
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
                //? If the basket has items, calculate the total price of the basket items and pass the basket items and total price to the basket view
                if (count($basketItems) > 0) {
                    // Calculate the total price of the basket items
                    $subTotal = $basket->calculateTotalAmount();
                    $basket->total_amount = $subTotal;
                    // If there is a discount applied to the basket, calculate the discount amount
                    if ($basket->discount_id != null) {
                        // Get the discount
                        $discount = Discount::findOrFail($basket->discount_id);
                        $discountCode = $discount->code;
                        // If the discount is a fixed discount, set the discount amount to the value of the discount
                        if ($discount->type == 'fixed') {
                            $discountAmount = $discount->value;
                            // If the discount is a percentage discount, calculate the discount amount as a percentage of the total price
                            $basket->discount_amount = $discountAmount;
                            $basket->save();
                        } else if ($discount->type == 'percentage') {
                            $discountAmount = $subTotal * $discount->value / 100;
                            $basket->discount_amount = $discountAmount;
                            $basket->save();
                        }
                    } else {
                        $discountCode = null;
                        $discountAmount = 0;
                        $basket->save();
                    }
                    $totalAmount = $subTotal - $discountAmount;
                    $basket->save();
                    return view('basket.show', compact('basketItems', 'subTotal', 'totalAmount', 'discountAmount', 'discountCode')); //* Pass the basket items to the view as well as the total price
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
    public function validateDiscount(Request $request)
    {
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
                // Check if the discount has already been applied to the basket
                if ($basket->discount_amount > 0) {
                    //! Redirect to the basket and display an error message that the discount has already been applied
                    return redirect()->back()->with('error', 'A discount has already been applied. Remove the discount to apply a new one.');
                }
                // If the discount has a maximum number of uses, check if the discount has been used the maximum number of times
                else if ($discount->max_uses != null) {
                    if ($discount->uses >= $discount->max_uses) {
                        //! Redirect to the basket and display an error message that the discount has been used the maximum number of times
                        return redirect()->back()->with('error', 'Discount has been used the maximum number of times. Please try another discount code.');
                    }
                }
                // If the discount has a valid from and valid to date, check if the current date is within the valid from and valid to date
                else if ($discount->valid_from != null && $discount->valid_to != null) {
                    if ($discount->valid_from > now() || $discount->valid_to < now()) {
                        //! Redirect to the basket and display an error message that the discount is not valid
                        return redirect()->back()->with('error', 'Discount is not valid. Please try another discount code.');
                    }
                } else {
                    $discount->uses += 1;
                    $discount->save();
                }
            }
            if ($discount) {
                // If the discount code is 'FIRSTORDER', check if the user has already placed an order
                if ($discountCode == "FIRSTORDER") {
                    if (Order::where('user_id', $user->id)->count() > 0) {
                        return redirect()->back()->with('error', 'You are not eligible for this discount');
                    } else {
                        // If the user has not placed an order, apply the discount of 10% to the basket
                        $basket->discount_amount = $basket->total_amount * $discount->value / 100;
                        $basket->discount_id = $discount->id;
                        $basket->save();
                    }
                    // Check if the discount type is fixed
                } else if ($discount->type == 'fixed') {
                    // Check if the total amount of the basket is less than the value of the discount code and display an error message
                    if ($basket->total_amount < $discount->value) {
                        return redirect()->back()->with('error', 'Discount cannot be applied as the total amount is less than the discount value');
                    }
                    // Apply the discount to the basket if the total amount of the basket is greater than or equal to the value of the discount code
                    $basket->discount_amount = $discount->value;
                    $basket->discount_id = $discount->id;
                    $basket->save();
                // Check if the discount type is percentage
                } else if ($discount->type == 'percentage') {
                    // Apply the discount to the basket as a percentage of the total amount
                    $basket->discount_amount = $basket->total_amount * $discount->value / 100;
                    $basket->discount_id = $discount->id;
                    $basket->save();
                }
                //* Redirect to the basket and display a success message that the discount was applied with the discount code
                return redirect()->route('basket.show')->with('success', 'Discount applied: ' . $discountCode);
            } else {
                //! Redirect to the basket and display an error message that the discount does not exist
                return redirect()->back()->with('error', 'This discount code does not exist. Please try another discount code.');
            }
        } else {
            //! Redirect to the login page if the user is not authenticated
            return redirect()->route('login')->with('error', 'Register to view your basket');
        }
    }

    /**
     * Add a product to the user's basket
     * If the user doesn't have a basket, create one
     * If the product is already in the basket, increment the quantity
     * If the product is not in the basket, create a new basket item
     */
    public function addToBasket(Request $request, $productId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // If the user isn't logged in, they are redirected to a page that allows them to login, register or continue shopping
        // They are also shown an error message saying that they must be logged in to add items to their basket
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to your basket.');
        }

        // Find the product
        $product = Product::findOrFail($productId);

        // Get the variation of the product
        $variation = ProductVariation::findOrFail($request->input('size'));

        if ($variation->stock <= 0) {
            return redirect()->back()->with('error', 'This variant of the product is out of stock.');
        }

        // Find or create the basket for the user
        $basket = Basket::firstOrCreate(['user_id' => $user->id]);

        // Check if the product is already in the basket
        $existingBasketItem = BasketItem::where('basket_id', $basket->id)
            ->where('product_id', $product->id)
            ->where('variation_id', $variation->id)
            ->first();

        if ($existingBasketItem) {
            // Increment the quantity of the existing basket item
            $existingBasketItem->quantity += 1;
            // Save the existing basket item
            $existingBasketItem->save();
        } else {
            // Add the product to the basket
            BasketItem::create([
                'basket_id' => $basket->id, // The basket ID is the ID of the basket that was found or created for the user
                'product_id' => $product->id, // The product ID is the ID of the product that was added to the basket
                'quantity' => 1,
                'variation_id' => $variation->id
            ]);
        }

        // Redirect to the basket page with a success message to reflect changes
        return redirect()->route('basket.show')->with('success', 'Item(s) added to the basket.');
    }

    /**
     * Remove a product from the user's basket
     * If the quantity of the basket item is 0, delete the basket item
     * Otherwise, decrement the quantity of the basket item
     */
    public function removeFromBasket($productId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Find the basket for the user
        $basket = Basket::where('user_id', $user->id)->first();

        // Optionally get the basket items of the basket if the basket exists
        $basketItems = optional($basket)->items;

        // Find the product
        $product = Product::findOrFail($productId);

        // Find the basket item
        $basketItem = BasketItem::where('basket_id', $basket->id)
            ->where('product_id', $product->id)
            ->first();

        if (count($basketItems) == 1) {
            // Removes the item from the basket
            $basketItem->delete();
            // Deletes the basket
            $basket->delete();
            // Redirect to the homepage with a success alert saying that all items have been removed from the basket
            return redirect()->route('home')->with('success', 'All items removed from the basket.');
        } else {
            // Removes the item from the basket
            $basketItem->delete();
            // Otherwise, redirect back to the basket page with a success alert saying that an item has been removed from the basket
            return redirect()->route('basket.show')->with('success', 'Item(s) removed from basket.');
        }
    }

    public function incrementQuantity(Request $request, $productId, $variationId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Find the basket for the user
        $basket = Basket::where('user_id', $user->id)->first();

        // Find the product
        $product = Product::findOrFail($productId);
        $variation = ProductVariation::findOrFail($variationId);

        // Find the basket item
        $basketItem = BasketItem::where('basket_id', $basket->id)
            ->where('product_id', $product->id)
            ->where('variation_id', $variation->id)
            ->first();

        // Check if the quantity of the basket item exceeds the stock of the product
        if ($basketItem->quantity >= $variation->stock) {
            // Redirect back without updating the quantity and show an error message
            return redirect()->back()->with('error', 'The quantity of the product cannot exceed the stock.');
        }

        // Update the quantity of the basket item
        $basketItem->quantity += 1;
        // Save the basket item
        $basketItem->save();

        // Redirect to the basket page with a success message to reflect changes
        return redirect()->back()->with('success', 'Quantity updated');
    }

    public function decrementQuantity($productId, $variationId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Find the basket for the user
        $basket = Basket::where('user_id', $user->id)->first();

        // Find the product
        $product = Product::findOrFail($productId);

        // Find the variation
        $variation = ProductVariation::findOrFail($variationId);

        // Find the basket item
        $basketItem = BasketItem::where('basket_id', $basket->id)
            ->where('product_id', $product->id)
            ->where('variation_id', $variation->id)
            ->first();

        if ($basketItem) {
            // Update the quantity of the basket item
            $basketItem->quantity -= 1;
            // Update the discount amount


            if ($basketItem->quantity <= 0) {
                // Remove the item from the basket if the quantity is zero or negative
                $basketItem->delete();

                if (count($basket->items) == 0) {
                    // Redirect to the home page if the basket is empty
                    return redirect()->route('home')->with('success', 'All items removed from the basket.');
                }

                // Redirect to the basket page with a success message to reflect changes
                return redirect()->route('basket.show')->with('success', 'Item removed from the basket.');
            }

            // Save the basket item
            $basketItem->save();

            // Redirect to the basket page with a success message to reflect changes
            return redirect()->route('basket.show')->with('success', 'Quantity updated');
        }
    }

    // Removes the discount from the basket
    public function removeDiscount()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Find the basket for the user
        $basket = Basket::where('user_id', $user->id)->first();

        // Find the discount
        $discount = Discount::findOrFail($basket->discount_id);

        // Remove the discount from the basket
        $basket->discount_amount = 0;
        $basket->discount_id = null;
        $basket->save();

        // Decrement the uses of the discount
        $discount->uses -= 1;
        $discount->save();

        // Redirect to the basket page with a success message to reflect changes
        return redirect()->route('basket.show')->with('success', 'Discount removed');
    }
}
