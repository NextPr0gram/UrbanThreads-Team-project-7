<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders"; // Table name

    protected $fillable = ['user_id', 'total', 'address_id', 'discount_amount']; // The user id is a fillable field as it is required when creating an order

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

    // Get order items
    public function getOrderItems()
    {
        $orderItems = $this->items;
        $orderDetails = "";
        $itemCounter = 1;
        foreach ($orderItems as $item) {
            $orderDetails .= "Item " . $itemCounter . ":<br>";
            $orderDetails .= "Product: " . $item->product->name . "<br>";
            $orderDetails .= "Variation: " . $item->variation->size . "<br>";
            $orderDetails .= "Quantity: " . $item->quantity . "<br>";
            $orderDetails .= "Price: " . $item->product->selling_price . "<br>";
            $orderDetails .= "<br>";
            $itemCounter++;
        }
        return $orderDetails;
    }

    // Get total number of items in the order
    public function getTotalItems()
    {
        $orderItems = $this->items;
        $totalItems = 0;
        foreach ($orderItems as $item) {
            $totalItems += $item->quantity;
        }
        return $totalItems;
    }

    // Get the shipping information of the order
    public function getShippingInfo()
    {
        $shippingInfo = "";
        $shippingInfo .= "Address: " . $this->address->address_line_1 . "<br>";
        if ($this->address->address_line_2) {
            $shippingInfo .= "Address: " . $this->address->address_line_2 . "<br>";
        }
        $shippingInfo .= "City: " . $this->address->city . "<br>";
        $shippingInfo .= "County: " . $this->address->county . "<br>";
        $shippingInfo .= "Postcode: " . $this->address->postcode . "<br>";
        return $shippingInfo;
    }
}
