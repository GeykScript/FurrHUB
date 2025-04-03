<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $primaryKey = 'address_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'province',
        'city',
        'barangay',
        'street',
        'postal_code',
        'default',
        'fullname',
        'description',
        'contact_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
