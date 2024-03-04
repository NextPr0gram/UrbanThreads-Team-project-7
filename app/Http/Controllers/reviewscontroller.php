<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reviews;
use App\Models\Product;

class ReviewsController extends Controller
/**
 * Responsible for actions related to reviews
 */

{
    //this will store a new review created
    public function store(Request $request, $productId)
{
    // Get the authenticated user
    $user = auth()->user();

    // If the user isn't logged in, redirect to login page
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to add items to your basket.');
    }

    try {
        //Error is not the route
        //Might be the validation of incoming data
        //Maybe be a problem with fields
        // Validate incoming data for review 

      $validatedData = $request->validate([
            'rating' => 'required|integer|min:0|max:255',
            'description' => 'required|string',
        ]); 
        
        // Create new review with product and user ID
        $newReview = Reviews::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'description' => $validator['description'],
            'rating' => $validator['rating'],
        ]);

        // Redirect to product page for that product
        return redirect()->back()->with('success', 'Review submitted successfully');

    } catch (\Exception $e) {
        // Log the error
        logger()->error('Error creating review: ' . $e->getMessage());

        // Redirect back with error message
        return redirect()->back()->with('error', 'An error occurred while submitting the review. Please try again later.');
    }
}

    }