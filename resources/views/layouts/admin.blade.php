<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100 min-h-screen flex">

    {{-- Sidebar --}}
    <x-admin-sidebar />

    {{-- Contenedor principal --}}
    <div class="flex-1 flex flex-col">

        {{-- Header superior --}}
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Administración</h1>
            <div class="flex items-center gap-4">
                <span class="text-gray-700 font-medium">👤 {{ Auth::user()->name }}</span>
                <button
                    x-data
                    @click.prevent="
        fetch('{{ route('logout') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
        }).then(() => window.location.href = '/login')"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Cerrar sesión
                </button>
            </div>
        </header>

        {{-- Contenido dinámico --}}
        <main class="p-6">
            @yield('content')
        </main>

    </div>

</body>

</html>