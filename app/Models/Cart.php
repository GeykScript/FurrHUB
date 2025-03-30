<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'cart_id'; // ✅ Explicitly define primary key
    public $incrementing = true; // ✅ Ensure auto-increment behavior

    protected $fillable = [
        'user_id',
        'total_amount',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
