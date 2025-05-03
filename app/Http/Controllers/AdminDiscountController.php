<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminDiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
        }
        
        return view('admin.admin_discounts', compact('discounts', 'admin'));
    }

    public function add_discount(Request $request){

        Discount::create([
            'code' => $request->input('discount_code'),
            'description' => $request->input('discount_description'),
            'discount_type' => 'percentage', // Assuming 'percentage' is the default type
            'discount_value' => $request->input('discount_value') / 100,
            'start_date' => $request->input('discount_start_date'),
            'end_date' => $request->input('discount_end_date'),
            'status_id' => 7
        ]);           
        return redirect()->route('admin_discounts')->with('success', 'Discount added successfully.');
    }

    public function edit_discount(Request $request)
    {
        $discount = Discount::find($request->input('discount_id'));

        if ($discount) {
            $startDate = Carbon::parse($request->input('discount_start_date'))->format('Y-m-d H:i:s');
            $endDate = Carbon::parse($request->input('discount_end_date'))->format('Y-m-d H:i:s');

            $discount->update([
                'code' => $request->input('discount_code'),
                'description' => $request->input('discount_description'),
                'discount_type' => 'percentage', // Assuming 'percentage' is the default type
                'discount_value' => $request->input('discount_value') / 100,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status_id' => $request->input('discount_status'),
            ]);
        }

        return redirect()->route('admin_discounts')->with('success', 'Discount updated successfully.');
    }
}
