<?php

namespace App\Exports;

use App\Models\ServiceHistoryView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServicesHistoryExport implements FromCollection, WithHeadings
{
    /**
     * @return array
     */
    public function collection()
    {
        return ServiceHistoryView::all([
            'Customername',
            'Petname',
            'Type_of_service',
            'Service_availed',
            'Initial_fee',
            'Appointment_date',
            'Time',
            'Total_payment',
        ]);
    }

    public function headings(): array
    {
        
        return [
            'Customer Name',
            'Pet Name',
            'Type of Service',
            'Service Availed',
            'Initial Fee',
            'Appointment Date',
            'Time',
            'Total Payment',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
 
}
