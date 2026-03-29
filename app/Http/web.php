<?php

use App\Http\Controllers\GetUserTokenController;
use Illuminate\Support\Facades\Route;

Route::get('/users/token', GetUserTokenController::class);
