<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;

class Admin extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        
    ];
}
