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
        $data = $request->validated();

        // Verificar si ya existe una actividad con los mismos datos en el mismo objetivo
        $existingActividad = Actividad::where('nombre', $data['nombre'])
            ->where('descripcion', $data['descripcion'])
            ->where('fechaInici', $data['fechaInici'])
            ->where('fechaFin', $data['fechaFin'])
            ->where('identificadorUsua', $data['identificadorUsua'])
            ->where('identificadorObjet', $data['identificadorObjet'])
            ->first();

        if ($existingActividad) {
            return response()->json(['message' => 'Ya existe una actividad con los mismos datos en el mismo objetivo'], 409);
        }

        $this->actividadService->crearActividad($data);

        return response()->json(['message' => 'Actividad creada exitosamente'], 201);
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
}