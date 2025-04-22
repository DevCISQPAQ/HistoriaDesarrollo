@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '55') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')
<div class="p-6">
    <!-- Encabezado de sección -->
    <div class="border-b border-gray-200 pb-4 mb-6">
        <div class="flex items-center">
            <span class="bg-[#5D7E8D] text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">9</span>
            <h2 class="text-xl font-bold text-[#1f355e]">Lenguaje</h2>
        </div>
        <p class="text-gray-600 ml-11 mt-1">Complete la información sobre el estudiante</p>
    </div>

    <form action="#" method="POST">
        @csrf

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Lenguaje del niño(a)</h3>
            <!--Describre lenguaje -->
            <div>
                <label class="block text-sm font-medium text-gray-700 pb-3">Como describiria el desarrollo del habla y lenguaje del niño(a)?</label>
                <div class="md:flex-1">
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <span class="mr-2">Despues de lo esperado para la edad</span>
                        <input type="radio" name="desarrollo-lenguaje" value="Despues de lo esperado para la edad" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <span class="mr-2">Esperado para la edad</span>
                        <input type="radio" name="desarrollo-lenguaje" value="Esperado para la edad" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                        <span class="mr-2">Antes de lo esperado</span>
                        <input type="radio" name="desarrollo-lenguaje" value="Antes de lo esperado" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                    </label>
                </div>
            </div>
            
            <div>
                <label for="prim-palabra" class="block text-sm font-medium text-gray-700 pt-3">A que edad dijo sus primeras palabras?:</label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="prim-palabra" name="prim-palabra" required>
            </div>
        </div>


        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8 gap-2">
            <a href="{{ route('preescolar.seccion8') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center">
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

            <a href="{{ route('preescolar.seccion10') }}" class="px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition flex items-center shadow-md">
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