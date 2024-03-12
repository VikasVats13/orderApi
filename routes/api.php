<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/orders', [OrderController::class, 'getOrders']);
// Route::post('/create/orders', [OrderController::class, 'create']);
// Route::patch('/api/orders/{id}', [OrderController::class, 'updateOrderStatus']);


Route::post('/orders', [OrderController::class, 'create']);
Route::get('/orders', [OrderController::class, 'getOrders']);
Route::patch('/orders/{id}', [OrderController::class, 'updateOrderStatus']);

Route::get('/orders/{id}', [OrderController::class, 'updateOrderStatus']);
