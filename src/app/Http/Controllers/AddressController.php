<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function showAddressForm()
    {
        $user = auth()->user();
        $address = Address::where('user_id', $user->id)->first();

        return view('address', compact('address'));
    }

    public function updateAddress(AddressRequest $request)
    {
        $request->validate([
            'zip_code' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
        ]);

        $user = auth()->user();

        Address::updateOrCreate(
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
