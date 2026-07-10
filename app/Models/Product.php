<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Menggabungkan fillable lama (product_code) dan fillable baru (sku) tanpa merusak yang sudah ada
    protected $fillable = [
        'name', 
        'price', 
        'stock', 
        'product_code', 
        'sku', 
        'image'
    ];
}