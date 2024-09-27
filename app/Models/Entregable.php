<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregable extends Model
{
    use HasFactory;
    protected $table = 'Entregable';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'identificadorObjet');
    }

    public function criterioAceptacionEntregable()
    {
        return $this->hasMany(CriterioAceptacionEntregable::class, 'identificadorEntre');
    }

    public function revisionEntregable()
    {
        return $this->hasMany(RevisionEntregable::class, 'identificadorEntre');
    }
}
