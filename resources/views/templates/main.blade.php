<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia de Desarrollo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#5D7E8D',
                        secondary: '#213d78',
                        accent: '#FF6B6B',
                    },
                    animation: {
                        'progress-bar': 'progress 1.5s ease-out forwards'
                    },
                    keyframes: {
                        progress: {
                            '0%': { width: '0%' },
                            '100%': { width: 'var(--progress-value)' }
                        }
                    }
                }
            }
        }
    </script>
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
                         class="bg-gradient-to-r from-accent to-[#ffaf25] h-2.5 rounded-full transition-all duration-500 ease-out" 
                         style="width: @yield('progress-percentage', '0')%"
                         style="--progress-value: @yield('progress-percentage', '0')%">
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

    <!-- Script para progreso dinámico -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animación inicial
            const progressBar = document.getElementById('globalProgressBar');
            progressBar.style.animation = 'progress-bar 1s forwards';
            
            // Actualización dinámica (ejemplo)
            const form = document.querySelector('form');
            if(form) {
                const requiredFields = form.querySelectorAll('input[required], select[required], textarea[required]').length;
                
                form.addEventListener('input', function() {
                    let completed = 0;
                    form.querySelectorAll('input[required], select[required], textarea[required]').forEach(field => {
                        if(field.value.trim() !== '') completed++;
                    });
                    
                    const progress = Math.round((completed / requiredFields) * 100);
                    document.getElementById('progressPercentage').textContent = progress;
                    progressBar.style.width = `${progress}%`;
                });
            }
        });
    </script>
</body>
</html>