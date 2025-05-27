<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\HistoriaDesarrollo;
use App\Models\Seccion2;
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
            'numero_hijos' => null,
            'old_hijoId' => null,
            'add_hijo' => null,
            'formulario_aceptado' => null,

        ]);

        return view('historias.nivel_educativo');
    }

    public function showSeccion1(Request $request)
    {
        if ($request->input('add_hijo') === '1') {

            session([
                'old_hijoId' => session('id_alumno'),
                'id_alumno' => '',
                'nombre' => '',
                'grado' => $request->input('grado'),
                'add_hijo' => '',
                'formulario_aceptado' => null,
            ]);
        } else {

            session([
                'old_hijoId' => '',//
                'id_alumno' => '',
                'nombre' => '',
                'grado' => $request->input('grado'),
                'add_hijo' => '',//
                'formulario_aceptado' => null,
            ]);
        }

        return view('historias.secciones.seccion1');
    }

    public function showSeccion2()
    {
        return view('historias.secciones.seccion2');
    }

    public function showSeccion3()
    {
        return view('historias.secciones.seccion3');
    }

    public function showSeccion4()
    {
        return view('historias.secciones.seccion4');
    }

    public function showSeccion5()
    {
        return view('historias.secciones.seccion5');
    }

    public function showSeccion6()
    {
        return view('historias.secciones.seccion6');
    }

    public function showSeccion7()
    {
        return view('historias.secciones.seccion7');
    }

    public function showSeccion8()
    {
        return view('historias.secciones.seccion8');
    }

    public function showSeccion9()
    {
        return view('historias.secciones.seccion9');
    }

    public function showSeccion10()
    {
        return view('historias.secciones.seccion10');
    }

    public function showSeccion11()
    {
        return view('historias.secciones.seccion11');
    }

    public function showSeccion12()
    {
        return view('historias.secciones.seccion12');
    }

    public function showSeccion13()
    {
        return view('historias.secciones.seccion13');
    }
}
