<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = false;
        $user->save();

        $token = $user->createToken('user_token')->plainTextToken;

        return response()->json([
            'message' => 'Usuário registrado com sucesso!',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
            ]
        ], 201);
    }
}
