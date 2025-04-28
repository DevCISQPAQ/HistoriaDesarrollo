@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '20') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')

<?php
$id_estudiante = session('estudiante_id');
$nombre_estudiante = session('nombre_estudiante')
?>


<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Encabezado de sección -->
    <div class="bg-[#1f355e] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">4</span>
            <h2 class="text-xl font-bold text-white">Dinámica Familiar</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre la familia del estudiante {{$id_estudiante }} , {{$nombre_estudiante}} </p>
    </div>

    <form action="{{ route('preescolar.seccion4.guardar') }}" method="POST" class="p-6">
        @csrf

        <!-- Adaptacion -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Adaptación</h3>
            <div> <!-- radiobutton -->
                <label class="block text-sm font-medium text-gray-700 py-2">¿Cómo calificaría la adaptación general de su hijo(a) en la casa? <span class="text-red-500">*</span></label>
                <div class="md:flex-1">
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <span class="mr-2">Inadecuada</span>
                        <input type="radio" name="califica_adaptacion" value="Inadecuada" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <span class="mr-2">Regular</span>
                        <input type="radio" name="califica_adaptacion" value="Regular" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <span class="mr-2">Adecuada</span>
                        <input type="radio" name="califica_adaptacion" value="Adecuada" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <span class="mr-2">Excelente</span>
                        <input type="radio" name="califica_adaptacion" value="Excelente" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                    </label>
                </div>
                <div>
                    <label for="califica-adaptacion-porq" class="block text-sm font-medium text-gray-700 pt-3">Por qué? <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="califica-adaptacion-porq" name="califica_adaptacion_porq" required>
                </div>
            </div>
        </div>

        <!-- Describa la relacion.... -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Relacion de su hijo(a) con los demas</h3>
            <label for="relacion_familia" class="block text-sm font-medium text-gray-700">Describa la relacion de su hijo con cada mienbro de la familia</label>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="rrelacion_familia_madre" class="block text-sm font-medium text-gray-700 pt-3">Madre <span class="text-red-500">*</span></label>
                    <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="relacion_familia_madre" name="relacion_familia_madre" placeholder="Escribe aqui la respuesta" required></textarea>
                </div>
                <div>
                    <label for="relacion_familia_padre" class="block text-sm font-medium text-gray-700 pt-3">Padre <span class="text-red-500">*</span></label>
                    <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="relacion_familia_padre" name="relacion_familia_padre" placeholder="Escribe aqui la respuesta" required></textarea>
                </div>
                <div>
                    <label for="relacion_familia_hermanos" class="block text-sm font-medium text-gray-700 pt-3">Hermanos <span class="text-red-500">*</span></label>
                    <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="relacion_familia_hermanos" name="relacion_familia_hermanos" placeholder="Escribe aqui la respuesta" required></textarea>
                </div>
            </div>
        </div>

        <!-- Describa criterio.... -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Criterios en la relacion familiar</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="diferencia_estilos" class="block text-sm font-medium text-gray-700 pt-3">Al presentarse alguna diferencia referente a los estilos de diciplina entre ellos, Como se maneja tal desacuerdo? <span class="text-red-500">*</span></label>
                    <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="diferencia_estilos" name="diferencia_estilos" placeholder="Escribe aqui la respuesta" required></textarea>
                </div>
            </div>
        </div>

        <!-- Dinamica familiar preguntas 6,7,8... -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Conductas del hijo(a)</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="responde_desobede" class="block text-sm font-medium text-gray-700 pt-3">Como responden, usted y su conyuge, cuando su hijo(a) desobedece a sus indicaciones?<span class="text-red-500">*</span></label>
                    <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="responde_desobede" name="responde_desobede" placeholder="Escribe aqui la respuesta" required></textarea>
                </div>
                <div>
                    <label for="sanciones_casa" class="block text-sm font-medium text-gray-700 pt-3">Cuales son las sanciones que comunmente se manejan en casa y como responde su hijo(a) ante ellas?<span class="text-red-500">*</span></label>
                    <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="sanciones_casa" name="sanciones_casa" placeholder="Escribe aqui la respuesta" required></textarea>
                </div>
            </div>
            <div>
                <label for="sanciones_conductas" class="block text-sm font-medium text-gray-700 pt-3">Las conductas que se sancionas son<span class="text-red-500">*</span></label>
                <textarea rows="1" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="sanciones_conductas" name="sanciones_conductas" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>
        </div>

        <!-- Datos-->
        <div class="mb-8 border border-gray-200 rounded-lg p-4 m-4">
            <!-- <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Datos</h3> -->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="docil_desafiante" class="block text-sm font-medium text-gray-700 pt-3">Considera que su hijo(a) es docil a las normas que se le marcan o suele ser desafiante al respecto?<span class="text-red-500">*</span></label>
                    <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="docil_desafiante" name="docil_desafiante" placeholder="Escribe aqui la respuesta" required></textarea>
                </div>
                <div>
                    <label for="evento_traumatico" class="block text-sm font-medium text-gray-700 pt-3">Ha habido algun evento traumatico o significativo en la familia durante el desarrollo de su hijo(a)? Describa<span class="text-red-500">*</span></label>
                    <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="evento_traumatico" name="evento_traumatico" placeholder="Escribe aqui la respuesta" required></textarea>
                </div>
            </div>
        </div>

        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8 gap-2 m-4">
            <button type="button" onclick="history.back()" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Regresar
            </button>

            <!-- <a href="{{ route('preescolar.seccion3') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Anterior
            </a> -->

            <button type="submit" class="px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition flex items-center shadow-md">
                Guardar y Continuar
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

        </div>
    </form>
</div>

<!-- AlpineJS para la funcionalidad condicional -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
</script>
@endsection