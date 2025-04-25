<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\HistoriaDesarrollo;
use App\Models\Seccion2;

class BDController extends Controller
{
    //Metodo para guardar
    public function guardarSeccion1(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'required|string',
            'sexo' => 'required|in:masculino,femenino',
            'edad' => 'required|integer|between:3,6',
            'grado_escolar' => 'required|string',
            'direccion' => 'required|string',
            'cp' => 'required|digits:5',
            'telefono' => 'required|string',
            'escuela_procedencia' => 'nullable|string',
        ]);

        $estudiante = Estudiante::create([
            'nombre_completo' => $request->nombre_completo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'lugar_nacimiento' => $request->lugar_nacimiento,
            'genero' => $request->sexo,
            'edad' => $request->edad,
            'grado_escolar' => $request->grado_escolar,
            'direccion' => $request->direccion,
            'cp' => $request->cp,
            'telefono' => $request->telefono,
            'escuela_procedencia' => $request->escuela_procedencia,
        ]);


        // 2. Crear historia de desarrollo asociada
        $historia = HistoriaDesarrollo::create([
            'estudiante_id' => $estudiante->id
        ]);

        // 3. Guardar en sesión el ID para siguientes secciones
        session(['historia_id' => $historia->id]);

        // 4. Redirigir a sección 2
        return redirect()->route('preescolar.seccion2');
    }


    public function guardarSeccion2(Request $request)
    {
        $request->validate([
            'nombre_padre' => 'required|string|max:100',
            'edad_padre' => 'required|integer|',
            'empresa_padre' => 'required|string',
            'puesto_padre' => 'required|string',
            'correo_padre' => 'required|string',
            'redessoc_padre' => 'required|string',
            'padre_lateralidad' => 'required|string',
            'nombre_madre' => 'required|string',
            'edad_madre' => 'required|integer|',
            'empresa_madre' => 'required|string',
            'puesto_madre' => 'required|string',
            'correo_madre' => 'required|string',
            'redessoc_madre' => 'required|string',
            'madre_lateralidad' => 'required|string',
            'estado_civil' => 'required|string',
            'nombre_conyuge' => 'nullable|string',
            'edad_conyuge' => 'nullable|integer|',
            'empresa_conyuge' => 'nullable|string',
            'puesto_conyuge' => 'nullable|string',
            'correo_conyuge' => 'nullable|string',
            'redessoc_conyuge' => 'nullable|string',
            'conyuge_lateralidad' => 'nullable|string',
            'noviveconpadres_situtor' => 'nullable|string',
            'anos_casados' => 'required|integer|',
            'numero_hijos' => 'required|integer|',
            'separacion_conyugal' => 'nullable|string',
            'moti_separa' => 'nullable|string',
            'vive_con' => 'nullable|string',
            'religion' => 'required|string',

        ]);

        $seccion2 = Seccion2::create([
            'nombre_completo' => $request->nombre_completo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'lugar_nacimiento' => $request->lugar_nacimiento,
            'genero' => $request->sexo,
            'edad' => $request->edad,
            'grado_escolar' => $request->grado_escolar,
            'direccion' => $request->direccion,
            'cp' => $request->cp,
            'telefono' => $request->telefono,
            'escuela_procedencia' => $request->escuela_procedencia,
        ]);


        //    // 2. Crear historia de desarrollo asociada
        //    $historia = HistoriaDesarrollo::create([
        //        'estudiante_id' => $estudiante->id
        //    ]);

        // 3. Guardar en sesión el ID para siguientes secciones
        //    session(['historia_id' => $historia->id]);

        // 4. Redirigir a sección 2
        return redirect()->route('preescolar.seccion3');
    }
}
