<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use app\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::with('variations')->get(); // Eager load the variations relationship
        $products->each(function ($product) {
            $product->totalStock = $product->variations->sum('stock'); // Calculate the total stock for each product
        });
        return view('admin.products-view', ['products' => $products,]); // Return the view and pass the products as a parameter
    }
}
