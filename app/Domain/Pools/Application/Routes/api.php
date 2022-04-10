<?php

use App\Domain\Pools\Application\Controllers\PoolController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('/api/pools', [PoolController::class, 'index']);
});
