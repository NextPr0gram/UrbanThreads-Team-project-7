<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders"; // Table name

    protected $fillable = ['user_id', 'total', 'address_id']; // The user id is a fillable field as it is required when creating an order

    // The order belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The order has many items
    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }

    // The order has one address
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    // Get order details
    public function getOrderDetails()
    {
        $orderItems = $this->items;
        $orderDetails = "";
        foreach ($orderItems as $item) {
            $orderDetails .= "Item " . $item->id . ":<br>";
            $orderDetails .= "Product: " . $item->product->name . "<br>";
            $orderDetails .= "Variation: " . $item->variation->size . "<br>";
            $orderDetails .= "Quantity: " . $item->quantity . "<br>";
            $orderDetails .= "Price: " . $item->product->selling_price . "<br>";
            $orderDetails .= "<br>";
        }
        return $orderDetails;
    }
}
