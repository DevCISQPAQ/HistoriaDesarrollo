@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '10') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')

<?php
$id_alumno = session('id_alumno');
$nombre = session('nombre');
?>


<div class="bg-white rounded-xl shadow-lg overflow-hidden">

    <!-- Encabezado de sección -->
    <div class="bg-[#667c87] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#5D7E8D] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">2</span>
            <h2 class="text-xl font-bold text-white">Estructura Familiar</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre la familia del estudiante {{$id_alumno }} , {{$nombre}}</p>
    </div>

    <form action="{{ route('preescolar.seccion2.guardar') }}" method="POST" class="p-6">
        <!-- <form action="#" method="POST"> -->
        @csrf

        <!-- Datos del Padre (manteniendo tus campos originales) -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Datos del Padre</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="nombre_padre" class="block text-sm font-medium text-gray-700">Nombre del Padre <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="nombre_padre" name="nombre_padre" placeholder="Nombre(s) y apellidos" required>
                </div>

                <div>
                    <label for="edad_padre" class="block text-sm font-medium text-gray-700">Edad <span class="text-red-500">*</span></label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_padre" name="edad_padre" required placeholder="Edad en años">
                </div>

                <div>
                    <label for="empresa_padre" class="block text-sm font-medium text-gray-700">Nombre de la empresa <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="empresa_padre" name="empresa_padre" required placeholder="Empresa, negocio, etc.">
                </div>

                <div>
                    <label for="puesto_padre" class="block text-sm font-medium text-gray-700">Puesto en la empresa <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="puesto_padre" name="puesto_padre" required placeholder="Jefe, Socio, Administrador, etc.">
                </div>

                <div>
                    <label for="ocupacion_padre" class="block text-sm font-medium text-gray-700">Ocupación <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="ocupacion_padre" name="ocupacion_padre" placeholder="">
                </div>

                <div>
                    <label for="correo_padre" class="block text-sm font-medium text-gray-700">Correo electronico personal <span class="text-red-500">*</span></label>
                    <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="correo_padre" name="correo_padre" required placeholder="correo@correo.com">
                </div>

                <div>
                    <label for="redessoc_padre" class="block text-sm font-medium text-gray-700 ">Redes sociales</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
                        <div class="flex">
                            <div class="flex-none pt-2">
                                <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#1877f2]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path
                                            d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" class="flex-initial  w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="redessoc_padre" name="redessoc_padre[]" placeholder="Facebook">
                        </div>

                        <div class="flex">
                            <div class="flex-none pt-2">
                                <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#c13584]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" class="flex-initial  w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="redessoc_padre" name="redessoc_padre[]" placeholder="Instagram">
                        </div>
                    </div>
                </div>

                <!-- Diestro/Zurdo -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Marcar si el padre es <span class="text-red-500">*</span></label>
                    <div class="flex space-x-4 mt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="padre_lateralidad[]" value="Diestro" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                            <span class="ml-2">Diestro</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="padre_lateralidad[]" value="Zurdo" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                            <span class="ml-2">Zurdo</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Datos de la Madre (manteniendo tus campos originales) -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Datos de la Madre</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="nombre_madre" class="block text-sm font-medium text-gray-700">Nombre de la Madre <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="nombre_madre" name="nombre_madre" placeholder="Nombre(s) y apellidos" required>
                </div>

                <div>
                    <label for="edad_madre" class="block text-sm font-medium text-gray-700">Edad <span class="text-red-500">*</span></label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="edad_madre" name="edad_madre" placeholder="Edad en años" required>
                </div>

                <div>
                    <label for="empresa_madre" class="block text-sm font-medium text-gray-700">Nombre de la empresa <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="empresa_madre" name="empresa_madre" placeholder="Empresa, negocio, etc" required>
                </div>

                <div>
                    <label for="puesto_madre" class="block text-sm font-medium text-gray-700">Puesto en la empresa <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="puesto_madre" name="puesto_madre" placeholder="Jefa, Socia, Administradora, etc." required>
                </div>

                <div>
                    <label for="ocupacion_madre" class="block text-sm font-medium text-gray-700">Ocupación <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="ocupacion_madre" name="ocupacion_madre" placeholder="">
                </div>

                <div>
                    <label for="correo_madre" class="block text-sm font-medium text-gray-700">Correo electronico personal <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="correo_madre" name="correo_madre" placeholder="Correo@correo.com" required>
                </div>

                <div>
                    <label for="redessoc_madre" class="block text-sm font-medium text-gray-700">Redes sociales</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
                        <div class="flex">
                            <div class="flex-none pt-2">
                                <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#1877f2]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path
                                            d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="redessoc_madre" name="redessoc_madre[]" placeholder="Facebook">
                        </div>

                        <div class="flex">
                            <div class="flex-none pt-2">
                                <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#c13584]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                id="redessoc_madre" name="redessoc_madre[]" placeholder="Instagram">
                        </div>
                    </div>
                </div>

                <!-- Diestra/Zurda -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Marcar si la madre es <span class="text-red-500">*</span></label>
                    <div class="flex space-x-4 mt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="madre_lateralidad[]" value="Diestra" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                            <span class="ml-2">Diestra</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="madre_lateralidad[]" value="Zurda" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                            <span class="ml-2">Zurda</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estado civil de los padres -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Estado Civil</h3>

            <div class="space-y-6">
                <!-- Estado civil (checkboxes como en tu original) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado civil actual de los padres <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="space-y-2" x-data="{casadosigl: false, civil: false }">
                            <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                <input type="checkbox" name="estado_civil[]" value="Casados Iglesia" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded" x-model="casadosigl">
                                <span class="ml-2">Casados Iglesia</span>
                            </label>
                            <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                <input type="checkbox" name="estado_civil[]" value="Civil" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded" x-model="civil">
                                <span class="ml-2">Civil</span>
                            </label>
                            <!-- Años de casados -->
                            <div id="Casados Iglesia" x-show="casadosigl || civil" x-transition>
                                <label for="anos_casados" class="block text-sm font-medium text-gray-700 py-2">¿Cuántos años llevan de casados?</label>
                                <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="anos_casados" name="anos_casados" placeholder="Años">
                            </div>
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

                        <div class="pt-4 bg-[#8caab945] rounded-xl shadow-lg overflow-hidden p-4 mt-2" id="Vuelto a casar" x-show="estcivil == $el.id" x-transition>
                            <p class="text-sm font-medium text-gray-700 pb-4">Si se trata de una familia reconstructiva(padre o madre vuelto a casar por viudez, divorcio, etc) escribir los datos de la persona (diferente al padre o a la madre de origen), con quien vive el nino(a) actualmente <span class="text-red-500">*</span></p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-1">
                                <div>
                                    <label for="nombre_conyuge" class="block text-sm font-medium text-gray-700">Nombre Conyuge</label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                        id="nombre_conyuge" name="nombre_conyuge" placeholder="Nombre(s) y apellidos">
                                </div>

                                <div>
                                    <label for="edad_conyuge" class="block text-sm font-medium text-gray-700">Edad</label>
                                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                        id="edad_conyuge" name="edad_conyuge" placeholder="Edad en años">
                                </div>

                                <div>
                                    <label for="empresa_conyuge" class="block text-sm font-medium text-gray-700">Nombre de la empresa</label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                        id="empresa_conyuge" name="empresa_conyuge" placeholder="Empresa, negocio, etc.">
                                </div>

                                <div>
                                    <label for="puesto_conyuge" class="block text-sm font-medium text-gray-700">Puesto la empresa</label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                        id="puesto_conyuge" name="puesto_conyuge" placeholder="Jefe(a), Socio(a), Administrador(a), etc.">
                                </div>

                                <div>
                                    <label for="ocupacion_conyuge" class="block text-sm font-medium text-gray-700">Ocupación</label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                        id="ocupacion_conyuge" name="ocupacion_conyuge" placeholder="">
                                </div>

                                <div>
                                    <label for="correo_conyuge" class="block text-sm font-medium text-gray-700">Correo electronico personal</label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                        id="correo_conyuge" name="correo_conyuge" placeholder="Correo@correo.com">
                                </div>

                                <div>
                                    <label for="redessoc_conyuge" class="block text-sm font-medium text-gray-700">Redes sociales</label>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
                                        <div class="flex">
                                            <div class="flex-none pt-2">
                                                <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#1877f2]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                                        <path
                                                            d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                                id="redessoc_conyuge" name="redessoc_conyuge[]" placeholder="Facebook">
                                        </div>

                                        <div class="flex">
                                            <div class="flex-none pt-2">
                                                <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#c13584]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                                id="redessoc_conyuge" name="redessoc_conyuge[]" placeholder="Instagram">
                                        </div>
                                    </div>
                                </div>

                                <!-- Diestra/Zurda -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Marcar si el(la) conyuge es</label>
                                    <div class="flex space-x-4 mt-2">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="conyuge_lateralidad[]" value="Diestra" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                                            <span class="ml-2">Diestro(a)</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="conyuge_lateralidad[]" value="Zurda" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                                            <span class="ml-2">Zurdo(a)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="py-4">
                                <label for="noviveconpadres_situtor" class="block text-sm font-medium text-gray-700">En caso de que el niño(a) no viva con algunos de los padres, escriba el nombre del tutor(a) y la relacion o parentesco que tenga con el niño(a):</label>
                                <textarea rows="4" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="noviveconpadres_situtor" name="noviveconpadres_situtor" placeholder="Escribe aqui la respuesta"></textarea>
                            </div>
                        </div>



                        <div id="Divorciados" x-show="estcivil == $el.id">
                            <!-- Motivos separación (condicional) -->
                            <div x-transition>
                                <label for="moti_separa" class="block text-sm font-medium text-gray-700 pt-3">¿Cuáles fueron los motivos de la separación?</label>
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="moti_separa" name="moti_separa" rows="3"></textarea>
                            </div>

                            <!-- Vive con (condicional) -->
                            <div x-transition>
                                <label for="vive_con" class="block text-sm font-medium text-gray-700">En caso de separación o divorcio, ¿con quién vive el niño(a)?</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                                    id="vive_con" name="vive_con">
                            </div>

                        </div>

                    </div>
                </div>
                <!-- Número de hijos -->
                <div>
                    <label for="numero_hijos" class="block text-sm font-medium text-gray-700 ">Número de hijos</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                        id="numero_hijos" name="numero_hijos" required placeholder="Cantidad">
                </div>

            </div>
        </div>

        <!-- Religion-->
        <div class="mb-8 border border-gray-200 rounded-lg p-4 m-4">
            <h3 class="text-lg font-semibold text-[#1f355e] mb-4">Religion</h3>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">En la educación de su hijo(a) ¿Toman ustedes en cuenta el punto de vista religioso?:<span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-3 gap-2">
                        <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="religion" value="Si" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                            <span class="ml-2">Si</span>
                        </label>
                        <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="religion" value="No" class="form-radio text-[#1f355e] focus:ring-[#1f355e]">
                            <span class="ml-2">No</span>
                        </label>

                    </div>
                </div>

            </div>
        </div>

        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8 m-4 gap-2">

            <button type="button" onclick="history.back()" class=" flex-none md:flex px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                </svg>
                Regresar
            </button>


            <button type="submit" class=" flex-none md:flex px-6 py-2 bg-[#ff7843] text-white rounded-lg hover:bg-[#ffaf25] transition items-center shadow-md">
                Guardar y<br> Continuar
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

        </div>
    </form>
</div>

<!-- AlpineJS para la funcionalidad condicional -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection