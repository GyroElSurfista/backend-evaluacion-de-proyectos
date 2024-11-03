<?php

namespace App\Services;

use App\Models\EstructuraPlantilla;
use App\Models\PlantillaEvaluacionFinal;
use Carbon\Carbon;

class PlantillaEvaluacionFinalService
{

    public function crearPlantEvaluFinal($data)
    {
        $nombre = $data["nombre"];
        $rubricas = $data["rubricas"];

        $plantilla = PlantillaEvaluacionFinal::create([
            "nombre" => $nombre,
            "descripcion" => $data["descripcion"] ? $data["descripcion"] : null,
            "fechaCreac" => Carbon::now(),
        ]);

        foreach ($rubricas as $rubrica) {
            EstructuraPlantilla::create([
                "identificadorPlantEvaluFinal" => $plantilla->identificador,
                "identificadorCriteEvaluFinal" => $rubrica['identificadorCriteEvaluFinal'],
                "identificadorParamEvalu" => $rubrica['identificadorParamEvalu'],
                "valorMaxim" => $rubrica['valorMaxim']
            ]);
        }

        return $this->getPlantilla($plantilla->identificador);
    }

    public function getPlantilla($identificador)
    {
        $paramEvaluService = new ParametroEvaluacionService();
        $plantilla = PlantillaEvaluacionFinal::findOrFail($identificador);
        $rubricas = EstructuraPlantilla::where('identificadorPlantEvaluFinal', $identificador)->with(['criterioEvaluFinal', 'paramEvalu.paramEvaluCuali.campos', 'paramEvalu.paramEvaluCuant'])->get();

        foreach ($rubricas as $rubrica) {
            $rubrica->makeHidden(['identificador', 'identificadorPlantEvaluFinal', 'identificadorParamEvalu', 'identificadorCriteEvaluFinal']);
            $paramEvaluService->formatearParametro($rubrica->paramEvalu);
        }

        $plantilla->setAttribute('rubricas', $rubricas);

        return $plantilla;
    }
}
