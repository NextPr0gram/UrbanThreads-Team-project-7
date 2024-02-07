<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'title', 'description', 'image', 'rating'];
       // product id and user id should be fetched
       //In the controllers
}
