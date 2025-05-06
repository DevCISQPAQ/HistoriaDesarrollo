<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion12 extends Model
{
    protected $fillable = [
        'reaccprimer',
        'dificumateria',
        'nivel_lectura',
        'nivel_escritura',
        'ha_repetido',
        'cual_escuela',
        'porque_escuela',
        'puedeperiodolarg',
        'conductaambito',
        'hay_dific',
        'cual_letra',
        'maneingles',
        'cali_desemp',
        'porq_desemp',
        'motivoscamb',
        'razoning',
        'acepto_terminos',
        
    ];

    //
    public function historiadesarrollo()
    {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }
}
