<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    protected $primaryKey = 'wishlist_id'; // Explicitly define primary key
    public $incrementing = true; // Ensure auto-increment behavior

    protected $fillable = [
        'user_id',
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
