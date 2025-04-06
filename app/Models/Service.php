<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'status',
        'discount_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id'); // Ensure 'id' is the primary key
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'discount_id'); // Ensure 'id' is the primary key
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status', 'status_id'); // Ensure 'id' is the primary key
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



 
}
