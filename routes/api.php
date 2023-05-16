<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\CeladorController;


Route::middleware('auth:api')->group(function () {
    Route::apiResource('celadors', CeladorController::class);
    });

    Route::apiResource('personas', PersonaController::class);
