<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriterioAceptacionEntregable extends Model
{
    use HasFactory;
    protected $table = 'CriterioAceptacionEntregable';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function entregable()
    {
        return $this->belongsTo(Entregable::class, 'identificadorEntre');
    }

    public function revisionCriterioEntregable()
    {
        return $this->hasMany(RevisionCriterioEntregable::class, 'identificadorCriterioAceptEntre');
    }
}
