<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion11 extends Model
{
    protected $fillable = [
        'caracterhijo',
        'oportunihijo',
        'adapthijo',
        'juegacnhijo',
        
    ];

    //
    public function historiadesarrollo()
    {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }
}
