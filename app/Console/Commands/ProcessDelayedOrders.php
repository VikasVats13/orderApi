<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessDelayedOrders extends Command
{
    protected $signature = 'orders:process-delayed';
    protected $description = 'Update status of processing orders that have passed their delivery time';

    public function handle()
    {
        // Find processing orders that have passed their estimated delivery time
        $delayedOrders = Order::with('delivery')->where('status', 'processing')
                              ->whereHas('delivery',function($query){
                                return $query->whereDate('estimated_delivery', '<', Carbon::now());
                              })
                              ->get();

        foreach ($delayedOrders as $order) {
            $order->status = 'delayed';
            $order->save();
            Log::info(["orders:process-delayed" => $order]);
        }

        $this->info('Successfully updated status of delayed orders.');
    }
}
