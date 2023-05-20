<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\CeladorController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController;



    Route::middleware('api')->group(function () {
        // Rutas para el acceso a los tokens
        Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);
    
        // Rutas para la gestión de los tokens
        Route::middleware('auth:api')->group(function () {
            Route::get('/oauth/tokens', [AuthorizedAccessTokenController::class, 'forUser']);
            Route::delete('/oauth/tokens/{token_id}', [AuthorizedAccessTokenController::class, 'destroy']);
            Route::delete('/oauth/tokens', [AuthorizedAccessTokenController::class, 'destroyAll']);
            Route::apiResource('celadors', CeladorController::class);
        });
        Route::apiResource('personas', PersonaController::class);
    });