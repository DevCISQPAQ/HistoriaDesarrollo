@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '100') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')

<?php
$id_alumno = session('id_alumno');
$nombre = session('nombre');
?>


<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Encabezado de sección -->
    <div class="bg-[#667c87] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">13</span>
            <h2 class="text-xl font-bold text-white">Fin de formulario</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Gracias por terminar el formulario para el alumno {{$id_alumno }} , {{$nombre}}</p>
    </div>

    <form action="{{ route('preescolar.seccion13.guardar') }}" method="POST" class="p-1">
        @csrf

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">CONFORMIDAD
                SOBRE EL PROCESO DE ADMISIÓN </h3>

            <p class="text-justify text-[#1f355e] mt-1">Manifiesto bajo protesta de decir la verdad que toda la información proporcionada es verdadera y completa, que no omití
                detalles significativos sobre el desarrollo de mi hijo(a). Por lo que de haber omitido algún dato significativo que pueda incidir en su proceso de aprendizaje, libero de toda responsabilidad al colegio, al no haberle proporcionado toda la información necesaria, a fin de atender los requerimientos educativos que presenta mi hijo(a). Comprometiéndome a mantener actualizada la historia de desarrollo de mi hijo(a), durante su estancia en esta Institución educativa. Acepto que los resultados de la valoración de admisión sean confidenciales y para uso exclusivo del colegio. La aplicacion de dichos exámenes no garantiza la admision de mi hijo(a), la cual implica una decisión inapelable del Consejo de Admisiones, así como disponibilidad de cupo.
                <br>
                <br>
                De igual forma, manifiesto que me fue debidamente informado sobre el Aviso de Privacidad con que cuenta el Colegio, y que
                puede ser consultado en la página de internet: <span> <a href="https://www.semperaltius.edu.mx/aviso-de-privacidad"> www.semperaltius.edu.mx/aviso-de-privacidad</a></span>
            </p>


            <div class="md:col-span-2 pt-4">
                <label class="block text-sm font-medium text-gray-700">Accepto los terminos de conformidad del proceso de admision<span class="text-red-500">*</span></label>
                <div class="flex space-x-4 mt-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="acepto_terminos" value="Accepto" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded" required>
                        <span class="ml-2">Accepto</span>
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
                Guardar y Enviar
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </form>
</div>

<!-- AlpineJS para la funcionalidad condicional -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

@endsection