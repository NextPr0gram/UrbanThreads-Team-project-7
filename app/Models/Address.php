<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'city',
        'county',
        'postcode',
    ];
}
