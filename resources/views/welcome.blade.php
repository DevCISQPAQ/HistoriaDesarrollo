<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia de Desarrollo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: '#5D7E8D',
                        secondary: '#213d78',
                        accent: '#FF6B6B',
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in-out',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">
    <div class="min-h-screen flex flex-col">
        <!-- Encabezado -->
        <header class="bg-primary text-white py-4 shadow-md flex justify-center items-center gap-4">
            <img src="{{ asset('img/sello-cumbres-en-blanco-01.png') }}" alt="Logo" class="h-12 w-auto">
            <h1 class="text-2xl font-bold text-center">Historia de Desarrollo</h1>
        </header>
        
        <!-- Contenedor principal -->
        <main class="flex-1 container mx-auto px-4 sm:px-6 py-8 md:py-12">
            <!-- Progress Bar (oculta en welcome) -->
            <div class="w-full bg-gray-200 rounded-full h-3 mb-4 hidden">
                <div id="progressBar" class="bg-blue-500 h-3 rounded-full" style="width: 0%;"></div>
            </div>
            
            <!-- Contenido de bienvenida -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden md:flex md:flex-row-reverse animate-fade-in">
                    <!-- Imagen decorativa -->
                    <div class="md:w-1/2 bg-gradient-to-br from-primary to-secondary p-6 flex items-center justify-center">
                        <img src="{{ asset('img/form.svg') }}" 
                             alt="Formulario importante" 
                             class="w-64 h-64 object-contain animate-float">
                    </div>
                    
                    <!-- Texto y botón -->
                    <div class="md:w-1/2 p-8 md:p-10">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">¡Bienvenido(a)!</h2>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Los siguientes datos son de gran importancia para que podamos valorar con mayor precisión 
                            el desarrollo de las habilidades de su hijo(a); por ello, le suplicamos contestar con 
                            veracidad y precisión.
                        </p>
                        
                        <div class="mt-8">
                            <a href="{{ route('historia.nivel-educativo') }}" class="inline-block w-full md:w-auto px-8 py-3 text-center bg-accent hover:bg-red-600 text-white font-medium rounded-lg shadow-md transition duration-300 transform hover:scale-105">
                                {{-- <a href="#" class="inline-block w-full md:w-auto px-8 py-3 text-center bg-accent hover:bg-red-600 text-white font-medium rounded-lg shadow-md transition duration-300 transform hover:scale-105"> --}}

                                Comenzar ahora
                            </a>
                            
                            <p class="text-sm text-gray-500 mt-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Tiempo estimado: 15-20 minutos
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Información adicional -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-primary">
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800 mb-2">Confidencialidad</h3>
                                <p class="text-gray-600 text-sm">Toda la información proporcionada será tratada con estricta confidencialidad.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-secondary">
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800 mb-2">Importancia</h3>
                                <p class="text-gray-600 text-sm">Sus respuestas nos ayudarán a brindar una mejor atención a su hijo(a).</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-accent">
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800 mb-2">Soporte</h3>
                                <p class="text-gray-600 text-sm">Si necesita ayuda, contáctenos a través de nuestro correo electrónico.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Pie de página -->
        <footer class="bg-secondary text-white text-center py-4 mt-8">
            <div class="container mx-auto px-4">
                <p>&copy; 2025 Historia de Desarrollo. Todos los derechos reservados.</p>
                <p class="text-sm mt-2 opacity-80">Colegio Cumbres - Sistema de Admisiones</p>
            </div>
        </footer>
    </div>
</body>
</html>