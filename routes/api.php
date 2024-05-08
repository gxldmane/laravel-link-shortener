<?php

use Illuminate\Support\Facades\Route;

Route::controller('App\Http\Controllers\TokenController')->group(function () {
    Route::post('/tokens', 'create');
    Route::get('/tokens/{shortUrl}', 'show');
});