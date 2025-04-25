<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Exports\ServicesExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ServiceView;
use Maatwebsite\Excel\Facades\Excel;


class AdminServicesController extends Controller
{

    public function index()
    {
        $services = Service::all();
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
        }

        return view('admin.admin_services', compact('services', 'admin'));
    }


    public function exportExcel()
    {
        return Excel::download(new ServicesExport, 'services_report.xlsx');
    }

    public function exportPDF()
    {
        $services = ServiceView::all();

        $pdf = Pdf::loadView('admin.pdf_exports.service_pdf', compact('services'));
        return $pdf->download('services_report.pdf');
    }
    public function previewPDF()
    {
        $services = ServiceView::all();
        return view('admin.pdf_exports.service_pdf', compact('services'));
    }


    
    public function add_service_page()
    {
        $admin = Auth::guard('admin')->user();

        $discounts = Discount::all();

        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
        }

        return view('admin.add_services', compact('admin', 'discounts'));
    }

    public function add_service(Request $request)
    {
        Service::create([
            'name' => $request->input('service_name'),
            'status' => 7, // Assuming 7 is the status for available
            'description' => $request->input('service_description'),
            'price' => $request->input('service_price'),
            'category' => $request->input('service_category'),
            'discount_id' => $request->input('service_discount') ? $request->input('service_discount') : null,
        ]);

        return redirect()->route('admin_services')->with('success', 'Service added successfully.');
    }



    
    public function edit_service(Request $request)
    {
        $service_id = $request->input('service_id');
        $service = Service::find($request->input('service_id'));


        $admin = Auth::guard('admin')->user();

        $discounts = Discount::all();

        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
        }

        return view('admin.edit_services', compact('admin', 'discounts', 'service', 'service_id'));
    }

    public function save_changes(Request $request)
    {
        $service = Service::find($request->input('service_id'));

        if ($service) {
            $service->update([
                'name' => $request->input('service_name'),
                'status' => $request->input('service_status'),
                'description' => $request->input('service_description'),
                'price' => $request->input('service_price'),
                'category' => $request->input('service_category'),
                'discount_id' => $request->input('service_discount') ? $request->input('service_discount') : null,
            ]);

            return redirect()->route('admin_services')->with('success', 'Service updated successfully.');
        } else {
            return redirect()->route('admin_services')->with('error', 'Service not found.');
        }
    }
}
