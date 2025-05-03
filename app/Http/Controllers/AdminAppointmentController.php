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

    public function payment(Request $request){
        $appointment = Appointment::find($request->appointment_id);
        if ($appointment) {
            $appointment->update([
                'payment_status' => 9,
                'Status' => 15,
                'total_payment' => $request->total_payment,
            ]);
            return redirect()->back()->with('success', 'Payment successful and appointment status updated.');
        } else {
            return redirect()->back()->with('error', 'Appointment not found.');
        }
         
    }
}
