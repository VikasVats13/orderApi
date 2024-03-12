<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'delivery_address' => 'required|string|max:255',
            'order_items' => 'required|array',
            'order_items.*.id' => 'required|integer|exists:products,id',
            'order_items.*.quantity' => 'required|integer|min:1',
            'delivery_option' => 'required|string',
        ];
    }
}
