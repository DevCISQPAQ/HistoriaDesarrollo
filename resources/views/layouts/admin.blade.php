<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" type="image/svg" href="{{ asset('/img/sello-cumbres-en-blanco-01.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/img/sello-cumbres-en-blanco-01.png') }}">
</head>

<body x-data="{
        sidebarOpen: false,
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;
        }
    }"
    class="bg-gray-100 min-h-screen flex relative overflow-x-hidden transition-all duration-300">

    {{-- Sidebar responsivo --}}
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 w-64 bg-white shadow-md z-40 transform transition-transform duration-300 ease-in-out md:static md:translate-x-0">
        <x-admin-sidebar />
    </aside>

    {{-- Contenedor principal --}}
    <div class="flex-1 flex flex-col w-full">

        {{-- Header superior --}}
        <header class="bg-white shadow px-6 py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-4">
                {{-- Botón hamburguesa visible solo en móviles --}}
                <button @click="toggleSidebar" class="md:hidden text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-semibold text-gray-800">
                    Administración
                </h1>
            </div>

            <div class="flex items-center gap-4 self-end sm:self-auto">
                <span class="text-gray-700 font-medium">👤 {{ Auth::user()->name }}</span>
                <button @click.prevent="
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
            @if(session('success') || session('error'))
            <div class="{{ session('success') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} p-3 rounded mb-4">
                {{ session('success') ?? session('error') }}
            </div>
            @endif
            @yield('content')
        </main>
    </div>

</body>

</html>