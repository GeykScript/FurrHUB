<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function viewProduct(Request $request)
    {
        $product = Product::where('product_id', $request->product_id)->firstOrFail();

        // Get 6 most sold products from the same category, excluding the current product
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('product_id', '!=', $product->product_id) // Exclude the selected product
            ->orderByDesc('quantity_sold') // Sort by most sold
            ->take(6)
            ->get();

        return view('Product.view-product', compact('product', 'relatedProducts'));
    }

}
