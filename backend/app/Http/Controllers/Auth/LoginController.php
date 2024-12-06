<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            $token = $user->createToken('user_token')->plainTextToken;

            return response()->json([
                'message' => 'Login bem-sucedido!',
                'redirect_url' => $user->is_admin ? '/admin' : '/',
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'email' => $user->email
                ]
            ], 200);
        }

        return response()->json(['message' => 'Credenciais inválidas.'], 401);
    }
}
