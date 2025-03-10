<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mypage;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function indexProfile()
    {
        $user = Auth::user();
        $soldItems = $user ->items;
        $purchasedItems = $user->purchase->map(function ($purchase) {
            return $purchase->items;
        });

        return view('profile', compact('user', 'soldItems', 'purchasedItems'));
    }

    public function showEdit()
    {
        $user = Auth::user();
        return view('edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'zip_code' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png',
        ]);

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->name = $request->name;
        $user->zip_code = $request->zip_code;
        $user->address = $request->address;
        $user->building = $request->building;
        $user->save();

        return redirect()->route('profile');
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

        Comment::create([
            'user_id' => auth()->id(),
            'item_id' => $item_id,
            'content' => $request->content,
        ]);

        return back();
    }

}
