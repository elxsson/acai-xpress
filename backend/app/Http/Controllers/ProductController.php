<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->except('index');
    }
    
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'products' => $products,
        ], 200);
    }

    public function show(Product $product)
    {
        if (!$product) {
            return response()->json([
                'message' => 'Produto não encontrado',
            ], 404);
        }

        return response()->json([
            'product' => $product,
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::create($validatedData);

        return response()->json([
            'message' => 'Produto criado com sucesso',
            'product' => $product,
        ], 201);
    }

    public function update(Request $request, Product $product)
    {
        if (!$product) {
            return response()->json([
                'message' => 'Produto não encontrado',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'stock' => 'sometimes|required|integer|min:0',
        ]);

        $product->update($validatedData);

        return response()->json([
            'message' => 'Produto atualizado com sucesso',
            'product' => $product,
        ], 200);
    }

    public function destroy(Product $product)
    {
        if (!$product) {
            return response()->json([
                'message' => 'Produto não encontrado',
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Produto excluído com sucesso',
        ], 200);
    }
}
