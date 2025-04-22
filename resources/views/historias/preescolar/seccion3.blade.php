@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '15') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')
<div class="p-6">
    <!-- Encabezado de sección -->
    <div class="border-b border-gray-200 pb-4 mb-6">
        <div class="flex items-center">
            <span class="bg-[#5D7E8D] text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">3</span>
            <h2 class="text-xl font-bold text-[#1f355e]">Hermanos</h2>
        </div>
        <p class="text-gray-600 ml-11 mt-1">Complete la información sobre la familia del estudiante</p>
    </div>

    <form action="#" method="POST">
        @csrf

        <!-- Datos del hermano -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Datos de los Hermanos</h3>

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
                                id="nombre_hermano" name="nombre_hermano" required>
                        </td>
                        <td class="">
                            <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="edad_hermano" name="edad_hermano" required>
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escolar-ocupacion" name="escolar-ocupacion" required>
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escuela_hermano" name="escuela_hermano" required>
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="salud_hermano" name="salud_hermano" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="nombre_hermano" name="nombre_hermano" required>
                        </td>
                        <td class="">
                            <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="edad_hermano" name="edad_hermano" required>
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escolar-ocupacion" name="escolar-ocupacion" required>
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escuela_hermano" name="escuela_hermano" required>
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="salud_hermano" name="salud_hermano" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="nombre_hermano" name="nombre_hermano" required>
                        </td>
                        <td class="">
                            <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="edad_hermano" name="edad_hermano" required>
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escolar-ocupacion" name="escolar-ocupacion" required>
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="escuela_hermano" name="escuela_hermano" required>
                        </td>
                        <td class="">
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="salud_hermano" name="salud_hermano" required>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Datos-->
        <div class="mb-8 border border-gray-200 rounded-lg p-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Idioma hablado en casa</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="idioma-casa" class="block text-sm font-medium text-gray-700">Que idioma se habla en casa:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="idioma-casa"" name=" idioma-casa"" required>
                </div>
                <div>
                    <label for="personas-casa" class="block text-sm font-medium text-gray-700">Ademas de padres e hijos, Viven otras personas en casa?</label>
                    <input type="text" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="personas-casa" name="personas-casa" required>
                </div>
                <div>
                    <label for="quienes-casa" class="block text-sm font-medium text-gray-700">Quienes?</label>
                    <input type="text" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="quienes-casa" name="quienes-casa" required>
                </div>
            </div>
        </div>


        <!-- En caso de adopcion-->
        <div class="mb-8 border border-gray-200 rounded-lg p-4">
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

        <!-- Si vive con tutor-->
        <div class="mb-8 border border-gray-200 rounded-lg p-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Persona con la que vive</h3>
            <p class="text-sm font-medium text-gray-700 pb-4">Si se trata de una familia reconstructiva(padre o madre vuelto a casar por viudez, divorcio, etc) escribir los datos de la persona (diferente al padre o a la madre de origen), con quien vive el nino(a) actualmente</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <div>
                    <label for="nombre-situtor" class="block text-sm font-medium text-gray-700">Nombre:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="nombre-situtor" name="nombre-situtor" required>
                </div>
                <div>
                    <label for="edad-situtor" class="block text-sm font-medium text-gray-700">Edad:</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad-situtor" name="edad-situtor" required>
                </div>
                <div>
                    <label for="escolaridad-situtor" class="block text-sm font-medium text-gray-700">Escolaridad:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="escolaridad-situtor" name="escolaridad-situtor" required>
                </div>
                <div>
                    <label for="ocupacion-situtor" class="block text-sm font-medium text-gray-700">Ocupacion:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="ocupacion-situtor" name="ocupacion-situtor" required>
                </div>
                <div>
                    <label for="parentesco-situtor" class="block text-sm font-medium text-gray-700">Parentesco con el niño(a):</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="parentesco-situtor" name="parentesco-situtor" required>
                </div>
                <div>
                    <label for="tel-ofi-situtor" class="block text-sm font-medium text-gray-700">Telefono de oficina:</label>
                    <input type="tel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="tel-ofi-situtor" name="tel-ofi-situtor" required>
                </div>
                <div>
                    <label for="tel-casa-situtor" class="block text-sm font-medium text-gray-700">Telefono de casa:</label>
                    <input type="tel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="tel-casa-situtor" name="tel-casa-situtor" required>
                </div>
                <div>
                    <label for="tel-cell-situtor" class="block text-sm font-medium text-gray-700">Telefono de celular:</label>
                    <input type="tel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="tel-cell-situtor" name="tel-cell-situtor" required>
                </div>
            </div>

            <div class="py-2">
                <label for="noviveconpadres-situtor" class="block text-sm font-medium text-gray-700">En caso de que el niño(a) no viva con algunos de los padres, escriba el nombre del tutor(a) y la relacion o parentesco que tenga con el niño(a):</label>
                <textarea rows="4" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="noviveconpadres-situtor" name="noviveconpadres-situtor" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>

        </div>

        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8 gap-2">
            <a href="{{ route('preescolar.seccion2') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center">
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

            <a href="{{ route('preescolar.seccion4') }}" class="px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition flex items-center shadow-md">
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