<?php

namespace App\Exports;

use App\Models\DeliveredOrderView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    /**
     * @return array
     */

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DeliveredOrderView::all([
            'order_id',
            'buyer',
            'ref_no',
            'products',
            'quantity',
            'total_amount',
            'payment_method',
            'shipping_address',
            'order_date',
            'payment_status',
            'status',
            'Delivery_Date',
        ]);
    }
    public function headings(): array
    {
        return [
            'Order ID',
            'Buyer',
            'Reference No',
            'Products',
            'Quantity',
            'Total Amount',
            'Payment Method',
            'Shipping Address',
            'Order Date',
            'Payment Status',
            'Status',
            'Delivery Date',
        ];
    }
}
