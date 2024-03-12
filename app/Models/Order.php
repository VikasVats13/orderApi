<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'delivery_address', 'order_items', 'delivery_option','status','estimated_delivery'];

    protected $casts = [
        'order_items' => 'array',
    ];


    public function delivery(){
        return $this->hasMany(Deliveries::class, 'order_id', 'id');
    }
}
