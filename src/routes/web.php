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

Route::get('buy', [TradeController::class, ''])->name('indexBuy');