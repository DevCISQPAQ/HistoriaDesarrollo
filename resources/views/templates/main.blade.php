<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia de Desarrollo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="shortcut icon" type="image/svg" href="{{ asset('/img/sello-cumbres-en-blanco-01.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/img/sello-cumbres-en-blanco-01.png') }}">
</head>

<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col">
        <!-- Encabezado -->
        <header class="bg-primary text-white py-4 shadow-md flex justify-center items-center gap-4">
            <img src="{{asset('img/sello-cumbres-en-blanco-01.png')}}" alt="Logo" class="h-12 w-auto">
            <h1 class="text-2xl font-bold text-center">Historia de Desarrollo</h1>
        </header>

        <!-- Contenedor principal -->
        <main class="flex-1 container mx-auto px-6 py-8">
            <!-- Barra de progreso mejorada -->
            <div class="mb-8 bg-white p-4 rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-primary">
                        Progreso del formulario
                        <span class="hidden md:inline"> - @yield('progress-title', 'Complete todas las secciones')</span>
                    </span>
                    <span class="text-sm font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">
                        <span id="progressPercentage">@yield('progress-percentage', '0')</span>% completado
                    </span>
                </div>

                <!-- Barra principal animada -->
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div id="globalProgressBar"
                        class="bg-gradient-to-r from-[#FF6B6B] to-[#ffaf25] h-2.5 rounded-full transition-all duration-500 ease-out"
                        style="width: @yield('progress-percentage', '0')%; --progress-value: @yield('progress-percentage', '0')%">
                    </div>
                </div>

                <!-- Secciones del formulario -->
                <div class="grid grid-cols-5 gap-2 mt-4 text-center text-xs font-medium text-gray-600">
                    @yield('progress-sections')

                </div>
            </div>

            <!-- Contenido de la vista -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @yield('content')
            </div>
        </main>

        <!-- Pie de página -->
        <footer class="bg-secondary text-white text-center py-4 mt-8">
            <p>&copy; 2025 Historia de Desarrollo. Todos los derechos reservados.</p>
        </footer>
    </div>

</body>

</html>