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

    public function addProduct(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:55',
            'price' => 'required|string',
            'gender' => 'required|numeric',
            'category' => 'required|numeric',
            'tags' => 'nullable|string',
            'description' => 'required|string|max:1000',
            'stockForS' => 'required|numeric',
            'stockForM' => 'sometimes|numeric',
            'stockForL' => 'sometimes|numeric',
        ]);



        // Create a new product
        $product = new Product;
        $product->image = "";
        $product->name = $request->name;
        $product->slug = strtolower($request->name);
        $product->meta_title = strtolower($request->name);
        $product->selling_price = $request->price;
        $product->original_price = $request->price;
        $product->c1_id = $request->gender;
        $product->c2_id = $request->category;
        $product->meta_keywords = $request->filled('tags') ? $request->tags : "";
        $product->description = $request->description;
        $product->meta_description = strtolower($request->description);
        $product->save();


        // Create the variations for the product
        $variations = [
            ['size' => 'Small', 'stock' => $request->stockForS],
        ];
        $product->variations()->create(['size' => 'Small', 'stock' => $request->stockForS]);

        if ($request->filled('stockForM')) {
            $variations[] = ['size' => 'Medium', 'stock' => $request->stockForM];
            $product->variations()->create(['size' => 'Medium', 'stock' => $request->stockForM]);
        }

        if ($request->filled('stockForL')) {
            $variations[] = ['size' => 'Large', 'stock' => $request->stockForL];
            $product->variations()->create(['size' => 'Large', 'stock' => $request->stockForL]);
        }

        // Previous code
        /* $product->variations()->createMany([

            ['size' => 'Small', 'stock' => $request->stockForS],

            ['size' => 'Medium', 'stock' => $request->stockForM],

            ['size' => 'Large', 'stock' => $request->stockForL],

        ]); */


        return redirect()->back()->with('success', 'Product added successfully.');
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

        return redirect()->back()->with('success', 'Product updated successfully.');
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
