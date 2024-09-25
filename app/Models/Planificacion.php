<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planificacion extends Model
{
    use HasFactory;
    protected $table = 'Planificacion';
    protected $guarded = [];

    public function grupoEmpresa()
    {
        return $this->belongsTo(GrupoEmpresa::class, 'identificadorGrupoEmpresa');
    }

    public function objetivo()
    {
        return $this->hasMany(Objetivo::class, 'identificadorPlani');
    }
}
