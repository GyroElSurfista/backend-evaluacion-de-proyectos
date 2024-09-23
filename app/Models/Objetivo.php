<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;
    protected $table = 'Objetivo';
    protected $guarded = [];

    public function planificacion()
    {
        return $this->belongsTo(Planificacion::class, 'identificadorPlani');
    }

    public function entregable()
    {
        return $this->hasMany(Entregable::class, 'identificadorObjet');
    }
}
