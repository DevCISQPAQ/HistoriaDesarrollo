<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion6 extends Model
{

    protected $fillable = [
        'estudiante_id',
        'desa_visual',
        'desa_auditivo',
    ];

    //
    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }
}
