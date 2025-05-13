@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '5') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')

<?php
$grado = session('grado');
?>


<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Encabezado de la sección -->
    <div class="bg-[#1f355e] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#1f355e] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">1</span>
            <h2 class="text-xl font-bold text-white">Datos de Identificación del Alumno</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información básica del estudiante</p>
    </div>

    <!-- Formulario -->
    <!-- {{-- <form action="{{ route('preescolar.seccion1.guardar') }}" method="POST" class="p-6"> --}} -->
    <form action="{{ route('seccion1.guardar') }}" method="POST" class="p-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nombre -->
            <div class="space-y-1">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre completo <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="text" id="nombre_completo" name="nombre_completo" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        placeholder="Nombre(s) y apellidos">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Fecha de nacimiento -->
            <div class="space-y-1">
                <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de nacimiento <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition">
                    {{-- <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </div> --}}
                </div>
            </div>

            <!-- Lugar de nacimiento -->
            <div class="space-y-1">
                <label for="lugar_nacimiento" class="block text-sm font-medium text-gray-700">Lugar de nacimiento <span class="text-red-500">*</span></label>
                <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    placeholder="Ciudad, Estado">
            </div>

            <!-- Sexo -->
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Sexo <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-2 gap-2">
                    <label class="radio-box-btn">
                        <input type="radio" name="sexo" value="masculino" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" required>
                        <span class="ml-2">Masculino</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="sexo" value="femenino" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">Femenino</span>
                    </label>

                </div>
            </div>

            <!-- Edad -->
            <div class="space-y-1">
                <label for="edad" class="block text-sm font-medium text-gray-700">Edad <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="text" id="edad" name="edad" min="3" max="6" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        placeholder="Edad en años">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <span class="text-gray-500">años</span>
                    </div>
                </div>
            </div>

            <!-- Grado escolar -->
            <div class="space-y-1">
                <label for="grado_escolar" class="block text-sm font-medium text-gray-700">Grado escolar <span class="text-red-500">*</span></label>
                <select id="grado_escolar" name="grado_escolar" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition" required>

                    @if($grado === 'preescolar')
                    <option value="" selected disabled>Seleccione un grado</option>
                    <option value="Bambolino 2">Bambolino 2</option>
                    <option value="Bambolino 3">Bambolino 3</option>
                    <option value="Kinder 1">Kinder 1</option>
                    <option value="Kinder 2">Kinder 2</option>
                    <option value="Kinder 3">Kinder 3</option>
                    @elseif($grado === 'primaria_secundaria')
                    <option selected="true" disabled="disabled">Seleccione un grado</option>
                    <option value="Primero de Primaria<">Primero de Primaria</option>
                    <option value="Segundo de Primaria">Segundo de Primaria</option>
                    <option value="Tercero de Primaria">Tercero de Primaria</option>
                    <option value="Cuarto de Primaria">Cuarto de Primaria</option>
                    <option value="Quinto de Primaria">Quinto de Primaria </option>
                    <option value="Sexto de Primaria">Sexto de Primaria</option>
                    <option value="Primero de Secundaria">Primero de Secundaria</option>
                    <option value="Segundo de Secundaria">Segundo de Secundaria</option>
                    <option value="Tercero de Secundaria">Tercero de Secundaria</option>
                    @endif
                </select>
            </div>

            <!-- Dirección -->
            <div class="space-y-1 md:col-span-2">
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección completa <span class="text-red-500">*</span></label>
                <input type="text" id="direccion" name="direccion" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    placeholder="Calle, número, colonia">
            </div>

            <!-- Código Postal -->
            <div class="space-y-1">
                <label for="cp" class="block text-sm font-medium text-gray-700">Código Postal <span class="text-red-500">*</span></label>
                <input type="text" id="cp" name="cp" pattern="[0-9]{5}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    placeholder="5 dígitos">
            </div>

            <!-- Teléfono -->
            <div class="space-y-1">
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono <span class="text-red-500">*</span></label>
                <input type="tel" id="telefono" name="telefono" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    placeholder="10 dígitos">
            </div>

            <!-- Escuela de procedencia -->
            <div class="space-y-1 md:col-span-2">
                <label for="escuela_procedencia" class="block text-sm font-medium text-gray-700">Escuela de procedencia <span class="text-red-500">*</span></label>
                <input type="text" id="escuela_procedencia" name="escuela_procedencia"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition" required>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="flex justify-between mt-8 m-4 gap-2">
            <button type="button" onclick="history.back()" class="flex-none md:flex px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Regresar
            </button>

            <button type="submit" class=" flex-none md:flex px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition items-center shadow-md">
                Guardar y <br> Continuar
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </form>
</div>
@endsection