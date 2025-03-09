<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\TradeController;
use Faker\Guesser\Name;

Route::get('/', [ItemController::class, 'index']);
Route::get('/detail/{item_id}', [ItemController::class, 'showDetail'])->name('item.detail');

Route::get('/auth/login', [AuthController::class, 'createLogin'])->name('login');
Route::post('/login', [AuthController::class, 'Login']);

Route::get('/auth/register', [AuthController::class, 'createRegister'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::post('detail/like', [MypageController::class, 'toggleLike'])->name('toggle.like');
    Route::post('detail/comment', [MypageController::class, 'addComment']);

    Route::get('/profile', [MypageController::class, 'indexProfile']);
    Route::get('edit', [MypageController::class, 'showEdit'])->name('show.edit');

    Route::get('/sell', [TradeController::class, 'create'])->name('items.create');
    Route::post('/sell', [TradeController::class, 'store'])->name('items.store');

    Route::get('/buy/{item_id}', [TradeController::class, 'showPurchaseForm'])->name('buy.show');
    Route::post('/buy/{item_id}', [TradeController::class, 'purchase'])->name('buy.purchase');
    Route::get('/address/edit', [AddressController::class, 'edit'])->name('address.edit');
    Route::put('/address', [AddressController::class, 'update'])->name('address.update');
});
