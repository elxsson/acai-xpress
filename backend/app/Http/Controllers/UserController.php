<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $user = User::create($validatedData);

        session(['user_id' => $user->id]);

        return response()->json([
            'message' => 'Usuário criado com sucesso',
            'user' => $user,
        ], 201);
    }
}
