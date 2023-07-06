<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreMemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/generateRootAccount', [AuthentificationController::class, 'root']);

Route::post('/register', [AuthentificationController::class, 'register']);

Route::post('/login', [AuthentificationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/cards', [CardController::class, 'index']);
    Route::post('/cards/store', [CardController::class, 'store']);
    Route::get('/cards/show/{id}', [CardController::class, 'show']);
    Route::put('/cards/update/{id}', [CardController::class, 'update']);
    Route::delete('/cards/delete/{id}', [CardController::class, 'destroy']);

    Route::get('/members', [MemberController::class, 'index']);
    Route::post('/members/store', [MemberController::class, 'store']);
    Route::get('/members/show/{id}', [MemberController::class, 'show']);
    Route::put('/members/update/{id}', [MemberController::class, 'update']);
    Route::delete('/members/delete/{id}', [MemberController::class, 'destroy']);

    Route::get('/stores', [StoreController::class, 'index']);
    Route::post('/stores/store', [StoreController::class, 'store']);
    Route::get('/stores/show/{id}', [StoreController::class, 'show']);
    Route::put('/stores/update/{id}', [StoreController::class, 'update']);
    Route::delete('/stores/delete/{id}', [StoreController::class, 'destroy']);

    Route::get('/store-members', [StoreMemberController::class, 'index']);
    Route::post('/store-members/store', [StoreMemberController::class, 'store']);
    Route::get('/store-members/show/{id}', [StoreMemberController::class, 'show']);
    Route::put('/store-members/update/{id}', [StoreMemberController::class, 'update']);
    Route::delete('/store-members/delete/{id}', [StoreMemberController::class, 'destroy']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/show/{id}', [UserController::class, 'show']);
    Route::put('/users/update/{id}', [UserController::class, 'update']);
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);

    Route::get('/vouchers', [VoucherController::class, 'index']);
    Route::post('/vouchers', [VoucherController::class, 'store']);
    Route::get('/vouchers/show/{id}', [VoucherController::class, 'show']);
    Route::put('/vouchers/update/{id}', [VoucherController::class, 'update']);
    Route::delete('/vouchers/delete/{id}', [VoucherController::class, 'destroy']);

    Route::get('/logout', [AuthentificationController::class, 'logout']);
});
