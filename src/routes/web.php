<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\LikeController;

Route::get('/', [ItemController::class, 'index']);

Route::get('/item/{item_id}', [ItemController::class, 'show']);

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/purchase/{item}', [PurchaseController::class, 'create'])->name('purchase.create');

    Route::post('/purchase/{item}', [PurchaseController::class, 'store'])->name('purchase.store');

    Route::get('/sell', [ItemController::class, 'create'])->name('item.create');

    Route::post('/sell', [ItemController::class, 'store'])->name('item.store');

    Route::post('/comment/{item_id}', [CommentController::class, 'store']);

    Route::post('/like/{item_id}', [LikeController::class, 'toggle']);

    Route::get('/address/{item_id}', [AddressController::class, 'edit']);

    Route::post('/address/{item_id}', [AddressController::class, 'update']);
});
