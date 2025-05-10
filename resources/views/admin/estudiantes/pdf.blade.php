<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ficha del Estudiante</title>
    <link rel="stylesheet" href="{{ public_path('pdf.css') }}" type="text/css">


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
                <p>HISTORIA DE DESARROLLO NUEVO INGRESO PRIMARIA Y SECUNDARIA***</p>
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
                    <td class="value">{{ $estudiante->nombre_completo }}</td>
                    <td class="label">Edad:</td>
                    <td class="value">{{ $estudiante->edad }} Años</td>

                    <!-- <td class="label">Fecha de creación:</td>
                <td class="value">{{ $estudiante->created_at->format('d/m/Y H:i') }}</td> -->
                </tr>
                <tr>
                    <td class="label">Sexo:</td>
                    <td class="value">{{ $estudiante->genero }}</td>
                    <td class="label">Fecha de nacimiento:</td>
                    <td class="value">{{ $estudiante->fecha_nacimiento ? \Carbon\Carbon::parse($estudiante->fecha_nacimiento)->format('d/m/Y') : '—' }}</td>
                </tr>
                <tr>
                    <td class="label">Lugar de nacimiento:</td>
                    <td class="value">{{ $estudiante->lugar_nacimiento }}</td>
                    <td class="label">Grado escolar:</td>
                    <td class="value">{{ $estudiante->grado_escolar}}</td>
                </tr>
                <tr>
                    <td class="label">Dirección:</td>
                    <td class="value">{{ $estudiante->direccion}}</td>
                    <td class="label">C.P.:</td>
                    <td class="value">{{ $estudiante->cp }}</td>
                </tr>
                <tr>
                    <td class="label">Teléfono:</td>
                    <td class="value">{{ $estudiante->telefono}}</td>
                    <td class="label">Escuela de procedencia:</td>
                    <td class="value">{{ $estudiante->escuela_procedencia}}</td>
                </tr>
            </table>
        </div>

        <!-- estructura familiar -->
        <div>
            <div class="header1">
                <h1 class="title">Estructura familiar</h1>
            </div>
            <table class="info-table">
                <tr>
                    <td class="label">Nombre del padre:</td>
                    <td class="value">{{ $estudiante->seccion2->nombre_padre ?? '—'}}</td>
                    <td class="label">Edad:</td>
                    <td class="value">{{ $estudiante->seccion2->edad_padre ?? '—'}} Años</td>

                    <!-- <td class="label">Fecha de creación:</td>
                <td class="value">{{ $estudiante->created_at->format('d/m/Y H:i') }}</td> -->
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
                    <td class="value">  {{ implode(', ', $estudiante->seccion2->padre_lateralidad ?? []) }}</td>
                    <td class="value" colspan="2"></td>
                </tr>
            </table>
        </div>


        <!-- <td class="value" colspan="2"></td> -->


        <div class="footer">
            Documento generado automáticamente por el sistema.
        </div>
    </div>
</body>

</html>