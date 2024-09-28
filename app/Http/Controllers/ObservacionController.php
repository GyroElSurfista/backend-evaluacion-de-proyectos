<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObservacionRequest;
use App\Http\Requests\PatchObservacionRequest;
use App\Services\ObservacionService;

class ObservacionController extends Controller
{
    protected ObservacionService $observacionService;

    public function __construct(ObservacionService $observacionService)
    {
        $this->observacionService = $observacionService;
    }
    
    public function index()
    {
        $observaciones = $this->observacionService->getAllObservaciones();
        return response()->json($observaciones, 200);
    }

    public function store(ObservacionRequest $request)
    {
        $result = $this->observacionService->createObservacion($request->validated());
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 201);
    }

    public function destroy($identificador)
    {
        $result = $this->observacionService->deleteObservacion($identificador);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json(['message' => $result['message']], 200);
    }

    public function update(PatchObservacionRequest $request)
    {
        $data = $request->validated();
        $data['fecha'] = now()->format('Y-m-d');
        $observacion = $this->observacionService->update($data);

        return response()->json($observacion, 200);
    }
}
