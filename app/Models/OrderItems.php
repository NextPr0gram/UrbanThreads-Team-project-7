<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'basket_item_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function basketItem()
    {
        return $this->belongsTo(BasketItem::class);
    }

}
