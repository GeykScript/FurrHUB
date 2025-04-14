<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';
    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'pet_id',
        'service_id',
        'appointment_date',
        'appointment_time',
        'payment_status',
        'payment_method',
        'Status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class , 'pet_id');
    }

    public function service()
    {

        return $this->belongsTo(Service::class ,'service_id', 'service_id');

    }
    public function payment()
    {
        return $this->belongsTo(Payment_method::class, 'payment_method', 'payment_method_id');
    }
    public function statuses()
    {
        return $this->belongsTo(Status::class, 'payment_status', 'status_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'Status', 'status_id');
    }
}
