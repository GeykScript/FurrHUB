<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function show($category_id)
    {
        $category = Category::where('category_id', $category_id)->firstOrFail();

         $products = Product::where('category_id', $category_id);
         $products = $products->get();

        $popular_products = Product::where('category_id', $category_id)->orderBy('quantity_sold', 'desc')->get();
        $latest_products = Product::where('category_id', $category_id)->orderBy('created_at', 'desc')->get();
        $highest_price = Product::where('category_id', $category_id)->orderBy('price', 'desc')->get();
        $lowest_price = Product::where('category_id', $category_id)->orderBy('price', 'asc')->get();

        return view('Categories.cat-products', compact('category','products' ,'latest_products', 'popular_products' , 'highest_price', 'lowest_price'));
    }
}
