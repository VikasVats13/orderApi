<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['name','delivery_address','delivery_option','order_items'];

    protected $casts = [
        'order_items' => 'array',
    ];
}
