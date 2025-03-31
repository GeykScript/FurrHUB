<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Cart_item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view the cart.');
        }

        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            return view('cart.shoppingCart')->with('cartItems', collect());
        }

        // Eager load the product relationship
        $cartItems = Cart_item::where('cart_id', $cart->cart_id)
            ->with('product')
            ->orderBy('created_at', 'desc')
            ->get();        

        $buyNowProductId = session('buy_now_product_id', null);

        // Store the cart items count in session
        session(['cart_items_count' => $cartItems->count()]);


        return view('cart.shoppingCart', compact('cartItems', 'buyNowProductId'));
    }

    public function cart_counts()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['count' => 0]);
        }
        $cart = Cart::where('user_id', $user->id)->first();
        if (!$cart) {
            return response()->json(['count' => 0]);
        }
        $cartItemsCount = Cart_item::where('cart_id', $cart->cart_id)->count();
        return response()->json(['count' => $cartItemsCount]);
    }


    public function addToCart(Request $request)
    {
        $user = Auth::user();
        $encryptedProductId = $request->product_id;
        $quantity = $request->quantity;

        // Ensure the user is logged in
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add to cart.');
        }

        // Decrypt the product_id
        try {
            $product_id = Crypt::decrypt($encryptedProductId); // Decrypt the encrypted product_id
        } catch (\Exception $e) {
            return redirect()->route('shoppingCart')->with('error', 'Invalid product ID.');
        }

        // Find the product using 'product_id'
        $product = Product::where('product_id', $product_id)->firstOrFail();
        $discountedPrice = $product->getDiscountedPriceAttribute();

        // Check if the user has an existing cart
        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id, 'total_amount' => 0]);
        }

        // Check if the item is already in the cart
        $cartItem = Cart_item::where('cart_id', $cart->cart_id)
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {
            // If product already in cart, update quantity
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // If product not in cart, add it to the cart
            Cart_item::create([
                'cart_id' => $cart->cart_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
            ]);
        }

        // Recalculate the total amount
        $totalAmount = Cart_item::where('cart_id', $cart->cart_id)
            ->get()
            ->sum(function ($item) {
                return $item->quantity * $item->product->getDiscountedPriceAttribute();
            });

        // Update the cart's total amount
        $cart->total_amount = $totalAmount;
        $cart->save();

        // Redirect based on action (either continue shopping or proceed to checkout)
        if ($request->action === 'buy_now') {
            session(['buy_now_product_id' => $product_id]); // Store product_id in session
            return redirect()->route('shoppingCart')->with('success', 'Proceed to checkout.');
        }


        return redirect()->route('product.view', ['product_id' => $encryptedProductId])
            ->with('success', 'Item successfully added to cart!');
    }
}
