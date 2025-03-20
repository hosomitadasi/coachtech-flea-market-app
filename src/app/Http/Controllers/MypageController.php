<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ProfileRequest;
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

    public function updateProfile(AddressRequest $request)
    {
        $user = Auth::user();

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

}
