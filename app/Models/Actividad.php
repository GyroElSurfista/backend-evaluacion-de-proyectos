<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'Actividad';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'identificadorUsua');
    }

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'identificadorObjet');
    }

    public function observacion()
    {
        return $this->hasMany(Observacion::class, 'identificadorActiv', 'identificador');
    }

    public function resultadoEsperado()
    {
        return $this->hasMany(ResultadoEsperado::class, 'identificadorActiv', 'identificador');
    }
}
