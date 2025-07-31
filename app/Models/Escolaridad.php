<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolaridad extends Model
{


    protected $table = 'escolaridad';

    protected $fillable = [
        'estudiante_id',
        'escolaridades_nivel',
        'escolaridades_colegio',
        'escolaridades_anios',
        'escolaridades_desempeno',
        'escolaridades_adaptacion',
    ];

    protected $casts = [
        'escolaridades_nivel' => 'array',
        'escolaridades_colegio' => 'array',
        'escolaridades_anios' => 'array',
        'escolaridades_desempeno' => 'array',
        'escolaridades_adaptacion' => 'array',
    ];


    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    // Relación: Cada escolaridad pertenece a una sección12
    public function seccion12()
    {
        return $this->belongsTo(Seccion12::class);
    }
}
