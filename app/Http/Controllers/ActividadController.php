<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActividadRequest;
use App\Services\ActividadService;
use Illuminate\Http\Request;
use App\Http\Requests\CreateActividadRequest;
use App\Models\Actividad;
use App\Http\Requests\BuscarActividadPorNombreRequest; 

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

    public function destroy($identificador, Request $request)
    {
        $fechaActua = $request->input('fechaActua');
        $result = $this->actividadService->deleteActividad($identificador, $fechaActua);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 200);
    }

    public function create(CreateActividadRequest $request)
    {
        $fechaActua = $request->input('fechaActua');
        $result = $this->actividadService->crearActividad($request->validated(), $fechaActua);
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
        $fechaActua = $request->input('fechaActua');
        $nombre = $request->query('nombre');
        $planificacionId = $request->query('planificacionId');
        $result = $this->actividadService->buscarActividadPorNombre($nombre, $planificacionId, $fechaActua);
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
        $fechaActua = $request->input('fechaActua');
        $nombre = $request->query('nombre');
        $objetivoId = $request->query('objetivoId');
        $planificacionId = $request->query('planificacionId');
        $result = $this->actividadService->buscarActividadPorNombreYObjetivo($nombre, $objetivoId, $planificacionId, $fechaActua);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 200);
    }

    public function destroyMultiple(Request $request)
    {
        $fechaActua = $request->input('fechaActua');
        $ids = $request->input('ids');
        $result = $this->actividadService->eliminarActividadesEnConjunto($ids, $fechaActua);
        return response()->json($result, $result['status']);
    }

    public function puedeEliminarActividad(Request $request, $actividadId)
    {
        $fechaActua = $request->input('fechaActua');
        $actividad = Actividad::find($actividadId);

        if (!$actividad) {
            return response()->json(['error' => 'Actividad no encontrada'], 404);
        }

        $esEliminable = $this->actividadService->esEliminable($actividad, $fechaActua);
        $planificacionNombre = $actividad->objetivo->planificacion->nombre;

        return response()->json([
            'esEliminable' => $esEliminable,
            'proyecto' => $planificacionNombre
        ]);
    }

    public function buscarPorNombreYGrupoEmpresa(BuscarActividadPorNombreRequest $request)
    {
        $fechaActua = $request->input('fechaActua');
        try {
            $actividades = $this->actividadService->buscarActividadPorNombreYGrupoEmpresa(
                $request->input('nombre'),
                $request->input('grupoEmpresaId', $fechaActua)
            );
            if (isset($actividades['error'])) {
                return response()->json(['error' => $actividades['error']], $actividades['status']);
            }
            return response()->json(['data' => $actividades], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

}