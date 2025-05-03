<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion11 extends Model
{
    protected $fillable = [
        'personalidadhijo',
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
