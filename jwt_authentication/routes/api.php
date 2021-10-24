<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# Auth
Route::prefix('auth')->middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'userProfile']);
});
Route::apiResource('categories', CategoryController::class)->middleware('auth:api');

# Auth
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});
