<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupoEmpresaController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\EntregableController;
use App\Http\Controllers\ObservacionController;
use App\Http\Controllers\PlanillaSeguimientoController;

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
Route::post('/objetivos', [ObjetivoController::class, 'createObjetivo'])->name('objetivos.createObjetivo');
Route::get('/objetivos/{identificador}/entregables', [ObjetivoController::class, 'getEntregables'])->name('objetivos.getEntregables');
Route::post('/objetivos/entregables', [ObjetivoController::class, 'storeEntregable'])->name('objetivos.storeEntregable');
Route::get('/objetivos/{identificador}/planillas-seguimiento', [ObjetivoController::class, 'getPlanillas'])->name('objetivos.getPlanillas');
Route::get('/objetivos/{identificador}/generar-planillas-seguimiento', [ObjetivoController::class, 'genPlanillas'])->name('objetivos.genPlanillas');


Route::get('/actividades', [ActividadController::class, 'index'])->name('actividades.index');
Route::get('/actividades/{identificador}/observaciones', [ActividadController::class, 'getObservaciones'])->name('actividades.getObservaciones');
Route::post('/crear-actividades', [ActividadController::class, 'store'])->name('actividades.store');
Route::delete('/actividades/{identificador}', [ActividadController::class, 'destroy'])->name('actividades.destroy');

Route::get('/observaciones', [ObservacionController::class, 'index'])->name('observaciones.index');
Route::post('/crear-observacion', [ObservacionController::class, 'store'])->name('observacion.store');
Route::patch('/observaciones', [ObservacionController::class, 'update'])->name('observaciones.update');
Route::delete('/observaciones/{identificador}', [ObservacionController::class, 'destroy'])->name('observaciones.destroy');

Route::get('/entregables', [EntregableController::class, 'index']);


Route::get('/planillas-seguimiento', [PlanillaSeguimientoController::class, 'index']);
