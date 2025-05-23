<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services'; // Specify the table name if different from the model name
    protected $primaryKey = 'service_id'; // Specify the primary key if different from 'id'
    public $timestamps = true; // Enable timestamps if your table has 'created_at' and 'updated_at' columns
    public $incrementing = true; // Set to false if your primary key is not auto-incrementing
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'status',
        'discount_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'category_id'); // Ensure 'id' is the primary key
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
        if ($this->discount && $this->discount->status_id == 7) {
            if ($this->discount->discount_type === 'percentage') {
                // Apply the percentage discount correctly as a decimal
                return $this->price - ($this->price * $this->discount->discount_value);
            } elseif ($this->discount->discount_type === 'fixed') {
                // Apply the fixed discount
                return max(0, $this->price - $this->discount->discount_value);
            }
        }

        return $this->price;
    }

    // Get the formatted discount value
    public function getDiscountValueAttribute()
    {
        if ($this->discount && $this->discount->status_id == 7) {
            return $this->discount->discount_type === 'percentage'
                ? ($this->discount->discount_value * 100) . '%'  // Convert decimal to percentage
                : '₱' . number_format($this->discount->discount_value, 2); // Format fixed amount
        }

        return 'No Discount';
    }



 
}
