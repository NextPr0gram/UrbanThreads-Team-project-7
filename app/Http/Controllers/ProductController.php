<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Wishlists;


/**
 ** Made by Kishan Jethwa
 */

class ProductController extends Controller
{
    /**
     ** This controller is responsible for showing products of a particular category
     ** For example, showHoodies() will show all products with category_id = 1 (Hoodies)
     ** showTshirts() will show all products with category_id = 2 (T-shirts)
     */


    // ** This method will show all hoodies
    public function showHoodies()
    {
        $products = Product::where('c2_id', 1)->get(); // Get all products with c2_id = 1 (Hoodies)
        return view('products', ['products' => $products, 'category' => 'Hoodies']); // Pass the products and category to the view
    }

    // ** This method will show all T-shirts
    public function showTshirts()
    {
        $products = Product::where('c2_id', 2)->get(); // Get all products with c2_id = 2 (T-shirts)
        return view('products', ['products' => $products, 'category' => 'T-shirts']); // Pass the products and category to the view
    }

    // ** This method will show all Jackets
    public function showJackets()
    {
        $products = Product::where('c2_id', 3)->get(); // Get all products with c2_id = 3 (Jackets)
        return view('products', ['products' => $products, 'category' => 'Jackets']); // Pass the products and category to the view
    }

    // ** This method will show all Trousers
    public function showTrousers()
    {
        $products = Product::where('c2_id', 4)->get(); // Get all products with c2_id = 4 (Trousers)
        return view('products', ['products' => $products, 'category' => 'Trousers']); // Pass the products and category to the view
    }

    // ** This method will show all Accessories
    public function showAccessories()
    {
        $products = Product::where('c2_id', 5)->get(); // Get all products with c2_id = 5 (Accessories)
        return view('products', ['products' => $products, 'category' => 'Accessories']); // Pass the products and category to the view
    }

    // ** This method will show all Hats
    public function showHats()
    {
        $products = Product::where('c2_id', 6)->get(); // Get all products with c2_id = 6 (Hats)
        return view('products', ['products' => $products, 'category' => 'Hats']); // Pass the products and category to the view
    }

    // ** This method will show all Shirts
    public function showShirts()
    {
        $products = Product::where('c2_id', 7)->get(); // Get all products with c2_id = 7 (Shirts)
        return view('products', ['products' => $products, 'category' => 'Shirts']); // Pass the products and category to the view
    }

    // ** This method will show all products
    public function showAllProducts()
    {
        $products = Product::all(); // Get all products
        return view('products', ['products' => $products, 'category' => 'All Products']); // Pass the products and category to the view
    }

    // ** This method will show the individual page of a product
    public function showProduct($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail(); // Get the product with the slug
        $variations = $product->variations; // Get the variations of the product

        $reviews = Review::where('product_id', $product->id)->get(); // Fetch reviews for the specified product ID

        //Set to 0 for items where reviews are non existent

        $averageRating = 0;
        $totalProductReviews = 0;
        $fiveStarPercentage = 0;
        $fourStarPercentage = 0;
        $threeStarPercentage = 0;
        $twoStarPercentage = 0;
        $oneStarPercentage = 0;

        //Calculations only execute if reviews are existent
        if ($reviews->isNotEmpty()) {
            $averageRating = $reviews->avg('rating'); // Calculate the average rating of the product
            $averageRating = round($averageRating, 2); // Round the average rating to 2 decimal places
            $totalProductReviews = $reviews->count(); // Get the total number of reviews for the product
            $fiveStarPercentage = round($reviews->where('rating', 5)->count() / $reviews->count() * 100, 2); // Calculate the percentage of 5 star ratings
            $fourStarPercentage = round($reviews->where('rating', 4)->count() / $reviews->count() * 100, 2); // Calculate the percentage of 4 star ratings
            $threeStarPercentage = round($reviews->where('rating', 3)->count() / $reviews->count() * 100, 2); // Calculate the percentage of 3 star ratings
            $twoStarPercentage = round($reviews->where('rating', 2)->count() / $reviews->count() * 100, 2); // Calculate the percentage of 2 star ratings
            $oneStarPercentage = round($reviews->where('rating', 1)->count() / $reviews->count() * 100, 2); // Calculate the percentage of 1 star ratings
        }

        // Pass the product to the view with the variations (sizes) and the reviews associated with it
        return view('products.show', compact('product', 'variations', 'reviews', 'averageRating', 'fiveStarPercentage', 'fourStarPercentage', 'threeStarPercentage', 'twoStarPercentage', 'oneStarPercentage', 'totalProductReviews'));
    }

    public function searchForProduct(Request $request)
    {
        // Validate the search query
        $request->validate([
            'search' => 'required|string|min:3'
        ]);
        // Sanitize the search query
        $search = $request->input('search');

        $products = Product::where('name', 'like', "%$search%")->get();
        if ($products->isEmpty()) {
            return redirect()->back()->with('error', 'No products found for ' . $search);
        } else {
            return view('search-products', ['products' => $products, 'category' => 'Search Results for ' . $search]);
        }
    }
}
