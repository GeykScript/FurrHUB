<?php

namespace App\Exports;

use App\Models\OutForDeliveryOrdersView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OutForDeliveryOrdersExport implements FromCollection , WithHeadings
{
    /**
     * @return array
     */
    public function collection()
    {
        return OutForDeliveryOrdersView::all([
            'order_id',
            'buyer',
            'phone_number',
            'ref_no',
            'products',
            'quantity',
            'total_amount',
            'payment_method',
            'shipping_address',
            'Delivery_Date',
        ]);
    }
    public function headings(): array
    {
        return [
            'Order ID',
            'Buyer',
            'Phone Number',
            'Reference No',
            'Products',
            'Quantity',
            'Total Amount',
            'Payment Method',
            'Shipping Address',
            'Delivery Date',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */

}
