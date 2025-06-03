@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-semibold text-gray-800 mb-6">Bienvenido(a), {{ Auth::user()->name }}</h2>

{{-- Tarjetas resumen --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:space-y-0 space-y-2">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Formularios terminados {{ $periodoEtiqueta }}</h3>
        <p class="text-3xl mt-2 font-bold text-green-600 ">{{ $terminados }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Formularios sin terminar {{ $periodoEtiqueta }}</h3>
        <p class="text-3xl mt-2 font-bold  text-red-600">{{ $no_terminados }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Totales de formularios {{ $periodoEtiqueta }}</h3>
        <p class="text-3xl mt-2 font-bold text-blue-400">{{ $totales_formularios }}</p>
    </div>
</div>

{{-- Sección adicional --}}
<div class="mt-8 bg-white p-6 rounded-lg shadow">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center lg:text-left">Resumen general periodo {{ $periodoEtiqueta }}</h3>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="flex justify-center p-6">
            <canvas id="nivelesChart" class="w-[400px] h-[400px]"></canvas>
        </div>
        <div class="flex justify-center p-6">
            <div class="w-full max-w-3xl h-[500px]">
                <canvas id="graficaPorGrado" class="w-full h-full"></canvas>
            </div>
        </div>
        <div class="bg-white p-6  mt-6">
            <div class="h-80">
                <canvas id="registrosChart" style="height: 350px;"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        const nivelesData = @json([$prescolarCount, $primariaCount, $secundariaCount]);
        const etiquetasPorGrado = @json($etiquetasPorGrado);
        const datosPorGrado = @json(array_values($conteosPorGrado));

        // renderDashboardCharts(nivelesData, etiquetasPorGrado, datosPorGrado);
        const registrosLabels = @json($graficaLabels);
        const registrosData = @json($graficaData);

        renderDashboardCharts(nivelesData, etiquetasPorGrado, datosPorGrado, registrosLabels, registrosData);
    });
</script>

@endsection