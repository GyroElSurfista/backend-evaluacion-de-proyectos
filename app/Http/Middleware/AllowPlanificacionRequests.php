<?php

namespace App\Http\Middleware;

use App\Models\Semestre;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class AllowPlanificacionRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $fechaActua = $request->input("fechaActua");
        $fechaActua = Carbon::parse($fechaActua);

        $semestre = Semestre::where('fechaPlaniInici', '<=', $fechaActua)->where('fechaEvaluFin', '>=', $fechaActua)->first();

        if (!$fechaActua->between($semestre->fechaPlaniInici, $semestre->fechaPlaniFin)) {
            abort(403, "No se permite llevar a cabo acciones de planificación para la fecha actual");
        }

        return $next($request);
    }
}
