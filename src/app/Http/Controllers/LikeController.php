<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($id)
    {
        $like = new Like();
        $like->user_id = Auth::id();
        $like->item_id = $id;
        $like->save();

        return back();
    }

    public function destroy($id)
    {
        $like = Like::where('user_id', Auth::id())->where('item_id', $id)->first();
        $like->delete();

        return back();
    }
}
