<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('products')->insert([
            ['name' => 'Product 1', 'price' => 10.00],
            ['name' => 'Product 2', 'price' => 20.00],
            ['name' => 'Product 3', 'price' => 30.00],
            ['name' => 'Product A', 'price' => 10.00],
            ['name' => 'Product B', 'price' => 20.00],
        ]);

        DB::table('orders')->insert([
            ['name' => 'John Doe', 'delivery_address' => '123 Main St', 'status' => 'processing','delivery_option' => 'standard'],
            ['name' => 'Jane Smith', 'delivery_address' => '456 Oak Ave', 'status' => 'processing','delivery_option' => 'standard'],
        ]);

        DB::table('deliveries')->insert([
            ['order_id' => 1, 'estimated_delivery' => now()->addDays(3)],
            ['order_id' => 2, 'estimated_delivery' => now()->addDays(2)],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
