<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::middleware('auth')->group(function () {
    Route::apiResource('products', ProductController::class)->only(['index', 'show']);
});

Route::middleware('admin')->group(function () {
    Route::apiResource('products', ProductController::class)->only(['store', 'update', 'destroy']);
});


