<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\Auth\ForgetPasswordController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;


////////////        Auth        ////////////
Route::post('/register',[AuthController::class ,'register']);
Route::post('/login',[AuthController::class ,'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',[AuthController::class ,'logout']);
    Route::get('profile',[ProfileController::class,'getProfile']);
    Route::post('update-profile',[ProfileController::class,'updateProfile']);
});

////////////     Reset password      ////////////
Route::post('forget-password',[ForgetPasswordController::class,'forgetPassword']);
Route::post('new-password',[ForgetPasswordController::class,'newPassword']);

////////////      General Apis      ////////////
Route::get('governorates',[GeneralController::class,'governorates']);
Route::get('cities',[GeneralController::class,'cities']);
Route::get('categories',[GeneralController::class,'categories']);
Route::get('blood-types',[GeneralController::class,'bloodTypes']);

////////////        Articles        ///////////////

Route::get('articles',[ArticleController::class,'articles']);
Route::get('article',[ArticleController::class,'article']);
Route::get('favorites',[ArticleController::class,'favoriteArticles']);
Route::post('favorites',[ArticleController::class,'toggleFavoriteArticles']);


