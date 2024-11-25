<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //lista itens do pedido
    public function index($orderId)
    {
        $order = Order::where('user_id', auth()->id())->find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        $orderItems = $order->items; //itens associados ao pedido
        return response()->json($orderItems);
    }

    //adiciona um item ao pedido
    public function store(Request $request, $orderId)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $order = Order::where('user_id', auth()->id())->find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        $product = Product::find($request->product_id);

        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price * $request->quantity, //preco total do item
        ]);

        return response()->json($orderItem, 201);
    }

    public function update(Request $request, $orderId, $itemId)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $order = Order::where('user_id', auth()->id())->find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        $orderItem = OrderItem::where('order_id', $order->id)->find($itemId);

        if (!$orderItem) {
            return response()->json(['message' => 'Item não encontrado'], 404);
        }

        $orderItem->update([
            'quantity' => $request->quantity,
            'price' => $orderItem->product->price * $request->quantity,
        ]);

        return response()->json($orderItem);
    }

    //remove um item
    public function destroy($orderId, $itemId)
    {
        $order = Order::where('user_id', auth()->id())->find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        $orderItem = OrderItem::where('order_id', $order->id)->find($itemId);

        if (!$orderItem) {
            return response()->json(['message' => 'Item não encontrado'], 404);
        }

        $orderItem->delete();

        return response()->json(['message' => 'Item removido com sucesso']);
    }
}
