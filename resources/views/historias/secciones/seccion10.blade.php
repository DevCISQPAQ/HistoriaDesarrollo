@extends('templates.main')
@section('progress-title', 'Datos del alumno')
@section('progress-percentage', '70') <!-- Porcentaje completado -->
{{-- @section('current-section', 1) <!-- Resalta la sección actual --> --}}
@section('content')

<?php
$id_alumno = session('id_alumno');
$nombre = session('nombre');
?>

<div class=" bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Encabezado de sección -->
    <div class="bg-[#ff7843] px-6 py-4">
        <div class="flex items-center">
            <span class="bg-white text-[#ff7843] rounded-full w-8 h-8 flex items-center justify-center mr-3 font-bold">10</span>
            <h2 class="text-xl font-bold text-white">Salud</h2>
        </div>
        <p class="text-blue-100 ml-11 mt-1">Complete la información sobre el estudiante {{$id_alumno }} , {{$nombre}}</p>
    </div>

    <form action="{{ route('seccion10.guardar') }}" method="POST" class="p-1">
        @csrf
        <!-- Salud -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <!-- <h3 class="text-lg font-semibold text-[#1f355e] mb-2">Salud del hijo(a)</h3> -->
            <!-- check box -->
            <div>
                <label class="inline-flex items-center"> Especifique si ha presentado alguno de los siguientes problemas: <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 pt-4">
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Respiratorios" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Respiratorios</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Fracturas" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Fracturas</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Cardiovasculares" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Cardiovasculares</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Tics" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Tics</span>
                    </label>

                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="De la piel" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">De la piel</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Convulciones" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Convulciones</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Digestivos" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Digestivos</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Epilepcias" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Epilepcias</span>
                    </label>

                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Cirugias" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Cirugias</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Alergias" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Alergias</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Traumatismos" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Traumatismos</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Urinarios" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Urinarios</span>
                    </label>

                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Falta de atencion" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Falta de atencion</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Diabetes" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Diabetes</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Hiperactividad" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Hiperactividad</span>
                    </label>
                    <label class="inline-flex items-center border rounded-lg px-4 py-2 hover:bg-gray-50 cursor-pointer pr-5 ">
                        <input type="checkbox" name="saludnino[]" value="Impulsividad" class="form-checkbox text-[#1f355e] focus:ring-[#1f355e] rounded">
                        <span class="ml-2">Impulsividad</span>
                    </label>
                </div>
            </div>
            <!-- otros -->
            <div>
                <label for="otrosprob" class="block text-sm font-medium text-gray-700 pt-3">Otros</label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="otrosprob" name="otrosprob">
            </div>
            <!-- padece -->
            <div>
                <label for="enfeotrastor" class="block text-sm font-medium text-gray-700 pt-3">¿Padece, o ha padecido, alguna enfermedad o trastorno que requiera de atencion medica especializada? <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="enfeotrastor" name="enfeotrastor" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>
            <!-- recibe -->
            <div>
                <label for="tipoterapia" class="block text-sm font-medium text-gray-700 pt-3">¿Recibe, o ha recibido, algun tipo de terapia (emocional, motriz, de lenguaje, de aprendizaje)? Describa el tipo y desde cuándo <span class="text-red-500">*</span></label>
                <textarea rows="2" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1f355e] focus:border-[#1f355e] transition"
                    id="tipoterapia" name="tipoterapia" placeholder="Escribe aqui la respuesta" required></textarea>
            </div>
        </div>
        <!-- Acuerdo -->
        <div class="mb-8 border border-gray-200 rounded-lg p-6 relative overflow-x-auto m-4">
            <!-- <h3 class="text-lg font-semibold text-[#1f355e] mb-2">Salud del hijo(a)</h3> -->
            <div class="space-y-2">
                <p class="text-justify  text-[#1f355e] mt-1">
                    <span class="font-bold">*ACUERDO</span> Número 11/03/19 por el que se establecen las normas generales para la evaluación del aprendizaje, acreditación,
                    promoción, regularización y certificación de los educandos de la evaluación básica, publicado en el Diario oficial de la federación
                    el 29 de marzo de 2019. <br>
                    <span class="font-bold">Artículo 3. Sujetos participantes.</span> En la aplicación de las presentes normas deberá garantizarse la participacion activa de
                    todos los involucrados en el proceso educativo: autoridades educativas y escolares, docentes, madres, padres de familia o
                    tutores y educandos.
                    Quienes ejercen la patria potestad o la tutela de los estudiantes deberán informar a las autoridades educativas y escolares,
                    según corresponda, sobre la salud, condición física o socioemocional de los educandos y, en su caso, de requerimientos especiales para garantizar su inclusión efectiva en el proceso educativo. Dicha información se proporcionará en el marco de las
                    disposiciones jurídicas aplicables.
                </p>
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
</div>

<!-- AlpineJS para la funcionalidad condicional -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
</script>
@endsection