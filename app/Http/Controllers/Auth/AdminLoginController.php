<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',    
            'password' => 'required|string',
        ]);

        // Attempt to log in
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && $admin->password === $request->password) {
            // Log the user in
            Auth::guard('admin')->login($admin, $request->remember);
            return redirect()->route('admin_dashboard'); // Redirect to the admin dashboard or home
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    
}
