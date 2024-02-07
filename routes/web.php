<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\BasketItemController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderItemController;

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

//? Routes to show the user's profile and perform actions on it
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [ProfileController::class, 'addOrUpdateAddress'])->name('profile.address');
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
Route::post('/basket/increment/{productId}', [BasketItemController::class,'incrementQuantity'])
    ->name('incrementQuantity');
//? Route to decrement the quantity of a basket item
Route::post('/basket/decrement/{productId}', [BasketItemController::class,'decrementQuantity'])
    ->name('decrementQuantity');

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

//? Route to show the checkout page with the basket items
Route::get('/checkout/show', [CheckoutController::class, 'show'])->name('checkout');

//? Route to place an order
Route::post('/checkout/success', [CheckoutController::class, 'placeOrder'])->name('place-order');

Route::get('auth.not-authenticated', function () {
    return view('auth.not-authenticated');
})->name('not-authenticated');

//*? Routes for the products pages
Route::get('/category/hoodies', [ProductController::class, 'showHoodies'])->name('hoodies');
Route::get('/category/tshirts', [ProductController::class, 'showTshirts'])->name('tshirts');
Route::get('/category/jackets', [ProductController::class, 'showJackets'])->name('jackets');
Route::get('/category/trousers', [ProductController::class, 'showTrousers'])->name('trousers');
Route::get('/category/accessories', [ProductController::class, 'showAccessories'])->name('accessories');

//*? Route for the individual product page
Route::get('/products/{slug}', [ProductController::class, 'showProduct'])->name('show');


//@Neha - for when contact page is Live
//return the contact us page view - name needs to be changed depending on page came - create is fake
//just to show form to user
//Route::get('/create', function(){
    //return view ('contactpage');
//})
//Post method requires another route
/*Route::post('/page',function(){
    $contactform = new contactform();
    $contactform->title = request ('title');
    $contactform->name =request('body');
    $contactform ->save();
    //one way to store info on table
    Model:: create([
        'title' => request('title'),
        //include model as use in top
    ]);
    return redirect('/create'); //redirects to iser page - maybe thanlks
});*/