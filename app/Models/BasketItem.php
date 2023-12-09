<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    use HasFactory;

    //protected $table = 'basket_items'; // Table name

    protected $fillable = ['basket_id', 'product_id', 'quantity']; // Fillable fields

    public function basket()
    {
        return $this->BelongsTo(Basket::class);
        // Many basket items belong to one basket
        // Many to one relationship
    }

    public function product()
    {
        return $this->BelongsTo(Product::class);
        // Many products belong to one basket item (quantity)
        // Many to one relationship
    }
}


