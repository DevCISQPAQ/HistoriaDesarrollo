<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion5 extends Model
{

    protected $fillable = [
        'estudiante_id',
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
    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }
}
