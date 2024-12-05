<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;
    protected $table = 'Semestre';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function grupoEmpresas()
    {
        return $this->hasMany(GrupoEmpresa::class, 'identificadorSemes');
    }

    public function semestreUsuario()
    {
        return $this->hasMany(SemestreUsuario::class, 'identificadorSemes');
    }
}
