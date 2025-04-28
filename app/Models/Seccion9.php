<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion9 extends Model
{
    protected $fillable = [
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

    //
    public function historiadesarrollo()
    {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }
}
