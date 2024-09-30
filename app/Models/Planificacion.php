<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planificacion extends Model
{
    use HasFactory;
    protected $table = 'Planificacion';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function grupoEmpresa()
    {
        return $this->belongsTo(GrupoEmpresa::class, 'identificadorGrupoEmpre');
    }

    public function objetivo()
    {
        return $this->hasMany(Objetivo::class, 'identificadorPlani');
    }
}
