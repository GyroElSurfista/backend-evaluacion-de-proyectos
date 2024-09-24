<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoEmpresa extends Model
{
    use HasFactory;
    protected $table = 'GrupoEmpresa';
    protected $guarded = [];

    public function planificacion()
    {
        return $this->hasMany(Planificacion::class, 'identificadorGrupoEmpresa');
    }

    public function archivo()
    {
        return $this->hasMany(Archivo::class, 'identificadorGrupoEmpresa');
    }
}
