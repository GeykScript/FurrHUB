<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Product;

class AdminDashboardController extends Controller
{
  public function index(){

    $admin = Auth::guard('admin')->user();

    if (!$admin) {
        return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
    }

    $total_orders = Order::count();
    $total_users = User::count();
    $total_appointments = Appointment::count();

    $total_revenue = Order::where('payment_status', 9)->sum('total_amount');
    $best_selling_products = Product::orderBy('quantity_sold', 'desc')->take(5)->get();
    $shipping_orders = Order::where('status', 3)->count();
    $delivered_orders = Order::where('status', 1)->count();
    $cancelled_orders = Order::where('status', 2)->count();


        return view('admin.admin_dashboard', compact('admin', 'total_orders', 'total_users', 'total_appointments', 'total_revenue', 'best_selling_products' , 'shipping_orders', 'delivered_orders', 'cancelled_orders'));
  }
}
