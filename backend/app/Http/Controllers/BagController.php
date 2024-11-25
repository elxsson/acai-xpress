<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BagItem;

class BagController extends Controller
{
    public function index(Request $request) //exibir itens da sacola
    {
        $bag = session('bag', []);
        $total = array_sum(array_map(fn($item) => $item->subtotal, $bag));

        return response()->json([
            'bag' => $bag,
            'total' => $total,
        ]);
    }

    public function add(Request $request, $productId)   //adiciona item
    {
        $product = Product::findOrFail($productId);
        $quantity = $request->input('quantity', 1);

        
        $bag = session('bag', []);  //recupera a sacola da sessão

        if (isset($bag[$productId])) {  //verificar se o item ja existe na sacola
            $bag[$productId]->quantity += $quantity;
            $bag[$productId]->subtotal = $bag[$productId]->price * $bag[$productId]->quantity;
        } else {
            $bag[$productId] = new BagItem(
                $product->id,
                $product->name,
                $product->price,
                $quantity
            );
        }

        session(['bag' => $bag]);   //atualiza a sacola na sessão
        return response()->json(['message' => 'Item adicionado à sacola!', 'bag' => $bag]);
    }

    
    public function remove(Request $request, $productId)    //remove item
    {
        $bag = session('bag', []);

        if (isset($bag[$productId])) {
            unset($bag[$productId]);
            session(['bag' => $bag]);
        }

        return response()->json(['message' => 'Item removido da sacola!', 'bag' => $bag]);
    }

    public function clear(Request $request) //limpa sacola
    {
        session()->forget('bag');
        return response()->json(['message' => 'Sacola esvaziada!']);
    }
}

