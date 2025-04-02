<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Cart_item;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class WishlistController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your wishlist.');
        }

        $wishlistItems = Wishlist::where('user_id', $user->id)
            ->with('product') // Ensure you have a relationship set in the Wishlist model
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile.wishlists', compact('wishlistItems'));
    }



    public function addToWishlist(Request $request)
    {
        $user = Auth::user();
        $encryptedProductId = $request->product_id;

        // Ensure the user is logged in
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add to wishlist.');
        }

        // Decrypt the product_id
        try {
            $product_id = Crypt::decrypt($encryptedProductId);
        } catch (\Exception $e) {
            return redirect()->route('wishlist')->with('error', 'Invalid product ID.');
        }

        // Find the product
        $product = Product::where('product_id', $product_id)->firstOrFail();

        // Check if the item is already in the wishlist
        $wishlistItem = Wishlist::where('user_id', $user->id)
            ->where('product_id', $product_id)
            ->first();

        if ($wishlistItem) {
            return redirect()->route('product.view', ['product_id' => $encryptedProductId])
                ->with('info', 'Item is already in your wishlist.');
        }

        // Add product to wishlist
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $product_id,
        ]);

        return redirect()->route('product.view', ['product_id' => $encryptedProductId])
            ->with('success', 'Item successfully added to wishlist!');
    }



    public function removeFromWishlist(Request $request)
    {
        $user = Auth::user();
        $encryptedWishlistId = $request->wishlist_id;

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to manage your wishlist.');
        }
        // Decrypt the wishlist ID
        try {
            $wishlist_id = Crypt::decrypt($encryptedWishlistId);
        } catch (\Exception $e) {
            return redirect()->route('wishlists')->with('error', 'Invalid wishlist ID.');
        }

        // Find and delete the wishlist item
        $wishlistItem = Wishlist::where('wishlist_id', $wishlist_id)
            ->where('user_id', $user->id)
            ->first();

        if (!$wishlistItem) {
            return redirect()->route('wishlists')->with('error', 'Wishlist item not found.');
        }

        $wishlistItem->delete();

        return redirect()->route('wishlists')->with('success', 'Item removed from wishlist.');
    }
}
