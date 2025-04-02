<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\Discount;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Explicitly define the table (optional)
    

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image_url',
        'stock_quantity',
        'serial_number',
        'expiry_date',
        'quantity_sold',
        'discount_id'
    ];

    protected $dates = ['expiry_date']; // Cast expiry_date to Carbon instance

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id'); // Ensure 'id' is the primary key
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'discount_id'); // Ensure 'id' is the primary key
    }

    //get the discounted price
    public function getDiscountedPriceAttribute()
    {
        if ($this->discount) {
            if ($this->discount->discount_type === 'percentage') {
                return $this->price - ($this->price * ($this->discount->discount_value / 100));
            } elseif ($this->discount->discount_type === 'fixed') {
                return max(0, $this->price - $this->discount->discount_value);
            }
        }
        return $this->price;
    }
    //convert discount value to percentage or fixed amount
    public function getDiscountValueAttribute()
    {
        if ($this->discount) {
            return $this->discount->discount_type === 'percentage'
                ? ($this->discount->discount_value * 100) . '%'  // Convert decimal to percentage
                : '₱' . number_format($this->discount->discount_value, 2); // Format fixed amount
        }
        return 'No Discount';
    }
    //get the product category
    public function getProductCategoryAttribute(){
        if ($this->category) {
            return $this->category->name;
        }
        return 'No Category';
    }

    
    
}
