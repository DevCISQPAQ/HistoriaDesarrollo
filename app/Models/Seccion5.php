<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion5 extends Model
{

    protected $fillable = [
        'total_embarazo',
        'experi_embarazo',
        'mencione_embaenfe',
        'tiempo_gestacion',
        'tipo_parto',
        'lloro',
        'incubadora',
        'apgar',
        
    ];

    //
    public function historiadesarrollo()
    {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }
}
