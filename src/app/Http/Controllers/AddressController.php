<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AddressController extends Controller
{
    public function showAddressForm()
    {
        $user = auth()->user();
        $address = User::where('user_id', $user->id)->first();

        return view('address', compact('address'));
    }

    public function updateAddress(AddressRequest $request)
    {

        $user = auth()->user();

        User::updateOrCreate(
            ['user_id' => $user->id],
            [
                'zip_code' => $request->zip_code,
                'address' => $request->address,
                'building' => $request->building,
            ]
        );

        return redirect()->route('buy')->with('success', '住所を更新しました');
    }
}
