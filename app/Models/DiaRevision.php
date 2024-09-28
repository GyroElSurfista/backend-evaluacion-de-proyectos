<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaRevision extends Model
{
    use HasFactory;
    protected $table = 'DiaRevision';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;
}
