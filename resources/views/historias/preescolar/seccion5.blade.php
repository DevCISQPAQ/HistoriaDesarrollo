@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '30') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')
<div class="p-6">
    <!-- Encabezado de sección -->
    <div class="border-b border-gray-200 pb-4 mb-6">
        <div class="flex items-center">
            <span class="bg-[#5D7E8D] text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">5</span>
            <h2 class="text-xl font-bold text-[#1f355e]">Adaptacion Familiar</h2>
        </div>
        <p class="text-gray-600 ml-11 mt-1">Complete la información sobre la familia del estudiante</p>
    </div>

    <form action="#" method="POST">
        @csrf

        <!-- Datos -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Metodos de diciplina</h3>
            <div>
                <label for="metodos-diciplina" class="block text-sm font-medium text-gray-700 pt-3">Cuales son los metodos que frecuentemente se utilizan para manejar la diciplina?:</label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="metodos-diciplina" name="metodos-diciplina" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>
            <div>
                <label for="reaccion-diciplina" class="block text-sm font-medium text-gray-700 pt-3">Como reacciona ante esto el niño(a)?:</label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="reaccion-diciplina" name="reaccion-diciplina" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="vista-religioso" class="block text-sm font-medium text-gray-700 pt-3">En la educacion de su hijo(a) Toman ustedes en cuentan el punto de vista religioso?:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="vista-religioso" name="vista-religioso" required>
                </div>
                <div>
                    <label for="religioso-manera" class="block text-sm font-medium text-gray-700 pt-3">De que manera?:</label>
                    <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="religioso-manera" name="religioso-manera" placeholder="Escribe aqui la respuesta" required></textarea>
                </div>
            </div>
        </div>

        <!-- .... -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="anos-casados" class="block text-sm font-medium text-gray-700 pt-3">Cuentos años llevan casados?:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="anos-casados" name="anos-casados" required>
                </div>
                <div>
                    <label for="hubo-separacion" class="block text-sm font-medium text-gray-700 pt-3">Ha habido separacion conyugal?:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="hubo-separacion" name="hubo-separacion" required>
                </div>
                <div>
                    <label for="separacion-portrabajo" class="block text-sm font-medium text-gray-700 pt-3">Por motivos de trabajo?:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="separacion-portrabajo" name="separacion-portrabajo" required>
                </div>
                <div>
                    <label for="separacion-porsalud" class="block text-sm font-medium text-gray-700 pt-3">Por motivos de salud?:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="separacion-porsalud" name="separacion-porsalud" required>
                </div>
                <div>
                    <label for="separacion-pordesave" class="block text-sm font-medium text-gray-700 pt-3">Por desavenencia matrimonial?:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="separacion-pordesave" name="separacion-pordesave" required>
                </div>
                <div>
                    <label for="separacion-tiempo" class="block text-sm font-medium text-gray-700 pt-3">Por cuanto tiempo?:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="separacion-tiempo" name="separacion-tiempo" required>
                </div>

            </div>

        </div>

        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8 gap-2">
            <a href="{{ route('preescolar.seccion4') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center">
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

            <a href="{{ route('preescolar.seccion6') }}" class="px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition flex items-center shadow-md">
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