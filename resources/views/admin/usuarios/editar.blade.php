@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Editar usuario</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 p-3 rounded">
            <ul class="list-disc pl-4 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.usuarios.actualizar', $usuario->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700">Nombre</label>
            <input type="text" name="name" value="{{ old('name', $usuario->name) }}" required class="w-full mt-1 px-4 py-2 border rounded focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email', $usuario->email) }}" required class="w-full mt-1 px-4 py-2 border rounded focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700">Rol</label>
            <select name="is_admin" class="w-full mt-1 px-4 py-2 border rounded focus:ring focus:ring-blue-200">
                <option value="0" {{ $usuario->is_admin ? '' : 'selected' }}>Usuario</option>
                <option value="1" {{ $usuario->is_admin ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.usuarios') }}" class="px-4 py-2 text-gray-600 hover:underline">Cancelar</a>
            <button type="submit" class="ml-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection