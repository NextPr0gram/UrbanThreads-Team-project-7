<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\Product;

class ReviewsController extends Controller
/**
 * Responsible for actions related to reviews
 */

{
    //this will store a new review created
    public function store(Request $request, $productId)
{
 
 //dd($request->all()); //check request
    // Get the authenticated user
    $user = auth()->user();

    // If the user isn't logged in, redirect to login page
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to add items to your basket.');
    }

//RATING IS ISSUEEE

      $validatedData = $request->validate([
        'rating'=> 'required',
        'description' => 'required',
        ]); 

       // Create new review with product and user ID
       //used Model name
        $newReviews = Reviews::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'rating' => $validatedData['rating'],
            'description' => $validatedData['description'],

        ]);

        // Redirect to product page for that product
        return redirect()->back()->with('success', 'Review submitted successfully');
}


    }