<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(){
             // Get the authenticated user  
     $user = auth()->user();

     // Get the user's basket and associated items
     $basket = Basket::where('user_id', $user->id)->first();
     $basketItems = optional($basket)->items;
 
     // Check if the basket exists and has items
     if ($basketItems && count($basketItems) > 0) {
         // Calculate the total price of the basket items
         $totalAmount = 0;
         foreach ($basketItems as $basketItem) {
             // For each item in the basket, add the price of the product multiplied by the quantity to the total amount
             $totalAmount += $basketItem->product->selling_price * $basketItem->quantity;
         }
 
         // Create a new order for the user
         $order = Order::create([
             'user_id' => $user->id,
             'basket_id' => $basket->id,
             'total_amount' => $totalAmount,
         ]);
 
         // Move basket items to order items
         foreach ($basketItems as $basketItem) {
             OrderItem::create([
                 'order_id' => $order->id,
                 'product_id' => $basketItem->product_id,
                 'quantity' => $basketItem->quantity,
                 'unit_price' => $basketItem->product->selling_price,
             ]);
         }
 
         // Clear the user's basket
         $basket->delete();
 
         return redirect()->route('order.show', ['id' => $order->id])->with('success', 'Order placed successfully');
     } else {
         return redirect()->route('basket.show')->with('error', 'Cannot create an order without items in the basket');
     }
 }
 
 public function show($id)
 {
     // Retrieve and show the details of a specific order
     $order = Order::findOrFail($id);
     $orderItems = $order->items;
 
     return view('order.show', compact('order', 'orderItems'));
 
 }
}
