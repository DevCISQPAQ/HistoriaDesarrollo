<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model {
    use HasFactory;

     // Campos que pueden asignarse masivamente
     protected $fillable = [
        'nombre_completo',
        'fecha_nacimiento',
        'genero',
        'direccion',
        'cp',
        'telefono',
        'escuela_procedencia',
        'grado_escolar',
        'edad',
        'lugar_nacimiento'
    ];

    public function historiaDesarrollo() {
        return $this->hasOne(HistoriaDesarrollo::class);
    }
}
