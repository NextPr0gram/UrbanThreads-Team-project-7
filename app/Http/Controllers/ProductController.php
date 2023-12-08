<?php

namespace App\Http\Controllers;

use App\Models\Product;

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
        return view('products.index', ['products' => $products, 'category' => 'Hoodies']); // Pass the products and category to the view
    }

    // ** This method will show all T-shirts
    public function showTshirts()
    {
        $products = Product::where('c2_id', 2)->get(); // Get all products with c2_id = 2 (T-shirts)
        return view('products.index', ['products' => $products, 'category' => 'T-shirts']); // Pass the products and category to the view
    }

    // ** This method will show all Jackets
    public function showJackets()
    {
        $products = Product::where('c2_id', 3)->get(); // Get all products with c2_id = 3 (Jackets)
        return view('products.index', ['products' => $products, 'category' => 'Jackets']); // Pass the products and category to the view
    }

    // ** This method will show all Trousers
    public function showTrousers()
    {
        $products = Product::where('c2_id', 4)->get(); // Get all products with c2_id = 4 (Trousers)
        return view('products.index', ['products' => $products, 'category' => 'Trousers']); // Pass the products and category to the view
    }

    // ** This method will show all Accessories
    public function showAccessories()
    {
        $products = Product::where('c2_id', 5)->get(); // Get all products with c2_id = 5 (Accessories)
        return view('products.index', ['products' => $products, 'category' => 'Accessories']); // Pass the products and category to the view
    }

    // ** This method will show the individual page of a product
    public function showProduct($slug) {
        $product = Product::where('slug', $slug)->firstOrFail(); // Get the product with the slug
        return view('products.show', ['product' => $product]); //
    }
}
