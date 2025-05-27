@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '15') <!-- Porcentaje completado -->
@section('content')

<?php
$id_alumno = session('id_alumno');
$nombre = session('nombre');
?>


<div class=" bg-white rounded-xl shadow-lg overflow-hidden">
    @if (session('id_alumno'))
    <!-- Encabezado de sección -->
    <div class="bg-[#ff7843] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#ff7843] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">3</span>
            <h2 class="text-xl font-bold text-white">Idioma y Adopción</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre la familia del estudiante {{$nombre}} </p>
    </div>

    <form action="{{ route('seccion3.guardar') }}" method="POST" class="p-1">
        @csrf

        <!-- Idioma-->
        <div class="mb-8 border border-gray-200 rounded-lg p-4 m-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="idioma_casa" class="block text-sm font-medium text-gray-700">¿Qué idioma se habla en casa?<span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="idioma_casa" name=" idioma_casa" placeholder="Ingles, Español, etc." required>
                </div>

                <div x-data="{viveconotro: ''}">
                    <label for="personas_casa" class="block text-sm font-medium text-gray-700">Además de padres e hijos, ¿Viven otras personas en casa? <span class="text-red-500">*</span></label>
                    <div class="flex space-x-4">
                        <label class="radio-box-btn">
                            <input type="radio" name="personas_casa" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                x-model="viveconotro" required>
                            <span class="ml-2">Sí</span>
                        </label>
                        <label class="radio-box-btn">
                            <input type="radio" name="personas_casa" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                x-model="viveconotro">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                    <div id="Si" x-show="viveconotro == $el.id" x-transition>
                        <label for="quienes_casa" class="block text-sm font-medium text-gray-700">¿Quiénes?</label>
                        <input type="text" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                            id="quienes_casa" name="quienes_casa" placeholder="Ej: Abuelos, tíos, primos" :required="viveconotro === 'Si'">
                    </div>

                </div>

            </div>
        </div>

        <!-- En caso de adopcion-->
        <div class="mb-8 border border-gray-200 rounded-lg p-4 m-4">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div class="space-y-1" x-data="{isadoptado: ''}">
                    <label class="block text-sm font-medium text-gray-700">¿El niño es adoptado?<span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-2">
                        <label class="radio-box-btn">
                            <input type="radio" name="siadopcion" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" required
                                x-model="isadoptado">
                            <span class="ml-2">Sí</span>
                        </label>
                        <label class="radio-box-btn">
                            <input type="radio" name="siadopcion" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" x-model="isadoptado">
                            <span class="ml-2">No</span>
                        </label>

                        <div id="Si" x-show="isadoptado == $el.id" x-transition>

                            <label for="" class="font-medium text-sm text-gray-700">
                                Edad del niño al momento de la adopción:
                                <input type="text" class=" md:w-md px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="hijo_edadadopt" name="hijo_edadadopt" placeholder="Años/meses" :required="isadoptado === 'Si'">
                            </label>
                            <label class="flex font-medium text-sm text-gray-700 py-2">Edad de los padres al momento de la adopción</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 pt-2">
                                <label for="" class="text-sm ">
                                    Padre:
                                    <input type="number" class=" md:w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                        id="padre_edadadopt" name="padre_edadadopt" placeholder="Años" :required="isadoptado === 'Si'">
                                </label>
                                <label for="" class="text-sm ">
                                    Madre:
                                    <input type="number" class=" md:w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                        id="madre_edadadopt" name="madre_edadadopt" placeholder="Años" :required="isadoptado === 'Si'">
                                </label>
                            </div>
                        </div>

                    </div>
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