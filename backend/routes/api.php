<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::apiResource('products', ProductController::class)->only(['index', 'show']); // visualização de produtos
});

Route::middleware('admin')->group(function () {
    Route::apiResource('products', ProductController::class)->only(['store', 'update', 'destroy']); // crud de produtos p admin
});


Route::middleware('auth')->group(function () {
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{id}', [OrderController::class, 'show']);
    Route::post('orders', [OrderController::class, 'store']);
    Route::delete('orders/{id}', [OrderController::class, 'destroy']);

    Route::middleware('admin')->put('orders/{id}/status', [OrderController::class, 'updateStatus']); // atualizar status do pedido
});

Route::middleware('auth')->group(function () {
    Route::get('orders/{orderId}/items', [OrderItemController::class, 'index']);
    Route::post('orders/{orderId}/items', [OrderItemController::class, 'store']);
    Route::put('orders/{orderId}/items/{itemId}', [OrderItemController::class, 'update']);
    Route::delete('orders/{orderId}/items/{itemId}', [OrderItemController::class, 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('orders/{orderId}/comments', [CommentController::class, 'index']);
    Route::post('orders/{orderId}/comments', [CommentController::class, 'store']);
    Route::delete('comments/{id}', [CommentController::class, 'destroy']);
});
