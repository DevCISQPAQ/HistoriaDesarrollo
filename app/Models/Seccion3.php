<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion3 extends Model
{
    protected $fillable = [
        // 'hermano_id',
        'idioma_casa',
        'personas_casa',
        'quienes_casa',
        'siadopcion',
        'padre_edadadopt',
        'madre_edadadopt',
        'hijo_edadadopt',
    ];



    public function historiadesarrollo()
    {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }

    // public function hermano()
    // {
    //     return $this->hasMany(Hermano::class);
    // }
}
