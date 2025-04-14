<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    protected $table = 'payment_methods';
    protected $primaryKey = 'payment_method_id';
    public $timestamps = true;

    protected $fillable = [
        'payment_name',
        'created_at',
        'updated_at'
    ];
}
