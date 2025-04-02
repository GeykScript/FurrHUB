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


        // Check if a cart already exists for the user
        $cart = Cart::where('user_id', $user->id)->first();

        // If no cart exists, create a new one with 'user_id' and 'total_amount' set to 0
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => $user->id,
                'total_amount' => 0,  // Set initial total_amount to 0
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        $total_amount = Cart_item::where('cart_id', $cart->cart_id)
            ->get()
            ->sum(function ($item) {
                return $item->quantity * $item->product->getDiscountedPriceAttribute();
            });
            $total_quantity = Cart_item::where('cart_id', $cart->cart_id)
            ->get()
            ->sum(function ($item) {
                return $item->quantity;
            });

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


        return view('cart.shoppingCart', compact('cartItems', 'buyNowProductId' , 'total_amount', 'total_quantity'));
    }
    public function removeFromCart(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:cart_items,id', // Ensure the ID exists in the database
        ]);

        $cartItem = Cart_item::find($request->item_id);

        if (!$cartItem) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        $cart = $cartItem->cart;

        // Check if cart exists to prevent null reference errors
        if (!$cart) {
            return response()->json(['error' => 'Cart not found'], 404);
        }

        $cartItem->delete();

        // Ensure that the product still exists before recalculating total
        $totalAmount = Cart_item::where('cart_id', $cart->cart_id)
            ->get()
            ->sum(function ($item) {
                return $item->quantity * optional($item->product)->getDiscountedPriceAttribute();
            });

        // Update the cart's total amount
        $cart->total_amount = $totalAmount;
        $cart->save();

        return response()->json([
            'success' => true,
            'message' => 'Item removed successfully',
            'total_amount' => $totalAmount,
        ]);
    }
    public function deleteSelectedItems(Request $request)
    {
        $request->validate([
            'selected_items' => 'required|array|min:1',
            'selected_items.*' => 'exists:cart_items,product_id',
        ]);
        $selectedItems = $request->selected_items;

        // Delete selected items from the cart
        Cart_item::whereIn('product_id', $selectedItems)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Selected items have been deleted.',
        ]);
    }



    public function updateSelectedItems(Request $request)
    {
        $request->validate([
            'selected_items' => 'required|array|min:1',
            'selected_items.*' => 'exists:cart_items,product_id',
        ]);

        $selectedItems = $request->selected_items;

        // Get all the cart items based on the selected products
        $cartItems = Cart_item::whereIn('product_id', $selectedItems)->get();

        // Calculate total amount and quantity for selected products
        $total_amount = $cartItems->sum(fn($item) => $item->quantity * $item->product->getDiscountedPriceAttribute());
        $total_quantity = $cartItems->sum(fn($item) => $item->quantity);

        return response()->json([
            'success' => 'Cart updated successfully',
            'total_amount' => $total_amount,
            'total_quantity' => $total_quantity,
        ]);
    }

    public function updateQuantity(Request $request)
{
    $request->validate([
        'item_id' => 'required|exists:cart_items,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $cartItem = Cart_item::find($request->item_id);

    if (!$cartItem) {
        return response()->json(['error' => 'Item not found'], 404);
    }
    $productx = [];
    $cartItem->quantity = $request->quantity;
    $cartItem->save();

    // Recalculate total amount and quantity
    $cart = $cartItem->cart;
   
    return response()->json([
        'success' => 'Quantity updated successfully',
    ]);
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
