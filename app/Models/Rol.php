<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'Rol';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function usuarioRol()
    {
        return $this->hasMany(UsuarioRol::class, 'identificadorRol', 'identificador');
    }

    public function rolFuncion()
    {
        return $this->hasMany(RolFuncion::class, 'identificadorRol', 'identificador');
    }
}
