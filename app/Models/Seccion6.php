<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion6 extends Model
{

    protected $fillable = [
        'desa_visual',
        'desa_auditivo',
    ];

    //
    public function historiadesarrollo()
    {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }
}
