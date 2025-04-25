<?php

namespace App\Exports;

use App\Models\ProductView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductView::all(
            [
                'serial_number',
                'product_name',
                'category_name',
                'description',
                'stock_quantity',
                'price',
                'discount_value',
                'discounted_price',
                'quantity_sold',
            ]
        );
    }
    public function headings(): array
    {
        return [
            'Serial Number',
            'Product Name',
            'Category',
            'Description',
            'Stock Quantity',
            'Price',
            'Discount Value',
            'Discounted Price',
            'Quantity Sold',
        ];
    }
}
