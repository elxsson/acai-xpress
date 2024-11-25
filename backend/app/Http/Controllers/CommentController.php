<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'order_id' => $order->id,
            'comment' => $request->comment,
        ]);

        return response()->json($comment, 201);
    }

    public function index($orderId)
    {
        $comments = Comment::where('order_id', $orderId)->get();
        return response()->json($comments);
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== Auth::id() && !Auth::user()->is_admin) {
            return response()->json(['message' => 'Sem autorizacao'], 403);
        }

        $comment->delete();
        return response()->json(['message' => 'Comentario deletado com sucesso']);
    }
}
