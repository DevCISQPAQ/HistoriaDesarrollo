<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hermano extends Model
{
    protected $fillable = [
        'nombre_hermano',
        'edad_hermano',
        'escolar_ocupacion',
        'escuela_hermano',
        'salud_hermano'
    ];

    public function seccion2()
    {
        return $this->belongsTo(Seccion2::class);
    }
}
