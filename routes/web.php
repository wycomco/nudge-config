<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonConfigController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/macos/config/{config:slug}/model/{model}', [JsonConfigController::class, "show"])->name('config');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
