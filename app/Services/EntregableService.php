<?php

namespace App\Services;

use App\Models\Entregable;
use App\Models\CriterioAceptacionEntregable;
use App\Models\PlanillaSeguimiento;
use App\Models\Objetivo;
use Illuminate\Support\Facades\DB;

class EntregableService
{

    public function getAllEntregable()
    {
        return Entregable::all();
    }

    public function getEntregablesObjet(int $identificadorObjet)
    {
        return Entregable::where('identificadorObjet', $identificadorObjet)->get();
    }

    public function crearEntregable($data)
    {
        return DB::transaction(function () use ($data) {
            $entregableExistente = Entregable::where('nombre', $data['nombre'])
                ->where('identificadorObjet', $data['identificadorObjet'])
                ->exists();

            if ($entregableExistente) {
                throw new \Exception('El nombre del entregable ya existe para este objetivo.');
            }

            $planillaSeguimiento = PlanillaSeguimiento::find($data['identificadorPlaniSegui']);
            if (!$planillaSeguimiento) {
                throw new \Exception('No se encontró una planilla de seguimiento para este identificador.');
            }

            $entregable = Entregable::create([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'] ?? null,
                'fechaCreac' => $planillaSeguimiento->fecha,
                'dinamico' => true,
                'identificadorObjet' => $data['identificadorObjet'],
            ]);

            foreach ($data['criterios'] as $criterioData) {
                $criterioExistente = CriterioAceptacionEntregable::where('descripcion', $criterioData['descripcion'])
                    ->where('identificadorEntre', $entregable->identificador)
                    ->exists();

                if ($criterioExistente) {
                    throw new \Exception('El criterio de aceptación ya existe para este entregable.');
                }

                CriterioAceptacionEntregable::create([
                    'descripcion' => $criterioData['descripcion'],
                    'identificadorEntre' => $entregable->identificador,
                ]);
            }

            return $entregable;
        });
    }

    public function obtenerEntregablesConCriterios($identificadorObjet, $fecha)
    {
        $objetivo = Objetivo::findOrFail($identificadorObjet);

        return Entregable::with('CriterioAceptacionEntregable')
            ->where('dinamico', true)
            ->where('identificadorObjet', $identificadorObjet)
            ->whereBetween('fechaCreac', [$objetivo->fechaInici, $fecha])
            ->get();
    }

    public function editarEntregable($identificadorEntregable, $data)
    {
        return DB::transaction(function () use ($identificadorEntregable, $data) {
            $entregable = Entregable::with('criterioAceptacionEntregable')->findOrFail($identificadorEntregable);

            if (!$entregable->dinamico) {
                throw new \Exception('El entregable no puede ser editado porque no es dinámico.');
            }

            $entregable->update([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'] ?? $entregable->descripcion,
            ]);

            foreach ($data['criterios'] as $criterioData) {
                $criterio = CriterioAceptacionEntregable::find($criterioData['identificador']);
                if ($criterio) {
                    $criterio->update([
                        'descripcion' => $criterioData['descripcion'],
                    ]);
                } else {
                    CriterioAceptacionEntregable::create([
                        'descripcion' => $criterioData['descripcion'],
                        'identificadorEntre' => $entregable->identificador,
                    ]);
                }
            }

            return $entregable;
        });
    }

    public function eliminarEntregable($identificadorEntregable)
    {
        return DB::transaction(function () use ($identificadorEntregable) {
            $entregable = Entregable::with('criterioAceptacionEntregable')->findOrFail($identificadorEntregable);

            if (!$entregable->dinamico) {
                throw new \Exception('El entregable no puede ser eliminado porque no es dinámico.');
            }

            foreach ($entregable->criterioAceptacionEntregable as $criterio) {
                $criterio->delete();
            }

            $entregable->delete();

            return ['message' => 'Entregable y sus criterios de aceptación eliminados exitosamente', 'status' => 200];
        });
    }
}
