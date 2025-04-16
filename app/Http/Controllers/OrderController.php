<?php


namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Pet;
use App\Models\Review;
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
        $order_items = Order_item::whereIn('order_id', $all_orders->pluck('order_id'))->get();

        $reviewed_orders = Review::where('user_id', $user->id)
            ->pluck('order_id')
            ->toArray();

        return view('profile.orders', compact('all_orders','order_items', 'reviewed_orders'));
    }




    public function cancel_order(Request $request)
    {
        $order_id = $request->input('order_id');
        $order = Order::find($order_id);

        if ($order) {
            $order->status = 2; // 2 is the status for canceled orders
            $order->save();

            return redirect()->back()->with('success', 'Order canceled successfully.');
        } else {
            return redirect()->back()->with('error', 'Order not found.');
        }
    }



    public function review_order(Request $request)
    {
        $user = Auth::user();

        $order_id = $request->input('order_ids');
        $product_ids = explode(',', $request->input('product_ids'));
        $rating = $request->input('rating'); 
        $review_text = $request->input('description');

        $review_image = null;

        if ($request->hasFile('uploadPhoto')) {
            $filename = Str::random(20) . '.' . $request->file('uploadPhoto')->getClientOriginalExtension();

            $request->file('uploadPhoto')->storeAs('order_reviews', $filename, 'public');

            $review_image = $filename;
        }

        foreach ($product_ids as $product_id) {
            Review::create([
                'user_id'     => $user->id,
                'product_id'  => $product_id,
                'order_id'    => $order_id,
                'ratings'     => $rating,
                'review_img'  => $review_image,
                'review_text' => $review_text,
                'review_date' => Carbon::now(),
            ]);
        }

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
