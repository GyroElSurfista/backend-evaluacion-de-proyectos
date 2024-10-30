<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActividadRequest;
use App\Services\ActividadService;
use Illuminate\Http\Request;
use App\Http\Requests\CreateActividadRequest;
use App\Models\Actividad; 

class ActividadController extends Controller
{
    protected $actividadService;

    public function __construct(ActividadService $actividadService)
    {
        $this->actividadService = $actividadService;
    }

    public function index()
    {
        $actividades = $this->actividadService->getAllActividades();
        return response()->json($actividades, 200);
    }

    public function getObservaciones($identificador)
    {
        $result = $this->actividadService->getObservaciones($identificador);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 200);
    }

    public function store(ActividadRequest $request)
    {
        $result = $this->actividadService->createActividad($request->validated());
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 201);
    }

    public function destroy($identificador)
    {
        $result = $this->actividadService->deleteActividad($identificador);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 200);
    }

    public function create(CreateActividadRequest $request)
    {
        $result = $this->actividadService->crearActividad($request->validated());
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        if (isset($result['status']) && $result['status'] == 400) {
            return response()->json(['error' => $result['error']], 400);
        }
        return response()->json($result, 201);
    }

    public function searchByName(Request $request)
    {
        $nombre = $request->query('nombre');
        $planificacionId = $request->query('planificacionId');
        $result = $this->actividadService->buscarActividadPorNombre($nombre, $planificacionId);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 200);
    }

    public function filterByObjetivo(Request $request, $objetivoId)
    {
        $planificacionId = $request->input('identificadorPlanificacion');
        $result = $this->actividadService->filtrarActividadesPorObjetivo($objetivoId, $planificacionId);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 200);
    }

    public function searchByNameAndObjetivo(Request $request)
    {
        $nombre = $request->query('nombre');
        $objetivoId = $request->query('objetivoId');
        $planificacionId = $request->query('planificacionId');
        $result = $this->actividadService->buscarActividadPorNombreYObjetivo($nombre, $objetivoId, $planificacionId);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 200);
    }

    public function destroyMultiple(Request $request)
    {
        $ids = $request->input('ids');
        $result = $this->actividadService->eliminarActividadesEnConjunto($ids);
        return response()->json($result, $result['status']);
    }

    public function puedeEliminarActividad(Request $request, $actividadId)
    {
        $actividad = Actividad::find($actividadId);

        if (!$actividad) {
            return response()->json(['error' => 'Actividad no encontrada'], 404);
        }

        $esEliminable = $this->actividadService->esEliminable($actividad);
        $planificacionNombre = $actividad->objetivo->planificacion->nombre;

        return response()->json([
            'esEliminable' => $esEliminable,
            'proyecto' => $planificacionNombre
        ]);
    }
}