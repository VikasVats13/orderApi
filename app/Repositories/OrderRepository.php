<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{

    public function findOrFail($data){

        $orderId = $data->input('order_id');
        $status = $data->input('status');

        if ($orderId) {
            $orders = Order::with('delivery')->findOrFail($orderId);
        } elseif ($status) {
            $orders = Order::with('delivery')->where('status', $status)->get();
        } else {
            $orders = Order::with('delivery')->get();
        }

        return $orders;
    }

    public function createOrder(array $data)
    {
        return Order::create($data);
    }


    public function updateOrderStatus($data,$id){

        $status = $data['status'];

        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->update();

        return $order;
    }
}
