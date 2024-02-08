<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'percentage',
        'uses',
        'max_uses',
        'valid_from',
        'valid_to'
    ];

    protected $casts = [
        'valid_from' => 'datetime',
        'valid_to' => 'datetime'
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
