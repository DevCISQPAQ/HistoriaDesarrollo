<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion7 extends Model
{
    protected $fillable = [
        'estudiante_id',
        'desarrollo_motor',
        'edad_gate',
        'edad_cami',
        'dies_zurdhijo',
        'prac_deporte',
    ];

    protected $casts = [
        'dies_zurdhijo' => 'array',
    ];

    //
    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }
}
