<?php

namespace App\Http\Controllers;

use \App\Services\EntregableService;
use App\Http\Requests\CreateEntregableRequest;
use App\Http\Requests\ListEntregablesRequest;

class EntregableController extends Controller
{
    protected EntregableService $entregableService;

    public function __construct(EntregableService $entregableService)
    {
        $this->entregableService = $entregableService;
    }

    public function index()
    {
        $entregables = $this->entregableService->getAllEntregable();
        return response()->json($entregables, 200);
    }

    public function store(CreateEntregableRequest $request)
    {
        try {
            $entregable = $this->entregableService->crearEntregable($request->validated());
            return response()->json(['message' => 'Entregable creado exitosamente', 'data' => $entregable], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function obtenerEntregablesConCriterios(ListEntregablesRequest $request)
    {
        try {
            $entregables = $this->entregableService->obtenerEntregablesConCriterios(
                $request->input('identificadorObjet'),
                $request->input('fecha')
            );
            return response()->json(['data' => $entregables], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
