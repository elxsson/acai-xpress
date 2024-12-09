<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        if (!$userId) {
            return response()->json([
                'message' => 'Usuário não autenticado na sessão',
            ], 401);
        }

        $orders = Order::where('user_id', $userId)->with('products')->get();

        return response()->json([
            'orders' => $orders,
        ], 200);
    }

    public function store(Request $request)
    {
        $userId = session('user_id');

        if (!$userId) {
            return response()->json([
                'message' => 'Usuário não autenticado na sessão',
            ], 401);
        }

        $validatedData = $request->validate([
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
            'total' => 'required|numeric|min:0',
        ]);

        $order = Order::create([
            'user_id' => $userId,
            'products' => json_encode($validatedData['products']),
            'total' => $validatedData['total'],
        ]);

        return response()->json([
            'message' => 'Pedido criado com sucesso',
            'order' => $order->load('products'),
        ], 201);
    }

    public function show($id)
    {
        $userId = session('user_id');

        if (!$userId) {
            return response()->json([
                'message' => 'Usuário não autenticado na sessão',
            ], 401);
        }

        $order = Order::where('id', $id)->where('user_id', $userId)->with('products')->first();

        if (!$order) {
            return response()->json([
                'message' => 'Pedido não encontrado ou não pertence ao usuário',
            ], 404);
        }

        return response()->json([
            'order' => $order,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $userId = session('user_id');

        if (!$userId) {
            return response()->json([
                'message' => 'Usuário não autenticado na sessão',
            ], 401);
        }

        $order = Order::where('id', $id)->where('user_id', $userId)->first();

        if (!$order) {
            return response()->json([
                'message' => 'Pedido não encontrado ou não pertence ao usuário',
            ], 404);
        }

        $validatedData = $request->validate([
            'status' => 'required|string|in:pendente,em preparo,pronto,entregue,cancelado',
        ]);

        $order->update([
            'status' => $validatedData['status'],
        ]);

        return response()->json([
            'message' => 'Pedido atualizado com sucesso',
            'order' => $order,
        ], 200);
    }

    public function destroy($id)
    {
        $userId = session('user_id');

        if (!$userId) {
            return response()->json([
                'message' => 'Usuário não autenticado na sessão',
            ], 401);
        }

        $order = Order::where('id', $id)->where('user_id', $userId)->first();

        if (!$order) {
            return response()->json([
                'message' => 'Pedido não encontrado ou não pertence ao usuário',
            ], 404);
        }

        $order->delete();

        return response()->json([
            'message' => 'Pedido cancelado com sucesso',
        ], 200);
    }
}
