<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\ContactForm;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Discount;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'image',
            'name' => 'required|string|max:55',
            'price' => 'required|string',
            'gender' => 'required|numeric',
            'category' => 'required|numeric',
            'tags' => 'nullable|string',
            'description' => 'required|string|max:1000',
        ]);



        // Create a new product
        $product = new Product;

        // Check if the request has an image
        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Get the image from the request
            $path = $image->getClientOriginalName(); // You can customize the filename if needed

            // Store the image in the public/images directory
            if ($image->storeAs('', $path, 'public_images')) {
                // Set the product image attribute to the images path
                $product->image = '/images/' . $path;
            } else {
                // Handle the case when image upload fails
                return redirect()->back()->with('error', 'Failed to upload image.');
            }
        } else {
            // Handle the case when no image is uploaded
            return redirect()->back()->with('error', 'No image uploaded.');
        }


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




        if ($request->filled('stockForS')) {
            $product->variations()->create(['size' => 'Small', 'stock' => $request->stockForS]);
        }

        if ($request->filled('stockForM')) {
            $product->variations()->create(['size' => 'Medium', 'stock' => $request->stockForM]);
        }

        if ($request->filled('stockForL')) {
            $product->variations()->create(['size' => 'Large', 'stock' => $request->stockForL]);
        }



        return redirect()->back()->with('success', 'Product added successfully.');
    }

    public function updateProduct(Request $request, $productId)
    {


        // only validate fields that the client provides
        $request->validate([
            'image' => 'nullable|image',
            'name' => 'nullable|string|max:55',
            'price' => 'nullable|string',
            'description' => 'nullable|string|max:1000',
            'stockForS' => 'nullable|numeric',
            'stockForM' => 'nullable|numeric',
            'stockForL' => 'nullable|numeric',
        ]);

        $product = Product::findOrFail($productId);


        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image) {
                Storage::disk('public_images')->delete('/images/' . $product->image);

            }



            $image = $request->file('image'); // Get the image from the request
            $path = $image->getClientOriginalName(); // You can customize the filename if needed

            // Store the image in the public/images directory
            if ($image->storeAs('', $path, 'public_images')) {
                // Set the product image attribute to the images path
                $product->image = '/images/' . $path;

            }


        }




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

    // Delete a product
    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);
        if ($product->image) {
            Storage::disk('public_images')->delete('/images/' . $product->image);
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    // User accounts view
    public function getAllUsers()
    {
        $users = User::all();
        return view('admin.user-accounts-view', ['users' => $users]);
    }



    // Customer enquiries view
    public function getAllCustomerEnquiries()
    {

        $customerEnquiries = ContactForm::all();
        return view('admin.customer-enquiries-view', ['customerEnquiries' => $customerEnquiries]);
    }

    // Get all orders
    public function getAllOrders()
    {
        $orders = Order::all();
        $orders->each(function ($order) {
            $orderItems = $order->items;
        });
        return view('admin.orders-view', ['orders' => $orders]);
    }

    // Process an order with the enum status
    public function processOrder($orderId)
    {
        $order = Order::findOrFail($orderId);
        if ($order->status == 'Placed') {
            $order->status = 'Processing';
        } else if ($order->status == 'Processing') {
            $order->status = 'Dispatched';
        } else if ($order->status == 'Dispatched') {
            $order->status = 'Delivered';
        }
        $order->save();
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    // Get all discounts
    public function getAllDiscountCodes()
    {
        $discounts = Discount::all();
        return view('admin.discounts-view', ['discounts' => $discounts]);
    }

    // Add a discount
    public function addDiscount(Request $request)
    {
        // Validate each field individually to provide more specific error messages
        // Check if the code is a string and unique
        if (!is_string($request->code)) {
            return redirect()->back()->with('error', 'Discount code must be a string.');
        }
        if (Discount::where('code', $request->code)->exists()) {
            return redirect()->back()->with('error', 'Discount code must be unique.');
        }
        // Check if the discount value is a number
        if (!is_numeric($request->value)) {
            return redirect()->back()->with('error', 'Discount value must be a number.');
        }
        // Check if the max uses is a number
        if ($request->filled('max_uses') && !is_numeric($request->max_uses)) {
            return redirect()->back()->with('error', 'Max uses must be a number.');
        }
        // Check if the valid from date is a date
        if ($request->filled('valid_from') && !strtotime($request->valid_from)) {
            return redirect()->back()->with('error', 'Valid from date must be a date.');
        }
        // Check if the valid to date is a date
        if ($request->filled('valid_to') && !strtotime($request->valid_to)) {
            return redirect()->back()->with('error', 'Valid to date must be a date.');
        }

        // Check if the discount value is more than 0 and return an error if not depending on the type
        if ($request->value <= 0) {
            if ($request->type === 'fixed') {
                return redirect()->back()->with('error', 'Fixed discount must be more than 0.');
            } else {
                return redirect()->back()->with('error', 'Percentage discount must be more than 0.');
            }
        }
        // Check if the percentage discount is more than 100
        if ($request->type === 'percentage' && $request->value > 100) {
            return redirect()->back()->with('error', 'Percentage discount cannot be more than 100.');
        }
        // Check if the valid from date is after the valid to date
        if ($request->filled('valid_from') && $request->filled('valid_to') && $request->valid_from > $request->valid_to) {
            return redirect()->back()->with('error', 'Valid from date cannot be after valid to date.');
        }
        // Check if the max uses is less than or equal to 0
        if ($request->filled('max_uses') && $request->max_uses <= 0) {
            return redirect()->back()->with('error', 'Max uses must be more than 0.');
        }
        // Check if the valid from date is in the past
        if ($request->filled('valid_from') && $request->valid_from < now()) {
            return redirect()->back()->with('error', 'Valid from date cannot be in the past.');
        }
        // Check if the valid to date is in the past
        if ($request->filled('valid_to') && $request->valid_to < now()) {
            return redirect()->back()->with('error', 'Valid to date cannot be in the past.');
        }
        // Check if the valid to date is before the valid from date
        if ($request->filled('valid_from') && $request->filled('valid_to') && $request->valid_from > $request->valid_to) {
            return redirect()->back()->with('error', 'Valid from date cannot be after valid to date.');
        }

        // Create a new discount with the code and discount
        $discount = new Discount;
        $discount->code = $request->code;
        $discount->type = $request->type;
        $discount->value = $request->value;
        $discount->uses = 0;
        $discount->max_uses = $request->filled('max_uses') ? $request->max_uses : null;
        $discount->valid_from = $request->filled('valid_from') ? $request->valid_from : null;
        $discount->valid_to = $request->filled('valid_to') ? $request->valid_to : null;
        $discount->save();
        return redirect()->back()->with('success', 'Discount added successfully.');
    }

    // Update a discount
    public function updateDiscount(Request $request, $discountId)
    {

        // Find the discount record
        $discount = Discount::findOrFail($discountId);

        // Validate and update the discount fields if they are filled
        if ($request->filled('code')) {
            $discount->code = $request->code;
        }

        if ($request->filled('value')) {
            // Check if the discount value is more than 0
            if ($request->value <= 0) {
                if ($request->type === 'fixed') {
                    return redirect()->back()->with('error', 'Fixed discount must be more than 0.');
                } else {
                    return redirect()->back()->with('error', 'Percentage discount must be more than 0.');
                }
            } else {
                $discount->value = $request->value;
            }
        }

        if ($request->filled('max_uses')) {
            // Check if the max uses is more than 0
            if ($request->max_uses <= 0) {
                return redirect()->back()->with('error', 'Max uses must be more than 0.');
            } else {
                $discount->max_uses = $request->max_uses;
            }
        }

        if ($request->filled('valid_from')) {
            // Check if the valid from date is in the past
            if ($request->valid_from < now()) {
                return redirect()->back()->with('error', 'Valid From date cannot be in the past.');
            } else if ($request->valid_from > $request->valid_to) {
                return redirect()->back()->with('error', 'Valid From date cannot be after Valid To date.');
            } else {
                $discount->valid_from = $request->valid_from;
            }
        }

        if ($request->filled('valid_to')) {
            // Check if the valid to date is in the past
            if ($request->valid_to < now()) {
                return redirect()->back()->with('error', 'Valid To date cannot be in the past.');
            } else if ($request->valid_from > $request->valid_to) {
                return redirect()->back()->with('error', 'Valid To date cannot be before the Valid From date.');
            } else {
                $discount->valid_to = $request->valid_to;
            }
        }

        // Save the discount record
        $discount->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Discount updated successfully.');
    }

    // Delete a discount
    public function deleteDiscount($discountId)
    {
        // Find the discount record
        $discount = Discount::findOrFail($discountId);

        // Delete the discount record
        $discount->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Discount deleted successfully.');
    }

    public function getDashboardInfo()
    {
        $numberOfusers = User::count();
        $numberOfProducts = Product::count();
        $numberOfTotalOrders = Order::count();

        $ordersPlaced = Order::where('status', 'Placed')->count();
        $ordersProcessing = Order::where('status', 'Processing')->count();
        $ordersDispatched = Order::where('status', 'Dispatched')->count();
        $ordersDelivered = Order::where('status', 'Delivered')->count();
        $ordersCancelled = Order::where('status', 'Cancelled')->count();
        $ordersReturned = Order::where('status', 'Returned')->count();

        $numberOfEnquiries = ContactForm::count();
        $newEnquiries = ContactForm::where('status', 'New')->count();
        $enquiriesProcessed = ContactForm::where('status', 'Processed')->count();



        $customerEnquiries = ContactForm::all();
        return view('admin.dashboard', [ 'numberOfusers' => $numberOfusers, 'numberOfProducts' => $numberOfProducts, 'numberOfTotalOrders' => $numberOfTotalOrders, 'ordersPlaced' => $ordersPlaced, 'ordersProcessing' => $ordersProcessing, 'ordersDispatched' => $ordersDispatched, 'ordersDelivered' => $ordersDelivered, 'ordersCancelled' => $ordersCancelled, 'ordersReturned' => $ordersReturned, 'numberOfEnquiries' => $numberOfEnquiries, 'newEnquiries' => $newEnquiries, 'enquiriesProcessed' => $enquiriesProcessed, 'customerEnquiries' => $customerEnquiries]);

    }
}
