<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion10 extends Model
{
    protected $fillable = [
        'saludnino',
        'otrosprob',
        'enfeotrastor',
        'tipoterapia',
        
    ];

    //
    public function historiadesarrollo()
    {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }
}
