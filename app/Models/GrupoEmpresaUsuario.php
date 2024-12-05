<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoEmpresaUsuario extends Model
{
    use HasFactory;
    protected $table = 'GrupoEmpresaUsuario';
    protected $primaryKey = 'identificador';
    protected $guarded = [];

    public function grupoEmpresa()
    {
        return $this->belongsTo(GrupoEmpresa::class, 'identificadorGrupoEmpre');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'identificadorUsuar');
    }
}
