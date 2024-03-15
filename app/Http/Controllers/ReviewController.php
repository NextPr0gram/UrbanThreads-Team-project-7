<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\Product;

class ReviewController extends Controller
/**
 * Responsible for actions related to reviews
 */

{
    //this will store a new review created
    public function store(Request $request, $productId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // If the user isn't logged in, redirect to login page with an error message
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add a review to a product.');
        }

        // Validate the data
        $validatedData = $request->validate([
            'rating' => 'required',
            'description' => 'required',
        ]);

        // Create new review with product and user IDs and validated data
        $newReviews = Reviews::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'rating' => $validatedData['rating'],
            'description' => $validatedData['description'],

        ]);

        // Redirect back to the product page with a success message
        return redirect()->back()->with('success', 'Review submitted successfully');
    }

    //! Moved code in show method to the showProduct method in the ProductController
}
