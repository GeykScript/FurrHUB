<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'is_read',
        'order_name',
        'delivered_date',
        'order_address',
        'product_image',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }
}
