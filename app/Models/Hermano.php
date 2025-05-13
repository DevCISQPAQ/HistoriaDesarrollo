<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hermano extends Model
{
    protected $fillable = [
        'estudiante_id',
        'nombre_hermano',
        'edad_hermano',
        'escolar_ocupacion',
        'escuela_hermano',
        'salud_hermano'
    ];

      protected $casts = [
        'nombre_hermano' => 'array',
        'edad_hermano' => 'array',
        'escolar_ocupacion' => 'array',
        'escuela_hermano' => 'array',
        'salud_hermano' => 'array',
    ];

    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }

    public function seccion2()
    {
        return $this->belongsTo(Seccion2::class);
    }

   
}
