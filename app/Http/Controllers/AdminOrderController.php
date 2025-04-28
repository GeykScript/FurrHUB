<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
Use App\Models\Order_item;
use App\Exports\OrdersExport;
use App\Models\DeliveredOrderView;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Notifcation;
use App\Models\Notifications;
use App\Models\OutForDeliveryOrdersView;
class AdminOrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        $order_items = Order_item::whereIn('order_id', $orders->pluck('order_id'))->get();

        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
        }

        return view('admin.orders.admin_orders', compact('orders', 'admin', 'order_items'));
    }


    public function exportExcel()
    {
        return Excel::download(new OrdersExport, 'delivered_orders_report.xlsx');
    }

    public function exportPDF()
    {
        $orders = DeliveredOrderView::all();

        $pdf = Pdf::loadView('admin.pdf_exports.orders_pdf', compact('orders'));
        return $pdf->download('delivered_orders_report.pdf');
    }
    public function DO_exportPDF()
    {
        $orders = OutForDeliveryOrdersView::all();

        $pdf = Pdf::loadView('admin.pdf_exports.out_for_delivery_orders', compact('orders'));
        return $pdf->download('out_for_delivery_orders.pdf');
    }

    public function previewPDF()
    {
        $orders = DeliveredOrderView::all();
        return view('admin.pdf_exports.orders_pdf', compact('orders'));
    }

public function deliver_order(Request $request)
{
    $order = Order::find($request->order_id);

    if ($order) {
        // Combine date and time inputs and format it properly
        $orderDate = $request->input('order_date');
        $orderTime = $request->input('order_time');

        if ($orderDate && $orderTime) {
            $orderDateTime = date('Y-m-d H:i:s', strtotime("$orderDate $orderTime"));

            $order->update([
                'status' => '1',
                'payment_status' => '9',
                'Delivery_Date' => $orderDateTime,
            ]);

            Notifications::create([
                'user_id' => $request->input('user_id'),
                'is_read' => 0,
                'order_name' => $request->input('order_products'),
                'delivered_date' => $orderDateTime,
                'order_address' => $request->input('order_addresses'),
            ]);

            return redirect()->route('admin_orders')->with('success', 'Order updated successfully.');
        }

        return redirect()->route('admin_orders')->with('error', 'Order date and time are required.');
    }

    return redirect()->route('admin_orders')->with('error', 'Order not found.');
}



}