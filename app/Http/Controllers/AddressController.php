<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function add_address(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add an address.');
        }

        // Validate input
        $request->validate([
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'fullname' => 'required|string|max:255',
            'contact_number' => 'required|string|max:11',
        ]);

        // If the user sets this address as default, update all other addresses
        if ($request->has('default')) {
            Address::where('user_id', $user->id)->update(['default' => 0]);
        }

        // Create new address
        Address::create([
            'user_id' => $user->id,
            'province' => $request->province,
            'city' => $request->city,
            'barangay' => $request->barangay,
            'street' => $request->street,
            'postal_code' => $request->postal_code,
            'default' => $request->has('default') ? 1 : 0,
            'fullname' => $request->fullname,
            'contact_number' => $request->contact_number,
            'description' => $request->description ?? null, // Optional
        ]);
        return redirect()->route('checkoutPage')->with('success', 'Address added successfully.');
    }
}
