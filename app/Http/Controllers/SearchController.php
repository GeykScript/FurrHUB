<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SearchController extends Controller
{
    public function products(Request $request)
    {
        $query = strtolower($request->input('search')); // Convert input to lowercase

        if (!$query) {
            return response()->json([]); // Return empty response for AJAX
        }

        // Case-insensitive search query
        $searchQuery = Product::whereRaw('LOWER(name) LIKE ?', ["%{$query}%"])
            ->orWhereRaw('LOWER(description) LIKE ?', ["%{$query}%"])
            ->orWhereRaw('CAST(category_id AS CHAR) LIKE ?', ["%{$query}%"])
            ->orWhereRaw('CAST(price AS CHAR) LIKE ?', ["%{$query}%"]);

        // Check if request is AJAX
        if ($request->ajax()) {
            $products = $searchQuery->limit(5)->get(); // Limit results for AJAX

            // Map the products to include the encrypted product_id
            $products = $products->map(function ($product) {
                return [
                    'name' => $product->name,
                    'product_id' => $product->product_id,
                    'encrypted_product_id' => encrypt($product->product_id), // Encrypt the product_id
                ];
            });

            return response()->json($products);
        }

        $products = $searchQuery->get(); // Get all results for normal search page
        return view('Product.search-results', compact('products', 'query'));
    }
}
