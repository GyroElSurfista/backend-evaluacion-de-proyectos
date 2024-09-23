<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $table = 'Archivo';
    protected $guarded = [];

    public function grupoEmpresa()
    {
        return $this->belongsTo(GrupoEmpresa::class, 'identificadorGrupoEmpresa');
    }
}
