<?php

namespace App\Services;

use App\Models\Planificacion;
use Carbon\Carbon;
use App\Models\Actividad;
use Illuminate\Support\Facades\DB;

class PlanificacionService
{

    public function index()
    {
        return Planificacion::with('grupoEmpresa')
            ->select('Planificacion.*')
            ->selectRaw('(SELECT COALESCE(SUM("Objetivo"."valorPorce"), 0) FROM "Objetivo" WHERE "Objetivo"."identificadorPlani" = "Planificacion"."identificador") as sumaValorPorce')
            ->get();
    }

    public function createPlanificacion(array $data)
    {
        return Planificacion::create([
            "nombre" => $data["nombre"],
            "fechaInici" => $data["fechaInici"],
            "fechaFin" => $data["fechaFin"],
            "costo" => $data["costo"],
            "diaRevis" => $data["diaRevis"],
            "identificadorGrupoEmpre" => $data["identificadorGrupoEmpre"]
        ]);
    }

    public function getObjetivos($identificador)
    {
        $planificacion = Planificacion::with('objetivo')->find($identificador);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }
        return $planificacion->objetivo;
    }

    public function getObjetivosParaActividades($identificador)
    {
        $planificacion = Planificacion::with(['objetivo' => function ($query) {
            $query->where('fechaFin', '>=', Carbon::now()->addDays(5));
        }])->find($identificador);

        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }

        return $planificacion->objetivo;
    }

    public function getObjetivosConActividades($id)
    {
        $planificacion = Planificacion::with('objetivo.actividad')->find($id);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }
        return $planificacion->objetivo;
    }

    private function esEliminable(Actividad $actividad)
    {
        $objetivo = $actividad->objetivo;
        $fechaFinObjetivo = Carbon::parse($objetivo->fechaFin);
        $now = Carbon::now();

        if ($fechaFinObjetivo->isPast()) {
            return false;
        }

        if ($fechaFinObjetivo->diffInDays($now) < 5) {
            return false;
        }

        return true;
    }

    public function getActividadesConResultados($id)
    {
        $planificacion = Planificacion::with('objetivo.actividad.resultadoEsperado')->find($id);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }

        $actividades = $planificacion->objetivo->flatMap->actividad->map(function ($actividad) {
            return [
                'identificador' => $actividad->identificador,
                'nombre' => $actividad->nombre,
                'descripcion' => $actividad->descripcion,
                'fechaInici' => $actividad->fechaInici,
                'fechaFin' => $actividad->fechaFin,
                'identificadorUsua' => $actividad->identificadorUsua,
                'identificadorObjet' => $actividad->identificadorObjet,
                'responsable' => $actividad->usuario->name,
                'objetivo' => $actividad->objetivo->nombre,
                'esEliminable' => $this->esEliminable($actividad),
                'proyecto' => $actividad->objetivo->planificacion->nombre,
                'resultados' => $actividad->resultadoEsperado->pluck('descripcion')->toArray(),
            ];
        });

        return $actividades;
    }

    public function getObservacionesDePlanificacion($id)
    {
        $planificacion = Planificacion::with('objetivo.planillaseguimiento.observacion')->find($id);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }

        $observaciones = $planificacion->objetivo->flatMap->planillaSeguimiento->flatMap->observacion->map(function ($observacion) {
            return [
                'identificador' => $observacion->identificador,
                'descripcion' => $observacion->descripcion,
                'fecha' => $observacion->fecha,
                'actividad' => $observacion->actividad->nombre,
                'fechaPlaniSegui' => $observacion->planillaSeguimiento->fecha,
                'identificadorActiv' => $observacion->identificadorActiv,
                'identificadorPlaniSegui' => $observacion->identificadorPlaniSegui,
            ];
        });

        return $observaciones;
    }

    public function getObservacionesDePlanificacion1($id)
    {
        $planificacion = Planificacion::with('objetivo.actividad.observacion')->find($id);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }

        $observaciones = $planificacion->objetivo->flatMap->actividad->flatMap->observacion->map(function ($observacion) {
            return [
                'identificador' => $observacion->identificador,
                'descripcion' => $observacion->descripcion,
                'fecha' => $observacion->fecha,
                'actividad' => $observacion->actividad->nombre,
                'identificadorActiv' => $observacion->identificadorActiv,
                'identficadorPlaniSegui' => $observacion->identificadorPlaniSegui,
            ];
        });

        return $observaciones;
    }

    public function generarPlaniSeguiSemanObjet($identificador)
    {
        $planificacion = Planificacion::where('identificador', $identificador)->with('objetivo')->first();
        $objetivos = $planificacion->objetivo;
        $objetivoService = new ObjetivoService();
        $objetivosConPlani = [];

        DB::transaction(function () use ($objetivos, $objetivoService, $planificacion, &$objetivosConPlani) {

            foreach ($objetivos as $obj) {
                $planillas = [];
                $res = $objetivoService->genPlanillas($obj->identificador);
                if ($res != null) {
                    $planillas[] = $res;
                }

                $obj->setAttribute('planillas', $planillas);

                $objetivosConPlani[] = $obj;
            }

            $planificacion->planillasSeguiGener = true;
            $planificacion->fechaPlaniSeguiGener = Carbon::now()->format('Y-m-d');
            $planificacion->save();
        });

        return $planificacion;
    }

    public function getObjetConPlaniSegui($identificador)
    {
        $planificacion =  Planificacion::where('identificador', $identificador)->with('objetivo.planillaSeguimiento')->first();
        $objetivos = $planificacion->objetivo;
        return $objetivos;
    }

    public function planificacionDesarrolloNoIniciado($identificador)
    {
        $planificacion = Planificacion::where('identificador', $identificador)->firstOrFail();
        return Carbon::now()->lessThan($planificacion->fechaInici);
    }
    public function planificacionEnDesarrollo($identificador)
    {
        $planificacion = Planificacion::where('identificador', $identificador)->firstOrFail();
        return Carbon::now()->between($planificacion->fechaInici, $planificacion->fechaFin);
    }
    public function planificacionDesarrolloFinalizado($identificador)
    {
        $planificacion = Planificacion::where('identificador', $identificador)->firstOrFail();
        return Carbon::now()->greaterThan($planificacion->fechaFin);
    }
}
