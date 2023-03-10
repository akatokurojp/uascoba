<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    // Admin Routes
    // GET
    Route::get('/product', [ItemController::class, 'showForm'])->name('product.form');
    Route::get('/product/{id}', [ItemController::class, 'edit']) ->name('product.edit');
    // POST
    Route::post('/product', [ItemController::class, 'store'])->name('product.create');
    // PATCH
    Route::patch('/product/{id}', [ItemController::class, 'update'])->name('product.update');
    // DELETE
    Route::delete('/product/{id}', [ItemController::class, 'delete'])->name('product.delete');
});

Route::middleware('isUser')->group(function (){
    // GET
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/{id}', [CartController::class, 'showForm'])->name('cart.form');
    Route::get('/history', [TransactionController::class, 'index'])->name('transaction.index');
    // POST
    Route::post('/cart', [CartController::class, 'store'])->name('cart.create');
    Route::post('/checkout',[TransactionController::class, 'store'])->name('transaction.create');
    // PATCH
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    //DELETE
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/editprofile', [ProfileController::class, 'profileEdit'])->name('profile.Edit');
    Route::post('/profileupdate', [ProfileController::class, 'profileUpdate'])->name('profile.Update');
    Route::get('/changepassword', [ProfileController::class, 'changePassword'])->name('changePassword');
    Route::post('/passwordupdate', [ProfileController::class, 'changePasswordSave'])->name('postChangePassword');
});

Route::middleware('auth')->group(function () {
    // Authenticated User Routes
    // GET

    // POST

    // PATCH

    // DELETE

});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product', [ItemController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ItemController::class, 'viewDetail'])->name('product.detail');
Route::get('/search', [ItemController::class, 'search'])->name('search');

Route::get('/login/{provider}', [SocialAccountController::class, 'redirectProvider'])->name('provider.login');
Route::get('/{provider}/callback', [SocialAccountController::class, 'providerCallback']);
