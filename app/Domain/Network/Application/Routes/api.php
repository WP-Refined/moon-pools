<?php

use App\Domain\Network\Application\Controllers\NetworkController;
use Illuminate\Support\Facades\Route;

Route::get('/api/network/supply', [NetworkController::class, 'supply']);
