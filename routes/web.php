<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ProductController;




Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


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
Route::get('/product/view', [ProductController::class, 'viewProduct'])->name('product.view');


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









//  categories routes
Route::get('/foods', function () {
    return view('Categories.foods');
})->name('foods');

Route::get('/treats', function () {
    return view('Categories.treats');
})->name('treats');

Route::get('/toys', function () {
    return view('Categories.toys');
})->name('toys');

Route::get('/grooming-supplies', function () {
    return view('Categories.grooming-supplies');
})->name('grooming-supplies');

Route::get('/accessories', function () {
    return view('Categories.accessories');
})->name('accessories');

Route::get('/health-needs', function () {
    return view('Categories.health-needs');
})->name('health-needs');

Route::get('/essentials', function () {
    return view('Categories.essentials');
})->name('essentials');




