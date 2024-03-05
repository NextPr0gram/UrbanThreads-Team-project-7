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
 
  // dd($request->all()); //check request
    // Get the authenticated user
    $user = auth()->user();

    // If the user isn't logged in, redirect to login page
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to add items to your basket.');
    }

    try {
        //Error is not the route as catch statement works
        //$request is processed and printed so problemis definitely create
        //Might be the validation of incoming data
        //Maybe be a problem with fields
        // Validate incoming data for review 
//RATING IS ISSUEEE
//this is still issue
      $validatedData = $request->validate([
        'rating' => 'required|integer|min:1|max:255',
        'title' => 'required|string|max:255',
        'user_name' => 'required|string|max:255',
        'description' => 'required|string',
        //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]); 

       // Create new review with product and user ID
       //used Model name
        $newReviews = Reviews::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'title' => $validatedData['title'],
            'user_name' => $validatedData['user_name'],
            'description' => $validatedData['description'],
            'rating' => $validatedData['rating'],
           // 'image' => $imagePath = $request->file('image')->store('images'),
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