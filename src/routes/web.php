<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api', \App\Http\Controllers\ApiController::class);
Route::apiResource('cars', CarController::class);
