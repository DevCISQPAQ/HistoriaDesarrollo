<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion2 extends Model
{
    /** @use HasFactory<\Database\Factories\Seccion2Factory> */
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'nombre_padre',
        'edad_padre',
        'empresa_padre',
        'puesto_padre',
        'ocupacion_padre',
        'correo_padre',
        'redessoc_padre',
        'padre_lateralidad',
        'nombre_madre',
        'edad_madre',
        'empresa_madre',
        'puesto_madre',
        'ocupacion_madre',
        'correo_madre',
        'redessoc_madre',
        'madre_lateralidad',
        'estado_civil',
        'nombre_conyuge',
        'edad_conyuge',
        'empresa_conyuge',
        'puesto_conyuge',
        'ocupacion_conyuge',
        'correo_conyuge',
        'redessoc_conyuge',
        'conyuge_lateralidad',
        'noviveconpadres_situtor',
        'anos_casados',
        'numero_hijos',
        'moti_separa',
        'vive_con',
        'religion',
        'valores_familia',
        'hermano_id'
    ];



    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }

    public function hermano()
    {
        return $this->hasOne(Hermano::class);
    }
}
