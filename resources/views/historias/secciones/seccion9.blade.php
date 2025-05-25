@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '65') <!-- Porcentaje completado -->
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
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">9</span>
            <h2 class="text-xl font-bold text-white">Sueño</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre el estudiante {{$nombre}}</p>
    </div>

    <form action="{{ route('seccion9.guardar') }}" method="POST" class="p-1">
        @csrf

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <!--Describre lenguaje -->
            <label class="inline-flex items-center"> Marque las características que presenta el sueño del menor <span class="text-red-500">*</span></label>
            @error('suenonino')
            <p class="mt-2 text-sm font-semibold text-red-700 bg-red-100 border border-red-400 rounded-md px-3 py-2">
                Es necesario seleccionar al menos uno</p>
            @enderror
            <!-- Check box options -->
            <div class=" grid grid-cols-1 md:grid-cols-3 gap-2 pt-2">
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Continuo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Continuo</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Inquieto" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Inquieto</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Habla dormido" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Habla dormido</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Despierta excitado" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Despierta excitado</span>
                </label>

                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Tiene pesadillas" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Tiene pesadillas</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Despierta con frecuencia" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Despierta con frecuencia</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Despierta llorando" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Despierta llorando</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Se hace pipí" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Se hace pipí</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Se hace popo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Se hace popó</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Despierta gritando" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Despierta gritando</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Presenta insomnio" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Presenta insomnio</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Duerme solo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Duerme solo</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Duerme acompañado" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Duerme acompañado</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Se despierta de mal humor" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Se despierta de mal humor</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Presenta sonambulismo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Presenta sonambulismo</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Tiene temor a dormir solo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Tiene temor a dormir solo</span>
                </label>
                <label class="radio-box-btn">
                    <input type="checkbox" name="suenonino[]" value="Se pasa a media noche a la cama de sus papás" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                    <span class="ml-2">Se pasa a media noche a la cama de sus papás</span>
                </label>
            </div>
        </div>

        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <!-- Hora siesta -->
            <div class="pt-1 md:w-1/2">
                <div>
                    <label for="horadecama" class="block text-sm font-medium text-gray-700 pt-3">¿A qué hora se acuesta por la noche? <span class="text-red-500">*</span></label>
                    <input type="time" class="w-full md:w-lg px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="horadecama" name="horadecama" required>
                </div>
                <div>
                    <label for="horadespierta" class="block text-sm font-medium text-gray-700 pt-3">¿A qué hora se despierta? <span class="text-red-500">*</span></label>
                    <input type="time" class="w-full md:w-lg px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="horadespierta" name="horadespierta" required>
                </div>
            </div>
            <!-- si duerme con -->
            <div>
                <div class="space-y-1" x-data="{sidusiesta: ''}">
                    <label for="dusiesta" class="block text-sm font-medium text-gray-700 pt-3">¿Duerme siesta? <span class="text-red-500">*</span></label>
                    <label class="radio-box-btn">
                        <input type="radio" name="dusiesta" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" required
                            x-model="sidusiesta">
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="dusiesta" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" x-model="sidusiesta">
                        <span class="ml-2">No</span>
                    </label>

                    <div id="Si" x-show="sidusiesta == $el.id" x-transition>
                        <label for="horasiesta" class="block text-sm font-medium text-gray-700 pt-3">¿Cuántas horas?</label>
                        <input type="text" class="w-md px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                            id="horasiesta" name="horasiesta" placeholder="Horas" :required="sidusiesta === 'Si'">
                    </div>
                </div>
                <div class="space-y-1" x-data="{sicohabitacion: ''}">
                    <label for="cohabitacion" class="block text-sm font-medium text-gray-700 pt-3">¿Comparte su habitación? <span class="text-red-500">*</span></label>
                    <label class="radio-box-btn">
                        <input type="radio" name="cohabitacion" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" required
                            x-model="sicohabitacion">
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="cohabitacion" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" x-model="sicohabitacion">
                        <span class="ml-2">No</span>
                    </label>
                    <div id="Si" x-show="sicohabitacion == $el.id" x-transition>
                        <label for="conquien" class="block text-sm font-medium text-gray-700 pt-3">¿Con quien?</label>
                        <input type="text" class="w-md px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                            id="conquien" name="conquien" placeholder="Indique con quién comparte habitación" :required="sicohabitacion === 'Si'">
                    </div>
                </div>
                <div>
                    <label for="cocama" class="block text-sm font-medium text-gray-700 pt-3">¿Comparte la cama? <span class="text-red-500">*</span></label>
                    <label class="radio-box-btn">
                        <input type="radio" name="cocama" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" required>
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="radio-box-btn">
                        <input type="radio" name="cocama" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                        <span class="ml-2">No</span>
                    </label>
                </div>
                <div>
                    <label for="edad_dupapa" class="block text-sm font-medium text-gray-700 pt-3">¿Hasta qué edad durmió con los papás? <span class="text-red-500">*</span></label>
                    <input type="text" class="md:w-md px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_dupapa" name="edad_dupapa" placeholder="Años" required>
                </div>
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