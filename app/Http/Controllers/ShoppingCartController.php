<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        return view('cart.shoppingCart');
    }
}
