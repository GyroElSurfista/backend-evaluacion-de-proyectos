<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterfazUsuario extends Model
{
    use HasFactory;
    protected $table = 'InterfazUsuario';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function funcionInterfazUsuario()
    {
        return $this->hasMany(FuncionInterfazUsuario::class, 'identificadorInter', 'identificador');
    }
}
