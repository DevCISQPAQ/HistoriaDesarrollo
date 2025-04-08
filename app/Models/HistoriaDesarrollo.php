<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaDesarrollo extends Model {
    use HasFactory;
    protected $table = 'historia_desarrollo'; // 
    protected $fillable = ['estudiante_id'];

    public function estudiante() {
        return $this->belongsTo(Estudiante::class);
    }

    public function respuestas() {
        return $this->hasMany(RespuestaHistoriaDesarrollo::class);
    }
}
