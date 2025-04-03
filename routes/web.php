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
Route::get('/checkoutPage', [checkoutPageController::class, 'index'])->name('checkoutPage');
Route::post('/checkoutPage.add', [checkoutPageController::class, 'add_address'])->name('checkoutPage.add');
Route::post('/encrypt-items', [ShoppingCartController::class, 'encryptItems']);




Route::get('/shoppingCart', [ShoppingCartController::class, 'index'])->name('shoppingCart');
Route::post('/cart/add', [ShoppingCartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update-quantity', [ShoppingCartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/updateSelectedItems', [ShoppingCartController::class, 'updateSelectedItems'])->name('cart.updateSelectedItems');
Route::post('/cart/remove', [ShoppingCartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/deleteSelectedItems', [ShoppingCartController::class, 'deleteSelectedItems'])->name('cart.deleteSelectedItems');
Route::get('/cart/counts', [ShoppingCartController::class, 'cart_counts'])->name('cart.counts');


use App\Http\Controllers\WishlistController;
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlists');
Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    


Route::get('/product/view', [ProductController::class, 'viewProduct'])->name('product.view');


use App\Http\Controllers\CategoriesController;

Route::get('/category/{category_id}', [CategoriesController::class, 'show'])->name('Categories.cat-products');

use App\Http\Controllers\SearchController;

Route::get('/search', [SearchController::class, 'products'])->name('search.products');



require __DIR__.'/auth.php';




Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment');

//  notification routes
Route::get('/notifications', function () {
    return view('profile.notifications');
})->name('notifications');



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


use App\Http\Controllers\AddressController;


    Route::post('/address/add', [AddressController::class, 'add_address'])->name('address.add');


 
