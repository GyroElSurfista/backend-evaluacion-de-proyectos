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
use App\Models\RevisionCriterioEntregable;
use Illuminate\Support\Facades\DB;
use App\Models\Actividad;


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
                'fechaEvaluFinalGener' => $objetivo->fechaEvaluFinalGener,
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
        $this->verificarPorcentajeValido($data["identificadorPlani"], $data["valorPorce"]);

        $this->verificarFechaIniciValidaAct($data["fechaInici"]);

        $this->verificarFechaIniciValidaPlan($data["identificadorPlani"], $data["fechaInici"]);

        $this->verificarFechaFinValidaPlan($data["identificadorPlani"], $data["fechaFin"]);

        if (!$this->planificacionNoIniciada($data["identificadorPlani"])) {
            throw new PlanificacionEnCursoException('No es posible agregar un objetivo a una planificación en curso.');
        }

        return DB::transaction(function () use ($data) {
            $objetivo = Objetivo::create([
                "identificadorPlani" => $data["identificadorPlani"],
                "nombre" => $data["nombre"],
                "fechaInici" => $data["fechaInici"],
                "fechaFin" => $data["fechaFin"],
                "valorPorce" => $data["valorPorce"]
            ]);
            $objetivo->nombrePlani = $objetivo->planificacion->nombre;

            $siguienteFecha = Carbon::parse($data["fechaFin"])->addDay();

            if ($siguienteFecha < $objetivo->planificacion->fechaFin) {
                $objetivo->planificacion->siguienteFechaIniciDispo = $siguienteFecha;
            } else {
                $objetivo->planificacion->siguienteFechaIniciDispo = null;
            }

            $objetivo->planificacion->save();

            return $objetivo;
        });
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

    public function getActividadesConResultadosPorObjetivo($objetivoId)
    {
        $objetivo = Objetivo::with('actividad.resultadoEsperado')->find($objetivoId);
        if ($objetivo == null) {
            return ['error' => 'Objetivo no encontrado', 'status' => 404];
        }

        $actividades = $objetivo->actividad->map(function ($actividad) {
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

        return ['data' => $actividades, 'status' => 200];
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

        return DB::transaction(function () use ($data) {

            if (!$this->planificacionObjetNoIniciado($data["identificadorObjet"])) {
                throw new PlanificacionEnCursoException('No es posible agregar un entregable a un objetivo cuya planificación ya se encuentra en desarrollo.');
            }

            $entregable = Entregable::create([
                "identificadorObjet" => $data["identificadorObjet"],
                "nombre" => $data["nombre"],
                "descripcion" => $data["descripcion"],
                "fechaCreac" => Carbon::now(),
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
        });
    }

    public function getPlanillas($identificador)
    {
        return PlanillaSeguimiento::where('identificadorObjet', $identificador)->with('actividadSeguimiento.observacion')->get();
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
                $objetivo->fechaEvaluFinalGener = Carbon::now();
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

    private function porcentPlanificacion($identificadorPlani)
    {
        $planificacion = Planificacion::with('objetivo')->where('identificador', $identificadorPlani)->firstOrFail();
        return $planificacion->sumaValorPorce();
    }

    private function verificarPorcentajeValido($identificadorPlani, $porcentaje)
    {
        $porcentajeAcum = $this->porcentPlanificacion($identificadorPlani);
        $nuevoPorcent = number_format($porcentajeAcum + $porcentaje, 2);

        if (!($nuevoPorcent <= 100.00)) {
            $disp = number_format(abs(100 - $porcentajeAcum), 2);

            throw new PorcentajePlaniCompException(
                "No es posible agregar el objetivo a la planificación porque la suma de su porcentaje hará que exceda el 100%. El porcentaje disponible es: $disp%",
                $nuevoPorcent,
                100.00
            );
        }
    }

    private function verificarFechaIniciValidaAct($fechaInici)
    {
        $fechaInici = Carbon::parse($fechaInici)->startOfDay();
        $fechaActual = Carbon::now()->startOfDay();

        if (!($fechaInici >= $fechaActual)) {
            throw new FechaObjetivoInválidaException(
                'La fecha de inicio del objetivo no puede ser anterior a la fecha actual (' . $fechaActual->toDateString() . ').',
                $fechaInici,
                $fechaActual
            );
        }
    }


    private function verificarFechaIniciValidaPlan($identificadorPlani, $fechaInici)
    {
        $planificacion = Planificacion::with('objetivo')->where('identificador', $identificadorPlani)->firstOrFail();

        if (!($fechaInici >= $planificacion->fechaInici)) {
            throw new FechaObjetivoInválidaException('La fecha de inicio del objetivo no puede ser anterior a la fecha de la planificación seleccionada (' . $planificacion->fechaInici . ').', $fechaInici, $planificacion->fechaInici);
        }
    }


    private function verificarFechaFinValidaPlan($identificadorPlani, $fechaFin)
    {
        $planificacion = Planificacion::with('objetivo')->where('identificador', $identificadorPlani)->firstOrFail();

        if (!($fechaFin <= $planificacion->fechaFin)) {
            throw new FechaObjetivoInválidaException('La fecha de finalización del objetivo no puede ser posterior a la fecha de finalización de la planificación seleccionada (' . $planificacion->fechaFin . ')', $fechaFin, $planificacion->fechaFin);
        }
    }

    public function buscarObjetivoPorNombre($nombre, $planificacionId)
    {
        $query = Objetivo::where('identificadorPlani', $planificacionId);

        if (!empty($nombre)) {
            $query->where('nombre', 'like', '%' . $nombre . '%');
        }

        return $query->get();
    }

    public function puedeSerLlenado($objetivoId)
    {
        $objetivo = Objetivo::with('entregable.criterioAceptacionEntregable')->find($objetivoId);

        if (!$objetivo) {
            return ['error' => 'Objetivo no encontrado', 'status' => 404];
        }

        if (!$objetivo->planillaEvaluGener) {
            return ['puedeSerLlenado' => false, 'mensaje' => 'El objetivo no tiene Planilla de Evaluación Generada.', 'status' => 200];
        }

        $now = Carbon::now();
        $fechaFin = Carbon::parse($objetivo->fechaFin);
        $fechaLimite = $fechaFin->copy()->addWeeks(2);

        $evaluacionExistente = EvaluacionObjetivo::where('identificadorObjet', $objetivoId)
            ->whereHas('revisionCriterioEntregable')
            ->exists();

        if ($evaluacionExistente) {
            return ['puedeSerLlenado' => false, 'mensaje' => 'El objetivo ya ha sido evaluado.', 'status' => 200];
        }

        if ($objetivo->entregable->isEmpty()) {
            return ['puedeSerLlenado' => false, 'mensaje' => 'El objetivo no tiene entregables.', 'status' => 200];
        }

        foreach ($objetivo->entregable as $entregable) {
            if ($entregable->criterioAceptacionEntregable->isEmpty()) {
                return ['puedeSerLlenado' => false, 'mensaje' => 'Uno o más entregables no tienen criterios de aceptación.', 'status' => 200];
            }
        }

        if ($now->between($fechaFin, $fechaLimite)) {
            return ['puedeSerLlenado' => true, 'status' => 200];
        }

        if ($now->lt($fechaFin)) {
            $mensaje = 'El objetivo aún no ha terminado.';
        } elseif ($now->gt($fechaLimite)) {
            $mensaje = 'El periodo para llenar la planilla de evaluación ha expirado.';
        } else {
            $mensaje = 'El objetivo no puede ser llenado por una razón desconocida.';
        }

        return ['puedeSerLlenado' => false, 'mensaje' => $mensaje, 'status' => 200];
    }

    public function obtenerObjetivoConEntregablesYCriterios($objetivoId)
    {
        return Objetivo::with(['entregable.criterioAceptacionEntregable.revisionCriterioEntregable'])
            ->where('identificador', $objetivoId)
            ->first();
    }



    public function obtenerObjetivosQuePuedenSerEvaluados($planificacionId)
    {
        $now = Carbon::now();

        $objetivos = Objetivo::where('identificadorPlani', $planificacionId)
            ->whereDoesntHave('evaluacionObjetivo.revisionCriterioEntregable')
            ->with('entregable.criterioAceptacionEntregable')
            ->get();

        $objetivosFiltrados = $objetivos->filter(function ($objetivo) use ($now) {
            $fechaFin = Carbon::parse($objetivo->fechaFin);
            $fechaLimite = $fechaFin->copy()->addWeeks(2);

            if (!$objetivo->planillaEvaluGener) {
                return false;
            }

            if ($objetivo->entregable->isEmpty()) {
                return false;
            }

            foreach ($objetivo->entregable as $entregable) {
                if ($entregable->criterioAceptacionEntregable->isEmpty()) {
                    return false;
                }
            }

            return $now->between($fechaFin, $fechaLimite);
        });

        return ['data' => $objetivosFiltrados->values(), 'status' => 200];
    }

    public function evaluarEntregables($objetivoId, $criteriosAceptacionIds, $cumple)
    {
        $evaluacionObjetivo = EvaluacionObjetivo::where('identificadorObjet', $objetivoId)->first();

        if (!$evaluacionObjetivo) {
            return ['error' => 'No se encontró una evaluación para este objetivo.', 'status' => 404];
        }

        $objetivo = Objetivo::with('entregable.criterioAceptacionEntregable')->find($objetivoId);
        $todosCriterios = $objetivo->entregable->flatMap(function ($entregable) {
            return $entregable->criterioAceptacionEntregable;
        });

        $todosCumplen = true;
        foreach ($todosCriterios as $criterio) {
            $cumpleCriterio = in_array($criterio->identificador, $criteriosAceptacionIds) ? $cumple : false;
            if (!$cumpleCriterio) {
                $todosCumplen = false;
            }
            RevisionCriterioEntregable::create([
                'cumple' => $cumpleCriterio,
                'fecha' => Carbon::now(),
                'identificadorCriteAceptEntre' => $criterio->identificador,
                'identificadorEvaluObjet' => $evaluacionObjetivo->identificador,
            ]);
        }

        if ($todosCumplen) {
            $evaluacionObjetivo->update(['habilitadoPago' => true]);
        }

        return ['message' => 'Evaluación completada con éxito.', 'status' => 200];
    }

    public function obtenerCriteriosConRevisiones($objetivoId)
    {
        $objetivo = Objetivo::with(['entregable.criterioAceptacionEntregable.revisionCriterioEntregable'])
            ->where('identificador', $objetivoId)
            ->first();

        if (!$objetivo) {
            return ['error' => 'Objetivo no encontrado', 'status' => 404];
        }

        $entregablesConCriteriosYRevisiones = $objetivo->entregable->map(function ($entregable) {
            return [
                'entregable_id' => $entregable->identificador,
                'entregable_nombre' => $entregable->nombre,
                'criterios' => $entregable->criterioAceptacionEntregable->map(function ($criterio) {
                    return [
                        'criterio_id' => $criterio->identificador,
                        'criterio_descripcion' => $criterio->descripcion,
                        'revision' => $criterio->revisionCriterioEntregable->map(function ($revision) {
                            return [
                                'revision_id' => $revision->identificador,
                                'cumple' => $revision->cumple,
                                'fecha' => $revision->fecha,
                                'observacion' => $revision->observacion,
                            ];
                        })
                    ];
                })
            ];
        });

        return ['data' => $entregablesConCriteriosYRevisiones, 'status' => 200];
    }
}
