<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion3 extends Model
{
    protected $fillable = [
        // 'hermano_id',
        'estudiante_id',
        'idioma_casa',
        'personas_casa',
        'quienes_casa',
        'siadopcion',
        'padre_edadadopt',
        'madre_edadadopt',
        'hijo_edadadopt',
    ];



    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }
    // public function hermano()
    // {
    //     return $this->hasMany(Hermano::class);
    // }
}
