<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\TradeController;
use Faker\Guesser\Name;

Route::get('/', [ItemController::class, 'index']);
Route::get('/search', [ItemController::class, 'search']);
Route::get('/detail/{id}', [ItemController::class, 'show'])->name('item.detail');

Route::get('/auth/login', [AuthController::class, 'createLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/auth/register', [AuthController::class, 'createRegister'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/edit', [MypageController::class, 'updateProfile'])->name('update.profile');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::post('/like/{id}', [LikeController::class, 'store'])->name('like');
    Route::delete('/like/{id}', [LikeController::class, 'destroy'])->name('unlike');

    Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment');

    Route::get('/profile', [MypageController::class, 'indexProfile'])->name('profile');
    Route::get('/edit', [MypageController::class, 'showEdit'])->name('show.edit');
    Route::post('/edit', [MypageController::class, 'updateProfile'])->name('update.profile');


    Route::get('/sell', [TradeController::class, 'create'])->name('items.create');
    Route::post('/sell', [TradeController::class, 'store'])->name('items.store');

    Route::get('/buy/{item_id}', [TradeController::class, 'showPurchaseForm'])->name('buy.show');
    Route::post('/buy/{item_id}', [TradeController::class, 'purchase'])->name('buy.purchase');
    Route::get('/address/edit', [TradeController::class, 'edit'])->name('address.edit');
    Route::put('/address', [TradeController::class, 'update'])->name('address.update');
});
