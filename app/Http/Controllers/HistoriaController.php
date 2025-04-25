<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\HistoriaDesarrollo;
use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    //Intentar meter todo esto a un case o una funcion que mande valor de la seccion
    // Mostrar selector de nivel
    public function index()
    {
        return view('historias.level-selector');
    }
    public function showPreescolarSeccion1()
    {
        return view('historias.preescolar.seccion1');
    }

    public function showPreescolarSeccion2()
    {
        return view('historias.preescolar.seccion2');
    }

    public function showPreescolarSeccion3()
    {
        return view('historias.preescolar.seccion3');
    }

    public function showPreescolarSeccion4()
    {
        return view('historias.preescolar.seccion4');
    }

    public function showPreescolarSeccion5()
    {
        return view('historias.preescolar.seccion5');
    }

    public function showPreescolarSeccion6()
    {
        return view('historias.preescolar.seccion6');
    }

    public function showPreescolarSeccion7()
    {
        return view('historias.preescolar.seccion7');
    }

    public function showPreescolarSeccion8()
    {
        return view('historias.preescolar.seccion8');
    }

    public function showPreescolarSeccion9()
    {
        return view('historias.preescolar.seccion9');
    }

    public function showPreescolarSeccion10()
    {
        return view('historias.preescolar.seccion10');
    }

    public function showPreescolarSeccion11()
    {
        return view('historias.preescolar.seccion11');
    }

    public function showPreescolarSeccion12()
    {
        return view('historias.preescolar.seccion12');
    }

    public function showPreescolarSeccion13()
    {
        return view('historias.preescolar.seccion13');
    }



    public function showPrimariaSecundaria()
    {
        return view('historias.secciones.primaria-secundaria');
    }


    // //Metodo para guardar
    // public function guardarSeccion1(Request $request)
    // {
    //     $request->validate([
    //         'nombre_completo' => 'required|string|max:100',
    //         'fecha_nacimiento' => 'required|date',
    //         'lugar_nacimiento' => 'required|string',
    //         'sexo' => 'required|in:masculino,femenino',
    //         'edad' => 'required|integer|between:3,6',
    //         'grado_escolar' => 'required|string',
    //         'direccion' => 'required|string',
    //         'cp' => 'required|digits:5',
    //         'telefono' => 'required|string',
    //         'escuela_procedencia' => 'nullable|string',
    //     ]);

    //     $estudiante = Estudiante::create([
    //         'nombre_completo' => $request->nombre_completo,
    //         'fecha_nacimiento' => $request->fecha_nacimiento,
    //         'lugar_nacimiento' => $request->lugar_nacimiento,
    //         'genero' => $request->sexo,
    //         'edad' => $request->edad,
    //         'grado_escolar' => $request->grado_escolar,
    //         'direccion' => $request->direccion,
    //         'cp' => $request->cp,
    //         'telefono' => $request->telefono,
    //         'escuela_procedencia' => $request->escuela_procedencia,
    //     ]);


    //     // 2. Crear historia de desarrollo asociada
    //     $historia = HistoriaDesarrollo::create([
    //         'estudiante_id' => $estudiante->id
    //     ]);

    //     // 3. Guardar en sesión el ID para siguientes secciones
    //     session(['historia_id' => $historia->id]);

    //     // 4. Redirigir a sección 2
    //     return redirect()->route('preescolar.seccion2');
    // }
}
