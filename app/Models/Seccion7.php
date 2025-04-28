<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion7 extends Model
{
    protected $fillable = [
        'desarrollo_motor',
        'edad_gate',
        'edad_cami',
        'dies_zurdhijo',
        'prac_deporte',
    ];

    //
    public function historiadesarrollo()
    {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }
}
