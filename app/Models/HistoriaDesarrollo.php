<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaDesarrollo extends Model
{
    /** @use HasFactory<\Database\Factories\HistoriaDesarrolloFactory> */
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'seccion2_id',
        'seccion3_id',
        'seccion4_id',
        'seccion5_id',
        'seccion6_id',
        'seccion7_id',
        'seccion8_id',
        'seccion9_id',
        'seccion10_id',
        'seccion11_id',
        'seccion12_id',

    ];


    public function estudiante()
    {
        return$this->belongsTo(Estudiante::class);
    }

    public function seccion2()
    {
        return $this->belongsTo(Seccion2::class);
    }

    public function seccion3()
    {
        return $this->belongsTo(Seccion3::class);
    }

    public function seccion4()
    {
        return $this->belongsTo(Seccion4::class);
    }

    public function seccion5()
    {
        return $this->belongsTo(Seccion5::class);
    }

    public function seccion6()
    {
        return $this->belongsTo(Seccion6::class);
    }

    public function seccion7()
    {
        return $this->belongsTo(Seccion7::class);
    }

    public function seccion8()
    {
        return $this->belongsTo(Seccion8::class);
    }

    public function seccion9()
    {
        return $this->belongsTo(Seccion9::class);
    }

    public function seccion10()
    {
        return $this->belongsTo(Seccion10::class);
    }

    public function seccion11()
    {
        return $this->belongsTo(Seccion11::class);
    }

    public function seccion12()
    {
        return $this->belongsTo(Seccion12::class);
    }


}
