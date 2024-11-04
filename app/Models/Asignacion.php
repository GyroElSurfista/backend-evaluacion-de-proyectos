<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;
    protected $primaryKey = 'identificador';
    protected $table = 'Asignacion';
    protected $guarded = [];
    public $timestamps = false;

    public function valorAsignado()
    {
        return $this->hasMany(ValorAsignado::class, 'identificadorAsign');
    }
    public function asignacionPlant()
    {
        return $this->hasMany(AsignacionPlantilla::class, 'identificadorAsign');
    }
    public function usuarEvalu()
    {
        return $this->belongsTo(User::class, 'identificadorUsuarEvalu');
    }
    public function usuarEsEvalu()
    {
        return $this->belongsTo(User::class, 'identificadorUsuarEsEvalu');
    }
    public function grupoEmpreEvalu()
    {
        return $this->belongsTo(GrupoEmpresa::class, 'identificadorGrupoEmpreEvalu');
    }
    public function grupoEmpreEsEvalu()
    {
        return $this->belongsTo(GrupoEmpresa::class, 'identificadorGrupoEmpreEsEvalu');
    }
}
