<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetivo;
use App\Models\Actividad;

class ObjetivoController extends Controller
{
    public function index()
    {
        $objetivos = Objetivo::all();
        return response()->json($objetivos, 200);
    }

    //funcion para obtener todas las actividades de un objetivo
    public function getActividades($identificador)
    {
        $objetivo = Objetivo::find($identificador);
        if ($objetivo == null) {
            return response()->json(['error' => 'Objetivo no encontrado'], 404);
        }
        $actividades = $objetivo->actividad;
        return response()->json($actividades, 200);
    }
}
