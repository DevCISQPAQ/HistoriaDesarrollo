@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '100') <!-- Porcentaje completado -->
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
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">14
            </span>
            <h2 class="text-xl font-bold text-white">Gracias por terminar el formulario</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Estudiante: {{$nombre}}</p>
    </div>

    <!-- Parte de seleccion si agrega otro hijo -->
    <div class="mb-8 border border-gray-200 rounded-lg p-1 relative overflow-x-auto m-4">
        @if (session('success'))
        <!-- Mostrar que el documento se envio -->
        <!-- mensaje -->
        <div class="bg-green-200 border-l-8 border-green-600 text-green-900 px-8 py-6 rounded shadow-md mb-6" role="alert">
            <h3 class="text-3xl font-bold mb-2">¡Formulario enviado con éxito!</h3>
            <p class="text-xl leading-relaxed">
                {{ session('success') }}
                Hemos recibido tu formulario y comenzaremos a procesarlo de inmediato.
            </p>
            <p class="mt-3 text-lg">
                Si tienes alguna duda adicional, no dudes en contactarnos
            </p>
        </div>
        @if(session('numero_hijos') > 1)
        <!-- agregar otro hijo -->
        <div class="flex justify-center">
            <h3 class=" text-lg md:text-2xl font-semibold text-[#1f355e] my-4">¿Deseas ingresar otro hijo(a)?</h3>
        </div>
        <div x-data="{otro_hijo: ''}">
            <div class="flex justify-center">
                <div class="w-full max-w-xl mb-4">
                    <div class="flex flex-wrap justify-center gap-4">
                        <!-- Botón Sí -->
                        <label
                            :class="{'bg-[#1f355e] text-white scale-105 shadow-xl': otro_hijo === 'Si','text-[#1f355e] bg-white': otro_hijo !== 'Si'}"
                            class="inline-flex items-center border-2 border-[#1f355e] rounded-xl px-8 py-4 text-lg font-semibold shadow-md hover:bg-[#1f355e] hover:text-white hover:scale-105 transform transition-all duration-300 ease-in-out cursor-pointer w-auto min-w-[100px] text-center justify-center">
                            <input type="radio" name="personas_casa" value="Si"
                                class="sr-only" x-model="otro_hijo" required>
                            <span>Sí</span>
                        </label>

                        <!-- Botón No -->
                        <label
                            :class="{'bg-[#1f355e] text-white scale-105 shadow-xl': otro_hijo === 'No','text-[#1f355e] bg-white': otro_hijo !== 'No'}"
                            class="inline-flex items-center border-2 border-[#1f355e] rounded-xl px-8 py-4 text-lg font-semibold shadow-md hover:bg-[#1f355e] hover:text-white hover:scale-105 transform transition-all duration-300 ease-in-out cursor-pointer w-auto min-w-[100px] text-center justify-center">
                            <input type="radio" name="personas_casa" value="No"
                                class="sr-only" x-model="otro_hijo">
                            <span>No</span>
                        </label>
                    </div>
                </div>
            </div>

            <div id="Si" x-show="otro_hijo == $el.id" class="max-w-2xl mx-auto" x-transition>
                <p class="text-center text-lg font-semibold text-[#1f355e] mt-4">
                    ¿Para qué nivel desea llenar la historia de desarrollo de su otro hijo(a)?
                </p>
                <div class="p-6 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Opción Preescolar -->
                        <a href="{{ route('historia.seccion1', ['grado' => 'preescolar', 'add_hijo' => '1']) }}"
                            class="group border-2 border-blue-100 rounded-xl p-6 text-center hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md">
                            <div class="bg-blue-100 rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center group-hover:bg-blue-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.933 12.8a1 1 0 000-1.6L6.6 7.2A1 1 0 005 8v8a1 1 0 001.6.8l5.333-4zM19.933 12.8a1 1 0 000-1.6l-5.333-4A1 1 0 0013 8v8a1 1 0 001.6.8l5.333-4z" />
                                </svg>
                            </div>
                            <h3 class="text-md font-semibold text-gray-800 mb-2 group-hover:text-primary">Preescolar</h3>
                            <p class="text-gray-600">---</p>
                            <div class="mt-4">
                                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium group-hover:bg-blue-200">
                                    Bambolino a Kinder 3
                                </span>
                            </div>
                        </a>

                        <!-- Opción Primaria/Secundaria -->
                        <a href="{{ route('historia.seccion1', ['grado' => 'primaria_secundaria',  'add_hijo' => '1']) }}"
                            class="group border-2 border-green-100 rounded-xl p-6 text-center hover:bg-green-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md">
                            <div class="bg-green-100 rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center group-hover:bg-green-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h3 class="text-md font-semibold text-gray-800 mb-2 group-hover:text-green-700">Primaria/Secundaria</h3>
                            <p class="text-gray-600">---</p>
                            <div class="mt-4">
                                <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium group-hover:bg-green-200">
                                    1° Primaria a 3° Secundaria
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div id="No" x-show="otro_hijo == $el.id" x-transition>
                <div class="flex justify-center mt-6">
                    <a href="{{ url('/') }}"
                        class="inline-block px-6 py-4 mb-4 bg-[#ff7843] text-white font-semibold rounded-lg shadow-md hover:bg-[#ffaf25] transition duration-300">
                        Volver al inicio
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-blue-50 rounded-lg p-4 mb-8">
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mt-0.5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-sm text-gray-700">
                    <strong>Nota:</strong> Al seleccionar 'Sí, ingresar otro hijo', solo debe agregar hijos propios, ya que se utilizarán datos previamente guardados.
                </p>
            </div>
        </div>
        @else
        <div class="flex justify-center mt-6">
            <a href="{{ url('/') }}"
                class="inline-block px-6 py-4 mb-4 bg-[#ff7843] text-white font-semibold rounded-lg shadow-md hover:bg-[#ffaf25] transition duration-300">
                Volver al inicio
            </a>
        </div>
        @endif
        @elseif(session('formulario_aceptado'))
        <div class="flex justify-center mt-6">
            <a href="{{ url('/') }}"
                class="inline-block px-6 py-4 mb-4 bg-[#ff7843] text-white font-semibold rounded-lg shadow-md hover:bg-[#ffaf25] transition duration-300">
                Volver al inicio
            </a>
        </div>
        @endif

    </div>
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