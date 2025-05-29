@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '80') <!-- Porcentaje completado -->
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
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">11</span>
            <h2 class="text-xl font-bold text-white">Características Personales</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre el estudiante {{$nombre}}</p>
    </div>

    {{-- Mensaje de error --}}
    @if (session('error'))
    <div class="mb-4 mt-4 rounded-md bg-red-100 border border-red-400 text-red-700 px-4 py-3">
        <strong class="font-bold">¡Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    <form action="{{ route('seccion11.guardar') }}" method="POST" class="p-1">
        @csrf

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <div x-data="{ mensaje: '' }">
                <label for="personalidadhijo" class="block text-sm font-medium text-gray-700 pt-3">Describa la personalidad de su hijo(a) <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="personalidadhijo" name="personalidadhijo" x-model="mensaje"
                    maxlength="200" placeholder="Escriba aquí su respuesta" required></textarea>
                <div class="text-sm mt-1 text-right">
                    <span
                        :class="mensaje.length >= 200 ? 'text-red-600' : 'text-gray-500'"
                        x-text="mensaje.length + ' / 200 caracteres'"></span>
                </div>
            </div>

            <div x-data="{ mensaje: '' }">
                <label for="oportunihijo" class="block text-sm font-medium text-gray-700 pt-3">¿Qué áreas de oportunidad o atención considera importante para la personalidad de su hijo(a)? <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="oportunihijo" name="oportunihijo" x-model="mensaje"
                    maxlength="200" placeholder="Escriba aquí su respuesta" required></textarea>
                <div class="text-sm mt-1 text-right">
                    <span
                        :class="mensaje.length >= 200 ? 'text-red-600' : 'text-gray-500'"
                        x-text="mensaje.length + ' / 200 caracteres'"></span>
                </div>
            </div>

            <div x-data="{ mensaje: '' }">
                <label for="adapthijo" class="block text-sm font-medium text-gray-700 pt-3">Describa la adaptación social de su hijo(a) con otros niños y adultos (sociales, independientes, sensibles al trato con los demás, etc.) <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="adapthijo" name="adapthijo" x-model="mensaje"
                    maxlength="200" placeholder="Escriba aquí su respuesta" required></textarea>
                <div class="text-sm mt-1 text-right">
                    <span
                        :class="mensaje.length >= 200 ? 'text-red-600' : 'text-gray-500'"
                        x-text="mensaje.length + ' / 200 caracteres'"></span>
                </div>
            </div>

            <div x-data="{ mensaje: '' }">
                <label for="juegacnhijo" class="block text-sm font-medium text-gray-700 pt-3">¿Juega contento(a) con otros niños o prefiere parmanecer solo(a)? <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="juegacnhijo" name="juegacnhijo" x-model="mensaje"
                    maxlength="200" placeholder="Escriba aquí su respuesta" required></textarea>
                <div class="text-sm mt-1 text-right">
                    <span
                        :class="mensaje.length >= 200 ? 'text-red-600' : 'text-gray-500'"
                        x-text="mensaje.length + ' / 200 caracteres'"></span>
                </div>
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