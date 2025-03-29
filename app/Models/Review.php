<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews'; // Explicitly define the table (optional)

    protected $fillable = [
        'product_id',
        'user_id',
        'order_id',
        'ratings',
        'review_img',
        'review_text',
        'review_date',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id'); // Ensure 'id' is the primary key
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Ensure 'id' is the primary key
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id'); // Ensure 'id' is the primary key
    }


}
