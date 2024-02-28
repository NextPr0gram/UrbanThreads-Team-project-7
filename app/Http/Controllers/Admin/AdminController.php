<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\contactForm;
use app\Http\Controllers\Controller;

class AdminController extends Controller
{

    // Products view
    public function getAllProducts()
    {
        $products = Product::with('variations')->get(); // Eager load the variations relationship
        $products->each(function ($product) {
            $product->totalStock = $product->variations->sum('stock'); // Calculate the total stock for each product
        });
        return view('admin.products-view', ['products' => $products]); // Return the view and pass the products as a parameter
    }

    public function updateProduct(Request $request, $productId)
    {


        // only validate fields that the client provides
        $request->validate([
            'name' => 'nullable|string|max:55',
            'price' => 'nullable|string',
            'description' => 'nullable|string|max:1000',
            'stockForS' => 'nullable|numeric',
            'stockForM' => 'nullable|numeric',
            'stockForL' => 'nullable|numeric',
        ]);

        $product = Product::findOrFail($productId);

        if ($request->filled('name')) {
            $product->name = $request->name;
        }

        if ($request->filled('price')) {
            $product->selling_price = $request->price;
        }

        if ($request->filled('description')) {
            $product->description = $request->description;
        }

        if ($request->filled('stockForS')) {
            $product->variations()->where('size', 'Small')->update(['stock' => $request->stockForS]);
        }

        if ($request->filled('stockForM')) {
            $product->variations()->where('size', 'Medium')->update(['stock' => $request->stockForM]);
        }

        if ($request->filled('stockForL')) {
            $product->variations()->where('size', 'Large')->update(['stock' => $request->stockForL]);
        }

        $product->save();

        return redirect()->route('admin.products-view')->with('success', 'Product updated successfully.');
    }



    // User accounts view
    public function getAllUsers() {
        $users = User::all();
        return view('admin.user-accounts-view', ['users' => $users]);
    }



    // Customer enquiries view
    public function getAllCustomerEnquiries() {

        $customerEnquiries = contactForm::all();
        return view('admin.customer-enquiries-view', ['customerEnquiries' => $customerEnquiries]);

    }
}
