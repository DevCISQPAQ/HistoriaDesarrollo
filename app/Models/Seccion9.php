<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion9 extends Model
{
    protected $fillable = [
        'estudiante_id',
        'suenonino',
        'horadecama',
        'horadespierta',
        'dusiesta',
        'horasiesta',
        'cohabitacion',
        'conquien',
        'cocama',
        'edad_dupapa',
    ];

     protected $casts = [
        'suenonino' => 'array',
    ];

    //
    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }
}
