<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;
use App\Models\BasketItem;
use App\Models\ProductVariation;

/**
 ** Made by Kishan Jethwa
 */

//? The basket item controller is responsible for creating the user's basket, as well as adding and removing items from the user's basket

class BasketItemController extends Controller
{

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

        if($variation->stock <= 0) {
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
}
