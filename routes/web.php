<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\checkoutPageController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SearchController;





Route::get('/', [WelcomeController::class, 'products'])
    ->name('welcome');


Route::get('/dashboard', [DashboardController::class, 'products'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

//SHOPPING CART ROUTES
Route::get('/shoppingCart', [ShoppingCartController::class, 'index'])->name('shoppingCart');
Route::post('/cart/add', [ShoppingCartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update-quantity', [ShoppingCartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/updateSelectedItems', [ShoppingCartController::class, 'updateSelectedItems'])->name('cart.updateSelectedItems');
Route::post('/cart/remove', [ShoppingCartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/deleteSelectedItems', [ShoppingCartController::class, 'deleteSelectedItems'])->name('cart.deleteSelectedItems');
Route::get('/cart/counts', [ShoppingCartController::class, 'cart_counts'])->name('cart.counts');

// CHECK OUT  ROUTE
Route::post('/checkoutPage', [checkoutPageController::class, 'index'])->name('checkoutPage');

// WISHLIST ROUTES
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlists');
Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    

// PRODUCT VIEW ROUTES
Route::get('/product/view', [ProductController::class, 'viewProduct'])->name('product.view');

//CATEGORIES ROUTES
Route::get('/category/{category_id}', [CategoriesController::class, 'show'])->name('Categories.cat-products');

// SEARCH BAR ROUTES
Route::get('/search', [SearchController::class, 'products'])->name('search.products');

// ADDRESS ROUTES
Route::post('/address/add', [AddressController::class, 'add_address'])->name('address.add');
Route::post('/address/update', [AddressController::class, 'update_address'])->name('address.update');
Route::post('/address/delete', [AddressController::class, 'delete_address'])->name('address.delete');


require __DIR__.'/auth.php';



use App\Http\Controllers\PaymentController;
Route::post('/checkout/process', [PaymentController::class, 'process'])->name('checkout.process');
Route::post('/checkout/direct', [PaymentController::class, 'pay_direct'])->name('checkout.direct');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');




Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment');
Route::post('/appointment/editpet', [AppointmentController::class, 'editpet'])->name('appointment.editpet');
Route::post('/appointment/addpet', [AppointmentController::class, 'addpet'])->name('appointment.addpet');
Route::get('appointment/add-appointment', [AppointmentController::class, 'display_info'])->name('appointment.add-appointment');
Route::post('/appointment/make-appointment', [AppointmentController::class, 'add_appointment'])->name('appointment.make-appointment');
Route::get('/appointment/view-appointment', [AppointmentController::class, 'view_added_appointment'])->name('appointment.view-appointment');
Route::post('/appointment/cancel-appointment', [AppointmentController::class, 'cancel_appointment'])->name('appointment.cancel-appointment');


use App\Http\Controllers\OrderController;
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::POST('orders/cancel-order', [OrderController::class, 'cancel_order'])->name('orders.cancel-order');
Route::POST('orders/review-order', [OrderController::class, 'review_order'])->name('orders.review-order');


//  notification routes
Route::get('/notifications', function () {
    return view('profile.notifications');
})->name('notifications');



Route::get('/orders-successfull', function () {
    return view('profile.order-successfull');
})->name('orders-successfull');

//   my purchases routes
Route::get('/messages', function () {
    return view('profile.messages');
})->name('messages');


Route::get('/add-pet', function () {
    return view('services.add-pet');
})->name('add-pet');





 
