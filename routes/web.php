<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/support', [FrontController::class, 'support'])->name('support');
Route::get('/refer', [FrontController::class, 'refer'])->name('refer');
Route::get('/talk', [FrontController::class, 'talk'])->name('talk');
Route::get('/search', [FrontController::class, 'search'])->name('search');
//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

//shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product', [ShopController::class, 'singleProduct'])->name('product');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
