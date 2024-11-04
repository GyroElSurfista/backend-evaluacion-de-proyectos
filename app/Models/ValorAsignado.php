<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValorAsignado extends Model
{
    use HasFactory;
    protected $primaryKey = 'identificador';
    protected $table = 'ValorAsignado';
    protected $guarded = [];
    public $timestamps = false;


    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class, 'identificadorAsign');
    }
    public function estructuraPlant()
    {
        return $this->belongsTo(EstructuraPlantilla::class, 'identificadorEstruPlant');
    }
}
