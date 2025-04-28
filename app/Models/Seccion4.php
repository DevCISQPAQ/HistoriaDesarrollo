<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion4 extends Model
{

    protected $fillable = [
        'califica_adaptacion',
        'califica_adaptacion_porq',
        'relacion_familia_madre',
        'relacion_familia_padre',
        'relacion_familia_hermanos',
        'diferencia_estilos',
        'responde_desobede',
        'sanciones_casa',
        'sanciones_conductas',
        'docil_desafiante',
        'evento_traumatico',

    ];
    //

    public function historiadesarrollo()
    {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }
}
