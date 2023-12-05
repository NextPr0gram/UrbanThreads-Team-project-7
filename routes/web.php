<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/dashboard', [FrontendController::class, 'i'])->name('Testpages.testindex');
    // Route::get('category2', [Category2Controller::class, 'viewc2'])->name('Testpages.testc2');
    // Route::get('add-category', [Category2Controller::class, 'add'])->name('Testpages.testaddc2');
    // Route::get('insert-category',[Category2Controller::class, 'insert']->name('Testpages.testaddc2'));
    //idea for routes
});

Route::mailPreview();

require __DIR__.'/auth.php';
