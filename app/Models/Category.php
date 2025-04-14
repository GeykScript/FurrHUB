<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'description'];
    protected $primaryKey = 'category_id'; // Specify the primary key if different from 'id'
    public $timestamps = true; // Enable timestamps if your table has 'created_at' and 'updated_at' columns
    public $incrementing = true; // Set to false if your primary key is not auto-incrementing

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
    
    
}
