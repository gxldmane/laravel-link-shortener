<?php

use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('url.create');
})->name('create');

Route::controller(TokenController::class)->group(function () {
    Route::post('/tokens', 'store')->name('store')->middleware('throttle:15,1');
    Route::get('/{shortUrl}', 'show');
});