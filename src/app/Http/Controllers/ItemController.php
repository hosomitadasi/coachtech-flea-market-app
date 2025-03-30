<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::where('user_id', '!=', auth()->id())
            ->when($request->query('page') === 'mylist', function ($query) {
                $query->whereIn('id', Auth::user()->likes()->pluck('item_id'));
            })
            ->get()
            ->map(function ($item) {
                $item->is_sold = $item->purchases()->exists();
                return $item;
            });

        if ($request->ajax()) {
            return response()->json(['items' => $items]);
        }

        return view('index', compact('items'));
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

    public function showDetailForm($item_id)
    {
        $item = Item::with('user', 'categories', 'condition', 'comments.user', 'likes')->findOrFail($item_id);
        $likesCount = $item->likes->count();
        $commentsCount = $item->comments->count();
        $today = Carbon::now()->toDateString();

        return view('detail', compact("item", "likesCount", "commentsCount", "today"));
    }
}
