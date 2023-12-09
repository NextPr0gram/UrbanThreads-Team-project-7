<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/home', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', function(){
    return view('layouts.products');
})->name('products');


Route::mailPreview();

require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/basket', function () {
    return view('basket');
})->name('basket');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

//*? Routes for the products pages
Route::get('/category/hoodies', [ProductController::class, 'showHoodies'])->name('hoodies');
Route::get('/category/tshirts', [ProductController::class, 'showTshirts'])->name('tshirts');
Route::get('/category/jackets', [ProductController::class, 'showJackets'])->name('jackets');
Route::get('/category/trousers', [ProductController::class, 'showTrousers'])->name('trousers');
Route::get('/category/accessories', [ProductController::class, 'showAccessories'])->name('accessories');

//*? Route for the individual product page
Route::get('/products/{slug}', [ProductController::class, 'showProduct'])->name('show');
