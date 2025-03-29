<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ProductController;




use App\Http\Controllers\WelcomeController;
Route::get('/', [WelcomeController::class, 'products'])
    ->name('welcome');


use App\Http\Controllers\DashboardController;


Route::get('/dashboard', [DashboardController::class, 'products'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});



use App\Http\Controllers\PaymentController;
Route::post('/checkout/process', [PaymentController::class, 'process'])->name('checkout.process');

use App\Http\Controllers\checkoutPageController;
Route::post('/checkoutPage', [checkoutPageController::class, 'index'])->name('checkoutPage');
Route::get('/shoppingCart', [ShoppingCartController::class, 'index'])->name('shoppingCart');
Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment');



Route::post('/product/view', [ProductController::class, 'viewProduct'])->name('product.view');




require __DIR__.'/auth.php';

//  notification routes
Route::get('/notifications', function () {
    return view('profile.notifications');
})->name('notifications');

//  wishlist routes
Route::get('/wishlists', function () {
    return view('profile.wishlists');
})->name('wishlists');

//   my purchases routes
Route::get('/orders', function () {
    return view('profile.orders');
})->name('orders');

//   my purchases routes
Route::get('/messages', function () {
    return view('profile.messages');
})->name('messages');


Route::get('/add-pet', function () {
    return view('services.add-pet');
})->name('add-pet');

Route::get('/add-appointment', function () {
    return view('services.add-appointment');
})->name('add-appointment');







use App\Http\Controllers\CategoriesController;
Route::get('/category/{category_id}', [CategoriesController::class, 'show'])->name('Categories.cat-products');

