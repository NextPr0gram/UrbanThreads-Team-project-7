<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discount_codes';

    protected $fillable = [
        'code',
        'type',
        'value',
        'uses',
        'max_uses',
        'valid_from',
        'valid_to'
    ];

    public function findByCode(string $code)
    {
        return $this->where('code', $code)->first();
    }

    public function discount($total) {
        if($this->type === 'fixed') {
            return $this->value;
        } else if($this->type === 'percentage') {
            return $total * $this->percentage;
        } else {
            return 0;
        }
    }
}
