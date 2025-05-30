@extends('layouts.admin') {{-- Usa tu layout base si tienes uno --}}
@section('content')
<div class="p-6 bg-white rounded shadow">
    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Usuarios</h2>
        <a href="{{ route('admin.usuarios.crear') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Crear Usuario</a>
    </div>

    <div class="overflow-x-auto">
     <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Correo</th>
                    <th class="px-4 py-2">Rol</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $usuario->name }}</td>
                    <td class="px-4 py-2">{{ $usuario->email }}</td>
                    <td class="px-4 py-2">{{ $usuario->is_admin ? 'Admin' : 'Usuario' }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.usuarios.editar', $usuario->id) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('admin.usuarios.eliminar', $usuario->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection