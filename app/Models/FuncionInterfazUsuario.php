<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionInterfazUsuario extends Model
{
    use HasFactory;
    protected $table = 'FuncionInterfazUsuario';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function interfazUsuario()
    {
        return $this->belongsTo(InterfazUsuario::class, 'identificadorInterfaz');
    }

    public function funcion()
    {
        return $this->belongsTo(Funcion::class, 'identificadorFunci');
    }
}
