<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\LikeController;

Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/search', [ItemController::class, 'search']);
Route::get('/item/{item_id}', [ItemController::class, 'showDetailForm'])->name('detail');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/mypage', [ProfileController::class, 'showMypage'])->name('mypage');
    Route::get('/mypage/profile', [ProfileController::class, 'showProfile'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


    Route::get('/sell', [TradeController::class, 'showSellForm'])->name('sell');
    Route::post('/sell', [TradeController::class, 'create']);

    Route::get('/purchase/{item_id}', [TradeController::class, 'showPurchaseForm'])->name('purchase');
    Route::post('/purchase', [TradeController::class, 'store'])->name('purchase.store');
    Route::get('/purchase/address/{item_id}', [TradeController::class, 'showAddressForm'])->name('address');
    Route::post('/address', [TradeController::class, 'updateAddress'])->name('address.update');

    Route::post('/like/{id}', [LikeController::class, 'store'])->name('like');
    Route::delete('/like/{id}', [LikeController::class, 'destroy'])->name('unlike');

    Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment');
});
