<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
       'user_id', 'product_id', 'description',  'rating' ];

       // One review for one product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
//
