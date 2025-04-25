@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '50') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Encabezado de sección -->
    <div class="bg-[#667c87] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">7</span>
            <h2 class="text-xl font-bold text-white">Desarrollo motor</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre el estudiante</p>
    </div>

    <form action="#" method="POST">
        @csrf

        <!-- Datos -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Desarrollo motor del hijo(a)</h3>
            <label class="block text-sm font-medium text-gray-700 pb-3">Como describiria el desarrollo motor del niño(a)? <span class="text-red-500">*</span></label>

            <div class="md:flex-1">
                <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                    <span class="mr-2">Despues de lo esperado para la edad</span>
                    <input type="radio" name="desarrollo-motor" value="Despues de lo esperado para la edad" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                </label>
                <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                    <span class="mr-2">Esperado para la edad</span>
                    <input type="radio" name="desarrollo-motor" value="Esperado para la edad" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                </label>
                <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                    <span class="mr-2">Antes de lo esperado</span>
                    <input type="radio" name="desarrollo-motor" value="Antes de lo esperado" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                </label>
            </div>
        </div>

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Primeros pasos del hijo(a)</h3>
            <label for="desa-visual" class="block text-sm font-medium text-gray-700 pt-3">Mencione la edad en que comenzo a:</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-3">
                <div>
                    <label for="edad-gate" class="block text-sm font-medium text-gray-700 pt-3">Gatear:</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad-gate" name="edad-gate" required>
                </div>
                <div>
                    <label for="edad-cami" class="block text-sm font-medium text-gray-700 pt-3">Caminar:</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad-cami" name="edad-cami" required>
                </div>
            </div>
            <div>
                <label for="dies-zurdhijo" class="block text-sm font-medium text-gray-700 pt-3">Es diestro(a) o zurdo(a)? <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="dies-zurdhijo" name="dies-zurdhijo" placeholder="Diestro(a)/zurdo(a)" required>
            </div>
        </div>

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Coordinacion del hijo(a)</h3>
            <!--Coordina -->
            
            <!--Balance -->
            
            <div>
                <label for="prac-deporte" class="block text-sm font-medium text-gray-700 pt-3">Que tipo de actividad le interesa asu hijo?<span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="prac-deporte" name="prac-deporte" placeholder="Hobbies, Lecturas, Deportes, etc." required>
            </div>
        </div>


        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8 gap-2 m-4">
            <a href="{{ route('preescolar.seccion6') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center">
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

            <a href="{{ route('preescolar.seccion8') }}" class="px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition flex items-center shadow-md">
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