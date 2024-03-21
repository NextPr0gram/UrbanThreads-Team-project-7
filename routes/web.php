<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;

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
    Route::get('/profile/orders/{id}/show', [OrderController::class, 'showSingleOrder'])->name('view-order');
    Route::post('/profile/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('cancel-order');
    Route::post('/profile/orders/{id}/return', [OrderController::class, 'return'])->name('return-order');
});

//? Route to show the user's wishlist
Route::get('/wishlist/show', [WishlistController::class, 'show'])->name('wishlist.show');
//? Route to add a product to the user's wishlist
Route::post('/wishlist/add/{productId}', [WishlistController::class, 'addToWishList'])
    ->name('wishlist.add');
//? Route to remove a product from the user's wishlist
Route::delete('/wishlist/remove/{productId}', [WishlistController::class, 'removeFromWishList'])
    ->name('wishlist.remove');

//? Route to show the user's basket
Route::get('/basket/show', [BasketController::class, 'show'])->name('basket.show');
//? Route to delete the user's basket (to be done when the user checks out)
Route::delete('/basket/destroy', [BasketController::class, 'destroy'])->name('basket.destroy');
//? Route to add a product to the user's basket
Route::post('/basket/add/{productId}', [BasketController::class, 'addToBasket'])
    ->name('basket.add');
//? Route to remove a product from the user's basket
Route::delete('/basket/remove/{productId}', [BasketController::class, 'removeFromBasket'])
    ->name('basket.remove');
//? Route to increment the quantity of a basket item
Route::post('/basket/increment/{productId}/{variationId}', [BasketController::class, 'incrementQuantity'])
    ->name('incrementQuantity');
//? Route to decrement the quantity of a basket item
Route::post('/basket/decrement/{productId}/{variationId}', [BasketController::class, 'decrementQuantity'])
    ->name('decrementQuantity');
//? Route to perform discount code validation
Route::post('/basket/discount', [BasketController::class, 'validateDiscount'])->name('discount');
//? Route to remove a discount code from the basket
Route::delete('/basket/discount', [BasketController::class, 'removeDiscount'])->name('discount.remove');

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

//Route to save reviews to database along with product Id associated to it
Route::post('/reviews/add/{productId}', [ReviewController::class, 'store'])->name('reviews.add');

//! Removed route to show product reviews as it is now shown on the product page through the showProduct method in the ProductController (show route)

//this is the route for the filterController to sort the products
Route::get('/sort/{category}', [FilterController::class, 'sort'])->name('sort');

//? Routes for admin dashboard
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/products-view', [AdminController::class, 'getAllProducts'])->name('admin.products-view');
    Route::get('/admin/user-accounts-view', [AdminController::class, 'getAllUsers'])->name('admin.user-accounts-view');
    Route::get('/admin/customer-enquiries-view', [AdminController::class, 'getAllCustomerEnquiries'])->name('admin.customer-enquiries-view');
    Route::get('/admin/orders-view', [AdminController::class, 'getAllOrders'])->name('admin.orders-view');
    Route::get('/admin/discount-codes-view', [AdminController::class, 'getAllDiscountCodes'])->name('admin.discounts-view');
    Route::post('/processOrder/{orderId}', [AdminController::class, 'processOrder'])->name('order.process');
    Route::post('/updateProduct/{productId}', [AdminController::class, 'updateProduct'])->name('product.update');
    Route::post('/addProduct/', [AdminController::class, 'addProduct'])->name('product.add');
    Route::delete('/deleteProduct/{productId}', [AdminController::class, 'deleteProduct'])->name('product.delete');
    Route::post('/addDiscount/', [AdminController::class, 'addDiscount'])->name('discount.add');
    Route::post('/updateDiscount/{discountId}', [AdminController::class, 'updateDiscount'])->name('discount.update');
    Route::delete('/deleteDiscount/{discountId}', [AdminController::class, 'deleteDiscount'])->name('discount.delete');
});

//Route for admin side: To update status of customer enquiries
Route::put('enquiries/{enquiryId}/status', [ContactFormController ::class, 'updateStatus'])->name('status.update');

