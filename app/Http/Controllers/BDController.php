<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
use App\Mail\ContactoMailable;
use Exception;

class BDController extends Controller
{
    //Metodo para guardar
    public function guardarSeccion1(Request $request)
    {
        try {
            // Actualiza o crea el estudiante según nombre y fecha
            $estudiante = Estudiante::updateOrCreate(
                [
                    'nombre_completo' => $request->nombre_completo,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                ],
                [
                    'lugar_nacimiento' => $request->lugar_nacimiento,
                    'genero' => $request->sexo,
                    'edad' => $request->edad,
                    'grado_escolar' => $request->grado_escolar,
                    'direccion' => $request->direccion,
                    'cp' => $request->cp,
                    'telefono' => $request->telefono,
                    'escuela_procedencia' => $request->escuela_procedencia,
                ]
            );

            // Crear historia de desarrollo solo si no existe (opcional)
            if (!$estudiante->historiaDesarrollo) {
                HistoriaDesarrollo::create([
                    'estudiante_id' => $estudiante->id,
                ]);
            }

            session()->put([
                'id_alumno' => $estudiante->id,
                'nombre' => $estudiante->nombre_completo,
            ]);

            ////
            if (session('old_hijoId')) {
                $this->copiarSeccion2DeUsuario(session('old_hijoId'), $estudiante->id);
                $hermanosNormalizados = $this->obtenerHermanosNormalizados($estudiante);
                $this->guardarHermanosNormalizados($hermanosNormalizados, $estudiante->id);

                if ($hermanosNormalizados) {
                    return redirect()->route('historia.seccion2')->with('hermanos', $hermanosNormalizados);
                }
            }

            return redirect()->route('historia.seccion2');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 1: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Datos de Identificación del Alumno". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion2(Request $request)
    {

        $isNuevo = !session('old_hijoId');

        if ($isNuevo) {
            $request->validate([
                'padre_lateralidad' => 'required|array|min:1',
                'madre_lateralidad' => 'required|array|min:1',
                'estado_civil' => 'required|array|min:1',
            ]);

            if (in_array('Vuelto a casar', $request->estado_civil)) {
                $request->validate([
                    'conyuge_lateralidad' => 'required|array|min:1',
                ]);
            }
        }

        try {
            if ($isNuevo) {
                if (($request->numero_hijos) > 1) {
                    $hermano = $this->guardarHermano($request);
                } else {
                    $hermano = new Hermano(); // Crea un modelo vacío
                    $hermano->id = null;
                }

                $seccion2 =  Seccion2::updateOrCreate(
                    ['estudiante_id' => session('id_alumno')],
                    [
                        'nombre_padre' => $request->nombre_padre,
                        'edad_padre' => $request->edad_padre,
                        'empresa_padre' => $request->empresa_padre,
                        'puesto_padre' => $request->puesto_padre,
                        'ocupacion_padre' => $request->ocupacion_padre,
                        'correo_padre' => $request->correo_padre,
                        'redessoc_padre' =>  $request->redessoc_padre,
                        'padre_lateralidad' =>  $request->padre_lateralidad,
                        'egresadored_padre' => $request->egresadored_padre,
                        'cualcolegio_padre' => $request->cualcolegio_padre,
                        'nombre_madre' => $request->nombre_madre,
                        'edad_madre' => $request->edad_madre,
                        'empresa_madre' => $request->empresa_madre,
                        'puesto_madre' => $request->puesto_madre,
                        'ocupacion_madre' => $request->ocupacion_madre,
                        'correo_madre' => $request->correo_madre,
                        'redessoc_madre' => $request->redessoc_madre,
                        'madre_lateralidad' => $request->madre_lateralidad,
                        'egresadored_madre' => $request->egresadored_madre,
                        'cualcolegio_madre' => $request->cualcolegio_madre,
                        'estado_civil' =>  $request->estado_civil,
                        'nombre_conyuge' => $request->nombre_conyuge,
                        'edad_conyuge' => $request->edad_conyuge,
                        'empresa_conyuge' => $request->empresa_conyuge,
                        'puesto_conyuge' => $request->puesto_conyuge,
                        'correo_conyuge' => $request->correo_conyuge,
                        'ocupacion_conyuge' => $request->ocupacion_conyuge,
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

                    ]
                );

                session()->put(['numero_hijos' => $seccion2->numero_hijos]);

                $formulario = HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->first();
                if ($formulario) {
                    $formulario->seccion2_id = $seccion2->id;
                    $formulario->save();
                }

                return redirect()->route('historia.seccion3');
            }

            $this->guardarHermano($request);
            return redirect()->route('historia.seccion3');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 2: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Estructura Familiar". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion3(Request $request)
    {
        try {

            $seccion3 =  Seccion3::updateOrCreate(
                ['estudiante_id' => session('id_alumno')],
                [
                    'idioma_casa' => $request->idioma_casa,
                    'personas_casa' => $request->personas_casa,
                    'quienes_casa' => $request->quienes_casa,
                    'siadopcion' => $request->siadopcion,
                    'padre_edadadopt' => $request->padre_edadadopt,
                    'madre_edadadopt' => $request->madre_edadadopt,
                    'hijo_edadadopt' => $request->hijo_edadadopt,

                ]
            );


            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'seccion3_id' => $seccion3->id
            ]);

            return redirect()->route('historia.seccion4');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 3: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Idioma y Adopción". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion4(Request $request)
    {
        try {

            $seccion4 = Seccion4::updateOrCreate(
                ['estudiante_id' => session('id_alumno')],
                [
                    'califica_adaptacion' => $request->califica_adaptacion,
                    'califica_adaptacion_porq' => $request->califica_adaptacion_porq,
                    'relacion_familia_madre' => $request->relacion_familia_madre,
                    'relacion_familia_padre' => $request->relacion_familia_padre,
                    'relacion_familia_hermanos' => $request->relacion_familia_hermanos,
                    'sanciones_casa' => $request->sanciones_casa,
                    'docil_desafiante' => $request->docil_desafiante,
                    'evento_traumatico' => $request->evento_traumatico,
                ]
            );

            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'seccion4_id' => $seccion4->id
            ]);

            return redirect()->route('historia.seccion5');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 4: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Dinámica Familiar". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion5(Request $request)
    {
        try {

            $seccion5 = Seccion5::updateOrCreate(
                ['estudiante_id' => session('id_alumno')],
                [
                    'total_embarazo' => $request->total_embarazo,
                    'experi_embarazo' => $request->experi_embarazo,
                    'mencione_embaenfe' => $request->mencione_embaenfe,
                    'especificar' => $request->especificar,
                    'tiempo_gestacion' => $request->tiempo_gestacion,
                    'tipo_parto' => $request->tipo_parto,
                    'lloro' => $request->lloro,
                    'incubadora' => $request->incubadora,
                    'apgar' => $request->apgar,
                ]
            );

            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'seccion5_id' => $seccion5->id
            ]);


            return redirect()->route('historia.seccion6');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 5: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Historia Pre y Postnatal". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion6(Request $request)
    {
        try {

            $seccion6 = Seccion6::updateOrCreate(
                ['estudiante_id' => session('id_alumno')],
                [
                    'desa_visual' => $request->desa_visual,
                    'desa_auditivo' => $request->desa_auditivo,
                ]
            );

            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'seccion6_id' => $seccion6->id
            ]);


            return redirect()->route('historia.seccion7');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 6: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Desarrollo Visual y Auditivo". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion7(Request $request)
    {
        $request->validate([
            'dies_zurdhijo' => 'required|array|min:1',
        ]);

        try {

            $seccion7 = Seccion7::updateOrCreate(
                ['estudiante_id' => session('id_alumno')],
                [
                    'desarrollo_motor' => $request->desarrollo_motor,
                    'edad_gate' => $request->edad_gate,
                    'edad_cami' => $request->edad_cami,
                    'dies_zurdhijo' => $request->dies_zurdhijo,
                    'prac_deporte' => $request->prac_deporte,
                ]
            );

            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'seccion7_id' => $seccion7->id
            ]);


            return redirect()->route('historia.seccion8');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 7: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Desarrollo motor". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion8(Request $request)
    {
        try {

            $seccion8 = Seccion8::updateOrCreate(
                ['estudiante_id' => session('id_alumno')],
                [
                    'desarrollo_lenguaje' => $request->desarrollo_lenguaje,
                    'prim_palabra' => $request->prim_palabra,
                ]
            );

            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'seccion8_id' => $seccion8->id
            ]);


            return redirect()->route('historia.seccion9');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 8: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Lenguaje". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion9(Request $request)
    {
        $request->validate([
            'suenonino' => 'required|array|min:1',
        ]);

        try {

            $seccion9 = Seccion9::updateOrCreate(
                ['estudiante_id' => session('id_alumno')],
                [
                    'suenonino' => $request->suenonino,
                    'horadecama' => $request->horadecama,
                    'horadespierta' => $request->horadespierta,
                    'dusiesta' => $request->dusiesta,
                    'horasiesta' => $request->horasiesta,
                    'cohabitacion' => $request->cohabitacion,
                    'conquien' => $request->conquien,
                    'cocama' => $request->cocama,
                    'edad_dupapa' => $request->edad_dupapa,
                ]
            );

            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'seccion9_id' => $seccion9->id
            ]);


            return redirect()->route('historia.seccion10');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 9: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Sueño". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion10(Request $request)
    {
        $request->validate([
            'saludnino' => 'required|array|min:1',
        ]);

        try {

            $seccion10 = Seccion10::updateOrCreate(
                ['estudiante_id' => session('id_alumno')],
                [
                    'saludnino' =>  $request->saludnino,
                    'otrosprob' => $request->otrosprob,
                    'enfeotrastor' => $request->enfeotrastor,
                    'tipoterapia' => $request->tipoterapia,
                ]
            );

            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'seccion10_id' => $seccion10->id
            ]);


            return redirect()->route('historia.seccion11');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 10: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Salud". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion11(Request $request)
    {

        try {

            $seccion11 = Seccion11::updateOrCreate(
                ['estudiante_id' => session('id_alumno')],
                [
                    'personalidadhijo' => $request->personalidadhijo,
                    'oportunihijo' => $request->oportunihijo,
                    'adapthijo' => $request->adapthijo,
                    'juegacnhijo' => $request->juegacnhijo,
                ]
            );

            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'seccion11_id' => $seccion11->id
            ]);


            return redirect()->route('historia.seccion12');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 11: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Características Personales". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion12(Request $request)
    {
        try {

            $seccion12 = Seccion12::updateOrCreate(
                ['estudiante_id' => session('id_alumno')],
                [
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
                ]
            );

            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'seccion12_id' => $seccion12->id
            ]);


            return redirect()->route('historia.seccion13');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 12: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al guardar la sección "Historia Escolar". Inténtelo de nuevo.');
        }
    }

    public function guardarSeccion13(Request $request)
    {

        try {

            HistoriaDesarrollo::where('estudiante_id', session('id_alumno'))->update([
                'acepto_terminos' => $request->acepto_terminos
            ]);

            session()->put([
                'formulario_aceptado' => true,
            ]);

            $this->enviarEmail();

            return redirect()->route('historia.seccion13')->with('success', '¡Formulario enviado correctamente!');
        } catch (Exception $e) {

            Log::error('Error al guardar Sección 13: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al enviar el formulario. Inténtelo de nuevo.');
        }
    }


    //
    public function buscar(Request $request)
    {
        try {

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


                    if (stripos($estudiante->grado_escolar, 'primaria') !== false || stripos($estudiante->grado_escolar, 'secundaria') !== false) {

                        session()->put(['grado' => 'primaria_secundaria']);
                    } else {
                        session()->put(['grado' => 'preescolar']);
                    }


                    // Redirigir a la vista intermedia y pasar el nombre de la vista
                    return view('historias.nivel_educativo', [
                        'vista' => $vista,
                        'estudiantes' => $estudiantes,
                        'campoLlenoCount' => $campoLlenoCount

                    ]);
                } else {
                    // Si el estudiante no existe, cargamos una vista por defecto
                    return view('historias.nivel_educativo', [
                        'vista' => 'seccion1' // Por ejemplo, si no se encuentra el estudiante
                    ]);
                }
            } else {
                return view('historias.nivel_educativo', compact('estudiantes'));
            }
        } catch (\Exception $e) {
            Log::error('Error en buscar(): ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al procesar la búsqueda. Inténtelo de nuevo.');
        }
    }


    ///
    public function enviarEmail()
    {
        try {

            $datos = [
                'nombre' => session('nombre') ?? 'Sin nombre',
                'email' => 'ejemplo@correo.com',
                'mensaje' => 'Este es un mensaje manual que no viene del formulario.',
            ];

            Mail::to('ajimenez@cumbresqueretaro.com')
            // ->cc('lhernandez@cumbresqueretaro.com')
            ->send(new ContactoMailable($datos));
        } catch (\Exception $e) {
            Log::error('Error al enviar correo: ' . $e->getMessage());
        }
    }
    ///


    public function copiarSeccion2DeUsuario($idOrigen, $idDestino)
    {
        // Obtener todos los registros de seccion2 del usuario original
        $existenRegistros = Seccion2::where('estudiante_id', $idDestino)->exists();

        if (!$existenRegistros) {
            $registros = Seccion2::where('estudiante_id', $idOrigen)->get();

            foreach ($registros as $registro) {
                $nuevo = $registro->replicate();
                $nuevo->estudiante_id = $idDestino;
                $nuevo->save();
            }
            HistoriaDesarrollo::where('estudiante_id', $idDestino)->update([
                'seccion2_id' => $nuevo->id
            ]);
        }

        ///
        $nuevosHermanos = collect();

        $existenHermanos = Hermano::where('estudiante_id', $idDestino)->exists();

        if (!$existenHermanos) {
            $registrosh = Hermano::where('estudiante_id', $idOrigen)->get();

            foreach ($registrosh as $registroh) {
                $nuevoh = $registroh->replicate(); // copia todos los campos excepto ID
                $nuevoh->estudiante_id = $idDestino; // asigna el nuevo ID de usuario
                $nuevoh->save(); // guarda el nuevo registro

                $nuevosHermanos->push($nuevoh);
            }

            // Después de duplicar, puedes usar el último hermano creado (el último del foreach)
            Seccion2::where('estudiante_id', $idDestino)->update([
                'hermano_id' => $nuevoh->id // usa el ID del último hermano duplicado
            ]);
        }
    }

    protected function guardarHermano($request)
    {


        $hermano = Hermano::updateOrCreate(
            ['estudiante_id' => session('id_alumno')],
            [
                'nombre_hermano' => $request->nombre_hermano,
                'edad_hermano' => $request->edad_hermano,
                'escolar_ocupacion' => $request->escolar_ocupacion,
                'escuela_hermano' => $request->escuela_hermano,
                'salud_hermano' => $request->salud_hermano,
            ]
        );

        return $hermano;
    }


    private function obtenerHermanosNormalizados($estudiante)
    {

        $hermanosDestino = Hermano::where('estudiante_id', $estudiante->id)->get();

        $hermanosNormalizados = collect();

        $estudianteAnterior = Estudiante::find(session('old_hijoId'));


        if ($hermanosDestino->isNotEmpty()) {
            $hermano = $hermanosDestino->first();

            $total = is_array($hermano->nombre_hermano) ? count($hermano->nombre_hermano) : 1;

            for ($i = 0; $i < $total; $i++) {

                $nombre = is_array($hermano->nombre_hermano) ? $hermano->nombre_hermano[$i] : $hermano->nombre_hermano;
                $edad = is_array($hermano->edad_hermano) ? $hermano->edad_hermano[$i] : $hermano->edad_hermano;
                $anioescolar = is_array($hermano->escolar_ocupacion) ? $hermano->escolar_ocupacion[$i] : $hermano->escolar_ocupacion;
                $escuela_proce = is_array($hermano->escuela_hermano) ? $hermano->escuela_hermano[$i] : $hermano->escuela_hermano;

                // Si el nombre del hermano coincide con el del estudiante actual
                if ($nombre === $estudiante->nombre_completo && $estudianteAnterior) {
                    $nombre = $estudianteAnterior->nombre_completo;
                    $edad = $estudianteAnterior->edad;
                    $anioescolar = $estudianteAnterior->grado_escolar;
                    $escuela_proce = $estudianteAnterior->escuela_procedencia;
                }

                $hermanosNormalizados->push((object)[
                    'nombre_hermano' => $nombre,
                    'edad_hermano' => $edad,
                    'escolar_ocupacion' =>  $anioescolar,
                    'escuela_hermano' => $escuela_proce,
                    'salud_hermano' => is_array($hermano->salud_hermano) ? $hermano->salud_hermano[$i] : $hermano->salud_hermano,
                ]);
            }
        }

        return $hermanosNormalizados;
    }

    private function guardarHermanosNormalizados($hermanosNormalizados, $estudianteId)
    {
        // Convertir la colección en arreglos separados por campo
        $nombres = [];
        $edades = [];
        $escolaridades = [];
        $escuelas = [];
        $saludes = [];

        foreach ($hermanosNormalizados as $hermano) {
            $nombres[] = $hermano->nombre_hermano;
            $edades[] = $hermano->edad_hermano;
            $escolaridades[] = $hermano->escolar_ocupacion;
            $escuelas[] = $hermano->escuela_hermano;
            $saludes[] = $hermano->salud_hermano;
        }

        // Guardar o actualizar el registro en la tabla hermanos
        Hermano::updateOrCreate(
            ['estudiante_id' => $estudianteId],
            [
                'nombre_hermano' => $nombres,
                'edad_hermano' => $edades,
                'escolar_ocupacion' => $escolaridades,
                'escuela_hermano' => $escuelas,
                'salud_hermano' => $saludes,
            ]
        );
    }
}
