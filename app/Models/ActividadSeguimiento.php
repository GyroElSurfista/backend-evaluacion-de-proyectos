<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadSeguimiento extends Model
{
    use HasFactory;

    protected $table = 'ActividadSeguimiento';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function planillaSeguimiento()
    {
        return $this->belongsTo(PlanillaSeguimiento::class, 'identificadorPlaniSegui');
    }

    public function observacion()
    {
        return $this->hasMany(Observacion::class, 'identificadorActivSegui', 'identificador');
    }
}