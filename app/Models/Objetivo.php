<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;
    protected $table = 'Objetivo';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function planificacion()
    {
        return $this->belongsTo(Planificacion::class, 'identificadorPlani');
    }

    public function entregable()
    {
        return $this->hasMany(Entregable::class, 'identificadorObjet');
    }

    public function planillaSeguimiento()
    {
        return $this->hasMany(PlanillaSeguimiento::class, 'identificadorObjet');
    }

    public function actividad()
    {
        return $this->hasMany(Actividad::class, 'identificadorObjet');
    }

    public function evaluacionObjetivo()
    {
        return $this->hasMany(EvaluacionObjetivo::class, 'identificadorObjet');
    }
}
