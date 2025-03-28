<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function products()
    {
        // Fetch all products
        
        $products = Product::inRandomOrder()->get();

        // Fetch top 8 best-selling products
        $BestSellerProducts = Product::orderBy('quantity_sold', 'desc')->take(6)->get();

        // Pass both to the view
        return view('dashboard', compact('products', 'BestSellerProducts'));
    }
    

    
}
