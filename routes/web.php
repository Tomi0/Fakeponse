<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'hola' => 'mundo',
        'config' => config('app.name'),
    ]);
});
