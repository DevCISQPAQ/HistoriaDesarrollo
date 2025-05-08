<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion11 extends Model
{
    protected $fillable = [
        'estudiante_id',
        'personalidadhijo',
        'oportunihijo',
        'adapthijo',
        'juegacnhijo',
        
    ];

    //
    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }
}
