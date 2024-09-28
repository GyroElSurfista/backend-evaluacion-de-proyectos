<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoEmpresa extends Model
{
    use HasFactory;
    protected $table = 'GrupoEmpresa';
    protected $primaryKey = 'identificador';
    protected $guarded = [];

    public function planificacion()
    {
        return $this->hasMany(Planificacion::class, 'identificadorGrupoEmpre');
    }

    public function archivo()
    {
        return $this->hasMany(Archivo::class, 'identificadorGrupoEmpre');
    }

    public function usuarios()
    {
        return $this->hasMany(User::class, 'identificadorGrupoEmpre');
    }
}
