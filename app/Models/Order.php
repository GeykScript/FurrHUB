<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'reference_number',
        'status',
        'payment_status',
        'payment_method',
        'shipping_address'  ,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function orderItems()
    {
        return $this->hasMany(Order_item::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
