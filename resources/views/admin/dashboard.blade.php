@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-semibold text-gray-800 mb-6">Bienvenido, {{ Auth::user()->name }}</h2>

{{-- Tarjetas resumen --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Usuarios registrados</h3>
        <p class="text-3xl mt-2 font-bold text-blue-600">{{ $usuarios }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Usuarios activos hoy</h3>
        <p class="text-3xl mt-2 font-bold text-green-600">{{ $activosHoy }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Pendientes</h3>
        <p class="text-3xl mt-2 font-bold text-yellow-600">{{ $pendientes }}</p>
    </div>
</div>

{{-- Sección adicional --}}
<div class="mt-8 bg-white p-6 rounded-lg shadow">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Resumen general</h3>
    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-blue-100 text-left">
            <tr>
                <th class="p-3">Nombre</th>
                <th class="p-3">Email</th>
                <th class="p-3">Teléfono</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $alumno->nombre }}</td>
                <td class="p-3">{{ $alumno->email }}</td>
                <td class="p-3">{{ $alumno->telefono ?? '—' }}</td>
                <td class="p-3 flex gap-2">
                    <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" onsubmit="return confirm('¿Eliminar alumno?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Eliminar</button>
                    </form>
                    <a href="{{ route('alumnos.pdf', $alumno->id) }}" target="_blank" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                        Ver PDF
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection