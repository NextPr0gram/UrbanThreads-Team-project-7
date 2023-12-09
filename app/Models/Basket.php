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
    protected $fillable = ['user_id'];

    public function items()
    {
        return $this->hasMany(BasketItem::class);
        // Establishes a one-to-many relationship between the basket and basket_items tables
        // Means that 1 basket can have many basket items
    }
}
