<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'total_amount',
        'reference_number',
        'status',
        'payment_status',
        'payment_method',
        'shipping_address',
        'shipping_fee',
        'Delivery_Date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' );
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
    public function address()
    {
        return $this->belongsTo(Address::class, 'shipping_address', 'address_id');
    }
    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status', 'status_id');
    }

    public function payment_status_relation()
    {
        return $this->belongsTo(Status::class, 'payment_status', 'status_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment_method::class , 'payment_method', 'payment_method_id');
    }

}
