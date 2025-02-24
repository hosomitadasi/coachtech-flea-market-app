<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mypage;

class MypageController extends Controller
{
    public function Mypage()
    {

    }

    public function toggleLike($item_id)
    {
        $user = auth()->user();
        $like = $user->likes()->where('item_id', $item_id)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            $user->likes()->create(['item_id' => $item_id]);
            $liked = true;
        }

        return response()->json(['liked' => $liked, 'likes_count' => Item::find($item_id)->likes()->count()]);
    }

    public function addComment(Request $request, $item_id)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'item_id' => $item_id,
            'content' => $request->content,
        ]);

        return back();
    }

    public function indexProfile()
    {

    }

    public function updateProfile()
    {

    }
}
