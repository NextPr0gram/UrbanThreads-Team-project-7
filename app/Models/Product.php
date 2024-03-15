<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
