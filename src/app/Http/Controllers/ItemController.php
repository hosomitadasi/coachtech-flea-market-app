<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::all();

        $wishlistItems = auth()->check() ? auth()->user()->wishlistItems : [];

        return view('index', compact('items', 'wishlistItems'));
    }

    public function search(Request $request)
    {
        $item_name = $request->input('name');

        $items = Item::where('name', 'like', "%{$item_name}%")
        ->where('user_id', '!=', auth()->id())
            ->get();

        $text = "「" . $item_name . "」の検索結果";

        session()->flash('fs_msg', $text);
        return view('index', compact("items", "text"));
    }

    public function show($id)
    {
        $item = Item::with('user', 'categories', 'condition', 'comments.user', 'likes')->findOrFail($id);
        $likesCount = $item->likes->count();
        $commentsCount = $item->comments->count();
        $today = Carbon::now()->toDateString();

        return view('detail', compact("item", "likesCount", "commentsCount", "today"));
    }
}
