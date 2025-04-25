@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '65') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Encabezado de sección -->
    <div class="bg-[#667c87] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">9</span>
            <h2 class="text-xl font-bold text-white">Sueño</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre el estudiante</p>
    </div>

    <form action="#" method="POST">
        @csrf

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Sueño del hijo(a)</h3>
            <!--Describre lenguaje -->
            <label class="inline-flex items-center"> Marque las caracteristicas que presenta el sueño del menor</label>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-2">
                <div class="space-y-2">
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Continuo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Continuo</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Inquieto" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Inquieto</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Habla dormido" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Habla dormido</span>
                    </label>
                </div>
                <div class="space-y-2">
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Despierta excitado" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Despierta excitado</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Tiene pesadillas" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Tiene pesadillas</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Despierta con frecuencia" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Despierta con frecuencia</span>
                    </label>
                </div>
                <div class="space-y-2">
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Despierta llorando" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Despierta llorando</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Se hace pipi" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Se hace pipi</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Se hace popo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Se hace popo</span>
                    </label>
                </div>
                <div class="space-y-2">
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Despierta gritando" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Despierta gritando</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Presenta insomnio" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Presenta insomnio</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Duerme solo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Duerme solo</span>
                    </label>
                </div>
                <div class="space-y-2">
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Duerme acompañado" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Duerme acompañado</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Se despierta de mal humor" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Se despierta de mal humor</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Presenta sonambulismo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Presenta sonambulismo</span>
                    </label>
                </div>
                <div class="space-y-2">
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Tiene temor a dormir solo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Tiene temor a dormir solo</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="suenonino[]" value="Se pasa a media noche a la cama de sus papas" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Se pasa a media noche a la cama de sus papas</span>
                    </label>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 pt-6">
                <div>
                    <label for="horadecama" class="block text-sm font-medium text-gray-700 pt-3">A que hora se acuesta por la noche?</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="horadecama" name="horadecama" required>
                </div>
                <div>
                    <label for="horadespierta" class="block text-sm font-medium text-gray-700 pt-3">A que hora se despierta?</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="horadespierta" name="horadespierta" required>
                </div>
                <div>
                    <label for="dusiesta" class="block text-sm font-medium text-gray-700 pt-3">Duerme siesta?</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="dusiesta" name="dusiesta" required>
                </div>
                <div>
                    <label for="horasiesta" class="block text-sm font-medium text-gray-700 pt-3">Cuentas horas?</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="horasiesta" name="horasiesta" required>
                </div>
                <div>
                    <label for="cohabitacion" class="block text-sm font-medium text-gray-700 pt-3">Comparte habitacion?</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="cohabitacion" name="cohabitacion" required>
                </div>
                <div>
                    <label for="conquien" class="block text-sm font-medium text-gray-700 pt-3">Con quien?</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="conquien" name="conquien" required>
                </div>
                <div>
                    <label for="cocama" class="block text-sm font-medium text-gray-700 pt-3">Comparte la cama?</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="cocama" name="cocama" required>
                </div>
                <div>
                    <label for="edad-dupapa" class="block text-sm font-medium text-gray-700 pt-3">Hasta que edad durmio con los papas?</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad-dupapa" name="edad-dupapa" required>
                </div>
            </div>
        </div>

        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8 gap-2 m-4">
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