<?php

namespace App\Exports;

use App\Models\ServiceView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServicesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ServiceView::all([
            'name',
            'category',
            'description',
            'price',
            'discount_value',
            'discounted_price',
            'created_at',
            'updated_at'
            
        ]);
    }
    public function headings(): array
    {
        return ['Service Name', 'Category', 'Description', 'Price', 'Discount Value', 'Discounted Price', 'Created Date', 'Updated Date'];
    }
}
