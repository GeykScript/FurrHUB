<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller{
    public function viewProduct(Request $request)
    {
        try {
            $decryptedId = Crypt::decrypt($request->query('product_id')); // Decrypt product_id

            $request->merge(['product_id' => $decryptedId]); // Add decrypted value to request

            $request->validate([
                'product_id' => 'required|integer|exists:products,product_id',
            ]);

            $product = Product::where('product_id', $decryptedId)->firstOrFail();

            $reviews = Review::where('product_id', $product->product_id)
                ->whereHas('order', function ($query) {
                    $query->where('status', 1);
                })
                ->orderByDesc('created_at')
                ->get();

            $relatedProducts = Product::where('category_id', $product->category_id)
                ->where('product_id', '!=', $product->product_id)
                ->orderByDesc('quantity_sold')
                ->take(6)
                ->get();

            return view('Product.view-product', compact('product', 'relatedProducts', 'reviews'));
        } catch (\Exception $e) {
            abort(404); // If decryption fails, show 404 page
        }
    }
}

