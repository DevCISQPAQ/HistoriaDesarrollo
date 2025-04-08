<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaHistoriaDesarrollo extends Model {
    use HasFactory;

    protected $fillable = ['historia_desarrollo_id', 'seccion', 'pregunta', 'respuesta'];

    public function historiaDesarrollo() {
        return $this->belongsTo(HistoriaDesarrollo::class);
    }
}
