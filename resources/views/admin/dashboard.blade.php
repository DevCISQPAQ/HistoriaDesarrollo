@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-semibold text-gray-800 mb-6">Bienvenido, {{ Auth::user()->name }}</h2>

{{-- Tarjetas resumen --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:space-y-0 space-y-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Formularios terminados</h3>
        <p class="text-3xl mt-2 font-bold text-green-600 ">{{ $terminados }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Formularios no terminados</h3>
        <p class="text-3xl mt-2 font-bold  text-yellow-600">{{ $no_terminados }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Totales de formularios</h3>
        <p class="text-3xl mt-2 font-bold text-blue-600">{{ $totales_formularios }}</p>
    </div>
</div>

{{-- Sección adicional --}}
<div class="mt-8 bg-white p-6 rounded-lg shadow">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Resumen general</h3>
   
</div>
@endsection