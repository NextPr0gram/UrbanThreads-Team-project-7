<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/*
*made by Neha Kerung
*/

class Wishlists extends Model
{
    use HasFactory;
    protected $table = 'wishlists';

    protected $fillable = ['user_id'];

    public function items()
    {
        return $this->hasMany(WishlistItems::class);
        //1 to many relationship wishlist and its items
    }
}
