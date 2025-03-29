<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function show(Request $request, $category_id)
    {
        $category = Category::where('category_id', $category_id)->firstOrFail();
        $sort = $request->query('sort', 'popular'); 

        $products = Product::where('category_id', $category_id);

        // Sorting logic
        if ($sort === 'latest') {
            $products->orderBy('created_at', 'desc');
        } elseif ($sort === 'popular') {
            $products->orderBy('quantity_sold', 'desc'); 
        } elseif ($sort === 'price_low') {
            $products->orderBy('price', 'asc'); 
        } elseif ($sort === 'price_high') {
            $products->orderBy('price', 'desc'); 
        }

        $products = $products->get();

        return view('Categories.cat-products', compact('category', 'products', 'sort'));
    }
}
