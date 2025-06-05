<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ficha del Estudiante</title>
    <link rel="stylesheet" href="{{ public_path('pdf.css') }}" type="text/css">
    <link rel="shortcut icon" type="image/svg" href="{{ asset('/img/sello-cumbres-en-blanco-01.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/img/sello-cumbres-en-blanco-01.png') }}">
</head>

<body>
    <div class="container">
        {{-- Logo en la parte superior --}}
        <!-- Logo alineado a la izquierda -->
        <div class="bannerpdf">
            <div>
                <img src="{{ public_path('img/sello-cumbres.svg') }}" alt="Logo" style="width: 5rem;">
            </div>
            <div>
                @if(
                str_contains($estudiante->grado_escolar, 'Secundaria') ||
                str_contains($estudiante->grado_escolar, 'Primaria')
                )
                <p>HISTORIA DE DESARROLLO NUEVO INGRESO PRIMARIA Y SECUNDARIA</p>
                @else
                <p>HISTORIA DE DESARROLLO NUEVO INGRESO PREESCOLAR</p>
                @endif
            </div>
        </div>

        <!-- datos de identificación -->
        <div>
            <div class="header">
                <h1 class="title">DATOS DE IDENTIFICACIÓN</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label">Nombre:</td>
                    <td class="value">{{ $estudiante->nombre_completo ?? '—'}}</td>
                    <td class="label">Edad:</td>
                    <td class="value">{{ $estudiante->edad ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label">Sexo:</td>
                    <td class="value">{{ $estudiante->genero ?? '—'}}</td>
                    <td class="label">Fecha de nacimiento:</td>
                    <td class="value">{{ $estudiante->fecha_nacimiento ? \Carbon\Carbon::parse($estudiante->fecha_nacimiento)->format('d/m/Y') : '—' }}</td>
                </tr>
                <tr>
                    <td class="label">Lugar de nacimiento:</td>
                    <td class="value">{{ $estudiante->lugar_nacimiento ?? '—'}}</td>
                    <td class="label">Grado escolar:</td>
                    <td class="value">{{ $estudiante->grado_escolar ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label">Dirección:</td>
                    <td class="value">{{ $estudiante->direccion ?? '—'}}</td>
                    <td class="label">C.P.:</td>
                    <td class="value">{{ $estudiante->cp ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label">Teléfono:</td>
                    <td class="value">{{ $estudiante->telefono ?? '—'}}</td>
                    <td class="label">Escuela de procedencia:</td>
                    <td class="value">{{ $estudiante->escuela_procedencia ?? '—'}}</td>
                </tr>
            </table>
        </div>

        <!-- estructura familiar -->
        <div>
            <div class="header" style="background-color: #54667a;">
                <h1 class="title">Estructura familiar</h1>
            </div>
            <!-- padre -->
            <table class="info-table">
                <tr>
                    <td class="label">Nombre del padre:</td>
                    <td class="value">{{ $estudiante->seccion2->nombre_padre ?? '—'}}</td>
                    <td class="label">Edad:</td>
                    <td class="value">{{ $estudiante->seccion2->edad_padre ?? '—'}} Años</td>
                </tr>
                <tr>
                    <td class="label">Nombre de la empresa:</td>
                    <td class="value">{{ $estudiante->seccion2->empresa_padre ?? '—' }}</td>
                    <td class="label">Puesto en la empresa:</td>
                    <td class="value">{{ $estudiante->seccion2->puesto_padre ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="label">Ocupación:</td>
                    <td class="value">{{ $estudiante->seccion2->ocupacion_padre ?? '—' }}</td>
                    <td class="label">Correo electrónico personal:</td>
                    <td class="value">{{ $estudiante->seccion2->correo_padre ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label">Redes Sociales:</td>
                    <td class="value">Facebook: {{ $estudiante->seccion2->redessoc_padre[0] ?? '—' }}</td>
                    <td class="value">Instagram: {{ $estudiante->seccion2->redessoc_padre[1] ?? '—' }}</td>
                    <td class="value" colspan="1"></td>
                </tr>
                <tr>
                    <td class="label">Lateridad:</td>
                    <td class="value"> {{ implode(', ', $estudiante->seccion2->padre_lateralidad ?? []) }}</td>
                    <td class="label">¿Es egresado de la red?</td>
                    <td class="value"> {{$estudiante->seccion2->egresadored_padre ?? '_' }}</td>
                    <!-- <td class="value" colspan="2"></td> -->
                </tr>
                @if(in_array(mb_strtolower(optional($estudiante->seccion2)->egresadored_padre), ['sí', 'si']))
                <tr>
                    <td class="label">Nombre del colegio</td>
                    <td class="value" colspan="3"> {{$estudiante->seccion2->cualcolegio_padre ?? '_' }}</td>
                </tr>
                @endif
            </table>
            <!-- madre -->
            <table class="info-table" style="padding-top: 1rem;">
                <tr>
                    <td class="label">Nombre de la madre:</td>
                    <td class="value">{{ $estudiante->seccion2->nombre_madre ?? '—'}}</td>
                    <td class="label">Edad:</td>
                    <td class="value">{{ $estudiante->seccion2->edad_madre ?? '—'}} Años</td>
                </tr>
                <tr>
                    <td class="label">Nombre de la empresa:</td>
                    <td class="value">{{ $estudiante->seccion2->empresa_madre ?? '—' }}</td>
                    <td class="label">Puesto en la empresa:</td>
                    <td class="value">{{ $estudiante->seccion2->puesto_madre ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="label">Ocupación:</td>
                    <td class="value">{{ $estudiante->seccion2->ocupacion_madre ?? '—' }}</td>
                    <td class="label">Correo electrónico personal:</td>
                    <td class="value">{{ $estudiante->seccion2->correo_madre ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label">Redes Sociales:</td>
                    <td class="value">Facebook: {{ $estudiante->seccion2->redessoc_madre[0] ?? '—' }}</td>
                    <td class="value">Instagram: {{ $estudiante->seccion2->redessoc_madre[1] ?? '—' }}</td>
                    <td class="value" colspan="1"></td>
                </tr>
                <tr>
                    <td class="label">Lateridad:</td>
                    <td class="value"> {{ implode(', ', $estudiante->seccion2->madre_lateralidad ?? []) }}</td>
                    <td class="label">¿Es egresada de la red?</td>
                    <td class="value"> {{$estudiante->seccion2->egresadored_madre ?? '_' }}</td>
                    <!-- <td class="value" colspan="2"></td> -->
                </tr>
                @if(in_array(mb_strtolower(optional($estudiante->seccion2)->egresadored_madre), ['sí', 'si']))
                <tr>
                    <td class="label">Nombre del colegio</td>
                    <td class="value" colspan="3"> {{$estudiante->seccion2->cualcolegio_madre ?? '_' }}</td>
                </tr>
                @endif
            </table>
            <!-- estado civil  -->
            <table class="info-table" style="padding-top: 1rem;">
                <tr>
                    <td class="label" colspan="2">Estado civil actual de los padres:</td>
                    <td class="value" colspan="1">{{ implode(', ', $estudiante->seccion2->estado_civil ?? []) }}</td>
                    <td class="value"></td>
                </tr>
                @php
                $estadoCivil = optional($estudiante->seccion2)->estado_civil;
                @endphp

                @if(is_array($estadoCivil) && in_array('Vuelto a casar', $estadoCivil))
                <tr>
                    <td class="value" colspan="4"></td>
                </tr>
                <tr>
                    <td class="title" colspan="4">Cónyuge</td>
                </tr>
                <tr>
                    <td class="label">Nombre del cónyuge:</td>
                    <td class="value">{{ $estudiante->seccion2->nombre_conyuge ?? '—'}}</td>
                    <td class="label">Edad:</td>
                    <td class="value">{{ $estudiante->seccion2->edad_conyuge ?? '—'}} Años</td>
                </tr>
                <tr>
                    <td class="label">Nombre de la empresa:</td>
                    <td class="value">{{ $estudiante->seccion2->empresa_conyuge ?? '—' }}</td>
                    <td class="label">Puesto en la empresa:</td>
                    <td class="value">{{ $estudiante->seccion2->puesto_conyuge ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="label">Ocupación:</td>
                    <td class="value">{{ $estudiante->seccion2->ocupacion_conyuge ?? '—' }}</td>
                    <td class="label">Correo electrónico personal:</td>
                    <td class="value">{{ $estudiante->seccion2->correo_conyuge ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label">Redes Sociales:</td>
                    <td class="value">Facebook: {{ $estudiante->seccion2->redessoc_conyuge[0] ?? '—' }}</td>
                    <td class="value">Instagram: {{ $estudiante->seccion2->redessoc_conyuge[1] ?? '—' }}</td>
                    <td class="value" colspan="1"></td>
                </tr>
                <tr>
                    <td class="label">Lateridad:</td>
                    <td class="value"> {{ implode(', ', $estudiante->seccion2->conyuge_lateralidad ?? []) }}</td>
                    <td class="value" colspan="2"></td>
                </tr>

                <tr>
                    <td class="label" colspan="2">¿Cuántos años llevan de casados?:</td>
                    <td class="value" colspan="2"> {{$estudiante->seccion2->anos_casados ?? '-' }} años</td>
                </tr>

                @elseif(is_array($estadoCivil) && in_array('Divorciados', $estadoCivil))
                <tr>
                    <td class="label" colspan="4">¿Cuáles fueron los motivos de la separación?:</td>
                </tr>
                <tr>
                    <td class="value" colspan="4"> {{$estudiante->seccion2->moti_separa ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">En caso de separación o divorcio, ¿con quién vive el niño(a)?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4"> {{$estudiante->seccion2->vive_con ?? '-' }}</td>
                </tr>


                @elseif(is_array($estadoCivil) && (
                in_array('Civil', $estadoCivil) ||
                in_array('Casados Iglesia', $estadoCivil)))
                <tr>
                    <td class="label" colspan="2">¿Cuántos años llevan de casados?:</td>
                    <td class="value" colspan="2"> {{$estudiante->seccion2->anos_casados ?? '-' }} años</td>
                </tr>
                @else
                <tr>
                    <td class="value" colspan="4"></td>
                </tr>
                @endif
                </tr>

                <tr>
                    <td class="label" colspan="2">Número de hijos:</td>
                    <td class="value" colspan="2">{{ $estudiante->seccion2->numero_hijos ?? '—' }}</td>

                </tr>
            </table>
            <br>
            <!-- hermanos  -->
            @if(optional($estudiante->seccion2)->numero_hijos > 1)
            <table class="tablehermano">
                <h1 class="title">Hermanos</h1>
                <thead>
                    <tr class="trhermano">
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Año escolar u <br> ocupación</th>
                        <th>Escuela</th>
                        <th>Salud</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < $estudiante->seccion2->numero_hijos - 1; $i++)
                        <tr>
                            <td>{{ $estudiante->hermano->nombre_hermano[$i] ?? '—' }}</td>
                            <td>{{ $estudiante->hermano->edad_hermano[$i] ?? '—' }}</td>
                            <td>{{ $estudiante->hermano->escolar_ocupacion[$i] ?? '—' }}</td>
                            <td>{{ $estudiante->hermano->escuela_hermano[$i] ?? '—' }}</td>
                            <td>{{ $estudiante->hermano->salud_hermano[$i] ?? '—' }}</td>
                        </tr>
                        @endfor
                </tbody>
            </table>
            @endif
            <!-- riligion/valores  -->
            <table class="info-table" style="padding-top: 1rem;">
                <tr>
                    <td class="label" colspan="3">En la educación de su hijo(a) ¿Toman ustedes en cuenta el punto de vista religioso?:</td>
                </tr>
                <tr>
                    <td class="value" colspan="3">{{ $estudiante->seccion2->religion ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="3">¿Cuáles son los valores familiares?:</td>
                </tr>
                <tr>
                    <td class="value" colspan="3">{{ $estudiante->seccion2->valores_familia ?? '—' }}</td>
                </tr>
            </table>
        </div>

        <!-- idioma/adopcion  -->
        <div>
            <div class="header" style="background-color: #ff7843;">
                <h1 class="title">Idioma y Adopción</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label" colspan="4">¿Qué idioma se habla en casa?:</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion3->idioma_casa ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">Además de padres e hijos, ¿Viven otras personas en casa?:</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion3->personas_casa ?? '—'}}</td>
                </tr>

                @if(in_array(mb_strtolower(optional($estudiante->seccion3)->personas_casa), ['sí', 'si']))
                <tr>
                    <td class="label" colspan="4">¿Quiénes?:</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{$estudiante->seccion3->quienes_casa ?? '—' }}</td>
                </tr>
                @endif
                <tr>
                    <td class="label" colspan="4">¿El niño es adoptado?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{$estudiante->seccion3->siadopcion ?? '—' }}</td>
                </tr>

                @if(in_array(mb_strtolower(optional($estudiante->seccion3)->siadopcion), ['sí', 'si']))
                <tr>
                    <td class="label" colspan="2">Edad del niño al momento de la adopción:</td>
                    <td class="value" colspan="2">{{$estudiante->seccion3->hijo_edadadopt ?? '—' }} años</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">Edad de los padres al momento de la adopción</td>
                </tr>
                <tr>
                    <td class="label">Edad del padre:</td>
                    <td class="value">{{$estudiante->seccion3->padre_edadadopt ?? '—' }} años</td>
                    <td class="label">Edad de la madre:</td>
                    <td class="value">{{$estudiante->seccion3->madre_edadadopt ?? '—' }} años</td>
                </tr>
                @endif

            </table>
        </div>
        <div style="page-break-after: always;"></div> {{-- Salto de página --}}
        <!-- dinamica/familiar  -->
        <div>
            <div class="header" style="background-color: #263c57;">
                <h1 class="title">Dinámica Familiar</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label" colspan="4">¿Cómo calificaría la adaptación general de su hijo(a) en la casa?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion4->califica_adaptacion ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label">¿Por qué?</td>
                    <td class="value" colspan="3">{{ $estudiante->seccion4->califica_adaptacion_porq ?? '—'}}</td>
                </tr>

                <tr>
                    <td class="label" colspan="4">Describa la relación de su hijo(a) con cada miembro de la familia</td>
                </tr>
                <tr>
                    <td class="label">Madre</td>
                    <td class="value" colspan="3">{{ $estudiante->seccion4->relacion_familia_madre ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label">Padre</td>
                    <td class="value" colspan="3">{{ $estudiante->seccion4->relacion_familia_padre ?? '—'}}</td>
                </tr>

                @if(optional($estudiante->seccion4)->relacion_familia_hermanos !== null)
                <tr>
                    <td class="label">Hermanos</td>
                    <td class="value" colspan="3">{{ $estudiante->seccion4->relacion_familia_hermanos ?? '—'}}</td>
                </tr>
                @endif

                <tr>
                    <td class="label" colspan="4">¿Cuáles son las sanciones que comúnmente se manejan en casa y cómo responde su hijo(a) ante ellas?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion4->sanciones_casa ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Considera que su hijo(a) es dócil con las normas o desafiante al respecto?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion4->docil_desafiante ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Ha habido algún evento traumático o significativo en la familia durante el desarrollo de su hijo(a)? Describa</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion4->evento_traumatico ?? '—'}}</td>
                </tr>

            </table>
        </div>

        <!-- Historia Pre y Postnatal  -->
        <div>
            <div class="header" style="background-color: #54667a;">
                <h1 class="title">Historia Pre y Postnatal</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label" colspan="2">Mencione el número total de embarazos</td>
                    <td class="value" colspan="2">{{ $estudiante->seccion5->total_embarazo ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label">En general, ¿cómo fue el embarazo?</td>
                    <td class="value" colspan="3">{{ $estudiante->seccion5->experi_embarazo ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="2">Mencione si la madre tuvo alguna enfermedad o complicaciones durante el embarazo.</td>
                    <td class="value" colspan="2">{{ $estudiante->seccion5->mencione_embaenfe ?? '—'}}</td>
                </tr>
                <tr>
                    @if(in_array(mb_strtolower(optional($estudiante->seccion5)->mencione_embaenfe), ['sí', 'si']))
                    <td class="label">Especificar</td>
                    <td class="value" colspan="3"> {{$estudiante->seccion5->especificar ?? '_' }}</td>
                    @endif
                </tr>
                <tr>
                    <td class="label">Tiempo de gestación</td>
                    <td class="value">{{ $estudiante->seccion5->tiempo_gestacion ?? '—'}}</td>
                    <td class="label">Especifique si el trabajo de parto fue:</td>
                    <td class="value">{{ $estudiante->seccion5->tipo_parto ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label">¿Lloró enseguida?</td>
                    <td class="value">{{ $estudiante->seccion5->lloro ?? '—'}}</td>
                    <td class="label">¿Fue necesario colocarlo(a) en incubadora o hacer algún tratamiento inmediato al nacimiento?</td>
                    <td class="value">{{ $estudiante->seccion5->incubadora ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="2">¿Recuerda la calificación (APGAR) que tuvo su hijo(a) al nacer?</td>
                    <td class="value" colspan="2">{{ $estudiante->seccion5->apgar ?? '—'}}</td>
                </tr>
            </table>
        </div>
        <div style="page-break-after: always;"></div> {{-- Salto de página --}}
        <!-- Desarrollo Visual y Desarrollo Auditivo  -->
        <div>
            <div class="header" style="background-color: #ff7843;">
                <h1 class="title">Desarrollo Visual y Desarrollo Auditivo</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label" colspan="4">Describa si ha experimentado algún problema visual</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion6->desa_visual ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">Describa si ha experimentado algún problema de oído (operaciones, infecciones, drenajes, etc.)</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion6->desa_auditivo ?? '—'}}</td>
                </tr>
            </table>
        </div>

        <!-- Desarrollo motor -->
        <div>
            <div class="header" style="background-color: #54667a;">
                <h1 class="title">Desarrollo motor</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label" colspan="2">¿Cómo describiría el desarrollo motor del niño(a)?</td>
                    <td class="value" colspan="2">{{ $estudiante->seccion7->desarrollo_motor ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">Mencione la edad en que comenzó a:</td>
                </tr>
                <tr>
                    <td class="label">Gatear</td>
                    <td class="value">{{ $estudiante->seccion7->edad_gate ?? '—'}}</td>
                    <td class="label">Caminar</td>
                    <td class="value">{{ $estudiante->seccion7->edad_cami ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="2">¿Es diestro(a) o zurdo(a)?</td>
                    <td class="value" colspan="2">{{ implode(', ', $estudiante->seccion7->dies_zurdhijo ?? [])}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Qué tipo de deporte le interesa a su hijo de manera especial?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion7->prac_deporte ?? '—'}}</td>
                </tr>
            </table>
        </div>

        <!-- Lenguaje -->
        <div>
            <div class="header">
                <h1 class="title">Lenguaje</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label" colspan="2">¿Cómo describiría el desarrollo del habla y lenguaje del niño(a)?</td>
                    <td class="value" colspan="2">{{ $estudiante->seccion8->desarrollo_lenguaje ?? '—'}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="2">¿A qué edad dijo sus primeras palabras?</td>
                    <td class="value" colspan="2">{{ $estudiante->seccion8->prim_palabra ?? '—'}}</td>
                </tr>

            </table>
        </div>

        <!-- Sueño -->
        <div>
            <div class="header" style="background-color: #54667a;">
                <h1 class="title">Sueño</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label" colspan="4">Características que presenta el sueño del menor</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ implode(', ', $estudiante->seccion9->suenonino ?? [])}}</td>
                </tr>
                <tr>
                    <td class="label">¿A qué hora se acuesta por la noche?</td>
                    <td class="value">{{ optional($estudiante->seccion9)->horadecama  ? \Carbon\Carbon::parse($estudiante->seccion9->horadecama)->format('H:i A'): '-' }}</td>
                    <td class="label">¿A qué hora se despierta?</td>
                    <td class="value">{{ optional($estudiante->seccion9)->horadespierta  ? \Carbon\Carbon::parse($estudiante->seccion9->horadespierta)->format('H:i A'): '-' }}</td>
                </tr>
                <tr>
                    <td class="label">¿Duerme siesta?</td>
                    <td class="value">{{ $estudiante->seccion9->dusiesta  ?? '-' }}</td>

                    @if(in_array(mb_strtolower(optional($estudiante->seccion9)->dusiesta), ['sí', 'si']))
                    <td class="label">¿Cuántas horas?</td>
                    <td class="value">{{ $estudiante->seccion9->horasiesta  ?? '-' }}</td>
                    @else
                    <td class="value" colspan="2"></td>
                    @endif
                </tr>
                <tr>
                    <td class="label">¿Comparte su habitación?</td>
                    <td class="value">{{ $estudiante->seccion9->cohabitacion  ?? '-' }}</td>

                    @if(in_array(mb_strtolower(optional($estudiante->seccion9)->cohabitacion), ['sí', 'si']))
                    <td class="label">¿Con quien?</td>
                    <td class="value">{{ $estudiante->seccion9->conquien  ?? '-' }}</td>
                    @else
                    <td class="value" colspan="2"></td>
                    @endif
                </tr>
                <tr>
                    <td class="label">¿Comparte la cama?</td>
                    <td class="value">{{ $estudiante->seccion9->cocama  ?? '-' }}</td>
                    <td class="label">¿Hasta qué edad durmió con los papás? </td>
                    <td class="value">{{ $estudiante->seccion9->edad_dupapa  ?? '-' }} años</td>
                </tr>
            </table>
        </div>
        <div style="page-break-after: always;"></div> {{-- Salto de página --}}
        <!-- Salud -->
        <div>
            <div class="header" style="background-color: #ff7843;">
                <h1 class="title">Salud</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label" colspan="4">Algunos de los problemas que ha presentado:</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ implode(', ', $estudiante->seccion10->saludnino ?? [])}}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">Otros</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion10->otrosprob  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Padece, o ha padecido, alguna enfermedad o trastorno que requiera de atencion medica especializada?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion10->enfeotrastor  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Recibe, o ha recibido, algun tipo de terapia (emocional, motriz, de lenguaje, de aprendizaje)? Describa el tipo y desde cuándo</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion10->tipoterapia  ?? '-' }}</td>
                </tr>
            </table>
            <div class="acuerdo-container">
                <p class="acuerdo-text">
                    <span class="bold">*ACUERDO</span> Número 11/03/19 por el que se establecen las normas generales para la evaluación del aprendizaje, acreditación,
                    promoción, regularización y certificación de los educandos de la evaluación básica, publicado en el Diario oficial de la federación
                    el 29 de marzo de 2019. <br>
                    <span class="bold">Artículo 3. Sujetos participantes.</span> En la aplicación de las presentes normas deberá garantizarse la participación activa de
                    todos los involucrados en el proceso educativo: autoridades educativas y escolares, docentes, madres, padres de familia o
                    tutores y educandos.
                    Quienes ejercen la patria potestad o la tutela de los estudiantes deberán informar a las autoridades educativas y escolares,
                    según corresponda, sobre la salud, condición física o socioemocional de los educandos y, en su caso, de requerimientos especiales para garantizar su inclusión efectiva en el proceso educativo. Dicha información se proporcionará en el marco de las
                    disposiciones jurídicas aplicables.
                </p>

                <div style="text-align: center;">
                    @if($estudiante->seccion10->acepto_acuerdo === 'Acepto')
                    <p>
                        {!! '&#x2611;' !!} <span class="bold info-table"> Acepto el acuerdo </span>
                    </p>
                    @else
                    <p>
                        {!! '&#x2610;' !!} <span class="bold info-table"> No acepto el acuerdo </span>
                    </p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Caracteristicas Personales -->
        <div>
            <div class="header" style="background-color: #54667a;">
                <h1 class="title">Características Personales</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label" colspan="4">Describa la personalidad de su hijo(a) </td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion11->personalidadhijo  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Qué áreas de oportunidad o atención considera importante para la personalidad de su hijo(a)?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion11->oportunihijo  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">Describa la adaptación social de su hijo(a) con otros niños y adultos (sociales, independientes, sencibles al trato con los demás, etc.) </td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion11->adapthijo  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Juega contento(a) con otros niños o prefiere parmanecer solo(a)?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion11->juegacnhijo  ?? '-' }}</td>
                </tr>
            </table>
        </div>
        <div style="page-break-after: always;"></div> {{-- Salto de página --}}
        <!-- Historia Escolar-->
        <div>
            <div class="header">
                <h1 class="title">Historia Escolar</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label" colspan="4">¿Cómo reaccionó en su primer ingreso a la escuela? </td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion12->reaccprimer  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Ha tenido alguna dificultad para aprender alguna materia? </td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion12->dificumateria  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">¿Ha repetido algún año? </td>
                    <td class="value">{{ $estudiante->seccion12->ha_repetido  ?? '-' }}</td>

                    @if(in_array(mb_strtolower(optional($estudiante->seccion12)->ha_repetido), ['sí', 'si']))
                    <td class="label">¿Cuál?</td>
                    <td class="value">{{ $estudiante->seccion12->cual_escuela  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Por qué motivo?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion12->porque_escuela  ?? '-' }}</td>
                </tr>
                @else
                <td class="value" colspan="2"></td>
                @endif
                </tr>

                <tr>
                    <td class="label" colspan="2">¿Puede concentrarse por periodos largos?</td>
                    <td class="value" colspan="2">{{ $estudiante->seccion12->puedeperiodolarg  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Cómo ha sido la conducta general a su hijo(a) en el ámbito escolar? </td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion12->conductaambito  ?? '-' }}</td>
                </tr>

                @if(
                str_contains($estudiante->grado_escolar, 'Secundaria') ||
                str_contains($estudiante->grado_escolar, 'Primaria')
                )
                <tr>
                    <td class="label">¿Cuál es su nivel de lectura? </td>
                    <td class="value">{{ $estudiante->seccion12->nivel_lectura  ?? '-' }}</td>
                    <td class="label">¿Cuál es su nivel de escritura?</td>
                    <td class="value">{{ $estudiante->seccion12->nivel_escritura  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="2">¿Tiene dificultad para hacer tarea? </td>
                    <td class="value" colspan="2">{{ $estudiante->seccion12->dificultad_tarea  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Cómo es la relación con maestros y compañeros?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion12->relacion_maestro  ?? '-' }}</td>
                </tr>
                @endif

                <tr>
                    <td class="label">¿Ha presentado dificultad en la pronunciacion de alguna letra?</td>
                    <td class="value">{{ $estudiante->seccion12->hay_dific  ?? '-' }}</td>

                    @if(in_array(mb_strtolower(optional($estudiante->seccion12)->hay_dific), ['sí', 'si']))
                    <td class="label">¿Cuáles?</td>
                    <td class="value">{{ $estudiante->seccion12->cual_letra  ?? '-' }}</td>
                    @else
                    <td class="value" colspan="2"></td>
                    @endif
                </tr>

                <tr>
                    <td class="label" colspan="2">¿Maneja el idioma Inglés?</td>
                    <td class="value" colspan="2">{{ $estudiante->seccion12->maneingles  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="2">¿Cómo calificaría el desempeño académico general de su hijo(a)?</td>
                    <td class="value" colspan="2">{{ $estudiante->seccion12->cali_desemp  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">¿Por qué?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion12->porq_desemp  ?? '-' }}</td>
                </tr>

                <tr>
                    <td class="label" colspan="4">¿Cuáles son los principales motivos que los orientaron a buscar un cambio de escuela?</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion12->motivoscamb  ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" colspan="4">Mencione las razones por las que desea que su hijo(a) ingrese a este colegio:</td>
                </tr>
                <tr>
                    <td class="value" colspan="4">{{ $estudiante->seccion12->razoning  ?? '-' }}</td>
                </tr>

            </table>
        </div>

        <div style="page-break-after: always;"></div> {{-- Salto de página --}}

        <!-- Acuerdo de conformidad-->
        <div>
            <div class="header" style="background-color: #54667a;">
                <h1 class="title">CONFORMIDAD SOBRE EL PROCESO DE ADMISIÓN</h1>
            </div>
            <p class="acuerdo-text">
                Manifiesto bajo protesta de decir la verdad que toda la información proporcionada es verdadera y completa, que no omití detalles significativos sobre el desarrollo de mi hijo(a). Por lo que de haber omitido algún dato significativo que pueda incidir en su proceso de aprendizaje, libero de toda responsabilidad al colegio, al no haberle proporcionado toda la información necesaria, a fin de atender los requerimientos educativos que presenta mi hijo(a). Comprometiéndome a mantener actualizada la historia de desarrollo de mi hijo(a), durante su estancia en esta institución educativa. Acepto que los resultados de la valoración de admisión sean confidenciales y para uso exclusivo del colegio. La aplicacion de dichos exámenes no garantiza la admisión de mi hijo(a), la cual implica una decisión inapelable del Consejo de Admisiones, así como disponibilidad de cupo.

                De igual forma, manifiesto que me fue debidamente informado sobre el Aviso de Privacidad con que cuenta el Colegio, y que puede ser consultado en la página de internet: www.semperaltius.edu.mx/aviso-de-privacidad
            </p>

            <div style="text-align: center;">
                @if($estudiante->historiadesarrollo->acepto_terminos === 'Acepto')
                <p>
                    {!! '&#x2611;' !!} <span class="bold info-table"> Acepto conformidad </span>
                </p>
                @else
                <p>
                    {!! '&#x2610;' !!} <span class="bold info-table"> No acepto conformidad </span>
                </p>
                @endif
            </div>

            <table class="firma-tabla">
                <tr>
                    <td>
                        <span class="firma-label">Nombre del responsable:</span>
                        <span class="firma-data">{{ optional($estudiante->historiadesarrollo)->nombre_responsable ?? '-' }}</span>
                        <div class="firma-line"></div>
                    </td>
                    <td>
                        <span class="firma-label">Parentesco con el solicitante:</span>
                        <span class="firma-data">{{ optional($estudiante->historiadesarrollo)->parentesco_responsable ?? '-' }}</span>
                        <div class="firma-line"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="firma-label">Fecha:</span>
                        <span class="firma-data">{{ optional($estudiante->historiadesarrollo)->updated_at?->format('d/m/Y') ?? '-' }}</span>
                        <div class="firma-line"></div>
                    </td>
                    <!-- <td>
                        <span class="firma-label">Firma de conformidad:</span>
                        <div class="firma-line"></div>
                    </td> -->
                </tr>
            </table>

        </div>

        <div class="footer">
            Documento generado automáticamente por el sistema.
        </div>
    </div>
</body>

</html>