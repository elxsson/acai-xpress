<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;


Route::post('/users', [UserController::class, 'store']);   

Route::get('/check-session', function (Request $request) {
    if (Auth::check()) {
        return response()->json(['user_id' => Auth::id()]);
    } else {
        return response()->json(['message' => 'Usuário não autenticado'], 404);
    }
});


Route::resource('orders', OrderController::class);
Route::get('/products', [ProductController::class, 'index']);
Route::resource('orders.comments', CommentController::class)->shallow();


