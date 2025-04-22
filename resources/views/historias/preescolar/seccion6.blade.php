@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '35') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')
<div class="p-6">
    <!-- Encabezado de sección -->
    <div class="border-b border-gray-200 pb-4 mb-6">
        <div class="flex items-center">
            <span class="bg-[#5D7E8D] text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">6</span>
            <h2 class="text-xl font-bold text-[#1f355e]">Historia Pre y Postnatal</h2>
        </div>
        <p class="text-gray-600 ml-11 mt-1">Complete la información sobre la familia del estudiante</p>
    </div>

    <form action="#" method="POST">
        @csrf

        <!-- Datos -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Experiencia del embarazo</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="total-embarazo" class="block text-sm font-medium text-gray-700 pt-3">Mencione el numero total de embarazos:</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="total-embarazo" name="total-embarazo" required>
                </div>
            
            </div>
            <div>
                <label for="experi-embarazo" class="block text-sm font-medium text-gray-700 pt-3">En general, Como fue el embarazo?:</label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="experi-embarazo" name="experi-embarazo" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>
        </div>

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Complicaciones en el embarazo</h3>
            <div>
                <label for="mencione-embaenfe" class="block text-sm font-medium text-gray-700 pt-3">Mencione si la madre tuvo alguna enfermedad durante el embarazo o complicacion, favor de especificarla en caso de ser afirmativo. <br> Enfermedad, duracion, tratamiento. </label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="mencione-embaenfe" name="mencione-embaenfe" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>
        </div>
        <!-- .... -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Informacion del parto</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="tiempo-gestacion" class="block text-sm font-medium text-gray-700">Tiempo de gestacion:</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="tiempo-gestacion" name="tiempo-gestacion" required>
                </div>
                <div>
                    <label for="tipo-parto" class="block text-sm font-medium text-gray-700">Especifique si el trabajo de parto fue: <span class="text-red-500">*</span></label>
                    <select id="tipo-parto" name="tipo-parto" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition">
                        <option selected="true" disabled="disabled">Seleccione una opcion</option>
                        <option value="Normal">Natural</option>
                        <option value="Cesarea">Cesarea</option>
                    </select>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-3">
                <div>
                    <label for="lloro" class="block text-sm font-medium text-gray-700 pt-3">Lloro enseguida?:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="lloro" name="lloro" required>
                </div>
            </div>
            <div>
                <label for="incubadora" class="block text-sm font-medium text-gray-700 pt-3">Fue necesario colocarlo(a) en incubadora o hacer algun tratamiento inmediato al nacimiento?:</label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="incubadora" name="incubadora" required>
            </div>
            <div>
                <label for="apgar" class="block text-sm font-medium text-gray-700 pt-3">Recuerda la cilifacion (APGAR) que tuvo su hijo al nacer?:</label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="apgar" name="apgar" required>
            </div>

        </div>

        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8 gap-2">
            <a href="{{ route('preescolar.seccion5') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Anterior
            </a>

            <!-- <button type="submit" class="px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition flex items-center shadow-md">
                Guardar y Continuar
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button> -->

            <a href="{{ route('preescolar.seccion7') }}" class="px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition flex items-center shadow-md">
                Guardar y Continuar Test
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>

        </div>
    </form>
</div>

<!-- AlpineJS para la funcionalidad condicional -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
</script>
@endsection