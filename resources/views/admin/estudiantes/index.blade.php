@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-semibold text-gray-800 mb-6">Lista de Estudiantes</h2>

<!-- Tarjetas de conteo de estudiantes por grado escolar -->
<div class="flex gap-4 mb-6">
    <!-- Tarjeta para Prescolar -->
    <div class="bg-blue-100 p-4 rounded shadow-lg text-center flex-1">
        <h3 class="text-xl font-semibold text-blue-600">Prescolar</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $prescolarCount }}</p>
    </div>

    <!-- Tarjeta para Primaria -->
    <div class="bg-blue-100 p-4 rounded shadow-lg text-center flex-1">
        <h3 class="text-xl font-semibold text-blue-600">Primaria</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $primariaCount }}</p>
    </div>

    <!-- Tarjeta para Secundaria -->
    <div class="bg-blue-100 p-4 rounded shadow-lg text-center flex-1">
        <h3 class="text-xl font-semibold text-blue-600">Secundaria</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $secundariaCount }}</p>
    </div>
</div>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<div x-data="{ buscar: '', eliminarActivo: false }">

    <div class="flex flex-wrap justify-between items-center gap-20 mb-4">
        <!-- Campo de búsqueda -->
        <div class="flex-1">
            <input x-model="buscar" type="text" placeholder="Buscar estudiante..."
                class="px-4 py-2 border rounded w-full focus:outline-none focus:ring focus:border-blue-300" />
        </div>

        <!-- Checkbox de activación -->
        <div class="whitespace-nowrap">
            <label class="inline-flex items-center">
                <input type="checkbox" x-model="eliminarActivo" class="mr-2">
                <span>Activar eliminar estudiante</span>
            </label>
        </div>
    </div>

    <!-- Tabla de estudiantes -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-blue-100 text-left">
                <tr>
                    <th class="p-3">Nombre</th>
                    <th class="p-3">Grado Escolar</th>
                    <th class="p-3">Lugar de Nacimiento</th>
                    <th class="p-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
                <tr class="border-b hover:bg-gray-50"
                    x-show="(
                        {{ json_encode(strtolower($estudiante->nombre_completo)) }}.includes(buscar.toLowerCase()) ||
                        {{ json_encode(strtolower($estudiante->grado_escolar)) }}.includes(buscar.toLowerCase())
                    ) || buscar === ''">

                    <td class="p-3">{{ $estudiante->nombre_completo }}</td>
                    <td class="p-3">{{ $estudiante->grado_escolar }}</td>
                    <td class="p-3">{{ $estudiante->lugar_nacimiento }}</td>
                    <td class="p-3 flex gap-2">
                        <!-- Botón Ver PDF siempre visible -->
                        <a href="{{ route('estudiantes.pdf', $estudiante->id) }}" target="_blank"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                            Ver PDF
                        </a>

                        <!-- Botón Eliminar solo visible si eliminarActivo es true -->
                        <template x-if="eliminarActivo">
                            <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST"
                                onsubmit="return confirm('¿Eliminar estudiante?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Eliminar</button>
                            </form>
                        </template>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Mensaje si no se encuentran resultados -->
    <div x-show="!Array.from($el.querySelectorAll('tbody tr')).some(row => row.offsetParent !== null)"
        class="mt-4 text-gray-500">
        No se encontraron resultados.
    </div>
</div>
@endsection