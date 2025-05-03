<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Address;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = Auth::user();
        $addresses = Address::where('user_id', $user->id)
            ->orderByDesc('default') // Sort by default descending: default = 1 will come first
            ->get();

        return view('profile.edit', [
            'user' => $request->user(),
            'addresses' => $addresses,
            
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        // Flag to track if there are any changes
        $hasChanges = false;

        // Check if the profile picture is updated
        if ($request->hasFile('profile_img')) {
            $randomString = Str::random(20);
            $extension = $request->file('profile_img')->getClientOriginalExtension();
            $filename = $randomString . '.' . $extension;

            //THIS IS USED FOR STORING IN DEPLOYMENT STORAGE
            // $request->file('profile_img')->storeAs('profile_picture', $filename, 'public_direct');

             $request->file('profile_img')->storeAs('profile_picture', $filename, 'public');

            // Delete the old profile picture if it exists
            if ($user->profile_img) {
                Storage::delete('public/profile_picture/' . $user->profile_img);
            }

            //THIS IS USED FOR DELETING IN DEPLOYMENT STORAGE
            // if ($user->profile_img) {
            //     $filePath = public_path('storage/profile_picture/' . $user->profile_img);
            //     if (file_exists($filePath)) {
            //         unlink($filePath);
            //     }
            // }


            $user->profile_img = $filename;
            $hasChanges = true;  
        }

        // Check if the email or any other fields are changed
        if ($user->isDirty()) {
            $user->save();
            $hasChanges = true;  // Mark that there was a change
        }

        // Clear email verification if email is updated
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Save the user data
        $user->save();

        // Set session status based on changes
        return Redirect::route('profile.edit')->with('status', $hasChanges ? 'profile-updated' : 'no-change');
    }
    
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
