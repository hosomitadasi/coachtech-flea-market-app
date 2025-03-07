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
Route::get('/auth/register', [AuthController::class, 'createRegister'])->name('register');

Route::get('/sell', [TradeController::class, 'create'])->name('items.create');
Route::post('/sell', [TradeController::class, 'store'])->name('items.store');

Route::get('/buy/{item_id}', [TradeController::class, 'showPurchaseForm'])->name('buy.show');
Route::post('/buy/{item_id}', [TradeController::class, 'purchase'])->name('buy.purchase');

Route::get('/address/edit', [AddressController::class, 'edit'])->name('address.edit');
Route::put('/address', [AddressController::class, 'update'])->name('address.update');