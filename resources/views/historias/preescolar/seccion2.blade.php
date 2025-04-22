@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '10') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')
<div class="p-6">
    <!-- Encabezado de sección -->
    <div class="border-b border-gray-200 pb-4 mb-6">
        <div class="flex items-center">
            <span class="bg-[#5D7E8D] text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">2</span>
            <h2 class="text-xl font-bold text-[#1f355e]">Estructura Familiar</h2>
        </div>
        <p class="text-gray-600 ml-11 mt-1">Complete la información sobre la familia del estudiante</p>
    </div>

    <form action="#" method="POST">
        @csrf

        <!-- Datos del Padre (manteniendo tus campos originales) -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Datos del Padre</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="nombre_padre" class="block text-sm font-medium text-gray-700">Nombre del Padre:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="nombre_padre" name="nombre_padre" required>
                </div>

                <div>
                    <label for="edad_padre" class="block text-sm font-medium text-gray-700">Edad:</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" required>
                </div>

                <div>
                    <label for="empresa_padre" class="block text-sm font-medium text-gray-700">Nombre de la empresa:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" required>
                </div>

                <div>
                    <label for="puesto_madre" class="block text-sm font-medium text-gray-700">Puesto la empresa:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" required>
                </div>

                <div>
                    <label for="correo_padre" class="block text-sm font-medium text-gray-700">Correo electronico personal:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" required>
                </div>

                <div>
                    <label for="redessoc_padre" class="block text-sm font-medium text-gray-700">Redes sociales:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" required>
                </div>

                <!-- Manteniendo todos los campos originales del padre -->
                <!-- ... otros campos del padre ... -->

                <!-- Diestro/Zurdo -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Marcar si el padre es:</label>
                    <div class="flex space-x-4 mt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="padre_diestro" value="Diestro" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                            <span class="ml-2">Diestro</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="padre_zurdo" value="Zurdo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                            <span class="ml-2">Zurdo</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Datos de la Madre (manteniendo tus campos originales) -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Datos de la Madre</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nombre_madre" class="block text-sm font-medium text-gray-700">Nombre de la Madre:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="nombre_madre" name="nombre_madre" required>
                </div>

                <!-- Manteniendo todos los campos originales de la madre -->
                <!-- ... otros campos de la madre ... -->

                <div>
                    <label for="edad_madre" class="block text-sm font-medium text-gray-700">Edad:</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_madre" name="edad_madre" required>
                </div>

                <div>
                    <label for="empresa_madre" class="block text-sm font-medium text-gray-700">Nombre de la empresa:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" required>
                </div>

                <div>
                    <label for="puesto_madre" class="block text-sm font-medium text-gray-700">Puesto la empresa:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" required>
                </div>

                <div>
                    <label for="correo_madre" class="block text-sm font-medium text-gray-700">Correo electronico personal:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" required>
                </div>

                <div>
                    <label for="redessoc_madre" class="block text-sm font-medium text-gray-700">Redes sociales:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" required>
                </div>

                <!-- Diestra/Zurda -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Marcar si la madre es:</label>
                    <div class="flex space-x-4 mt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="madre_diestra" value="Diestra" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                            <span class="ml-2">Diestra</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="madre_zurda" value="Zurda" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                            <span class="ml-2">Zurda</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estado civil de los padres -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Estado Civil</h3>

            <div class="space-y-6">
                <!-- Estado civil (checkboxes como en tu original) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado civil actual de los padres:</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="space-y-2">
                            <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                <input type="checkbox" name="estado_civil[]" value="Casados Iglesia" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                                <span class="ml-2">Casados Iglesia</span>
                            </label>
                            <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                <input type="checkbox" name="estado_civil[]" value="Civil" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                                <span class="ml-2">Civil</span>
                            </label>
                        </div>
                    </div>

                    <div x-data="{estcivil: ''}">
                        <div class="flex space-x-4 pt-4">
                            <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                <input type="radio" name="estado_civil[]" value="Divorciados" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                    x-model="estcivil">
                                <span class="ml-2">Divorciados</span>
                            </label>
                            <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                <input type="radio" name="estado_civil[]" value="Viudo(a)" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                    x-model="estcivil">
                                <span class="ml-2">Viudo(a)</span>
                            </label>
                            <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                <input type="radio" name="estado_civil[]" value="Unión Libre" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                    x-model="estcivil">
                                <span class="ml-2">Unión Libre</span>
                            </label>
                            <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                <input type="radio" name="estado_civil[]" value="Madre soltera" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                    x-model="estcivil">
                                <span class="ml-2">Madre soltera</span>
                            </label>
                            <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                <input type="radio" name="estado_civil[]" value="Vuelto a casar" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                    x-model="estcivil">
                                <span class="ml-2">Vuelto a casar</span>
                            </label>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6" id="Vuelto a casar" x-show="estcivil == $el.id" x-transition>
                            <div>
                                <label for="nombre_madre" class="block text-sm font-medium text-gray-700">Nombre de la Madre:</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="nombre_madre" name="nombre_madre" required>
                            </div>

                            <!-- Manteniendo todos los campos originales de la madre -->
                            <!-- ... otros campos de la madre ... -->

                            <div>
                                <label for="edad_madre" class="block text-sm font-medium text-gray-700">Edad:</label>
                                <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="edad_madre" name="edad_madre" required>
                            </div>

                            <div>
                                <label for="empresa_madre" class="block text-sm font-medium text-gray-700">Nombre de la empresa:</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="edad_padre" name="edad_padre" required>
                            </div>

                            <div>
                                <label for="puesto_madre" class="block text-sm font-medium text-gray-700">Puesto la empresa:</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="edad_padre" name="edad_padre" required>
                            </div>

                            <div>
                                <label for="correo_madre" class="block text-sm font-medium text-gray-700">Correo electronico personal:</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="edad_padre" name="edad_padre" required>
                            </div>

                            <div>
                                <label for="redessoc_madre" class="block text-sm font-medium text-gray-700">Redes sociales:</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="edad_padre" name="edad_padre" required>
                            </div>

                            <!-- Diestra/Zurda -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Marcar si la madre es:</label>
                                <div class="flex space-x-4 mt-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="madre_diestra" value="Diestra" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                                        <span class="ml-2">Diestra</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="madre_zurda" value="Zurda" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                                        <span class="ml-2">Zurda</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Años de casados -->
                <div>
                    <label for="anos_casados" class="block text-sm font-medium text-gray-700 pt-4">¿Cuántos años llevan de casados?</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="anos_casados" name="anos_casados">
                </div>

                <!-- Número de hijos -->
                <div>
                    <label for="numero_hijos" class="block text-sm font-medium text-gray-700 ">Número de hijos:</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="numero_hijos" name="numero_hijos" required>
                </div>

                <!-- Separación conyugal (con funcionalidad condicional) -->
                <div x-data="{haySeparacion: ''}">
                    <label class="block text-sm font-medium text-gray-700 mb-2 pt-4">¿Ha habido separación conyugal?</label>

                    <div class="flex space-x-4">
                        <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="separacion_conyugal" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                x-model="haySeparacion">
                            <span class="ml-2">Sí</span>
                        </label>
                        <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="separacion_conyugal" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]"
                                x-model="haySeparacion">
                            <span class="ml-2">No</span>
                        </label>
                    </div>

                    <!-- Motivos separación (condicional) -->
                    <div id="Si" x-show="haySeparacion == $el.id" x-transition>
                        <label for="moti_separa" class="block text-sm font-medium text-gray-700">¿Cuáles fueron los motivos de la separación?</label>
                        <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                            id="moti_separa" name="moti_separa" rows="3"></textarea>
                    </div>

                    <!-- Vive con (condicional) -->
                    <div id="Si" x-show="haySeparacion == $el.id" x-transition>
                        <label for="vive_con" class="block text-sm font-medium text-gray-700">En caso de separación o divorcio, ¿con quién vive el niño(a)?</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                            id="vive_con" name="vive_con">
                    </div>

                </div>
            </div>
        </div>
        <!-- En caso de adopcion-->
        <div class="mb-8 border border-gray-200 rounded-lg p-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Religion</h3>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">En la educacion de su hijo(a) Toman ustedes en cuentan el punto de vista religioso?:<span class="text-red-500">*</span></label>
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
        <div class="flex justify-between mt-8">
            <a href="{{ route('preescolar.seccion1') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center">
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

            <a href="{{ route('preescolar.seccion3') }}" class="px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition flex items-center shadow-md">
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