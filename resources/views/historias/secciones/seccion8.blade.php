@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '55') <!-- Porcentaje completado -->
@section('content')

<?php
$id_alumno = session('id_alumno');
$nombre = session('nombre');
?>


<div class=" bg-white rounded-xl shadow-lg overflow-hidden">
    @if (session('id_alumno'))
    <!-- Encabezado de sección -->
    <div class="bg-[#1f355e] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">8</span>
            <h2 class="text-xl font-bold text-white">Lenguaje</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre el estudiante {{$id_alumno }} , {{$nombre}}</p>
    </div>

    <form action="{{ route('seccion8.guardar') }}" method="POST" class="p-1">
        @csrf

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <!--Describre lenguaje -->
            <div>
                <label class="block text-sm font-medium text-gray-700 pb-2">¿Cómo describiría el desarrollo del habla y lenguaje del niño(a)?<span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <label class="radio-box-btn">
                        <input type="radio" name="desarrollo_lenguaje" value="Despues de lo esperado para la edad" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">Despues de lo esperado para la edad</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="desarrollo_lenguaje" value="Esperado para la edad" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">Esperado para la edad</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="desarrollo_lenguaje" value="Antes de lo esperado" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">Antes de lo esperado</span>
                    </label>
                </div>
            </div>

            <div>
                <label for="prim_palabra" class="block text-sm font-medium text-gray-700 pt-3">¿A que edad dijo sus primeras palabras?<span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="prim_palabra" name="prim_palabra" required>
            </div>
        </div>

        <!-- Botones de navegación -->
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
@endsection