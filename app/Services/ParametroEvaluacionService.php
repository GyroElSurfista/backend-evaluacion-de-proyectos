<?php

namespace App\Services;

use App\Models\ParametroEvaluacion;

class ParametroEvaluacionService
{
    public function index()
    {
        $parametros = ParametroEvaluacion::with(['paramEvaluCuali.campos', 'paramEvaluCuant'])->get();

        foreach ($parametros as $parametro) {
            $this->formatearParametro($parametro);
        }

        return $parametros;
    }

    public function formatearParametro($parametro)
    {
        if ($parametro->paramEvaluCuali->isNotEmpty()) {
            $parametro->setAttribute('tipo', 'cualitativo');

            foreach ($parametro->paramEvaluCuali as $cuali) {
                $cuali->makeHidden(['identificadorParamEvaluCuali', 'identificadorParamEvalu', 'campos']);
            }

            $campos = $parametro->paramEvaluCuali->pluck('campos')->flatten();
            $parametro->setAttribute('campos', $campos);
        } else {
            $parametro->setAttribute('tipo', 'cuantitativo');
            foreach ($parametro->paramEvaluCuant as $cuant) {
                $cuant->makeHidden(['identificadorParamEvaluCuali', 'identificadorParamEvalu', 'campos']);
                $parametro->setAttribute('valorMaxim', $cuant->valorMaxim);
                $parametro->setAttribute('valorMinim', $cuant->valorMinim);
                $parametro->setAttribute('cantidadInter', $cuant->cantidadInter);
            }
        }
        $parametro->makeHidden('paramEvaluCuant');
        $parametro->makeHidden('paramEvaluCuali');

        return $parametro;
    }
}
