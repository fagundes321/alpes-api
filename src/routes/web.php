<?php

use Illuminate\Support\Facades\Route;

Route::get('/',  \App\Http\Controllers\Api\ApiController::class);

Route::get('/api', \App\Http\Controllers\Api\ApiController::class);
