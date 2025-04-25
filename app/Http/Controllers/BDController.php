<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Hermano;
use App\Models\HistoriaDesarrollo;
use App\Models\Seccion2;
use App\Models\Seccion3;

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
        session(['estudiante_id' => $historia->id]);

        // 4. Redirigir a sección 2
        return redirect()->route('preescolar.seccion2');
    }

//////////////

    public function guardarSeccion2(Request $request)
    {
        $request->validate([
            'nombre_padre' => 'required|string',
            'edad_padre' => 'required|integer',
            'empresa_padre' => 'required|string',
            'puesto_padre' => 'required|string',
            'correo_padre' => 'required|string',
            'redessoc_padre' => 'nullable|string',
            'padre_lateralidad' => 'required|array',
            'nombre_madre' => 'required|string',
            'edad_madre' => 'required|integer',
            'empresa_madre' => 'required|string',
            'puesto_madre' => 'required|string',
            'correo_madre' => 'required|string',
            'redessoc_madre' => 'nullable|string',
            'madre_lateralidad' => 'required|array',
            'estado_civil' => 'required|array',
            'nombre_conyuge' => 'nullable|string',
            'edad_conyuge' => 'nullable|integer',
            'empresa_conyuge' => 'nullable|string',
            'puesto_conyuge' => 'nullable|string',
            'correo_conyuge' => 'nullable|string',
            'redessoc_conyuge' => 'nullable|string',
            'conyuge_lateralidad' => 'nullable|array',
            'noviveconpadres_situtor' => 'nullable|string',
            'anos_casados' => 'required|integer',
            'numero_hijos' => 'required|integer',
            'separacion_conyugal' => 'nullable|string',
            'moti_separa' => 'nullable|string',
            'vive_con' => 'nullable|string',
            'religion' => 'required|string',

        ]);

        $seccion2 =  Seccion2::create([

            'nombre_padre' => $request->nombre_padre,
            'edad_padre' => $request->edad_padre,
            'empresa_padre' => $request->empresa_padre,
            'puesto_padre' => $request->puesto_padre,
            'correo_padre' => $request->correo_padre,
            'redessoc_padre' => $request->redessoc_padre,
            'padre_lateralidad' => json_encode((array) $request->padre_lateralidad),
            'nombre_madre' => $request->nombre_madre,
            'edad_madre' => $request->edad_madre,
            'empresa_madre' => $request->empresa_madre,
            'puesto_madre' => $request->puesto_madre,
            'correo_madre' => $request->correo_madre,
            'redessoc_madre' => $request->redessoc_madre,
            'madre_lateralidad' => json_encode((array) $request->madre_lateralidad),
            'estado_civil' => json_encode((array) $request->estado_civil),
            'nombre_conyuge' => $request->nombre_conyuge,
            'edad_conyuge' => $request->edad_conyuge,
            'empresa_conyuge' => $request->empresa_conyuge,
            'puesto_conyuge' => $request->puesto_conyuge,
            'correo_conyuge' => $request->correo_conyuge,
            'redessoc_conyuge' => $request->redessoc_conyuge,
            'conyuge_lateralidad' => json_encode((array) $request->conyuge_lateralidad),
            'noviveconpadres_situtor' => $request->noviveconpadres_situtor,
            'anos_casados' => $request->anos_casados,
            'numero_hijos' => $request->numero_hijos,
            'separacion_conyugal' => $request->separacion_conyugal,
            'moti_separa' => $request->moti_separa,
            'vive_con' => $request->vive_con,
            'religion' => $request->religion,

        ]);

        $historia = HistoriaDesarrollo::where('estudiante_id', session('estudiante_id'))->update([
            'seccion2_id' => $seccion2->id
        ]);

         // 3. Guardar en sesión el ID para siguientes secciones
        //  session(['historia_id' => $historia->id]);

        // 4. Redirigir a sección 2
        return redirect()->route('preescolar.seccion3');
    }


    //////////
    public function guardarSeccion3(Request $request){
        $hermano =  Hermano::create([

            'nombre_hermano' => json_encode((array) $request->nombre_hermano),
            'edad_hermano' => json_encode((array) $request->edad_hermano),
            'escolar_ocupacion' => json_encode((array) $request->escolar_ocupacion),
            'escuela_hermano' => json_encode((array) $request->escuela_hermano),
            'salud_hermano' => json_encode((array) $request->salud_hermano),

        ]);


        $seccion3 =  Seccion3::create([

            'hermano_id' => $hermano->id,
            'idioma_casa' => $request->idioma_casa,
            'personas_casa' =>$request->personas_casa,
            'quienes_casa' => $request->quienes_casa,
            'siadopcion' => $request->siadopcion,

        ]);


        HistoriaDesarrollo::where('estudiante_id', session('estudiante_id'))->update([
            'seccion3_id' => $seccion3->id
        ]);

         // 3. Guardar en sesión el ID para siguientes secciones
        //  session(['historia_id' => $historia->id]);

        // 4. Redirigir a sección 2
        return redirect()->route('preescolar.seccion4');

    }



    ///
}
