<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequestRequest;
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

    public function showProfile(Request $request)
    {
        $source = $request->query('source');
        $user = Auth::user();

        return view('profile', compact('user', 'source'));
    }

    public function update(ProfileRequest $profileRequest, AddressRequest $addressRequest)
    {
        $user = Auth::user();
        $user->name = $profileRequest->name;
        $user->zip_code = $addressRequest->zip_code;
        $user->address = $addressRequest->address;
        $user->building = $addressRequest->building;

        if ($profileRequest->hasFile('avatar')) {
            $path = $profileRequest->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        $source = $profileRequest->query('source');
        if ($source === 'register') {
            return redirect()->route('index');
        }

        return redirect()->route('mypage');
    }

}
