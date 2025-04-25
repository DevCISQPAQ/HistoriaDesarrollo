@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '15') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')

<?php
$id_estudiante = session('estudiante_id')
?>


<div class=" bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Encabezado de sección -->
    <div class="bg-[#ff7843] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#ff7843] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">3</span>
            <h2 class="text-xl font-bold text-white">Hermanos</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre la familia del estudiante {{$id_estudiante }}</p>
    </div>

    <form action="{{ route('preescolar.seccion3.guardar') }}" method="POST" class="p-6">
        @csrf

        <!-- Datos del hermano -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 m-4 relative overflow-x-auto">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Datos de los Hermanos <span class="text-red-500">*</span></h3>

            <table class="w-full text-sm text-left rtl:text-right text-gray-700 ">
                <thead class=" text-xs text-white uppercase bg-gray-50 bg-primary">
                    <tr>
                        <th scope="col" class="border border-gray-300 px-3 ">Nombre</th>
                        <th scope="col" class="border border-gray-300 px-3 ">Edad</th>
                        <th scope="col" class="border border-gray-300 px-3 ">Año escolar u <br> ocupacion</th>
                        <th scope="col" class="border border-gray-300 px-3 ">Escuela</th>
                        <th scope="col" class="border border-gray-300 px-3 ">Salud</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="nombre_hermano" name="nombre_hermano[]">
                        </td>
                        <td class="">
                            <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="edad_hermano" name="edad_hermano[]">
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escolar_ocupacion" name="escolar_ocupacion[]">
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escuela_hermano" name="escuela_hermano[]">
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="salud_hermano" name="salud_hermano[]">
                        </td>
                    </tr>
                    <tr>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="nombre_hermano" name="nombre_hermano[]">
                        </td>
                        <td class="">
                            <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="edad_hermano" name="edad_hermano[]">
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escolar_ocupacion" name="escolar_ocupacion[]">
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escuela_hermano" name="escuela_hermano[]">
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="salud_hermano" name="salud_hermano[]">
                        </td>
                    </tr>
                    <tr>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="nombre_hermano" name="nombre_hermano[]">
                        </td>
                        <td class="">
                            <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="edad_hermano" name="edad_hermano[]">
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escolar_ocupacion" name="escolar_ocupacion[]">
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escuela_hermano" name="escuela_hermano[]">
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="salud_hermano" name="salud_hermano[]">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Idioma-->
        <div class="mb-8 border border-gray-200 rounded-lg p-4 m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Idioma hablado en casa</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="idioma_casa" class="block text-sm font-medium text-gray-700">Que idioma se habla en casa <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="idioma_casa" name=" idioma_casa" placeholder="Ingles, Español, etc." required>
                </div>

                <div x-data="{viveconotro: ''}">
                    <label for="personas_casa" class="block text-sm font-medium text-gray-700">Ademas de padres e hijos, Viven otras personas en casa? <span class="text-red-500">*</span></label>
                    <div class="flex space-x-4">
                        
                        <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="personas_casa" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                x-model="viveconotro">
                            <span class="ml-2">Sí</span>
                        </label>
                        <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="personas_casa" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                x-model="viveconotro">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                    <div id="Si" x-show="viveconotro == $el.id" x-transition>
                        <label for="quienes_casa" class="block text-sm font-medium text-gray-700">Quienes?</label>
                        <input type="text" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                            id="quienes_casa" name="quienes_casa" placeholder="Abuenos, Tios, Primos, etc.">
                    </div>

                </div>

            </div>
        </div>

        <!-- En caso de adopcion-->
        <div class="mb-8 border border-gray-200 rounded-lg p-4 m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">En caso de Adopcion</h3>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">El niño es adoptado<span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-3 gap-2">
                        <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="siadopcion" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]" required>
                            <span class="ml-2">Si</span>
                        </label>
                        <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="siadopcion" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                            <span class="ml-2">No</span>
                        </label>

                    </div>
                </div>

            </div>
        </div>

        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8 m-4">
            <button type="button" onclick="history.back()" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Regresar
            </button>

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
@endsection