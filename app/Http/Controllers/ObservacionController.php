<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observacion;
use App\Models\PlanillaSeguimiento;
use App\Models\Actividad;
use App\Http\Requests\ObservacionRequest;

class ObservacionController extends Controller
{
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

}
