<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Made by Neha Kerung - based of basketItems.php
 */

class WishlistItems extends Model
{
    use HasFactory;
    protected $table = 'wishlist_items';
    protected $fillable =['user_id', 'wishlists_is', 'product_id'];

    public function wishlist()
    {
        return $this->BelongsTo(wishlist::class);
        // Many to one relationship - many wishlist items to one wishlist
    }

    public function product()
    {
        return $this->BelongsTo(Product::class);
        // Many to one relationship products belong to one wishlist item 
    }
}
