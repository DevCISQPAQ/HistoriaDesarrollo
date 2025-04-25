<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaDesarrollo extends Model
{
    /** @use HasFactory<\Database\Factories\HistoriaDesarrolloFactory> */
    use HasFactory;

    protected $fillable = ['estudiante_id','seccion2_id'];

 
    public function estudiante() {
        return $this->hasMany(Estudiante::class);
    }

    public function seccion2() {
        return $this->hasMany(Seccion2::class);
    }

}
