<?php

namespace App\Services;

use App\Models\ActividadSeguimiento;
use App\Models\Observacion;
use Illuminate\Support\Facades\DB;

class ActividadSeguimientoService
{
    public function crearActividadSeguimiento($data)
    {
        return DB::transaction(function () use ($data) {

            $actividadExistente = ActividadSeguimiento::where('nombre', $data['nombre'])
                ->where('identificadorPlaniSegui', $data['identificadorPlaniSegui'])
                ->exists();

            if ($actividadExistente) {
                throw new \Exception('Actividad de seguimiento con el mismo nombre ya existe para esta planilla de seguimiento');
            }

            $actividadSeguimiento = ActividadSeguimiento::create([
                'nombre' => $data['nombre'],
                'identificadorPlaniSegui' => $data['identificadorPlaniSegui'],
            ]);


            foreach ($data['observaciones'] as $observacionData) {
     
                $observacionExistente = Observacion::where('descripcion', $observacionData['descripcion'])
                    ->where('identificadorActivSegui', $actividadSeguimiento->identificador)
                    ->exists();

                if ($observacionExistente) {
                    throw new \Exception('Observacion existente');
                }

                Observacion::create([
                    'descripcion' => $observacionData['descripcion'],
                    'fecha' => now(),
                    'identificadorActivSegui' => $actividadSeguimiento->identificador,
                ]);
            }

            return $actividadSeguimiento;
        });
    }
}