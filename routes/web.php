<?php

use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\CommunicationRequestController;
use App\Http\Controllers\Dashboard\DonationRequestController;
use App\Http\Controllers\Dashboard\GovernorateController;
use App\Http\Controllers\Dashboard\SettingController;
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
Route::resource('articles',ArticleController::class);
Route::get('/communication-requests', [CommunicationRequestController::class, 'index'])->name('communication-requests.index');
Route::delete('/communication-requests/{communicationRequest}', [CommunicationRequestController::class, 'destroy'])->name('communication-requests.destroy');
Route::get('/donation-requests', [DonationRequestController::class, 'index'])->name('donation-requests.index');
Route::get('/donation-requests/{donationRequest}', [DonationRequestController::class, 'show'])->name('donation-requests.show');
Route::delete('/donation-requests/{donationRequest}', [DonationRequestController::class, 'destroy'])->name('donation-requests.destroy');
Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');
