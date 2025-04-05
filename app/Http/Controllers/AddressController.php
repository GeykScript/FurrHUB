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

        if ($request->has('province')) {
            $request->validate([
                'province' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'barangay' => 'required|string|max:255',
                'street' => 'required|string|max:255',
                'postal_code' => 'required|numeric',
                'fullname' => 'required|string|max:255',
                'contact_number' => 'required|string|max:11',
            ]);

            if ($request->has('default')) {
                // Set other addresses of the user to default = 0
                Address::where('user_id', $user->id)->update(['default' => 0]);
            }

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
                'description' => $request->description ?? null,
            ]);
        }

        //display all the available addresses of the user
        $addresses = Address::where('user_id', $user->id)
            ->orderByDesc('default') // Sort by default descending: default = 1 will come first
            ->get();

        return redirect()->route('profile.edit')
            ->with('success', 'Address added successfully.');
    }

    public function update_address(Request $request)
    {
        // Get the selected address id from the request
        $selectedAddressId = $request->input('UpdateAddressId');

        // Find the address to be updated
        $address = Address::find($selectedAddressId);

        // Check if the address exists
        if ($address) {
            // Update the address fields
            $address->update([
                'province' => $request->province,
                'city' => $request->city,
                'barangay' => $request->barangay,
                'street' => $request->street,
                'postal_code' => $request->postal_code,
                'fullname' => $request->fullname,
                'contact_number' => $request->contact_number,
                'description' => $request->description,
            ]);
            // Check if the default checkbox is checked
            if ($address) {
                $user = Auth::user();
                $selectedAddress = Address::where('address_id', $selectedAddressId)->where('user_id', $user->id)->first();
                if ($selectedAddress->default == 1) {
                    // If already the default, walang babaguhin
                } else {
                    // Set other addresses of the user to default = 0
                    Address::where('user_id', $user->id)->update(['default' => 0]);

                    // Set the selected address as default = 1 
                    $selectedAddress->update(['default' => 1]);
                }
            }
            $address->save(); // Save the changes to the address

            // Optionally, return a response or redirect
            return redirect()->route('profile.edit')
                ->with('success', 'Address Updated successfully.');
        }
        }

        
      public function delete_address(Request $request)
    {
        $addressId = $request->input('DeleteAddressId');

        // Find the address to be deleted
        $address = Address::find($addressId);

        // Check if the address exists
        if ($address) {
            $user = Auth::user();
            $selectedAddress = Address::where('address_id', $addressId)->where('user_id', $user->id)->first();
            if ($selectedAddress->default == 1) {
                // If the address is the default address, set another address as default
                $otherAddress = Address::where('user_id', $user->id)->where('address_id', '!=', $addressId)->first();
                if ($otherAddress) {
                    // Set the first available address as default
                    $selectedAddress->delete(); // Delete the address
                    $otherAddress->update(['default' => 1]);
                } else {
                    // If no other address is available, set default to 0
                    Address::where('user_id', $user->id)->update(['default' => 0]);
                }
            } else {
                $address->delete(); // Delete the address
            }
            $address->delete(); // Delete the address


            return redirect()->route('profile.edit')
                ->with('success', 'Address deleted successfully.');
        }
    }
}