<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->only('game_id', 'name', 'text');
        
        $comment = new Comment();
        $comment->game_id = $input["game_id"];
        $comment->name = $input["name"];
        $comment->text = $input["text"];

        $comment->save();

        return redirect('/')->with('success', 'コメントしました');
    }
}
