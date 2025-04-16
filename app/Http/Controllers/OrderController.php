<?php


namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;



class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view the cart.');
        }


        $all_orders = Order::where('user_id', $user->id)
            ->orderBy('order_id', 'desc')
            ->get();;
        $paid_orders = $all_orders->where('status', 9);
        $shipped_orders = $all_orders->where('status', 3);
        $delivered_orders = $all_orders->where('status', 1);
        $canceled_orders = $all_orders->where('status', 2);


        $order_items = Order_item::whereIn('order_id', $all_orders->pluck('order_id'))->get();

        return view('profile.orders', compact('all_orders','order_items', 'paid_orders', 'shipped_orders', 'delivered_orders', 'canceled_orders'));
    }
}
