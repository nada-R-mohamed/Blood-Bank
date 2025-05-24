<?php

use App\Http\Controllers\Dashboard\GovernorateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.layout');
});
Route::get('/index', function () {
    return view('dashboard.index');
})->name('index');

Route::resource('governorates', GovernorateController::class);
