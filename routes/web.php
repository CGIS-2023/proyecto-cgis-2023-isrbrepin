<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\CeladorController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\CamillaController;
use App\Http\Controllers\TipoCamillaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\PacienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resources([
        //No pongo medicos como route resource porque voy a añadirle middlewares diferentes
        'medicos' => MedicoController::class,
        'salas' => SalaController::class,
        'tipo_camillas' => TipoCamillaController::class,
        'especialidads' => EspecialidadController::class,
        'celadors' => CeladorController::class,
        'camillas' => CamillaController::class,
        'pacientes' => PacienteController::class,
    ]);
    Route::post('/salas/{sala}/attach-camilla', [SalaController::class, 'attach_camilla'])
        ->name('salas.attachCamilla')
        ->middleware('can:attach_camilla,sala');
    Route::delete('/salas/{sala}/detach-camilla/{camilla}', [SalaController::class, 'detach_camilla'])
        ->name('salas.detachCamilla')
        ->middleware('can:detach_camilla,sala');
});

