<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'recommend');
        $items = Item::where('user_id', '!=', auth()->id())->get();
        $wishlistItems = collect();

        if (auth()->check()) {
            if ($filter === 'mylist') {
                $wishlistItems = Item::whereHas('likes', function ($query) {
                    $query->where('user_id', auth()->id());
                })->get();
            } else {
                $items = Item::where('user_id', '!=', auth()->id())->get();
            }
        }

        return view('index', compact('items', 'filter', 'wishlistItems'));
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
        $item = Item::with('user', 'categories', 'condition', 'comments.user', 'likes')->findOrFall($id);
        $today = Carbon::now()->toDateString();

        return view('detail', compact("item", "today"));
    }
}
