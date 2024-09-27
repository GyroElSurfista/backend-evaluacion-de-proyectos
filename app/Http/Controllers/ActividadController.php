<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Observacion;
use App\Models\Objetivo;
use App\Http\Requests\ActividadRequest;

class ActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all();
        return response()->json($actividades, 200);
    }

    //funcion para obtener todas las observaciones de una actividad
    public function getObservaciones($identificador)
    {
        $actividad = Actividad::find($identificador);
        if ($actividad == null) {
            return response()->json(['error' => 'Actividad no encontrada'], 404);
        }
        $observaciones = $actividad->observacion;
        return response()->json($observaciones, 200);
    }

    // Agregar una actividad a un objetivo
    public function store(ActividadRequest $request)
    {
        
        $objetivo = Objetivo::find($request->identificadorObjet);
        if ($objetivo == null) {
            return response()->json(['error' => 'Objetivo no encontrado'], 404);
        }

        $actividad = Actividad::create($request->all());

        return response()->json($actividad, 201);
    }
}
