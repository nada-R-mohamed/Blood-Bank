<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\GovernorateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.layout');
});
Route::get('/index', function () {
    return view('dashboard.index');
})->name('index');

Route::resource('governorates', GovernorateController::class);
Route::resource('cities', CityController::class);
Route::resource('categories', CategoryController::class);
Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::patch('clients/{client}/toggle-status', [ClientController::class, 'toggleStatus'])->name('clients.toggle-status');
