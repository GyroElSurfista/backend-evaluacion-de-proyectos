<?php

namespace App\Exceptions;

use Exception;

class PorcentajePlaniCompException extends Exception
{
    protected $porcentajeIncorrecto;
    protected $porcentajeComparacion;


    public function __construct($message, $porcentajeIncorrecto, $porcentajeComparacion)
    {
        parent::__construct($message);
        $this->porcentajeIncorrecto = $porcentajeIncorrecto;
        $this->porcentajeComparacion = $porcentajeComparacion;
    }

    public function getPorcentajeIncorrecto()
    {
        return $this->porcentajeIncorrecto;
    }

    public function getPorcentajeComparacion()
    {
        return $this->porcentajeComparacion;
    }
}
