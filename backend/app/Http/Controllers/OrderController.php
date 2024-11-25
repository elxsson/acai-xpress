<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //lista de pedidos do usuario
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->get(); //usuario logado
        return response()->json($orders);
    }

    public function show($id)
    {
        $order = Order::where('user_id', auth()->id())->find($id);

        if (!$order) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        return response()->json($order);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'delivery_address' => 'required|string',
            // 'payment_method' => 'required|string|in:cartao,dinheiro,pix', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $request->total_price,
            'delivery_address' => $request->delivery_address,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        //vincula a sacola
        foreach ($request->products as $productData) {
            $product = Product::find($productData['id']);
            $order->products()->attach($product, ['quantity' => $productData['quantity']]);
        }

        return response()->json($order, 201);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        //apenas administradores podem atualizar o status
        if (auth()->user()->is_admin) {
            $validator = Validator::make($request->all(), [
                'status' => 'required|string|in:pendente,preparando,pronto,entregue,cancelado',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $order->update([
                'status' => $request->status,
            ]);

            return response()->json($order);
        }

        return response()->json(['message' => 'Acesso não autorizado'], 403);
    }

    public function destroy($id)
    {
        $order = Order::where('user_id', auth()->id())->find($id);

        if (!$order) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Pedido deletado com sucesso']);
    }
}
