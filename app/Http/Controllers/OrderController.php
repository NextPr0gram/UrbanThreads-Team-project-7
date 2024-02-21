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
        $orders = Order::where('user_id', $user->id)->get();
        // If the user has orders, return the view with the orders
        if ($orders) {
            return view('profile.orders', compact('orders'));
        } else {
            // Otherwise, return the view with an error message
            return view('profile.order-history')->with('error', 'You do not have any orders');
        }
    }

    //* Deletes an order if it has not been dispatched or delivered
    public function cancel($id)
    {
        // Get the order if it exists
        $order = Order::findOrFail($id);
        // If the order has been dispatched or delivered, redirect back with an error message
        if ($order->status == 'dispatched' || $order->status == 'delivered') {
            return redirect()->route('profile.orders')->with('error', 'You cannot delete an order that has been dispatched or delivered');
        } else {
            // Otherwise, delete the order and redirect back with a success message
            $order->delete();
            return redirect()->route('profile.orders')->with('success', 'Order deleted successfully');
        }
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
