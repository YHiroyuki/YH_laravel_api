<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    UserController,
    ItemController
};

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/user', UserController::class);

Route::controller(AuthController::class)->group(function () {
    Route::post('/signup', 'signup');
    Route::post('/signin', 'signin');
});

// TODO: ミドルウェアの実装
Route::middleware(['auth:sanctum'])->group(function () {
    // itemに関するルーティング
    Route::controller(ItemController::class)->group(function () {
        Route::get('/item/list', 'list');
    });

    // userに関するルーティング
    Route::controller(UserController::class)->group(function () {
        Route::get('/user/info', 'info');
    });
});
