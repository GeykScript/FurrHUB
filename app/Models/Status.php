<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses'; // Explicitly define table name
    protected $fillable = ['status_name', 'status_details'];

    public function discounts()
    {
        return $this->hasMany(Discount::class, 'status_id', 'status_id');
    }
}
