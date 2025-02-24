<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'recommend');
        if (auth()->check()) {
            if ($filter === 'mylist') {
                $items = Item::whereHas('likes', function ($query) {
                    $query->where('user_id', auth()->id());
                })->get();
            } else {
                $items = Item::where('user_id', '!=', auth()->id())->get();
            }
        } else {
            $items = Item::where('user_id', '!=', auth()->id())->get();
        }

        return view('index', compact('items', 'filter'));
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

    public function showDetail($item_id)
    {
        $item = Item::find($item_id)->with('user', 'category', 'condition', 'comments.user', 'likes')->findOrFall($item_id);
        $today = Carbon::now()->toDateString();

        return view('detail', compact("item", "today"));
    }
}
