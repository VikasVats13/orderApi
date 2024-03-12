<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderStatusRequest;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getOrders(Request $request)
    {

        $order = $this->orderRepository->findOrFail($request);


        return response()->json(['orders' => $order], 200);
    }

    public function create(CreateOrderRequest $request)
    {
        $orderData = $request->validated();
        $order = $this->orderRepository->createOrder($orderData);

        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }



    public function updateOrderStatus(UpdateOrderStatusRequest $request, $id)
    {
        $orderData = $request->validated();
        $order = $this->orderRepository->updateOrderStatus($orderData,$id);
        return response()->json(['message' => 'Order status updated successfully', 'order' => $order], 200);
    }
}
