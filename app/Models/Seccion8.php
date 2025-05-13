<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion8 extends Model
{
    
    protected $fillable = [
        'estudiante_id',
        'desarrollo_lenguaje',
        'prim_palabra',
    ];

    //
    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }
}
