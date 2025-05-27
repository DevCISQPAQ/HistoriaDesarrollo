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
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">13</span>
            <h2 class="text-xl font-bold text-white">Fin de formulario</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Gracias por terminar el formulario para el estudiante: {{$nombre}}</p>
    </div>

    <!-- Parte de seleccion si agrega otro hijo -->
    <div class="mb-8 border border-gray-200 rounded-lg p-1 relative overflow-x-auto m-4">
        <div class="flex justify-center ">
            <h3 class=" text-lg md:text-2xl font-semibold text-[#1f355e] my-4">¿Deseas ingresar otro hijo(a)?</h3>
        </div>
        <div x-data="{otro_hijo: ''}">
            <div class="flex justify-center ">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <div class="md:col-span-2 flex justify-center space-x-6">
                        <label class="inline-flex items-center border border-gray-300 rounded-lg px-9 py-3 hover:bg-[#1f355e] hover:text-white cursor-pointer"
                            :class="{'bg-[#1f355e] text-white': otro_hijo === 'Si'}">
                            <input type="radio" name="personas_casa" value="Si"
                                class="sr-only text-[#1f355e] focus:ring-[#1f355e]" x-model="otro_hijo" required>
                            <span>Sí</span>
                        </label>
                        <label class="inline-flex items-center border border-gray-300 rounded-lg px-8 py-3 hover:bg-[#1f355e] hover:text-white cursor-pointer"
                            :class="{'bg-[#1f355e] text-white': otro_hijo === 'No'}">
                            <input type="radio" name="personas_casa" value="No"
                                class="sr-only text-[#1f355e] focus:ring-[#1f355e]" x-model="otro_hijo">
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
                <form action="{{ route('seccion13.guardar') }}" method="POST" class="p-1">
                    @csrf

                    <div class="  p-6 mt-8 relative overflow-x-auto">
                        <h3 class="text-lg font-semibold text-[#1f355e] mb-4">CONFORMIDAD
                            SOBRE EL PROCESO DE ADMISIÓN </h3>

                        <p class="text-justify text-[#1f355e] mt-1">Manifiesto bajo protesta de decir la verdad que toda la información proporcionada es verdadera y completa, que no omití
                            detalles significativos sobre el desarrollo de mi hijo(a). Por lo que de haber omitido algún dato significativo que pueda incidir en su proceso de aprendizaje, libero de toda responsabilidad al colegio, al no haberle proporcionado toda la información necesaria, a fin de atender los requerimientos educativos que presenta mi hijo(a). Comprometiéndome a mantener actualizada la historia de desarrollo de mi hijo(a), durante su estancia en esta institución educativa. Acepto que los resultados de la valoración de admisión sean confidenciales y para uso exclusivo del colegio. La aplicación de dichos exámenes no garantiza la admisión de mi hijo(a), la cual implica una decisión inapelable del Consejo de Admisiones, así como disponibilidad de cupo.
                            <br>
                            <br>
                            De igual forma, manifiesto que me fue debidamente informado sobre el Aviso de Privacidad con que cuenta el Colegio, y que
                            puede ser consultado en la página de internet: <span> <a href="https://www.semperaltius.edu.mx/aviso-de-privacidad"> www.semperaltius.edu.mx/aviso-de-privacidad</a></span>
                        </p>


                        <div class="md:col-span-2 pt-4">
                            <label class="block text-sm font-medium text-gray-700">Acepto los términos de conformidad del proceso de admisión<span class="text-red-500">*</span></label>
                            <div class="flex space-x-4 mt-2">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="acepto_terminos" value="Acepto" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded" required>
                                    <span class="ml-2">Acepto</span>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-between mt-8 m-4 gap-2">
                        <button type="button" onclick="history.back()" class="flex-none md:flex px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Regresar
                        </button>

                        <button type="submit" class=" flex-none md:flex px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition items-center shadow-md">
                            Guardar y <br> Enviar
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
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