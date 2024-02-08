<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
    protected $table = 'contactform';
    protected $fillable = ['FirstName', 'LastName', 'email', 'order_id', 'subject', 'message'];

}
