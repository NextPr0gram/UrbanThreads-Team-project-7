<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wishlists;
use App\Models\Review;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'c2_id',
        'name',
        'image',
        'slug',
        'description',
        'original_price',
        'selling_price',
        'meta_description',
        'meta_keywords',

    ];

    // A product has many variations
    public function variations() {
        return $this->hasMany(ProductVariation::class);
    }

    // Product has many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Checks if a product is in the wishlist
    public function inWishlist()
    {
        // Get the authenticated user
        $user = auth()->user();

        // If the user is authenticated
        if ($user) {
            // Get the wishlist of the authenticated user
            $wishlist = Wishlists::where('user_id', $user->id)->first();

            // If the wishlist exists
            if ($wishlist) {
                // Check if the product is in the wishlist
                return $wishlist->items->contains('product_id', $this->id);
            }
        }

        return false;
    }
}
