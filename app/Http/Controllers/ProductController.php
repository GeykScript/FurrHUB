<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;

class ProductController extends Controller
{
    public function viewProduct(Request $request)
    {
        // get the product id from the request
        $product = Product::where('product_id', $request->product_id)->firstOrFail();
        
        //reviews
        // Get reviews for the product where the order is completed
        $reviews = Review::where('product_id', $product->product_id)
            ->whereHas('order', function ($query) {
                $query->where('status', 1); // Ensure the order is completed
            })
            ->orderByDesc('created_at')
            ->get();

        // Get 6 most sold products from the same category, excluding the current product
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('product_id', '!=', $product->product_id) // Exclude the selected product
            ->orderByDesc('quantity_sold') // Sort by most sold
            ->take(6)
            ->get();

        return view('Product.view-product', compact('product', 'relatedProducts', 'reviews'));
    }
}
