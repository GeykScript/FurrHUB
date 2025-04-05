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
        // Get selected items from the request
        $selectedItems = $request->input('selected_items');

        // Check if selected items are in an array format
        // If not, convert it to an array
        if (!is_array($selectedItems)) {
            $selectedItems = explode(',', $selectedItems);
        }

        // Check if the user is authenticated
        // If not, redirect to the login page with an error message
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view the cart.');
        }
        
        //get the product ids from the selected items
        $product_ids = implode(",", $selectedItems);

        //check if the user has already an address
        // If no address exists, the user need to add an address
        $existing_Address  = Address::where('user_id', $user->id)->get();
        
        //if the user has no address, create a new one
        if ($existing_Address->isEmpty()) {
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

                if ($request->has('default')) {
                    // Set other addresses of the user to default = 0
                    Address::where('user_id', $user->id)->update(['default' => 0]);
                }

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
        } else {
            //used to add another address
            //even the user has an address, the user can add another address
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

                if ($request->has('default')) {
                    // Set other addresses of the user to default = 0
                    Address::where('user_id', $user->id)->update(['default' => 0]);
                }

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
        }
        //used to update the address based on their  default address 0 or 1
        if ($request->has('update_address_id')) {
            $selectedAddressId = $request->input('update_address_id');
        
            $selectedAddress = Address::where('address_id', $selectedAddressId)->where('user_id', $user->id)->first();

            if ($selectedAddress) {
                // Check if the selected address is already the default address 1
                if ($selectedAddress->default == 1) {
                    // If already the default, walang babaguhin
                } else {
                    // Set other addresses of the user to default = 0
                    Address::where('user_id', $user->id)->update(['default' => 0]);

                    // Set the selected address as default = 1 
                    $selectedAddress->update(['default' => 1]);
                }
            }
        }

        //display the selected items in the checkout page
        $cart = Cart::where('user_id', $user->id)->first();
        $cartItems = Cart_item::where('cart_id', $cart->cart_id)
            ->whereIn('product_id', $selectedItems)
            ->with('product')
            ->get();

        //display all the available addresses of the user
        $addresses = Address::where('user_id', $user->id)->get();
        //display the default address of the user
        $defaultAddress = Address::where('user_id', $user->id)->where('default', 1)->first();

        //calculations
        $total_amount = $cartItems->sum(fn($item) => $item->quantity * $item->product->getDiscountedPriceAttribute());
        $total_quantity = $cartItems->sum('quantity');

        return view('cart.checkoutPage', compact('cartItems', 'product_ids', 'user', 'total_amount', 'total_quantity', 'defaultAddress', 'addresses'));
        }


}
