<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

class AdminAppointmentController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
        }

        $appointments = Appointment::all();

        return view('admin.Appointments.admin_appointments', compact('admin', 'appointments'));
    }
}
