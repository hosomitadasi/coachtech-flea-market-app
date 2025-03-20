<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->item_id = $id;
        $comment->content = $request->comment;
        $comment->save();

        return back();
    }
}
