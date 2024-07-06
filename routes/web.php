<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'show_cart'])->name('cart');
Route::get('/cart/{product}/add', [CartController::class, 'add_to_cart'])->name('cart.add');
Route::get('/cart/{id}/add_qty', [CartController::class, 'add_qty'])->name('cart.add_qty');
Route::get('/cart/{id}/sub_qty', [CartController::class, 'sub_qty'])->name('cart.sub_qty');
Route::get('/cart/{id}/remove', [CartController::class, 'remove_from_cart'])->name('cart.remove');

Route::post('/checkout', [CheckoutController::class, 'checkout'] )->name('checkout');
Route::get('/checkout_success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout_cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
Route::post('/webhook', [CheckoutController::class, 'webhook'])->name('checkout.webhook');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/dashboard', function(){
    return redirect()->route('admin.dashboard');
})->name('dashboard');

Route::prefix('/dashboard')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
});