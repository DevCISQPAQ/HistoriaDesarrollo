<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion8 extends Model
{
    
    protected $fillable = [
        'desarrollo_lenguaje',
        'prim_palabra',
    ];

    //
    public function historiadesarrollo()
    {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }
}
