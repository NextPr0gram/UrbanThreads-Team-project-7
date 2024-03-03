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

    public function showReviews($productId)
{
    $product = Product::findOrFail($productId);
    // Fetch reviews for the product using $productId
    $reviews = $product->reviews; // Assuming you have a relationship set up
    return view('reviews.index', compact('product', 'reviews'));
}

    //this will store a new review created
    public function store(Request $request)
    {
    // Get the authenticated user
    $user = auth()->user();

    // If the user isn't logged in, they are redirected to a page that allows them to login, register or continue shopping
    // They are also shown an error message saying that they must be logged in to add items to their basket
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to add items to your basket.');
    }
    //Not working
    try {
               // Get the product ID from the request
        $product_id = $request->product_id;


// Validate incoming data for review
$validatedData = $request->validate([
    'rating' => 'required|integer|min:0|max:255',
    'description' => 'required|string',
]);
 // Create new review with product and user ID
 $reviews = Reviews::create([
    'user_id' => $user->id,
    'product_id' => $product_id,
    'description' => $validatedData['description'],
    'rating' => $validatedData['rating'],
]);

          // Redirect to product page for that product
          return redirect()->route('users-reviews')->with('success', 'Review submitted successfully');
    
} catch(\Exception $e){
    // Log the error
    logger()->error('Error creating review: ' . $e->getMessage());

    // Redirect back with error message
    return redirect()->back()->with('error', 'An error occurred while submitting the review. Please try again later.');
}
    }
}