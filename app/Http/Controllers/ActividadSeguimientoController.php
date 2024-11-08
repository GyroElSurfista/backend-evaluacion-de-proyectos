<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActividadSeguimientoRequest;
use App\Services\ActividadSeguimientoService;
use Illuminate\Http\Request;

class ActividadSeguimientoController extends Controller
{
    protected $actividadSeguimientoService;

    public function __construct(ActividadSeguimientoService $actividadSeguimientoService)
    {
        $this->actividadSeguimientoService = $actividadSeguimientoService;
    }

    public function store(CreateActividadSeguimientoRequest $request)
    {
        try {
            $actividadSeguimiento = $this->actividadSeguimientoService->crearActividadSeguimiento($request->validated());
            return response()->json(['message' => 'Actividad de seguimiento creada exitosamente', 'data' => $actividadSeguimiento], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function index($identificadorPlaniSegui)
    {
        try {
            $actividades = $this->actividadSeguimientoService->obtenerActividadesConObservaciones($identificadorPlaniSegui);
            return response()->json(['data' => $actividades], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}