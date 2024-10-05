<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    use HasFactory;
    protected $table = 'Funcion';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function rolFuncion()
    {
        return $this->hasMany(RolFuncion::class, 'identificadorFunci', 'identificador');
    }

    public function funcionInterfazUsuario()
    {
        return $this->hasMany(FuncionInterfazUsuario::class, 'identificadorFunci', 'identificador');
    }
}
