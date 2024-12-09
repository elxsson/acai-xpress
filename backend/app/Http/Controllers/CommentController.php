<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user')->get();

        return response()->json([
            'comments' => $comments,
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:1000',
            'order_id' => 'required|exists:orders,id',
        ]);

        $userId = session('user_id');

        if (!$userId) {
            return response()->json([
                'message' => 'Usuário não autenticado na sessão',
            ], 401);
        }

        $comment = Comment::create([
            'user_id' => $userId,
            'content' => $validatedData['content'],
            'order_id' => $validatedData['order_id'],
        ]);

        return response()->json([
            'message' => 'Comentário criado com sucesso',
            'comment' => $comment,
        ], 201);
    }
}
