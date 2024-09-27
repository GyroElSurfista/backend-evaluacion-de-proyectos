<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observacion;
use App\Models\PlanillaSeguimiento;
use App\Models\Actividad;
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
        $observaciones = Observacion::all();
        return response()->json($observaciones, 200);
    }

    //funcion para crear una observacion
    public function store(ObservacionRequest $request)
    {
        $actividad = Actividad::find($request->identificadorActiv);
        if ($actividad == null) {
            return response()->json(['error' => 'Actividad no encontrada'], 404);
        }

        $observacion = Observacion::create($request->all());

        return response()->json($observacion, 201);
    }

    public function update(PatchObservacionRequest $request)
    {
        $data = $request->validated();
        $data['fecha'] = now()->format('Y-m-d');
        $observacion = $this->observacionService->update($data);

        return response()->json($observacion, 200);
    }
}
