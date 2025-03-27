<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;

class ProfileController extends Controller
{
    public function showProfile()
    {

    }

    public function edit()
    {
        return view('edit');
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

    public function index()
    {
        $user = Auth::user();
        $soldItems = $user->items;
        $purchasedItems = $user->purchases;

        return view('profile', compact('user', 'soldItems', 'purchasedItems'));
    }

}
