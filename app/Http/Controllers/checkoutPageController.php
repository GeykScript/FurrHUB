<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;
use Illuminate\Support\Facades\Crypt;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Address;


class checkoutPageController extends Controller
{
    public function index(Request $request)
    {
        // Get selected items from the form
        $selectedItems = $request->input('selected_items');

        // Ensure selected items is an array
        if (!is_array($selectedItems)) {
            $selectedItems = explode(',', $selectedItems);  // If it's a string, convert to array
        }

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view the cart.');
        }

        // Check if a cart already exists for the user
        $cart = Cart::where('user_id', $user->id)->first();



        // Fetch only selected products
        $products = Product::whereIn('product_id', $selectedItems)->get();

        $addresses = Address::where('user_id', $user->id)->get();
        $defaultAddress = Address::where('user_id', $user->id)->where('default', 1)->first();

        // Fetch selected cart items
        $cartItems = Cart_item::where('cart_id', $cart->cart_id)
            ->whereIn('product_id', $selectedItems) // Fetch only selected items
            ->with('product')
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate total amount only for selected items
        $total_amount = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->getDiscountedPriceAttribute();
        });

        // Calculate total quantity of selected items
        $total_quantity = $cartItems->sum('quantity');

        // Pass the data to the checkout page
        return view('cart.checkoutPage', compact('cartItems', 'user', 'total_amount', 'total_quantity' ,'defaultAddress' ));
    }
}
