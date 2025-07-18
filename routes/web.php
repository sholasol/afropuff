<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/support', [FrontController::class, 'support'])->name('support');
Route::get('/refer', [FrontController::class, 'refer'])->name('refer');
Route::get('/talk', [FrontController::class, 'talk'])->name('talk');
Route::get('/search', [FrontController::class, 'search'])->name('search');
//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/store-cart/{id}', [CartController::class, 'storeCart'])->name('storeCart');
Route::post('/cart/update/{id}', [CartController::class, 'updateCartQuantity'])->name('updateCartQuantity');
Route::get('/cart/remove/{id}', [CartController::class, 'deleteFromCart'])->name('deleteItem');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('clearCart');



//shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product/{product}', [ShopController::class, 'singleProduct'])->name('singleProduct');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //checkout
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    // Route::get('/checkout/success', [CartController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/checkout/failed', [CartController::class, 'paymentFailed'])->name('payment.failed');
    Route::post('/payment/initialize', [CartController::class, 'initializePayment'])->name('payment.initialize');

    Route::get('/checkout/success', [CartController::class, 'paymentSuccess'])->name('payment.success');

    Route::get('/payment/callback', [CartController::class, 'handlePaymentCallback'])->name('payment.callback');

    // Receipt route (optional - for direct access to receipts)
    Route::get('/receipt/{reference}', [CartController::class, 'showReceipt'])->name('receipt.show');
   

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/customers', [DashboardController::class, 'customers'])->name('customers');


    // Customer dashboard
    Route::get('/my-account', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/my-account/orders', [CustomerController::class, 'orders'])->name('customer.orders');
    Route::get('/my-account/orders/{order}', [CustomerController::class, 'orderDetails'])->name('customer.order.details');

    //products
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/galery/{product}', [ProductController::class, 'gallery'])->name('productGallery');
    Route::post('/storeProduct', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('/addProduct', [ProductController::class, 'create'])->name('addProduct');
    Route::get('/editProduct/{product}', [ProductController::class, 'show'])->name('editProduct');
    Route::post('/updateProduct', [ProductController::class, 'update'])->name('updateProduct');
    Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');
    Route::get('/products/{product}', [ProductController::class, 'destroy'])->name('deleteProduct');

    // Route::post('createCategory', [CategoryController::class, 'store'])->name('createCategory');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories', [CategoryController::class, 'store'])->name('createCategory');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('updateCategory');
    Route::get('/categories/{category}', [CategoryController::class, 'destroy'])->name('deleteCategory');

    //tags
    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::post('/tags', [TagController::class, 'store'])->name('createTag');
    Route::put('/tags/{tag}', [TagController::class, 'update'])->name('updateTag');
    Route::get('/tags/{tag}', [TagController::class, 'destroy'])->name('deleteTag');


    //order
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

    Route::get('/order/show', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/{order}/fulfill-modal', [OrderController::class, 'fulfillModal'])->name('orders.fulfill-modal');
    Route::get('/orders/{order}/fulfill-modal', [OrderController::class, 'fulfillModal'])->name('orders.fulfill-modal');
    Route::put('/{order}/fulfill', [OrderController::class, 'fulfill'])->name('orders.fulfill');
    Route::put('/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
