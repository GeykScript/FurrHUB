<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets'; 
    protected $primaryKey = 'pet_id'; 
    public $incrementing = true; 
    protected $fillable = [
        'pet_name',
        'user_id',
        'pet_img',
        'age',
        'gender',
        'birthday',
        'weight',
        'vaccination_proof',
        'animal_type',
        'pet_breed',
        'color',
        'Size',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }
}
