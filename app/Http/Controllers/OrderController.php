<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //* Shows the user's orders
    public function show() {
        // Get the authenticated user
        $user = auth()->user();
        // Get the orders of the authenticated user
        if ($user) {
            $orders = Order::where('user_id', $user->id)->get();
            // If the user has orders, return the view with the orders
            if ($orders) {
                return view('order.show', compact('orders'));
            } else {
                // Otherwise, redirect back with an error message
                return redirect()->back()->with('error', 'You do not have any orders');
            }
        } else {
            // If the user isn't authenticated, redirect to the login page with an error message
            return redirect()->route('login')->with('error', 'Login to view your orders');
        }
    }

    //* Deletes an order if it has not been dispatched or delivered
    public function cancel($id) {
        // Get the order if it exists
        $order = Order::findOrFail($id);
        // If the order has been dispatched or delivered, redirect back with an error message
        if($order->status == 'dispatched' || $order->status == 'delivered') {
            return redirect()->back()->with('error', 'You cannot delete an order that has been dispatched or delivered');
        } else {
            // Otherwise, delete the order and redirect back with a success message
            $order->delete();
            return redirect()->back()->with('success', 'Order deleted successfully');
        }
    }
}
