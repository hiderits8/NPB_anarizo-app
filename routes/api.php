<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DictController;

Route::prefix('dict')->group(function () {
    Route::get('/teams', [DictController::class, 'teams']);
    Route::get('/stadiums', [DictController::class, 'stadiums']);
    Route::get('/clubs', [DictController::class, 'clubs']);
    Route::get('/players', [DictController::class, 'players']);
});

Route::get('/ping', fn() => ['ok' => true]);
