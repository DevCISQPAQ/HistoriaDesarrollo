@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '90') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')

<?php
$id_alumno = session('id_alumno');
$nombre = session('nombre');
?>


<div class=" bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Encabezado de sección -->
    <div class="bg-[#1f355e] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">12</span>
            <h2 class="text-xl font-bold text-white">Historia Escolar</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre el estudiante {{$id_alumno }} , {{$nombre}}</p>
    </div>

    <form action="{{ route('seccion12.guardar') }}" method="POST" class="p-1">
        @csrf

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <!-- <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Experiencia escolar</h3> -->
            <div>
                <label for="reaccprimer" class="block text-sm font-medium text-gray-700 ">¿Cómo reaccionó en su primer ingreso a la escuela? <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="reaccprimer" name="reaccprimer" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>

            <div>
                <label for="dificumateria" class="block text-sm font-medium text-gray-700 pt-3">¿Ha tenido alguna dificultad para aprender alguna materia? <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="dificumateria" name="dificumateria" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>


        </div>

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <!-- opciones de si repitio -->
            <div x-data="{harepetido: ''}">
                <label class="block text-sm font-medium text-gray-700 mb-2">¿Ha repetido algun año? <span class="text-red-500">*</span></label>

                <div class="flex space-x-4 pb-4">
                    <label class="radio-box-btn">
                        <input type="radio" name="ha_repetido" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                            x-model="harepetido">
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="ha_repetido" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                            x-model="harepetido">
                        <span class="ml-2">No</span>
                    </label>
                </div>

                <!-- Motivos  -->
                <div id="Si" x-show="harepetido == $el.id" x-transition>
                    <label for="cual_escuela" class="block text-sm font-medium text-gray-700">¿Cuál?</label>
                    <input class="w-md px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="cual_escuela" name="cual_escuela"></textarea>
                </div>

                <!-- -->
                <div class="pt-2" id="Si" x-show="harepetido == $el.id" x-transition>
                    <label for="porque_escuela" class="block text-sm font-medium text-gray-700">¿Por qué motivo?</label>
                    <textarea type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="porque_escuela" name="porque_escuela" rows="3"></textarea>
                </div>
            </div>

            <div>
                <label for="puedeperiodolarg" class="block text-sm font-medium text-gray-700 pt-3">¿Puede concentrarse por periodos largos? <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="puedeperiodolarg" name="puedeperiodolarg" required>
            </div>

            <div>
                <label for="conductaambito" class="block text-sm font-medium text-gray-700 pt-3">¿Cómo ha sido la conducta general a su hijo(a) en el ámbito escolar? <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="conductaambito" name="conductaambito" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>
        </div>

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">

            @if(session('grado')==='primaria_secundaria')
            <div class="pb-3 grid grid-cols-1 md:grid-cols-2 gap-2">
                <div>
                    <label for="nivel_lectura" class="block text-sm font-medium text-gray-700 pt-3">¿Cuál es su nivel de lectura? <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="nivel_lectura" name="nivel_lectura">
                </div>

                <div>
                    <label for="nivel_escritura" class="block text-sm font-medium text-gray-700 pt-3">¿Cuál es su nivel de escritura? <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="nivel_escritura" name="nivel_escritura">
                </div>
                <!--  -->
                <div>
                    <label for="dificultad_tarea" class="block text-sm font-medium text-gray-700 pt-3">¿Tiene dificultad para hacer tarea? <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="dificultad_tarea" name="dificultad_tarea">
                </div>

                <div>
                    <label for="relacion_maestro" class="block text-sm font-medium text-gray-700 pt-3">¿Cómo es la relación con maestros y compañeros? <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="relacion_maestro" name="relacion_maestro">
                </div>
                <!--  -->
            </div>
            @endif
            <!-- opciones de si dificultad -->
            <div x-data="{haydificultad: ''}">
                <label class="block text-sm font-medium text-gray-700 mb-2">¿Ha presentado dificultad en la pronunciacion de alguna letra? <span class="text-red-500">*</span></label>

                <div class="flex space-x-4 pb-4">
                    <label class="radio-box-btn">
                        <input type="radio" name="hay_dific" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                            x-model="haydificultad">
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="hay_dific" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                            x-model="haydificultad">
                        <span class="ml-2">No</span>
                    </label>
                </div>

                <!-- Motivos  -->
                <div id="Si" x-show="haydificultad == $el.id" x-transition>
                    <label for="cual_letra" class="block text-sm font-medium text-gray-700">¿Cuáles?</label>
                    <input class="w-md px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="cual_letra" name="cual_letra"></textarea>
                </div>
            </div>

            <div>
                <label for="maneingles" class="block text-sm font-medium text-gray-700 pt-3">¿Maneja el idioma Inglés? <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="maneingles" name="maneingles" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2 pt-4">¿Cómo calificaría el desempeño académico general de su hijo(a)? <span class="text-red-500">*</span></label>
                <div class="flex space-x-4 pb-4">
                    <label class="radio-box-btn">
                        <input type="radio" name="cali_desemp" value="Sobresaliente" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">Sobresaliente</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="cali_desemp" value="Promedio" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">Promedio</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="cali_desemp" value="Deficiente" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">Deficiente</span>
                    </label>
                </div>

                <!-- Motivos  -->
                <div>
                    <label for="porq_desemp" class="block text-sm font-medium text-gray-700">¿Por qué?</label>
                    <input class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="porq_desemp" name="porq_desemp"></textarea>
                </div>
            </div>
        </div>

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <div>
                <label for="motivoscamb" class="block text-sm font-medium text-gray-700 pt-3">¿Cuáles son los principales motivos que los orientaron a buscar un cambio de escuela? <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="motivoscamb" name="motivoscamb" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>
            <div>
                <label for="razoning" class="block text-sm font-medium text-gray-700 pt-3">Mencione las razones por las que desea que su hijo(a) ingrese a este colegio: <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="razoning" name="razoning" placeholder="Escribe aqui la respuesta" required></textarea>
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

</script>
@endsection