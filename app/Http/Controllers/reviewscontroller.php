<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
/*
* Display reviews made
*/
{
    public function display()
    {
        return view('reviews');
    }
    //routes need to be added
}
