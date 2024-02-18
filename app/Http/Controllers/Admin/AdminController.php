<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Product;
use app\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function getAllProducts()
    {
        $products = $products = Product::all(); // get all the products from the database
        return view('admin.products-view', ['products' => $products]); // return the view and pass the products as a parameter
    }
}
