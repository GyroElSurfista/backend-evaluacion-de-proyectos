<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    public function getSemestreActual(Request $request)
    {
        $fechaActua = $request->input("fechaActua");
        $fechaActua = Carbon::parse($fechaActua);
        $semestre = Semestre::where('fechaPlaniInici', '<=', $fechaActua)->where('fechaEvaluFin', '>=', $fechaActua)->first();
        return $semestre;
    }
}
