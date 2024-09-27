<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupoEmpresaController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ObservacionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/health', function () {
    return response()->json(['status' => 'OK'], 200);
});

Route::get('/grupoEmpresas', [GrupoEmpresaController::class, 'index'])->name('grupoEmpresas.index');
Route::get('/grupoEmpresas/{identificador}/usuarios', [GrupoEmpresaController::class, 'getUsuarios'])->name('grupoEmpresas.getUsuarios');

Route::get('/objetivos', [ObjetivoController::class, 'index'])->name('objetivos.index');
Route::get('/objetivos/{identificador}/actividades', [ObjetivoController::class, 'getActividades'])->name('objetivos.getActividades');

Route::get('/actividades', [ActividadController::class, 'index'])->name('actividades.index');
Route::get('/actividades/{identificador}/observaciones', [ActividadController::class, 'getObservaciones'])->name('actividades.getObservaciones');
Route::post('/crear-actividades', [ActividadController::class, 'store'])->name('actividades.store');

Route::get('/observaciones', [ObservacionController::class, 'index'])->name('observaciones.index');
Route::post('/crear-observacion', [ObservacionController::class, 'store'])->name('observacion.store');
Route::delete('/eliminar-observacion/{identificador}', [ObservacionController::class, 'destroy'])->name('observacion.destroy');