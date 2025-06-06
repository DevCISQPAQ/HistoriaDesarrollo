<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion10 extends Model
{
    protected $fillable = [
        'estudiante_id',
        'saludnino',
        'otrosprob',
        'enfeotrastor',
        'tipoterapia',
        
    ];

      protected $casts = [
        'saludnino' => 'array',
    ];

    //
    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }
}
