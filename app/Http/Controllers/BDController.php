<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Hermano;
use App\Models\HistoriaDesarrollo;
use App\Models\Seccion2;
use App\Models\Seccion3;
use App\Models\Seccion4;
use App\Models\Seccion5;
use App\Models\Seccion6;
use App\Models\Seccion7;
use App\Models\Seccion8;
use App\Models\Seccion9;
use App\Models\Seccion10;
use App\Models\Seccion11;
use App\Models\Seccion12;

class BDController extends Controller
{
    //Metodo para guardar
    public function guardarSeccion1(Request $request)
    {
        // $request->validate([
        //     'nombre_completo' => 'required|string|max:100',
        //     'fecha_nacimiento' => 'required|date',
        //     'lugar_nacimiento' => 'required|string',
        //     'sexo' => 'required|in:masculino,femenino',
        //     'edad' => 'required|integer|between:3,6',
        //     'grado_escolar' => 'required|string',
        //     'direccion' => 'required|string',
        //     'cp' => 'required|digits:5',
        //     'telefono' => 'required|string',
        //     'escuela_procedencia' => 'nullable|string',
        // ]);

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
        session()->put(['id_alumno' => $estudiante->id]);
        session()->put(['nombre' => $estudiante->nombre_completo]);

        // 4. Redirigir a sección 2
        return redirect()->route('historia.seccion2');
    }

    public function guardarSeccion2(Request $request)
    {
        // $request->validate([
        //     'nombre_padre' => 'required|string',
        //     'edad_padre' => 'required|integer',
        //     'empresa_padre' => 'required|string',
        //     'puesto_padre' => 'required|string',
        //     'ocupacion_padre' => 'required|string',
        //     'correo_padre' => 'required|string',
        //     'redessoc_padre' => 'nullable|array',
        //     'padre_lateralidad' => 'required|array',
        //     'nombre_madre' => 'required|string',
        //     'edad_madre' => 'required|integer',
        //     'empresa_madre' => 'required|string',
        //     'puesto_madre' => 'required|string',
        //     'ocupacion_madre' => 'required|string',
        //     'correo_madre' => 'required|string',
        //     'redessoc_madre' => 'nullable|array',
        //     'madre_lateralidad' => 'required|array',
        //     'estado_civil' => 'required|array',
        //     'nombre_conyuge' => 'nullable|string',
        //     'edad_conyuge' => 'nullable|integer',
        //     'empresa_conyuge' => 'nullable|string',
        //     'puesto_conyuge' => 'nullable|string',
        //     'ocupacion_conyuge' => 'nullable|string',
        //     'correo_conyuge' => 'nullable|string',
        //     'redessoc_conyuge' => 'nullable|array',
        //     'conyuge_lateralidad' => 'nullable|array',
        //     'noviveconpadres_situtor' => 'nullable|string',
        //     'anos_casados' => 'required|integer',
        //     'numero_hijos' => 'required|integer',
        //     'moti_separa' => 'nullable|string',
        //     'vive_con' => 'nullable|string',
        //     'religion' => 'required|string',
        //     'valores_familia' => 'required|string',

        // ]);
        if (($request->numero_hijos) > 1) {
            $hermano =  Hermano::updateOrCreate(
                ['estudiante_id' =>session('id_alumno')],
                [
                'nombre_hermano' => $request->nombre_hermano,
                'edad_hermano' => $request->edad_hermano,
                'escolar_ocupacion' =>  $request->escolar_ocupacion,
                'escuela_hermano' => $request->escuela_hermano,
                'salud_hermano' => $request->salud_hermano,

            ]);
        } else {
            $hermano = new Hermano(); // Crea un modelo vacío
            $hermano->id = null;
        }

        $seccion2 =  Seccion2::updateOrCreate(
            ['estudiante_id' =>session('id_alumno')],
            [
            'nombre_padre' => $request->nombre_padre,
            'edad_padre' => $request->edad_padre,
            'empresa_padre' => $request->empresa_padre,
            'puesto_padre' => $request->puesto_padre,
            'ocupacion_padre' => $request->ocupacion_padre,
            'correo_padre' => $request->correo_padre,
            'redessoc_padre' =>  $request->redessoc_padre,
            'padre_lateralidad' =>  $request->padre_lateralidad,
            'nombre_madre' => $request->nombre_madre,
            'edad_madre' => $request->edad_madre,
            'empresa_madre' => $request->empresa_madre,
            'puesto_madre' => $request->puesto_madre,
            'ocupacion_madre' => $request->ocupacion_madre,
            'correo_madre' => $request->correo_madre,
            'redessoc_madre' => $request->redessoc_madre,
            'madre_lateralidad' => $request->madre_lateralidad,
            'estado_civil' =>  $request->estado_civil,
            'nombre_conyuge' => $request->nombre_conyuge,
            'edad_conyuge' => $request->edad_conyuge,
            'empresa_conyuge' => $request->empresa_conyuge,
            'puesto_conyuge' => $request->puesto_conyuge,
            'correo_conyuge' => $request->correo_conyuge,
            'redessoc_conyuge' => $request->redessoc_conyuge,
            'conyuge_lateralidad' => $request->conyuge_lateralidad,
            'noviveconpadres_situtor' => $request->noviveconpadres_situtor,
            'anos_casados' => $request->anos_casados,
            'numero_hijos' => $request->numero_hijos,
            'moti_separa' => $request->moti_separa,
            'vive_con' => $request->vive_con,
            'religion' => $request->religion,
            'valores_familia' => $request->valores_familia,
            'hermano_id' => $hermano->id,

        ]);

        session()->put(['numero_hijos' => $seccion2->numero_hijos]);


        // $formulario = HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->first();
        //     'seccion2_id' => $seccion2->id
        // ]);

        $formulario = HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->first();
        $formulario->seccion2_id = $seccion2->id;
        $formulario->save();



        return redirect()->route('historia.seccion3');
    }

    public function guardarSeccion3(Request $request)
    {
        // $hermano =  Hermano::create([

        //     'nombre_hermano' => json_encode((array) $request->nombre_hermano),
        //     'edad_hermano' => json_encode((array) $request->edad_hermano),
        //     'escolar_ocupacion' => json_encode((array) $request->escolar_ocupacion),
        //     'escuela_hermano' => json_encode((array) $request->escuela_hermano),
        //     'salud_hermano' => json_encode((array) $request->salud_hermano),

        // ]);


        $seccion3 =  Seccion3::create([
            'estudiante_id' =>session('id_alumno'),
            // 'hermano_id' => $hermano->id,
            'idioma_casa' => $request->idioma_casa,
            'personas_casa' => $request->personas_casa,
            'quienes_casa' => $request->quienes_casa,
            'siadopcion' => $request->siadopcion,
            'padre_edadadopt' => $request->padre_edadadopt,
            'madre_edadadopt' => $request->madre_edadadopt,
            'hijo_edadadopt' => $request->hijo_edadadopt,

        ]);


        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'seccion3_id' => $seccion3->id
        ]);

        // 3. Guardar en sesión el ID para siguientes secciones
        //  session(['historia_id' => $historia->id]);

        // 4. Redirigir a sección 2
        return redirect()->route('historia.seccion4');
    }

    public function guardarSeccion4(Request $request)
    {

        $seccion4 = Seccion4::create([
            'estudiante_id' =>session('id_alumno'),
            'califica_adaptacion' => $request->califica_adaptacion,
            'califica_adaptacion_porq' => $request->califica_adaptacion_porq,
            'relacion_familia_madre' => $request->relacion_familia_madre,
            'relacion_familia_padre' => $request->relacion_familia_padre,
            'relacion_familia_hermanos' => $request->relacion_familia_hermanos,
            // 'responde_desobede' => $request->responde_desobede,
            'sanciones_casa' => $request->sanciones_casa,
            // 'sanciones_conductas' => $request->sanciones_conductas,
            'docil_desafiante' => $request->docil_desafiante,
            'evento_traumatico' => $request->evento_traumatico,
        ]);

        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'seccion4_id' => $seccion4->id
        ]);


        return redirect()->route('historia.seccion5');
    }

    public function guardarSeccion5(Request $request)
    {

        $seccion5 = Seccion5::create([
            'estudiante_id' =>session('id_alumno'),
            'total_embarazo' => $request->total_embarazo,
            'experi_embarazo' => $request->experi_embarazo,
            'mencione_embaenfe' => $request->mencione_embaenfe,
            'tiempo_gestacion' => $request->tiempo_gestacion,
            'tipo_parto' => $request->tipo_parto,
            'lloro' => $request->lloro,
            'incubadora' => $request->incubadora,
            'apgar' => $request->apgar,
        ]);

        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'seccion5_id' => $seccion5->id
        ]);


        return redirect()->route('historia.seccion6');
    }

    public function guardarSeccion6(Request $request)
    {

        $seccion6 = Seccion6::create([
            'estudiante_id' =>session('id_alumno'),
            'desa_visual' => $request->desa_visual,
            'desa_auditivo' => $request->desa_auditivo,
        ]);

        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'seccion6_id' => $seccion6->id
        ]);


        return redirect()->route('historia.seccion7');
    }

    public function guardarSeccion7(Request $request)
    {

        $seccion7 = Seccion7::create([
            'estudiante_id' =>session('id_alumno'),
            'desarrollo_motor' => $request->desarrollo_motor,
            'edad_gate' => $request->edad_gate,
            'edad_cami' => $request->edad_cami,
            'dies_zurdhijo' => $request->dies_zurdhijo,
            'prac_deporte' => $request->prac_deporte,
        ]);

        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'seccion7_id' => $seccion7->id
        ]);


        return redirect()->route('historia.seccion8');
    }

    public function guardarSeccion8(Request $request)
    {

        $seccion8 = Seccion8::create([
            'estudiante_id' =>session('id_alumno'),
            'desarrollo_lenguaje' => $request->desarrollo_lenguaje,
            'prim_palabra' => $request->prim_palabra,
        ]);

        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'seccion8_id' => $seccion8->id
        ]);


        return redirect()->route('historia.seccion9');
    }

    public function guardarSeccion9(Request $request)
    {

        $seccion9 = Seccion9::create([
            'estudiante_id' =>session('id_alumno'),
            'suenonino' => $request->suenonino,
            'horadecama' => $request->horadecama,
            'horadespierta' => $request->horadespierta,
            'dusiesta' => $request->dusiesta,
            'horasiesta' => $request->horasiesta,
            'cohabitacion' => $request->cohabitacion,
            'conquien' => $request->conquien,
            'cocama' => $request->cocama,
            'edad_dupapa' => $request->edad_dupapa,
        ]);

        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'seccion9_id' => $seccion9->id
        ]);


        return redirect()->route('historia.seccion10');
    }

    public function guardarSeccion10(Request $request)
    {

        $seccion10 = Seccion10::create([
            'estudiante_id' =>session('id_alumno'),
            'saludnino' =>  $request->saludnino,
            'otrosprob' => $request->otrosprob,
            'enfeotrastor' => $request->enfeotrastor,
            'tipoterapia' => $request->tipoterapia,
        ]);

        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'seccion10_id' => $seccion10->id
        ]);


        return redirect()->route('historia.seccion11');
    }

    public function guardarSeccion11(Request $request)
    {

        $seccion11 = Seccion11::create([
            'estudiante_id' =>session('id_alumno'),
            'personalidadhijo' => $request->personalidadhijo,
            'oportunihijo' => $request->oportunihijo,
            'adapthijo' => $request->adapthijo,
            'juegacnhijo' => $request->juegacnhijo,
        ]);

        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'seccion11_id' => $seccion11->id
        ]);


        return redirect()->route('historia.seccion12');
    }

    public function guardarSeccion12(Request $request)
    {

        $seccion12 = Seccion12::create([
            'estudiante_id' =>session('id_alumno'),
            'reaccprimer' => $request->reaccprimer,
            'dificumateria' => $request->dificumateria,
            'nivel_lectura' => $request->nivel_lectura,
            'nivel_escritura' => $request->nivel_escritura,
            'dificultad_tarea' => $request->dificultad_tarea,
            'relacion_maestro' => $request->relacion_maestro,
            'ha_repetido' => $request->ha_repetido,
            'cual_escuela' => $request->cual_escuela,
            'porque_escuela' => $request->porque_escuela,
            'puedeperiodolarg' => $request->puedeperiodolarg,
            'conductaambito' => $request->conductaambito,
            'hay_dific' => $request->hay_dific,
            'cual_letra' => $request->cual_letra,
            'maneingles' => $request->maneingles,
            'cali_desemp' => $request->cali_desemp,
            'porq_desemp' => $request->porq_desemp,
            'motivoscamb' => $request->motivoscamb,
            'razoning' => $request->razoning,
        ]);

        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'seccion12_id' => $seccion12->id
        ]);


        return redirect()->route('historia.seccion13');
    }

    public function guardarSeccion13(Request $request)
    {
        HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
            'acepto_terminos' => $request->acepto_terminos
        ]);

        return redirect()->route('historia.nivel-educativo');
    }


    //
    public function buscar(Request $request)
    {
        $estudiantes = Estudiante::where('nombre_completo', $request->nombre_completo)
            ->where('fecha_nacimiento', $request->fecha_nacimiento)
            ->get();
        $estudiante = $estudiantes->first();
        if ($estudiante) {

            $historias = HistoriaDesarrollo::find($estudiante->id);
            $seccion2 = Seccion2::find($historias->seccion2_id);


            if ($historias) {
                // Obtener todos los atributos del estudiante
                $attributes = $historias->getAttributes();

                // Recorrer los atributos del estudiante
                unset($attributes['created_at']);
                unset($attributes['updated_at']);

                // Inicializar el contador de campos llenos
                $campoLlenoCount = 0;
                $ultimoCampo = null;

                // Recorrer los atributos del estudiante
                foreach ($attributes as $campo => $valor) {
                    // Verificar si el campo no es nulo ni vacío
                    if (!is_null($valor) && $valor !== '') {
                        // Incrementar el contador de campos llenos
                        $campoLlenoCount++;

                        // Guardar el nombre del campo si está lleno
                        $ultimoCampo = $campo;
                    }
                }

                // Determinar el nombre de la vista basado en el total de campos llenos
                $vista = 'seccion' . $campoLlenoCount; // Sección dinámica



                session()->put(['id_alumno' => $estudiante->id]);
                session()->put(['nombre' => $estudiante->nombre_completo]);

                if ($seccion2) {
                    session()->put(['numero_hijos' => $seccion2->numero_hijos]);
                } else {
                    session()->put(['numero_hijos' => null]); // o algún valor por defecto
                }
                // session()->put(['numero_hijos' => $seccion2->numero_hijos]);

                if (stripos($estudiante->grado_escolar, 'primaria') !== false || stripos($estudiante->grado_escolar, 'secundaria') !== false) {

                    session()->put(['grado' => 'primaria_secundaria']);
                }


                // Redirigir a la vista intermedia y pasar el nombre de la vista
                return view('historias.level-selector', [
                    'vista' => $vista,
                    'estudiantes' => $estudiantes,
                    'campoLlenoCount' => $campoLlenoCount

                ]);
            } else {
                // Si el estudiante no existe, cargamos una vista por defecto
                return view('historias.level-selector', [
                    'vista' => 'seccion1' // Por ejemplo, si no se encuentra el estudiante
                ]);
            }
        } else {
            return view('historias.level-selector', compact('estudiantes'));
        }
    }
}
