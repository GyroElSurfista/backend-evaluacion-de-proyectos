<?php

namespace App\Services;

use App\Exceptions\FechaObjetivoInválidaException;
use App\Exceptions\PlanificacionEnCursoException;
use App\Exceptions\PorcentajePlaniCompException;
use App\Models\CriterioAceptacionEntregable;
use App\Models\Entregable;
use App\Models\EvaluacionObjetivo;
use App\Models\Objetivo;
use App\Models\Planificacion;
use App\Models\PlanillaSeguimiento;
use App\Utils\FechasUtil;
use Carbon\Carbon;


class ObjetivoService
{

    public function index()
    {
        $objetivos = Objetivo::with('planificacion')->get();

        $objetivosCompletos = $objetivos->map(function ($objetivo) {
            return [
                'identificador' => $objetivo->identificador,
                'nombre' => $objetivo->nombre,
                'fechaInici' => $objetivo->fechaInici,
                'fechaFin' => $objetivo->fechaFin,
                'valorPorce' => $objetivo->valorPorce,
                'planillasGener' => $objetivo->planillasGener,
                'planillaEvaluGener' => $objetivo->planillaEvaluGener,
                'identificadorPlani' => $objetivo->identificadorPlani,
                'nombrePlani' => $objetivo->planificacion ? $objetivo->planificacion->nombre : null,
                'nombre-largo-grupo-empresa' => $objetivo->planificacion->grupoEmpresa->nombreLargo,
                'nombre-corto-grupo-empresa' => $objetivo->planificacion->grupoEmpresa->nombreCorto,
            ];
        });

        return $objetivosCompletos;
    }
    public function createObjetivo(array $data)
    {
        if (!$this->porcentAgregablePlanificacion($data["identificadorPlani"], $data["valorPorce"])) {
            throw new PorcentajePlaniCompException('No es posible agregar el objetivo a la planificación porque la suma de su porcentaje hará que exceda el 100%');
        }

        if (!$this->fechaIniciObjValidaAct($data["fechaInici"])) {
            throw new FechaObjetivoInválidaException('La fecha de inicio del objetivo no puede ser anterior a la fecha actual.');
        }

        if (!$this->fechaIniciObjValidaPlan($data["identificadorPlani"], $data["fechaInici"])) {
            throw new FechaObjetivoInválidaException('La fecha de inicio del objetivo no puede ser anterior a la fecha de la planificación seleccionada.');
        }

        if (!$this->fechaFinObjValidaPlan($data["identificadorPlani"], $data["fechaFin"])) {
            throw new FechaObjetivoInválidaException('La fecha de finalización del objetivo no puede ser posterior a la fecha de finalización de la planificación seleccionada.');
        }


        if (!$this->planificacionNoIniciada($data["identificadorPlani"])) {
            throw new PlanificacionEnCursoException('No es posible agregar un objetivo a una planificación en curso.');
        }

        $objetivo = Objetivo::create([
            "identificadorPlani" => $data["identificadorPlani"],
            "nombre" => $data["nombre"],
            "fechaInici" => $data["fechaInici"],
            "fechaFin" => $data["fechaFin"],
            "valorPorce" => $data["valorPorce"]
        ]);

        $nombrePlani = $objetivo->planificacion->nombre;
        $objetivo->nombrePlani = $nombrePlani;

        return $objetivo;
    }

    public function getActividades($identificador)
    {
        $objetivo = Objetivo::find($identificador);
        if ($objetivo == null) {
            return [];
        }
        return $objetivo->actividad;
    }

    public function getEntregablesObjet(int $identificadorObjet)
    {
        return Entregable::where('identificadorObjet', $identificadorObjet)->get();
    }

    public function storeEntregable($data)
    {

        if (!$this->planificacionObjetNoIniciado($data["identificadorObjet"])) {
            throw new PlanificacionEnCursoException('No es posible agregar un entregable a un objetivo cuya planificación ya se encuentra en desarrollo.');
        }

        $entregable = Entregable::create([
            "identificadorObjet" => $data["identificadorObjet"],
            "nombre" => $data["nombre"],
            "descripcion" => $data["descripcion"]
        ]);

        $criteriosAcept = [];

        foreach ($data["criteriosAcept"] as $criterio) {
            $criterioBd = CriterioAceptacionEntregable::create([
                "identificadorEntre" => $entregable->identificador,
                "descripcion" => $criterio["descripcion"]
            ]);
            $criteriosAcept[] = $criterioBd;
        }

        $entregable->setAttribute('criteriosAcept', $criteriosAcept);

        return $entregable;
    }

    public function getPlanillas($identificador)
    {
        return PlanillaSeguimiento::where('identificadorObjet', $identificador)->with('observacion')->get();
    }

    public function genPlanillas($identificador)
    {
        $objetivo = Objetivo::where('identificador', $identificador)->firstOrFail();
        $diaRevis = $objetivo->planificacion()->pluck('diaRevis')->first();
        $diaRevis = FechasUtil::diaANumero($diaRevis);
        $fechas = FechasUtil::getFechasDia($objetivo->fechaInici, $objetivo->fechaFin, $diaRevis);

        $planillas = [];

        foreach ($fechas as $fecha) {
            $planillaExistente = PlanillaSeguimiento::where('identificadorObjet', $objetivo->identificador)
                ->whereDate('fecha', Carbon::parse($fecha)) // Comparación exacta de fecha
                ->exists();

            if (!$planillaExistente) {
                $planilla = PlanillaSeguimiento::create([
                    'identificadorObjet' => $objetivo->identificador,
                    'fecha' => $fecha,
                ]);

                $planillas[] = $planilla;
            }
        }

        if (!empty($planillas)) {
            $objetivo->planillasGener = true;
            $objetivo->save();
        } else {
            $planillas = null;
        }

        return $planillas;
    }

    public function tienePlanillas($identificador)
    {

        $planillas = PlanillaSeguimiento::where('identificadorObjet', $identificador)->get();

        if ($planillas->empty()) {
            return false;
        } else {
            return true;
        }
    }

    public function genPlanillaEvalu($identificador)
    {
        $objetivo = Objetivo::where('identificador', $identificador)->firstOrFail();

        if (!$objetivo->planillaEvaluGener) {
            $evaluacion = EvaluacionObjetivo::create([
                'identificadorObjet' => $objetivo->identificador,
                'fecha' => $objetivo->fechaFin
            ]);

            if ($evaluacion) {
                $objetivo->planillaEvaluGener = true;
                $objetivo->save();
            }
        } else {
            $evaluacion = null;
        }

        return $evaluacion;
    }

    public function getObjetivoConPlanillas($identificador)
    {
        $objetivo = Objetivo::with('planillaSeguimiento')->where('identificador', $identificador)->firstOrFail();

        return $objetivo;
    }

    public function getObjetivosSinPlanillaEvalGener()
    {
        $objetivos = Objetivo::with('entregable')
            ->where('planillaEvaluGener', false)
            ->has('entregable')
            ->get();

        $objetivos->makeHidden('entregable');
        return $objetivos;
    }

    public function getObjetivosConPlanillaEvalGener()
    {
        return Objetivo::with('evaluacionObjetivo')->where('planillaEvaluGener', true)->get();
    }

    private function planificacionObjetNoIniciado($identificador)
    {
        $planificacionService = app(PlanificacionService::class);
        $objetivo = Objetivo::where('identificador', $identificador)->firstOrFail();

        return $planificacionService->planificacionDesarrolloNoIniciado($objetivo->identificadorPlani);
    }

    private function planificacionNoIniciada($identificadorPlani)
    {
        $planificacionService = app(PlanificacionService::class);

        return $planificacionService->planificacionDesarrolloNoIniciado($identificadorPlani);
    }

    private function porcentAgregablePlanificacion($identificadorPlani, $porcentaje)
    {
        $planificacion = Planificacion::with('objetivo')->where('identificador', $identificadorPlani)->firstOrFail();
        $porcentajeAcum = 0.0;
        $porcentajeAcum = $planificacion->objetivo->sum('valorPorce');
        return abs($porcentajeAcum + $porcentaje) - 100.0 <= 0.01;
    }

    private function fechaIniciObjValidaAct($fechaInici)
    {
        return $fechaInici >= Carbon::now();
    }

    private function fechaIniciObjValidaPlan($identificadorPlani, $fechaInici)
    {
        $planificacion = Planificacion::with('objetivo')->where('identificador', $identificadorPlani)->firstOrFail();
        return $fechaInici >= $planificacion->fechaInici;
    }

    private function fechaFinObjValidaPlan($identificadorPlani, $fechaFin)
    {
        $planificacion = Planificacion::with('objetivo')->where('identificador', $identificadorPlani)->firstOrFail();
        return $fechaFin <= $planificacion->fechaFin;
    }
}
