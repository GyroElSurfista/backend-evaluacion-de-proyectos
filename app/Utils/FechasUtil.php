<?php

namespace App\Utils;

use Carbon\Carbon;

class FechasUtil
{

    public static function diaANumero($dia)
    {
        $dia = strtolower($dia);
        $num = -1;
        switch ($dia) {
            case 'domingo':
                $num = 0;
                break;
            case 'lunes':
                $num = 1;
                break;
            case 'martes':
                $num = 2;
                break;
            case 'miércoles':
            case 'miercoles':
                $num = 3;
                break;
            case 'jueves':
                $num = 4;
                break;
            case 'viernes':
                $num = 5;
                break;
            case 'sábado':
            case 'sabado':
                $num = 6;
                break;
        }

        return $num;
    }

    public static function getFechasDia($fechaInici, $fechaFin, $dia)
    {
        $inicio = Carbon::parse($fechaInici)->addDay();
        $fin = Carbon::parse($fechaFin);

        $fechas = [];

        while ($inicio <= $fin) {
            if ($inicio->dayOfWeek === $dia) {
                $fechas[] = $inicio->format('Y-m-d');
            }
            $inicio->addDay();
        }

        return $fechas;
    }
}
