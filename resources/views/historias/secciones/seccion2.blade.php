@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '10') <!-- Porcentaje completado -->
@section('content')

<?php
$id_alumno = session('id_alumno');
$nombre = session('nombre');
?>


<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    @if (session('id_alumno'))
    <!-- Encabezado de sección -->
    <div class="bg-[#667c87] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">2</span>
            <h2 class="text-xl font-bold text-white">Estructura Familiar</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre la familia del estudiante {{$nombre}}</p>
    </div>

    <form action="{{ route('seccion2.guardar') }}" method="POST" class="p-1">
        @csrf

        @if(session('old_hijoId'))
        <div class="mb-8 border border-gray-200 rounded-lg p-6 m-4">

                <div class="bg-blue-50 rounded-lg p-4 mb-8">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mt-0.5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm text-gray-700">
                            <strong>Nota:</strong> Favor de verificar la información o en su defecto confirma.
                        </p>
                    </div>
                </div>
            

            <div class="mt-3 overflow-x-auto">
                <label for="numero_hijos" class="block text-sm font-medium text-gray-700 mb-2 ">Datos de los hermanos</label>
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-white uppercase bg-primary bg-[#667c87]">
                        <tr>
                            <th class="border border-gray-300 px-3 py-2">Nombre</th>
                            <th class="border border-gray-300 px-3 py-2">Edad</th>
                            <th class="border border-gray-300 px-3 py-2">Año escolar u <br> ocupación</th>
                            <th class="border border-gray-300 px-3 py-2">Escuela</th>
                            <th class="border border-gray-300 px-3 py-2">Salud</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hermanos as $hermano)
                        <tr>
                            <td class="border border-gray-300 px-2 py-1">
                                <input type="text" name="nombre_hermano[]" value="{{ $hermano->nombre_hermano }}" class="w-full px-2 py-1 border rounded-lg">
                            </td>
                            <td class="border border-gray-300 px-2 py-1">
                                <input type="number" name="edad_hermano[]" value="{{ $hermano->edad_hermano }}" class="w-full px-2 py-1 border rounded-lg">
                            </td>
                            <td class="border border-gray-300 px-2 py-1">
                                <input type="text" name="escolar_ocupacion[]" value="{{ $hermano->escolar_ocupacion }}" class="w-full px-2 py-1 border rounded-lg">
                            </td>
                            <td class="border border-gray-300 px-2 py-1">
                                <input type="text" name="escuela_hermano[]" value="{{ $hermano->escuela_hermano }}" class="w-full px-2 py-1 border rounded-lg">
                            </td>
                            <td class="border border-gray-300 px-2 py-1">
                                <input type="text" name="salud_hermano[]" value="{{ $hermano->salud_hermano }}" class="w-full px-2 py-1 border rounded-lg">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>

        </div>
        @else

        <!-- Datos del Padre (manteniendo tus campos originales) -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Datos del Padre</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="col-span-1">
                    <label for="nombre_padre" class="block text-sm font-medium text-gray-700">Nombre del Padre <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="nombre_padre" name="nombre_padre" value="{{ old('nombre_padre') }}" placeholder="Nombre(s) y apellidos" required>
                </div>

                <div class="col-span-1">
                    <label for="edad_padre" class="block text-sm font-medium text-gray-700">Edad <span class="text-red-500">*</span></label>
                    <input type="number" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" value="{{ old('edad_padre') }}" required placeholder="Edad en años">
                </div>

                <div class="col-span-1">
                    <label for="empresa_padre" class="block text-sm font-medium text-gray-700">Nombre de la empresa <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="empresa_padre" name="empresa_padre" value="{{ old('empresa_padre') }}" required placeholder="Empresa, negocio, etc.">
                </div>

                <div class="col-span-1">
                    <label for="puesto_padre" class="block text-sm font-medium text-gray-700">Puesto en la empresa <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="puesto_padre" name="puesto_padre" value="{{ old('puesto_padre') }}" required placeholder="Jefe, Socio, Administrador, etc.">
                </div class="col-span-1">

                <div class="col-span-1">
                    <label for="ocupacion_padre" class="block text-sm font-medium text-gray-700">Ocupación <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="ocupacion_padre" name="ocupacion_padre" placeholder="Profesión u oficio" value="{{ old('ocupacion_padre') }}" required>
                </div>

                <div class="col-span-1">
                    <label for="correo_padre" class="block text-sm font-medium text-gray-700">Correo electrónico personal <span class="text-red-500">*</span></label>
                    <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="correo_padre" name="correo_padre" value="{{ old('correo_padre') }}" required placeholder="correo@correo.com">
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="redessoc_padre" class="block text-sm font-medium text-gray-700 mb-2">Redes sociales <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
                        <div class="flex">
                            <div class="flex-none pt-2">
                                <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#1877f2]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path
                                            d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" class="flex-initial  w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="redessoc_padre" name="redessoc_padre[]" value="{{ old('redessoc_padre.0') }}" placeholder="Facebook" required>
                        </div>

                        <div class="flex">
                            <div class="flex-none pt-2">
                                <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#c13584]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" class="flex-initial  w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="redessoc_padre" name="redessoc_padre[]" value="{{ old('redessoc_padre.1') }}" placeholder="Instagram" required>
                        </div>
                    </div>
                </div>

                <!-- Diestro/Zurdo -->
                <div class="col-span-1 md:col-span-2">
                    <div class="pl-2" x-data="{ diestro: false, zurdo: false }" x-init="$watch('diestro', checkRequired); $watch('zurdo', checkRequired)">
                        <label class="block text-sm font-medium text-gray-700">Marcar si el padre es <span class="text-red-500">*</span></label>
                        @error('padre_lateralidad')
                        <p class="mt-2 text-sm font-semibold text-red-700 bg-red-100 border border-red-400 rounded-md px-3 py-2">
                            Es necesario seleccionar al menos uno</p>
                        @enderror
                        <div class="flex space-x-4 mt-1">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="padre_lateralidad[]" value="Diestro" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded" x-model="diestro" id="check1">
                                <span class="ml-2">Diestro</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="padre_lateralidad[]" value="Zurdo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded" x-model="zurdo" id="check2">
                                <span class="ml-2">Zurdo</span>
                            </label>
                        </div>
                        <!-- Campo oculto que se usa para hacer la validación required -->
                        <input type="hidden" name="padre_lateralidad_required" x-bind:required="!diestro && !zurdo">
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2" x-data="{siegresadored: ''}">
                    <label for="egresadored" class="block text-sm font-medium text-gray-700">¿Es egresado de la red? <span class="text-red-500">*</span></label>
                    <label class="radio-box-btn">
                        <input type="radio" name="egresadored_padre" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" required
                            x-model="siegresadored">
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="egresadored_padre" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" x-model="siegresadored">
                        <span class="ml-2">No</span>
                    </label>
                    <div id="Si" x-show="siegresadored == $el.id" x-transition>
                        <label for="cualcolegio_padre" class="block text-sm font-medium text-gray-700 pt-3">Nombre del colegio</label>
                        <input type="text" class="w-md px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                            id="cualcolegio_padre" placeholder="Escribe el nombre del colegio" name="cualcolegio_padre" x-bind:required="siegresadored === 'Si'">
                    </div>
                </div>

            </div>
        </div>

        <!-- Datos de la Madre (manteniendo tus campos originales) -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Datos de la Madre</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label for="nombre_madre" class="block text-sm font-medium text-gray-700">Nombre de la Madre <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="nombre_madre" name="nombre_madre" value="{{ old('nombre_madre') }}" placeholder="Nombre(s) y apellidos" required>
                </div>

                <div class="col-span-1">
                    <label for="edad_madre" class="block text-sm font-medium text-gray-700">Edad <span class="text-red-500">*</span></label>
                    <input type="number" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_madre" name="edad_madre" value="{{ old('edad_madre') }}" placeholder="Edad en años" required>
                </div>

                <div class="col-span-1">
                    <label for="empresa_madre" class="block text-sm font-medium text-gray-700">Nombre de la empresa <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="empresa_madre" name="empresa_madre" value="{{ old('empresa_madre') }}" placeholder="Empresa, negocio, etc" required>
                </div>

                <div class="col-span-1">
                    <label for="puesto_madre" class="block text-sm font-medium text-gray-700">Puesto en la empresa <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="puesto_madre" name="puesto_madre" value="{{ old('puesto_madre') }}" placeholder="Jefa, Socia, Administradora, etc." required>
                </div>

                <div class="col-span-1">
                    <label for="ocupacion_madre" class="block text-sm font-medium text-gray-700">Ocupación <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="ocupacion_madre" name="ocupacion_madre" placeholder="Profesión u oficio" value="{{ old('ocupacion_madre') }}" required>
                </div>

                <div class="col-span-1">
                    <label for="correo_madre" class="block text-sm font-medium text-gray-700">Correo electrónico personal <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="correo_madre" name="correo_madre" value="{{ old('correo_madre') }}" placeholder="Correo@correo.com" required>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="redessoc_madre" class="block text-sm font-medium text-gray-700">Redes sociales <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
                        <div class="flex">
                            <div class="flex-none pt-2">
                                <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#1877f2]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path
                                            d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="redessoc_madre" name="redessoc_madre[]" value="{{ old('redessoc_madre.0') }}" placeholder="Facebook" required>
                        </div>

                        <div class="flex">
                            <div class="flex-none pt-2">
                                <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#c13584]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="redessoc_madre" name="redessoc_madre[]" value="{{ old('redessoc_madre.1') }}" placeholder="Instagram" required>
                        </div>
                    </div>
                </div>

                <!-- Diestra/Zurda -->
                <div class="col-span-1 md:col-span-2">
                    <div class="pl-2" x-data="{ diestra: false, zurda: false }" x-init="$watch('diestra', checkRequired); $watch('zurda', checkRequired)">
                        <label class="block text-sm font-medium text-gray-700">Marcar si la madre es <span class="text-red-500">*</span></label>
                        @error('madre_lateralidad')
                        <p class="mt-2 text-sm font-semibold text-red-700 bg-red-100 border border-red-400 rounded-md px-3 py-2">
                            Es necesario seleccionar al menos uno</p>
                        @enderror
                        <div class="flex space-x-4 mt-1">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="madre_lateralidad[]" value="Diestra" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded" x-model="diestra" id="check1">
                                <span class="ml-2">Diestra</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="madre_lateralidad[]" value="Zurda" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded" x-model="zurda" id="check2">
                                <span class="ml-2">Zurda</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2" x-data="{siegresadored: ''}">
                    <label for="egresadored" class="block text-sm font-medium text-gray-700">¿Es egresada de la red? <span class="text-red-500">*</span></label>
                    <label class="radio-box-btn">
                        <input type="radio" name="egresadored_madre" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" required
                            x-model="siegresadored">
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="egresadored_madre" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" x-model="siegresadored">
                        <span class="ml-2">No</span>
                    </label>
                    <div id="Si" x-show="siegresadored == $el.id" x-transition>
                        <label for="cualcolegio_madre" class="block text-sm font-medium text-gray-700 pt-3">Nombre del colegio</label>
                        <input type="text" class="w-md px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                            id="cualcolegio_madre" placeholder="Escribe el nombre del colegio" name="cualcolegio_madre" x-bind:required="siegresadored === 'Si'">
                    </div>
                </div>
            </div>
        </div>

        <!-- Estado civil de los padres -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Estado Civil</h3>

            @error('estado_civil')
            <p class="mt-2 text-sm font-semibold text-red-700 bg-red-100 border border-red-400 rounded-md px-3 py-2">
                Es necesario seleccionar al menos uno</p>
            @enderror
            <div class="space-y-6">
                <!-- Estado civil (checkboxes como en tu original) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado civil actual de los padres <span class="text-red-500">*</span></label>

                    <div class="space-y-2" x-data="{casadosigl: false, civil: false, estcivil: '' }">
                        <label class="radio-box-btn">
                            <input type="checkbox" name="estado_civil[]" value="Casados Iglesia" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded" x-model="casadosigl" @change="estcivil = ''">
                            <span class="ml-2">Casados Iglesia</span>
                        </label>
                        <label class="radio-box-btn">
                            <input type="checkbox" name="estado_civil[]" value="Civil" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded" x-model="civil" @change="estcivil = ''">
                            <span class="ml-2">Civil</span>
                        </label>

                        <div x-show="!casadosigl && !civil" x-transition>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 pt-4">
                                <label class="radio-box-btn">
                                    <input type="radio" name="estado_civil[]" value="Divorciados" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                        x-model="estcivil">
                                    <span class="ml-2">Divorciados</span>
                                </label>
                                <label class="radio-box-btn">
                                    <input type="radio" name="estado_civil[]" value="Viudo(a)" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                        x-model="estcivil">
                                    <span class="ml-2">Viudo(a)</span>
                                </label>
                                <label class="radio-box-btn">
                                    <input type="radio" name="estado_civil[]" value="Unión Libre" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                        x-model="estcivil">
                                    <span class="ml-2">Unión Libre</span>
                                </label>
                                <label class="radio-box-btn">
                                    <input type="radio" name="estado_civil[]" value="Madre soltera" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                        x-model="estcivil">
                                    <span class="ml-2">Madre soltera</span>
                                </label>
                                <label class="radio-box-btn">
                                    <input type="radio" name="estado_civil[]" value="Vuelto a casar" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                        x-model="estcivil">
                                    <span class="ml-2">Vuelto a casar</span>
                                </label>
                            </div>

                            <div class="pt-4 bg-[#8caab945] rounded-xl shadow-lg overflow-hidden p-4 mt-2" id="Vuelto a casar" x-show="estcivil == $el.id" x-transition>
                                <p class="text-sm font-medium text-gray-700 pb-4">Si se trata de una familia reconstructiva(padre o madre vuelto a casar por viudez, divorcio, etc) escribir los datos de la persona (diferente al padre o a la madre biológico(a)), con quien vive el niño(a) actualmente <span class="text-red-500">*</span></p>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div class=" col-span-1">
                                        <label for="nombre_conyuge" class="block text-sm font-medium text-gray-700">Nombre Cónyuge <span class="text-red-500">*</span></label>
                                        <input type="text" class="imput-label"
                                            id="nombre_conyuge" name="nombre_conyuge" placeholder="Nombre(s) y apellidos" x-bind:required="estcivil === 'Vuelto a casar'">
                                    </div>

                                    <div class="col-span-1">
                                        <label for="edad_conyuge" class="block text-sm font-medium text-gray-700">Edad <span class="text-red-500">*</span></label>
                                        <input type="number" min="0" class="imput-label"
                                            id="edad_conyuge" name="edad_conyuge" placeholder="Edad en años" x-bind:required="estcivil === 'Vuelto a casar'">
                                    </div class="col-span-1">

                                    <div class="col-span-1">
                                        <label for="empresa_conyuge" class="block text-sm font-medium text-gray-700">Nombre de la empresa <span class="text-red-500">*</span></label>
                                        <input type="text" class="imput-label"
                                            id="empresa_conyuge" name="empresa_conyuge" placeholder="Empresa, negocio, etc." x-bind:required="estcivil === 'Vuelto a casar'">
                                    </div>

                                    <div class="col-span-1">
                                        <label for="puesto_conyuge" class="block text-sm font-medium text-gray-700">Puesto la empresa <span class="text-red-500">*</span></label>
                                        <input type="text" class="imput-label"
                                            id="puesto_conyuge" name="puesto_conyuge" placeholder="Jefe(a), Socio(a), Administrador(a), etc." x-bind:required="estcivil === 'Vuelto a casar'">
                                    </div>

                                    <div class="col-span-1">
                                        <label for="ocupacion_conyuge" class="block text-sm font-medium text-gray-700">Ocupación <span class="text-red-500">*</span></label>
                                        <input type="text" class="imput-label"
                                            id="ocupacion_conyuge" name="ocupacion_conyuge" placeholder="Profesión u oficio" x-bind:required="estcivil === 'Vuelto a casar'">
                                    </div>

                                    <div class="col-span-1">
                                        <label for="correo_conyuge" class="block text-sm font-medium text-gray-700">Correo electronico personal <span class="text-red-500">*</span></label>
                                        <input type="text" class="imput-label"
                                            id="correo_conyuge" name="correo_conyuge" placeholder="Correo@correo.com" x-bind:required="estcivil === 'Vuelto a casar'">
                                    </div>

                                    <div class="col-span-1 md:col-span-2">
                                        <label for="redessoc_conyuge" class="block text-sm font-medium text-gray-700">Redes sociales <span class="text-red-500">*</span></label>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
                                            <div class="flex">
                                                <div class="flex-none pt-2">
                                                    <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#1877f2]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                                            <path
                                                                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <input type="text" class="imput-label"
                                                    id="redessoc_conyuge" name="redessoc_conyuge[]" placeholder="Facebook" x-bind:required="estcivil === 'Vuelto a casar'">
                                            </div>

                                            <div class="flex">
                                                <div class="flex-none pt-2">
                                                    <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#c13584]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                            <path
                                                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <input type="text" class="imput-label"
                                                    id="redessoc_conyuge" name="redessoc_conyuge[]" placeholder="Instagram" x-bind:required="estcivil === 'Vuelto a casar'">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Diestra/Zurda -->
                                    <div class="col-span-1 md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700">Marcar si el(la) cónyuge es <span class="text-red-500">*</span></label>
                                        @error('conyuge_lateralidad')
                                        <p class="mt-2 text-sm font-semibold text-red-700 bg-red-100 border border-red-400 rounded-md px-3 py-2">
                                            Es necesario seleccionar al menos uno</p>
                                        @enderror
                                        <div class="flex space-x-4 mt-2">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" name="conyuge_lateralidad[]" value="Diestra" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                                                <span class="ml-2">Diestro(a)</span>
                                            </label>
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" name="conyuge_lateralidad[]" value="Zurda" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                                                <span class="ml-2">Zurdo(a)</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div x-data="{ mensaje: '' }" class="py-4">
                                    <label for="noviveconpadres_situtor" class="block text-sm font-medium text-gray-700">En caso de que el niño(a) no viva con algunos de los padres, escriba el nombre del tutor(a) y la relación o parentesco que tenga con el niño(a):</label>
                                    <textarea rows="4" class="imput-label"
                                        id="noviveconpadres_situtor" name="noviveconpadres_situtor" x-model="mensaje"
                                        maxlength="200" placeholder="Escriba aquí su respuesta"></textarea>
                                    <div class="text-sm mt-1 text-right">
                                        <span
                                            :class="mensaje.length >= 200 ? 'text-red-600' : 'text-gray-500'"
                                            x-text="mensaje.length + ' / 200 caracteres'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="Divorciados" x-show="estcivil == $el.id">
                            <!-- Motivos separación (condicional) -->
                            <div x-data="{ mensaje: '' }" x-transition>
                                <label for="moti_separa" class="block text-sm font-medium text-gray-700 pt-3">¿Cuáles fueron los motivos de la separación?</label>
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="moti_separa" name="moti_separa" rows="3" x-bind:required="estcivil === 'Divorciados'" x-model="mensaje"
                                    maxlength="200" placeholder="Escriba aquí su respuesta"></textarea>
                                <div class="text-sm text-right">
                                    <span
                                        :class="mensaje.length >= 200 ? 'text-red-600' : 'text-gray-500'"
                                        x-text="mensaje.length + ' / 200 caracteres'"></span>
                                </div>
                            </div>
                            <!-- Vive con (condicional) -->
                            <div x-transition>
                                <label for="vive_con" class="block text-sm font-medium text-gray-700">En caso de separación o divorcio, ¿con quién vive el niño(a)?</label>
                                <input type="text" class="md:w-md px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="vive_con" name="vive_con" placeholder="Ej: Madre, Padre, Abuelo(a)" x-bind:required="estcivil === 'Divorciados'">
                            </div>
                        </div>
                        <!-- Años de casados -->
                        <div id="Vuelto a casar" x-show="casadosigl || civil || estcivil == $el.id " x-transition>
                            <label for="anos_casados" class="block text-sm font-medium text-gray-700 py-2">¿Cuántos años llevan de casados?</label>
                            <input type="number" min="0" class="w-ms px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="anos_casados" name="anos_casados" placeholder="Años" x-bind:required="casadosigl || civil || estcivil === 'Vuelto a casar'">
                        </div>
                    </div> <!-- vuelto a casar  -->
                </div>
            </div>

            <!-- Número de hijos -->
            <div class="col-span-1" x-data="{ cantidad: 1 }">
                <label for="numero_hijos" class="block text-sm font-medium text-gray-700 ">Número de hijos</label>
                <input type="number" class="w-ms px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="numero_hijos" min="1" x-model.number="cantidad" name="numero_hijos" required placeholder="Cantidad">
                <template x-if="cantidad > 1">
                    <div class="mt-3 overflow-x-auto">
                        <label for="numero_hijos" class="block text-sm font-medium text-gray-700 mb-2 ">Datos de los hermanos</label>
                        <table class="min-w-full text-sm text-left text-gray-700">
                            <thead class="text-xs text-white uppercase bg-primary bg-[#667c87]">
                                <tr>
                                    <th class="border border-gray-300 px-3 py-2">Nombre</th>
                                    <th class="border border-gray-300 px-3 py-2">Edad</th>
                                    <th class="border border-gray-300 px-3 py-2">Año escolar u <br> ocupación</th>
                                    <th class="border border-gray-300 px-3 py-2">Escuela</th>
                                    <th class="border border-gray-300 px-3 py-2">Salud</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="i in (cantidad -1)" :key="i">
                                    <tr>
                                        <td class="border border-gray-300 px-2 py-1">
                                            <input type="text" name="nombre_hermano[]" class="w-full px-2 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:outline-none">
                                        </td>
                                        <td class="border border-gray-300 px-2 py-1">
                                            <input type="number" name="edad_hermano[]" class="w-full px-2 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:outline-none">
                                        </td>
                                        <td class="border border-gray-300 px-2 py-1">
                                            <input type="text" name="escolar_ocupacion[]" class="w-full px-2 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:outline-none">
                                        </td>
                                        <td class="border border-gray-300 px-2 py-1">
                                            <input type="text" name="escuela_hermano[]" class="w-full px-2 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:outline-none">
                                        </td>
                                        <td class="border border-gray-300 px-2 py-1">
                                            <input type="text" name="salud_hermano[]" class="w-full px-2 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:outline-none">
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </template>

            </div>

        </div>

        <!-- Religion-->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Religión</h3>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">En la educación de su hijo(a) ¿Toman ustedes en cuenta el punto de vista religioso?:<span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-3 gap-2">
                        <label class="radio-box-btn">
                            <input type="radio" name="religion" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" required>
                            <span class="ml-2">Sí</span>
                        </label>
                        <label class="radio-box-btn">
                            <input type="radio" name="religion" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                            <span class="ml-2">No</span>
                        </label>
                    </div>

                    <div x-data="{ mensaje: '' }">
                        <label for="valores_familia" class="block text-sm font-medium text-gray-700 pt-2">¿Cuáles son los valores familiares? <span class="text-red-500">*</span></label>
                        <textarea
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                            id="valores_familia"
                            x-model="mensaje"
                            maxlength="200"
                            name="valores_familia"
                            placeholder="Ej. Respeto, honestidad, etc."
                            required>{{ old('valores_familia') }}</textarea>
                        <div class="text-sm mt-1 text-right">
                            <span
                                :class="mensaje.length >= 200 ? 'text-red-600' : 'text-gray-500'"
                                x-text="mensaje.length + ' / 200 caracteres'"></span>
                        </div>

                        @error('valores_familia')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8 m-4 gap-2">
            <button type="button" onclick="history.back()" class=" flex-none md:flex px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Regresar
            </button>
            <button type="submit" class=" flex-none md:flex px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition items-center shadow-md">
                Guardar y<br> Continuar
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </form>
    @else
    <div class="flex justify-between mt-8 m-4 gap-2">
        <h3 class="text-lg font-semibold text-[#1f355e] mb-4">No hay valores validos, por favor regrese a la pagina principal</h3>
        <a href="{{ route('historia.nivel_educativo') }}" class="flex-none md:flex px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Regresar
        </a>
    </div>
    @endif
</div>

<!-- AlpineJS para la funcionalidad condicional -->
<!-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script> -->
@endsection