<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\ExhibitionRequest;
use App\Http\Requests\PurchaseRequest;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class TradeController extends Controller
{
        public function showSellForm($item_id)
    {
        $categories = Category::all();
        $conditions = Condition::all();

        return view('sell', compact('categories', 'conditions'));
    }

        public function create(ExhibitionRequest $request)
    {
        $item = new Item();
        $item->user_id = Auth::id();
        $item->name = $request->item_name;
        $item->brand_name = $request->brand_name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->condition_id = $request->condition;

        if ($request->hasFile('item_image')) {
            $path = $request->file('item_image')->store('items', 'public');
            $item->image_url = $path;
        }

        $item->save();

        $item->categories()->attach($request->category);

        return redirect()->route('profile');
    }

    public function showBuyForm($item_id)
    {
        $item = Item::findOrFall($item_id);
        session(['item_id' => $item_id]);

        return view('buy', compact('item') );
    }

    public function store(PurchaseRequest $request)
    {
        $purchase = new Purchase();
        $purchase->user_id = Auth::id();
        $purchase->item_id = $request->item_id;
        $purchase->save();

        return redirect()->route('index')->with('success', '購入が完了しました');
    }

    public function showAddressForm()
    {
        return view('address');
    }

    public function updateAddress(AddressRequest $request)
    {
        $user = Auth::user();
        $user->zip_code = $request->zip_code;
        $user->address = $request->address;
        $user->building = $request->building;
        $user->save();

        return redirect()->route('buy.show', ['item_id' => session('item_id')]);
    }

}
