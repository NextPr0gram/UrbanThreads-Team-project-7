<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;
use App\Models\BasketItem;

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
    public function addToBasket($productId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // If the user isn't logged in, they are redirected to a page that allows them to login, register or continue shopping
        // They are also shown an error message saying that they must be logged in to add items to their basket
        if (!$user) {
            return redirect()->route('not-authenticated')->with('error', 'You must be logged in to add items to your basket.');
        }

        // Find or create the basket for the user
        $basket = Basket::firstOrCreate(['user_id' => $user->id]);

        // Find the product
        $product = Product::findOrFail($productId);

        // Check if the product is already in the basket
        $existingBasketItem = BasketItem::where('basket_id', $basket->id)
            ->where('product_id', $product->id)
            ->first();

        if ($existingBasketItem) {
            // Increment the quantity of the existing basket item
            $existingBasketItem->quantity += 1;
            // Save the existing basket item
            $existingBasketItem->save();
        } else {
            // Add the product to the basket
            $basketItem = BasketItem::create([
                'basket_id' => $basket->id, // The basket ID is the ID of the basket that was found or created for the user
                'product_id' => $product->id, // The product ID is the ID of the product that was added to the basket
                'quantity' => 1,
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

        // Find the product
        $product = Product::findOrFail($productId);

        // Find the basket item
        $basketItem = BasketItem::where('basket_id', $basket->id)
            ->where('product_id', $product->id)
            ->first();

        // Removes the item from the basket
        $basketItem->delete();

        // Redirect to the basket page with a success message to reflect changes
        return redirect()->back()->with('success', 'Item(s) removed from the basket.');
    }
}
