<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkoutPageController extends Controller
{
    public function index()
    {
        return view('cart.checkoutPage');
    }
}
