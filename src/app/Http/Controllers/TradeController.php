<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\ExhibitionRequest;
use App\Http\Requests\PurchaseRequest;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class TradeController extends Controller
{
    public function showSellsForm()
    {
        $categories = Category::all();
        $conditions = Condition::all();
        return view('sell', compact('categories', 'conditions'));
    }

    public function store(ExhibitionRequest $request)
    {
        $item = new Item();
        $item->user_id = Auth::id();
        $item->name = $request->name;
        $item->brand_name = $request->brand_name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->condition_id = $request->condition_id;

        if ($request->hasFile('image')) {
            $item->image_url = $request->file('image')->store('images', 'public');
        }

        $item->save();

        $categoryIds = explode(',', $request->categories);
        $item->categories()->attach($categoryIds);

        return redirect()->route('item.detail', ['item_id' => $item->id]);
    }

    public function showPurchaseForm($itemId)
    {
        $item = Item::findOrFail($itemId);
        $user = Auth::user();
        return view('buy', compact('item', 'user'));
    }

    public function purchase(PurchaseRequest $request, $itemId)
    {
        $item = Item::findOrFail($itemId);
        $user = Auth::user();

        $purchase = new Purchase();
        $purchase->user_id = $user->id;
        $purchase->item_id = $itemId;
        $purchase->save();

        $item->sold = true;
        $item->save();

        return redirect()->route('item.detail', ['item_id' => $itemId])->with('success', '購入が完了しました');
    }

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
