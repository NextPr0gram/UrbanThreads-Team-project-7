<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

/**
 ** Class OrderController
 *? The order controller is responsible for showing the user's orders and cancelling an order
 */
class OrderController extends Controller
{
    //* Shows the user's orders
    public function show()
    {
        // Get the authenticated user
        $user = auth()->user();
        // Get the orders of the authenticated user
        if ($user) {
            $orders = Order::where('user_id', $user->id)->get();
            // If the user has orders, return the view with the orders
            if ($orders) {
                return view('profile.orders', compact('orders'));
            } else {
                // Otherwise, return the view with an error message
                return view('profile.order-history')->with('error', 'You do not have any orders');
            }
        } else {
            // If the user isn't authenticated, then redirect to the login page with an error message
            return redirect()->route('login')->with('error', 'Login to view your basket');
        }
    }

    //* Cancels an order if it has not been dispatched or delivered (status is checked in the view)
    public function cancel($id)
    {
        // Get the order if it exists
        $order = Order::findOrFail($id);
        // Increment the stock of the products in the order
        $orderItems = $order->items;
        foreach ($orderItems as $orderItem) {
            $orderItem->variation->increment('stock', $orderItem->quantity);
        }
        // Change order status to Cancelled
        $order->status = 'Cancelled';
        // Save the order
        $order->save();
        // Redirect back with a success message
        return redirect()->route('profile.orders')->with('success', 'Order cancelled successfully');
    }

    //* Allows a user to return an order
    public function return($id)
    {
        // Get the order if it exists
        $order = Order::findOrFail($id);
        // Increment the stock of the products in the order
        $orderItems = $order->items;
        foreach ($orderItems as $orderItem) {
            $orderItem->variation->increment('stock', $orderItem->quantity);
        }
        // Change order status to Returned
        $order->status = 'Returned';
        // Save the order
        $order->save();
        // Redirect back with a success message
        return redirect()->route('profile.orders')->with('success', 'Order returned successfully');
    }

    //* Shows a single order
    public function showSingleOrder($id)
    {
        // Get the order if it exists
        $order = Order::findOrFail($id);
        // Return the view with the order
        return view('profile.view-order', compact('order'));
    }
}
