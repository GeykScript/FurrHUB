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
        // Get selected items
        $selectedItems = $request->input('selected_items');

        if (!is_array($selectedItems)) {
            $selectedItems = explode(',', $selectedItems);
        }

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view the cart.');
        }

        $product_ids = implode(",", $selectedItems);
        Address::where('user_id', $user->id)->update(['default' => 0]);

        if ($request->has('province')) {
            $request->validate([
                'province' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'barangay' => 'required|string|max:255',
                'street' => 'required|string|max:255',
                'postal_code' => 'required|numeric',
                'fullname' => 'required|string|max:255',
                'contact_number' => 'required|string|max:11',
            ]);

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
                'description' => $request->description ?? null,
            ]);

        }

        // Handle default address update if an address was selected
        if ($request->has('update_address_id')) {
            $selectedAddressId = $request->input('update_address_id');

            // Find the selected address for the user
            $selectedAddress = Address::where('address_id', $selectedAddressId)->where('user_id', $user->id)->first();
            if ($selectedAddress) {
                // Check if the selected address is already the default address
                if ($selectedAddress->default == 1) {
                    // If already the default, skip any updates (do nothing)
                } else {
                    // Set all other addresses to default = 0
                    Address::where('user_id', $user->id)->update(['default' => 0]);

                    // Set the selected address as default
                    $selectedAddress->update(['default' => 1]);
                }
            }
        }

        // Fetch products based on selected items
        $cart = Cart::where('user_id', $user->id)->first();
        $cartItems = Cart_item::where('cart_id', $cart->cart_id)
            ->whereIn('product_id', $selectedItems)
            ->with('product')
            ->get();

        $addresses = Address::where('user_id', $user->id)->get();
        $defaultAddress = Address::where('user_id', $user->id)->where('default', 1)->first();

        $total_amount = $cartItems->sum(fn($item) => $item->quantity * $item->product->getDiscountedPriceAttribute());
        $total_quantity = $cartItems->sum('quantity');

        return view('cart.checkoutPage', compact('cartItems', 'product_ids', 'user', 'total_amount', 'total_quantity', 'defaultAddress', 'addresses'));
        }


}
