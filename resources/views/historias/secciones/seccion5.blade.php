@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '35') <!-- Porcentaje completado -->
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
            <span class="bg-white text-[#5D7E8D]  rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">5</span>
            <h2 class="text-xl font-bold text-white">Historia Pre y Postnatal</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre la familia del estudiante {{$id_alumno}} , {{$nombre}}</p>
    </div>

    <form action="{{ route('preescolar.seccion5.guardar') }}" method="POST" class="p-1">
        @csrf

        <!-- Datos -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <!-- <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Experiencia del embarazo</h3> -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="total_embarazo" class="block text-sm font-medium text-gray-700 ">Mencione el número total de embarazos<span class="text-red-500">*</span></label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="total_embarazo" name="total_embarazo" placeholder="Cantidad" required>
                </div>

            </div>
            <div>
                <label for="experi_embarazo" class="block text-sm font-medium text-gray-700 pt-3">En general, ¿como fue el embarazo?<span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="experi_embarazo" name="experi_embarazo" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>
        </div>

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <!-- <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Complicaciones en el embarazo</h3> -->
            <div>
                <label for="mencione_embaenfe" class="block text-sm font-medium text-gray-700 ">Mencione si la madre tuvo alguna enfermedad o complicaciónes durante el embarazo.<span class="text-red-500">*</span> </label>
                <label class="inline-flex items-center border rounded-lg px-4 py-2 mt-2 hover:bg-gray-50 cursor-pointer">
                    <input type="radio" name="mencione_embaenfe" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" required>
                    <span class="ml-2">Sí</span>
                </label>
                <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                    <input type="radio" name="mencione_embaenfe" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                    <span class="ml-2">No</span>
                </label>

            </div>
        </div>
        <!-- .... -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <!-- <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Informacion del parto</h3> -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="tiempo_gestacion" class="block text-sm font-medium text-gray-700">Tiempo de gestación <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="tiempo_gestacion" name="tiempo_gestacion" placeholder="Horas, minutos" required>
                </div>
                <div>
                    <label for="tipo_parto" class="block text-sm font-medium text-gray-700">Especifique si el trabajo de parto fue: <span class="text-red-500">*</span></label>
                    <select id="tipo_parto" name="tipo_parto" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition">
                        <option selected="true" disabled="disabled">Seleccione una opcion</option>
                        <option value="Normal">Natural</option>
                        <option value="Cesarea">Cesárea</option>
                    </select>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4">
                <div>
                    <label for="lloro" class="block text-sm font-medium text-gray-700 pt-3 pb-2">¿Lloró enseguida? <span class="text-red-500">*</span></label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <input type="radio" name="lloro" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <input type="radio" name="lloro" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">No</span>
                    </label>
                </div>

                <div>
                    <label for="incubadora" class="block text-sm font-medium text-gray-700 pt-3 pb-2">¿Fue necesario colocarlo(a) en incubadora o hacer algún tratamiento inmediato al nacimiento? <span class="text-red-500">*</span></label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <input type="radio" name="incubadora" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <input type="radio" name="incubadora" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">No</span>
                    </label>
                </div>

            </div>
            <div>
                <label for="apgar" class="block text-sm font-medium text-gray-700 pt-4">¿Recuerda la calificación (APGAR) que tuvo su hijo(a) al nacer? <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="apgar" name="apgar" required>
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
</div>

<!-- AlpineJS para la funcionalidad condicional -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection