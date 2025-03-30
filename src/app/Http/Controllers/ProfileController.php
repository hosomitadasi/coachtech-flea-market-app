<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function showMypage(Request $request)
    {
        $user = Auth::user();
        $soldItems = $user->items;
        $purchasedItems = $user->purchases;

        return view('mypage', compact('user', 'soldItems', 'purchasedItems'));
    }

    public function showProfile()
    {
        return view('profile');
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->zip_code = $request->zip_code;
        $user->address = $request->address;
        $user->building = $request->building;

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('index');
    }

}
