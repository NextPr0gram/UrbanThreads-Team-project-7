<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reviews;
class ReviewsController extends Controller

{
    //this will store a new review created
    public function store(Request $request)
    {
        //validate incoming data for review
        $validatedData  = $request ->validate([
            'user_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'rating' => 'required|integer|min:0|max:255',
        ]);
        // Get the current user's ID if logged in
if (auth()->check()) {
    $user_id = auth()->id(); // Retrieve the user's ID
    // get product id
    $product_id = $request->input('product_id');

    // Create new review with product and user ID
    $newReview = Review::create([
        'user_id' => $user_id,
        'product_id' => $product_id,
        'user_name' => $validatedData['user_name'],
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'image' => $request->file('image') ? $request->file('image')->store('images') : null,
        'rating' => $validatedData['rating'],
    ]);

    // Redirect to product page for that product
    return redirect('/slug')->with('success', 'Review submitted successfully');
} else {
    // If the user isn't authenticated, redirect to the login page with an error message
    return redirect()->route('login')->with('error', 'Login to make a review');
}
    }
}
