<?php

namespace App\Exceptions;

use Exception;

class FechaObjetivoInválidaException extends Exception
{
    protected $fechaIncorrecta;
    protected $fechaComparacion;


    public function __construct($message, $fechaIncorrecta, $fechaComparacion)
    {
        parent::__construct($message);
        $this->fechaIncorrecta = $fechaIncorrecta;
        $this->fechaComparacion = $fechaComparacion;
    }

    public function getFechaIncorrecta()
    {
        return $this->fechaIncorrecta;
    }

    public function getFechaComparacion()
    {
        return $this->fechaComparacion;
    }
}
