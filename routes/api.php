<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupoEmpresaController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CriterioController;
use App\Http\Controllers\CriterioEvaluacionFinalController;
use App\Http\Controllers\EntregableController;
use App\Http\Controllers\EvaluacionObjetivoController;
use App\Http\Controllers\MotivoController;
use App\Http\Controllers\ObservacionController;
use App\Http\Controllers\ParametroEvaluacionController;
use App\Http\Controllers\PlanificacionController;
use App\Http\Controllers\PlanillaSeguimientoController;
use App\Http\Controllers\UserController;

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
Route::get('/grupo-empresa/{id}/objetivos/actividades', [GrupoEmpresaController::class, 'getObjetivosConActividades']);
Route::get('/grupo-empresa/{id}/planificaciones', [GrupoEmpresaController::class, 'getPlanificaciones']);
Route::get('/grupoempresa/{identificador}/objetivos', [GrupoEmpresaController::class, 'getObjetivos']);
Route::get('/grupo-empresa/asistencia', [GrupoEmpresaController::class, 'getAsistenciaUsuarios'])->name('grupoEmpresa.getAsistenciaUsuarios');

Route::get('/objetivos', [ObjetivoController::class, 'index'])->name('objetivos.index');
Route::get('/objetivos/{identificador}/actividades', [ObjetivoController::class, 'getActividades'])->name('objetivos.getActividades');
Route::post('/objetivos', [ObjetivoController::class, 'createObjetivo'])->name('objetivos.createObjetivo');
Route::get('/objetivos/{identificador}/entregables', [ObjetivoController::class, 'getEntregables'])->name('objetivos.getEntregables');
Route::post('/objetivos/entregables', [ObjetivoController::class, 'storeEntregable'])->name('objetivos.storeEntregable');
Route::get('/objetivos/{identificador}/planillas-seguimiento', [ObjetivoController::class, 'getPlanillas'])->name('objetivos.getPlanillas');
Route::post('/objetivos/{identificador}/generar-planillas-seguimiento', [ObjetivoController::class, 'genPlanillas'])->name('objetivos.genPlanillas');
Route::post('/objetivos/{identificador}/generar-planilla-evaluacion', [ObjetivoController::class, 'genPlanillaEvalu'])->name('objetivos.genPlanillaEvalu');
Route::get('/objetivos/{identificador}/obtener-planillas-seguimiento', [ObjetivoController::class, 'getObjetivoConPlanillas'])->name('objetivos.getObjetivoConPlanillas');
Route::get('/objetivos-sin-planilla-evaluacion-generada', [ObjetivoController::class, 'getObjetivosSinPlanillaEvalGener'])->name('objetivos.getObjetivosSinPlanillaEvalGener');
Route::get('/objetivos-con-planilla-evaluacion-generada', [ObjetivoController::class, 'getObjetivosConPlanillaEvalGener'])->name('objetivos.getObjetivosConPlanillaEvalGener');

Route::get('/actividades', [ActividadController::class, 'index'])->name('actividades.index');
Route::get('/actividades/{identificador}/observaciones', [ActividadController::class, 'getObservaciones'])->name('actividades.getObservaciones');
Route::post('/crear-actividades', [ActividadController::class, 'store'])->name('actividades.store');
Route::delete('/actividad/{identificador}', [ActividadController::class, 'destroy'])->name('actividades.destroy');
Route::post('/actividad', [ActividadController::class, 'create']);
Route::get('/actividad/buscar-actividad', [ActividadController::class, 'searchByName']);
Route::get('/actividad/filtrar/{objetivoId}', [ActividadController::class, 'filterByObjetivo']);
Route::get('/actividad/buscar', [ActividadController::class, 'searchByNameAndObjetivo']);
Route::delete('/actividades', [ActividadController::class, 'destroyMultiple']);
Route::get('/actividad/{id}/puede-eliminar', [ActividadController::class, 'puedeEliminarActividad']);

Route::get('/observaciones', [ObservacionController::class, 'index'])->name('observaciones.index');
Route::post('/crear-observacion', [ObservacionController::class, 'store'])->name('observacion.store');
Route::patch('/observaciones', [ObservacionController::class, 'update'])->name('observaciones.update');
Route::delete('/observaciones/{identificador}', [ObservacionController::class, 'destroy'])->name('observaciones.destroy');
Route::get('/observaciones-de-objetivo', [ObservacionController::class, 'getObservacionesPorObjetivoYPlanificacion']);
Route::get('/observaciones-filtradas', [ObservacionController::class, 'getObservacionesPorFiltros']);
Route::delete('/observaciones', [ObservacionController::class, 'deleteMultiple']);
Route::get('/entregables', [EntregableController::class, 'index']);

Route::get('/planillas-seguimiento', [PlanillaSeguimientoController::class, 'index']);

Route::get('/planillas-evaluacion/{identificador}/info', [EvaluacionObjetivoController::class, 'getInfoEvaluacion'])->name('getInfoEvaluacion');

Route::get('/planificaciones', [PlanificacionController::class, 'index']);
Route::post('/planificaciones', [PlanificacionController::class, 'createPlanificacion'])->name('planificaciones.createPlanificacion');
Route::get('/planificaciones/{identificador}/objetivos', [PlanificacionController::class, 'getObjetivos'])->name('planificaciones.getObjetivos');
Route::get('/planificacion/{id}/objetivos/actividades', [PlanificacionController::class, 'getObjetivosConActividades']);
Route::get('/planificacion/{id}/actividades-resultados', [PlanificacionController::class, 'getActividadesConResultados']);
Route::get('/planificacion/{id}/observaciones', [PlanificacionController::class, 'getObservacionesDePlanificacion']);

Route::post('/create-user', [UserController::class, 'createUser']);

Route::post('/asistencias-asistencia', [AsistenciaController::class, 'registrarAsistencia'])->name('asistencia.RegistrarAsistencia');
Route::post('/asistencias-inasistencia', [AsistenciaController::class, 'registrarInasistencia'])->name('asistencia.RegistrarInasistencia');
Route::get('/asistencia', [AsistenciaController::class, 'getAsistenciaPorGrupoEmpresaYFecha']);

Route::get('/motivos', [MotivoController::class, 'getMotivos'])->name('motivos.GetMotivos');


Route::get('/criterios-evaluacion-final', [CriterioEvaluacionFinalController::class, 'index']);
Route::get('/parametros-evaluacion-final', [ParametroEvaluacionController::class, 'index']);
