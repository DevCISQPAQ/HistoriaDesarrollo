@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-semibold text-gray-800 mb-6">Lista de Estudiantes</h2>

<!-- Tarjetas de conteo de estudiantes por grado escolar -->
<div class="flex flex-wrap gap-4 mb-6">
    <!-- Tarjeta para Prescolar -->
    <div class="bg-blue-100 p-4 rounded shadow-lg text-center flex-1 min-w-[200px] sm:basis-[calc(25%-1rem)]">
        <h3 class="text-xl font-semibold text-blue-600">Prescolar</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $prescolarCount }}</p>
    </div>

    <!-- Tarjeta para Primaria -->
    <div class="bg-blue-100 p-4 rounded shadow-lg text-center flex-1 min-w-[200px] sm:basis-[calc(25%-1rem)]">
        <h3 class="text-xl font-semibold text-blue-600">Primaria</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $primariaCount }}</p>
    </div>

    <!-- Tarjeta para Secundaria -->
    <div class="bg-blue-100 p-4 rounded shadow-lg text-center flex-1 min-w-[200px] sm:basis-[calc(25%-1rem)]">
        <h3 class="text-xl font-semibold text-blue-600">Secundaria</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $secundariaCount }}</p>
    </div>
    <!-- totales -->
    <div class="bg-blue-100 p-4 rounded shadow-lg text-center flex-1 min-w-[200px] sm:basis-[calc(25%-1rem)]">
        <h3 class="text-xl font-semibold text-green-600">Total de estudiantes</h3>
        <p class="text-2xl font-bold text-gray-800">{{ $totales_estudiantes }}</p>
    </div>
</div>

<div x-data="{ buscar: '{{ request('buscar', '') }}', eliminarActivo: false  }">
    <!-- Formulario de búsqueda -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-4">
        <!-- Campo de búsqueda -->
        <div class="w-full md:flex-1">
            <form method="GET" action="{{ route('estudiantes.index') }}" class="w-full">
                <input type="text" name="buscar" x-model="buscar" placeholder="Buscar estudiante..."
                    class="px-4 py-2 border rounded  w-1/2 focus:outline-none focus:ring focus:border-blue-300"
                    value="{{ request('buscar') }}" />

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded mt-2 md:mt-2">Buscar</button>
            </form>
        </div>

        <!-- Checkbox de activación -->
        @if(auth()->user()->is_admin)
        <div class="whitespace-nowrap mt-2 md:mt-0">
            <label class="inline-flex items-center">
                <input type="checkbox" x-model="eliminarActivo" class="mr-2">
                <span>Activar eliminar estudiante</span>
            </label>
        </div>
        @endif
    </div>

    <!-- Tabla de estudiantes -->
    <div class="overflow-x-auto">
        <div class="max-h-[500px] overflow-y-auto border border-gray-300 rounded-lg">
            <table class="min-w-full text-left bg-white">
                <thead class="sticky top-0 bg-blue-100 z-10 shadow">
                    <tr>
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Grado Escolar</th>
                        <th class="p-3">Fecha de Creación</th>
                        <th class="p-3">Estatus</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estudiantes as $estudiante)
                    <tr class="border border-gray-300 rounded-lg hover:bg-gray-50">
                        <td class="p-3">{{ $estudiante->nombre_completo }}</td>
                        <td class="p-3">{{ $estudiante->grado_escolar }}</td>
                        <td class="p-3">{{ $estudiante->created_at->format('Y-m-d') }}</td>
                        <td class="p-3 font-semibold 
                    {{ $estudiante->historia_completa === 'Completo' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $estudiante->historia_completa }}
                        </td>
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
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Eliminar</button>
                                </form>
                            </template>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $estudiantes->links() }}
        </div>
    </div>
</div>
@endsection