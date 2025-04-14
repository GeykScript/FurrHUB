<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

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
        $appointments = Appointment::where('user_id', $user->id)->get();

        $pets = Pet::where('user_id', $user->id)
            ->orderBy('created_at', 'desc') 
            ->get();

        return view('services.appointment', compact('veterinary_service','appointments', 'pets' ,'wellness_service', 'grooming_service'));
    }


    public function editpet(Request $request)
    {
        $pet_id = $request->input('pet_id');
        $pet = Pet::find($pet_id);

        if ($pet) {
            // Check if a new image is uploaded
            if ($request->hasFile('pet_img')) {
                $randomString = Str::random(20);
                $extension = $request->file('pet_img')->getClientOriginalExtension();
                $filename = $randomString . '.' . $extension;

                // Store the new image
                $request->file('pet_img')->storeAs('pet_picture', $filename, 'public');

                // Delete old pet image if it exists
                if ($pet->pet_img) {
                    Storage::delete('public/pet_picture/' . $pet->pet_img);
                }

                // Set new filename
                $pet->pet_img = $filename;
            }

            // Update other pet fields
            $pet->pet_name = $request->pet_name;
            $pet->age = $request->pet_age;
            $pet->weight = $request->pet_weight;
            $pet->Size = $request->pet_size;
            $pet->save(); // Save all changes
        }

        return redirect()->back()->with('success', 'Pet details updated successfully.');
    }


    public function addpet(request $request ){
        $user = Auth::user();

 
        // Handle pet image file upload with a random filename
        $petImg = null;
        if ($request->hasFile('uploadPhoto')) {
            $randomString = Str::random(20);
            $extension = $request->file('uploadPhoto')->getClientOriginalExtension();
            $filename = $randomString . '.' . $extension;

            // Store the pet image
           $request->file('uploadPhoto')->storeAs(
                'pet_picture',
                $filename,
                'public'
            );
            $petImg = $filename;
        }

        // Create a new pet record
        Pet::create([
            'user_id' => $user->id,
            'pet_name' => $request->pet_name,
            'animal_type' => $request->pet_type,
            'pet_breed' => $request->pet_breed,
            'birthday' => $request->pet_birthday,
            'age' => $request->pet_age,
            'gender' => $request->pet_gender,
            'weight' => $request->pet_weight,
            'color' => $request->pet_color,
            'Size' => $request->pet_size,
            'pet_img' => $petImg, // Set pet image
        ]);

        return redirect()->route('appointment')->with('success', 'Pet added successfully.');
    }




    public function display_info()
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

        $pets = Pet::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('services.add-appointment', compact('veterinary_service', 'pets', 'user', 'wellness_service', 'grooming_service'));
    }



    public function add_appointment(Request $request)
    {
        $user = Auth::user();

        $appointment = Appointment::create([
            'user_id' => $user->id,
            'pet_id' => $request->pet_id,
            'service_id' => $request->service_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'payment_status' => 10, // default unpaid
            'payment_method' => 2, // default cash after service
            'Status' => 16, // default status pending
        ]);

        return redirect()->route('appointment.view-appointment', ['appointment_id' => Crypt::encrypt($appointment->appointment_id)])
            ->with('success', 'Appointment added successfully.');
    }


    public function view_added_appointment(Request $request)
    {
        $user = Auth::user();
        $appointmentId = Crypt::decrypt($request->appointment_id);
        $appointments = Appointment::where('user_id', $user->id)
            ->where('appointment_id', $appointmentId) 
            ->get();

        return view('services.view-appointment', compact('appointments'));
    }


    public function cancel_appointment(Request $request)
    {
        $user = Auth::user();

        $appointment_id = $request->input('appointment_id');

        // Find the appointment and update its status
        $appointment = Appointment::where('user_id', $user->id)
            ->where('appointment_id', $appointment_id)
            ->first();

        if ($appointment) {
            $appointment->Status = 2; // Update status to "Cancelled"
            $appointment->save();
        }

        return redirect()->route('appointment')->with('appointment_success', 'Appointment cancelled successfully.');
    }
}
