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
        // Get selected items from the form (now passed via URL query parameter)
        $selectedItems = $request->input('selected_items');

        // Ensure selected items is an array
        if (!is_array($selectedItems)) {
            $selectedItems = explode(',', $selectedItems);  // If it's a string, convert to array
        }

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view the cart.');
        }

        // Use implode to join the array elements into a comma-separated string
        $product_ids = implode(",", $selectedItems);

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
        return view('cart.checkoutPage', compact('cartItems', 'product_ids', 'user', 'total_amount', 'total_quantity', 'defaultAddress', 'addresses'));
    }

  public function add_address(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to add an address.');
    }

    // Validate input
    $request->validate([
        'province' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'barangay' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'postal_code' => 'required|numeric',
        'fullname' => 'required|string|max:255',
        'contact_number' => 'required|string|max:11',
    ]);

    // If the user sets this address as default, update all other addresses
    if ($request->has('default')) {
        Address::where('user_id', $user->id)->update(['default' => 0]);
    }

    // Create new address
    Address::create([
        'user_id' => $user->id,
        'province' => $request->province,
        'city' => $request->city,
        'barangay' => $request->barangay,
        'street' => $request->street,
        'postal_code' => $request->postal_code,
        'default' => $request->has('default') ? 1 : 0,
        'fullname' => $request->fullname,
        'contact_number' => $request->contact_number,
        'description' => $request->description ?? null, // Optional
    ]);

    // Get selected items from the form
    $selectedItems = $request->input('selected_items');

    // If selected_items is passed as a string, convert it to an array
    if (!is_array($selectedItems)) {
        $selectedItems = explode(',', $selectedItems);
    }

    // Convert the array of selected items back into a comma-separated string
    $product_ids = implode(',', $selectedItems);

    // Redirect to the checkout page and pass the selected items
    return redirect()->route('checkoutPage', ['selected_items' => $product_ids])->with('success', 'Address added successfully.');
}
}
