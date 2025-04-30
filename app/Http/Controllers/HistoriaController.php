<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\HistoriaDesarrollo;
use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    //Intentar meter todo esto a un case o una funcion que mande valor de la seccion
    // Mostrar selector de nivel
    public function nivel_selector()
    {

        session([
            'id_alumno' => null,
            'nombre' => null,
            'grado' => null,

        ]);

        return view('historias.level-selector');
    }

    public function showPreescolarSeccion1()
    {
        session([
            'id_alumno' => '',
            'nombre' => '',
            'grado' => 'preescolar',

        ]);

        return view('historias.secciones.seccion1');
    }

    public function showPreescolarSeccion2()
    {
        return view('historias.secciones.seccion2');
    }

    public function showPreescolarSeccion3()
    {
        return view('historias.secciones.seccion3');
    }

    public function showPreescolarSeccion4()
    {
        return view('historias.secciones.seccion4');
    }

    public function showPreescolarSeccion5()
    {
        return view('historias.secciones.seccion5');
    }

    public function showPreescolarSeccion6()
    {
        return view('historias.secciones.seccion6');
    }

    public function showPreescolarSeccion7()
    {
        return view('historias.secciones.seccion7');
    }

    public function showPreescolarSeccion8()
    {
        return view('historias.secciones.seccion8');
    }

    public function showPreescolarSeccion9()
    {
        return view('historias.secciones.seccion9');
    }

    public function showPreescolarSeccion10()
    {
        return view('historias.secciones.seccion10');
    }

    public function showPreescolarSeccion11()
    {
        return view('historias.secciones.seccion11');
    }

    public function showPreescolarSeccion12()
    {
        return view('historias.secciones.seccion12');
    }

    public function showPreescolarSeccion13()
    {
        return view('historias.secciones.seccion13');
    }


    ////
    public function showPrimariaSecundaria()
    {
        session([
            'id_alumno' => '',
            'nombre' => '',
            'grado' => 'primaria_secundaria',

        ]);

        return view('historias.secciones.seccion1');
        //return redirect()->route('historias.preescolar.seccion1');
    }
    //////

}
