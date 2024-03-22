<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 ** Made by Kishan Jethwa
 */

class Basket extends Model
{
    use HasFactory;

    protected $table = 'baskets'; // Table name

    // The user id is a fillable field as it is required when creating a basket
    protected $fillable = ['user_id', 'total_amount', 'discount_amount', 'discount_id'];

    public function items()
    {
        return $this->hasMany(BasketItem::class);
        // Establishes a one-to-many relationship between the basket and basket_items tables
        // Means that 1 basket can have many basket items
    }

    // A basket can have a discount code
    public function discount()
    {
        return $this->belongsTo(Discount::class);
        // Establishes a one-to-one relationship between the basket and discount_codes tables
        // Means that 1 basket can have 1 discount code
    }

    // Calculate the total amount of the basket
    public function calculateTotalAmount()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantity * $item->product->selling_price;
        }

        return $total;
    }
}
