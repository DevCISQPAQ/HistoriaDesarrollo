<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    /** @use HasFactory<\Database\Factories\EstudianteFactory> */
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

    // public function historiadesarrollo() {
    //     return $this->belongsTo(HistoriaDesarrollo::class);
    // }

    public function seccion2()
    {
        return $this->hasOne(Seccion2::class);
    }

    public function seccion3()
    {
        return $this->hasOne(Seccion3::class);
    }

    public function seccion4()
    {
        return $this->hasOne(Seccion4::class);
    }

    public function seccion5()
    {
        return $this->hasOne(Seccion5::class);
    }

    public function seccion6()
    {
        return $this->hasOne(Seccion6::class);
    }

    public function seccion7()
    {
        return $this->hasOne(Seccion7::class);
    }

    public function seccion8()
    {
        return $this->hasOne(Seccion8::class);
    }

    public function seccion9()
    {
        return $this->hasOne(Seccion9::class);
    }

    public function seccion10()
    {
        return $this->hasOne(Seccion10::class);
    }

    public function seccion11()
    {
        return $this->hasOne(Seccion11::class);
    }

    public function seccion12()
    {
        return $this->hasOne(Seccion12::class);
    }


    public function historiadesarrollo()
    {
        return $this->hasOne(HistoriaDesarrollo::class);
    }

    public function hermano()
    {
        return $this->hasOne(Hermano::class);
    }

}
