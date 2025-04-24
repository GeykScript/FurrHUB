<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\ServiceHistoryView;
use App\Exports\ServicesHistoryExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class AdminServicesHistoryController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
        }

        $appointments = Appointment::where('payment_status', 9)
            ->where('Status', 15)
            ->get();

        return view('admin.admin_service_history', compact('appointments', 'admin'));
    }

    public function exportExcel()
    {
        return Excel::download(new ServicesHistoryExport, 'Services_History_Report.xlsx');
    }

    public function exportPDF()
    {
        $services = ServiceHistoryView::all();

        $pdf = Pdf::loadView('admin.pdf_exports.service_history_pdf', compact('services'));
        return $pdf->download('Services_History_Report.pdf');
    }
    public function previewPDF()
    {
        $services = ServiceHistoryView::all();
        return view('admin.pdf_exports.service_history_pdf', compact('services'));
    }
}
