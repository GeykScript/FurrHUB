<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Status;
use App\Models\Pet;
use App\Models\User;

class AppointmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view the cart.');
        }
        // status 7 - available
        // status 8 - unavailable

        // category_id 8 - grooming
        // category_id 9 - veterinary
        // category_id 10 - wellness
        // Fetch services based on status and category
        $grooming_service = Service::where('status', 7)->where('category', 8)->get();
        $veterinary_service = Service::where('status', 7)->where('category', 9)->get();
        $wellness_service = Service::where('status', 7)->where('category', 10)->get();
        
        // Fetch pets for the logged-in user
        $pets = Pet::where('user_id', $user->id)->get();
    
        return view('services.appointment', compact('veterinary_service', 'pets' ,'wellness_service', 'grooming_service'));
    }
}
