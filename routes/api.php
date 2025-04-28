<?php

use App\Http\Controllers\Api\Auth\ForgetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register',[AuthController::class ,'register']);
Route::post('/login',[AuthController::class ,'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',[AuthController::class ,'logout']);
});
Route::post('forget-password',[ForgetPasswordController::class,'forgetPassword']);
Route::post('new-password',[ForgetPasswordController::class,'newPassword']);
