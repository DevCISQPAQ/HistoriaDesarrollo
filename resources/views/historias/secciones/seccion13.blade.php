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
        <div x-data="{ enviado: {{ session()->has('formulario_aceptado') ? 'true' : 'false' }}, enviando: false  }">
            <div
                x-show="enviando"
                class="fixed inset-0 bg-white bg-opacity-70 flex items-center justify-center z-50"
                style="display: none;">
                <div class="bg-white px-10 py-6 rounded-xl shadow-xl text-center flex items-center space-x-4 border border-orange-200">
                    <svg class="animate-spin h-8 w-8 text-orange-500" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
                    </svg>
                    <span class="text-xl font-semibold text-gray-700">Enviando formulario...</span>
                </div>
            </div>
            <form
                x-show="!enviado"
                @submit.prevent="enviando = true; $el.submit();"
                action="{{ route('seccion13.guardar') }}"
                method="POST" class="p-1">
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
            @if(session('formulario_aceptado'))
            <div class="flex justify-center mt-6">
                <a href="{{ url('/') }}"
                    class="inline-block px-6 py-4 mb-4 bg-[#ff7843] text-white font-semibold rounded-lg shadow-md hover:bg-[#ffaf25] transition duration-300">
                    Volver al inicio
                </a>
            </div>
            @endif
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