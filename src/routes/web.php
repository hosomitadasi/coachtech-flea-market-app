<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\LikeController;
use Faker\Guesser\Name;

Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/search', [ItemController::class, 'search']);
Route::get('/detail/{id}', [ItemController::class, 'show'])->name('detail');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/edit', [ProfileController::class, 'update'])->name('edit.update');

    Route::get('/sell', [TradeController::class, 'showSellForm'])->name('sell');
    Route::post('/sell', [TradeController::class, 'create']);

    Route::get('/buy/{item_id}', [TradeController::class, 'showBuyForm'])->name('buy');
    Route::post('/buy', [TradeController::class, 'store']);
    Route::get('/buy/address', [TradeController::class, 'showAddressForm'])->name('address');
    Route::put('/address', [TradeController::class, 'updateAddress'])->name('address.update');

    Route::post('/like/{id}', [LikeController::class, 'store'])->name('like');
    Route::delete('/like/{id}', [LikeController::class, 'destroy'])->name('unlike');

    Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment');
});
