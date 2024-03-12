<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category1;
use App\Models\Category2;
use Illuminate\Http\Request;

class filterController extends Controller
{

    public function sort(Request $request, $category)
    {
        $sortOption = $request->input('sort'); //retrieves sort parameter from request
        $categoryID =  Category2::where('name', $category)->firstOrFail()->id; //retrieves id of the categories
        $selectedGenders = $request->input('selectedGenders', []); //retrieves selected gender parameter from the request and empty array if there isnt one
        $productsQuery = Product::where('c2_id', $categoryID); //queries products based on the categoryID

        //this filters the product in the category based on the selected genders as it retrieves the gender id and filters the products based on this
        if (!empty($selectedGenders)) {
            $genderIDs = Category1::whereIn('name', $selectedGenders)->pluck('id');
            $filteredProducts = $productsQuery->whereIn('c1_id', $genderIDs);
        }


        /*
        If the option low to high is selected order the products ascendingly
        If the option High to Low is selected order the products descendingly
        If the option popularity is selected then order the products by popularity which is determined 
        through the number of sales a product has and this is ordered ascendingly
        returning the most popular products first.
        if no options are selected then it just returns the products in the category
        */
        if ($sortOption == 'Low to High') {
            $products = $productsQuery->orderBy('selling_price', 'asc')->get();
        } else if ($sortOption == 'High to Low') {
            $products = $productsQuery->orderBy('selling_price', 'desc')->get();
        } else if ($sortOption == 'Popularity') {
            $products = $productsQuery->orderBy('sales', 'desc')->get();
        } else {
            $products = $productsQuery->get();
        }


        /*
        if the user has selected some genders for filtering but there are no products matching the selected genders then the user isredirected to the previous page
        and an error message is displayed on the screen
        */
        if ($products->isEmpty() && !empty($selectedGenders)) {
            return redirect()->back()->with('error', 'Sorry we do not have any products matching the selected gender');
        }

        //this returns the filtered and sorted products as requested by the user 
        return view('products', ['products' => $products, 'category' => $category]);
    }
}
