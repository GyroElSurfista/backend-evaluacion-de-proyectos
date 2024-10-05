<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolFuncion extends Model
{
    use HasFactory;
    protected $table = 'RolFuncion';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'identificadorRol');
    }

    public function funcion()
    {
        return $this->belongsTo(Funcion::class, 'identificadorFuncion');
    }
}
