<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\BasketItemController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\filterController;
use App\Http\Controllers\WishlistItemController;
use App\Http\Controllers\OrderController;
// use App\Http\Controllers\LikeController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});

//? Routes to show the user's profile and perform actions on it as well as perform actions on the user's orders
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [ProfileController::class, 'addOrUpdateAddress'])->name('profile.address');
    Route::get('/profile/orders', [OrderController::class, 'show'])->name('profile.orders');
    Route::get('/profile/orders/{id}', [OrderController::class, 'showSingleOrder'])->name('view-order');
    Route::delete('/profile/orders/{id}', [OrderController::class, 'cancel'])->name('cancel-order');
});

//? Route to show the user's basket
Route::get('/basket/show', [BasketController::class, 'show'])->name('basket.show');
//? Route to delete the user's basket (to be done when the user checks out)
Route::delete('/basket/destroy', [BasketController::class, 'destroy'])->name('basket.destroy');
//? Route to add a product to the user's basket
Route::post('/basket/add/{productId}', [BasketItemController::class, 'addToBasket'])
    ->name('basket.add');
//? Route to remove a product from the user's basket
Route::delete('/basket/remove/{productId}', [BasketItemController::class, 'removeFromBasket'])
    ->name('basket.remove');
//? Route to increment the quantity of a basket item
Route::post('/basket/increment/{productId}/{variationId}', [BasketItemController::class, 'incrementQuantity'])
    ->name('incrementQuantity');
//? Route to decrement the quantity of a basket item
Route::post('/basket/decrement/{productId}/{variationId}', [BasketItemController::class, 'decrementQuantity'])
    ->name('decrementQuantity');
//? Route to perform discount code validation
Route::post('/basket/discount', [BasketController::class, 'validateDiscount'])->name('discount');

Route::mailPreview();

require __DIR__ . '/auth.php';

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/basket', function () {
    return view('basket');
})->name('basket');

Route::get('/wishlist', function () {
    return view('wishlist');
})->name('wishlist');

//? Route to show the checkout page with the basket items
Route::get('/checkout/show', [CheckoutController::class, 'show'])->name('checkout');

//? Route to place an order
Route::post('/checkout/success', [CheckoutController::class, 'placeOrder'])->name('place-order');

Route::get('auth.not-authenticated', function () {
    return view('auth.not-authenticated');
})->name('not-authenticated');

//? Routes for the products pages
Route::get('/category/all-products', [ProductController::class, 'showAllProducts'])->name('all-products');
Route::get('/category/hoodies', [ProductController::class, 'showHoodies'])->name('hoodies');
Route::get('/category/tshirts', [ProductController::class, 'showTshirts'])->name('tshirts');
Route::get('/category/jackets', [ProductController::class, 'showJackets'])->name('jackets');
Route::get('/category/trousers', [ProductController::class, 'showTrousers'])->name('trousers');
Route::get('/category/accessories', [ProductController::class, 'showAccessories'])->name('accessories');

//? Route for the individual product page
Route::get('/products/{slug}', [ProductController::class, 'showProduct'])->name('show');

//? Route for showing the product search results
Route::get('/search', [ProductController::class, 'searchForProduct'])->name('search');

//? Route for contact-us page
Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');


//Route to save form into database
Route::post('/contact-us', [ContactFormController::class, 'store']);


//this is the route for the filterController to sort the products 
Route::get('/sort/{category}', [filterController::class, 'sort'])->name('sort');

//? Routes for admin dashboard
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/products-view', [AdminController::class, 'getAllProducts'])->name('admin.products-view');
    Route::get('/admin/user-accounts-view', [AdminController::class, 'getAllUsers'])->name('admin.user-accounts-view');
    Route::get('/admin/customer-enquiries-view', [AdminController::class, 'getAllCustomerEnquiries'])->name('admin.customer-enquiries-view');
    Route::get('/admin/orders-view', function () {
        return view('admin.orders-view');
    })->name('admin.orders-view');
    Route::post('/updateProduct/{productId}', [AdminController::class, 'updateProduct'])->name('product.update');
});

Route::get('/wishlist/show', [WishlistItemController::class, 'show'])->name('wishlist.show');
Route::post('/wishlist/add/{productId}', [WishlistItemController::class, 'addToWishlist'])
    ->name('wishlist.add');
