@extends('templates.main')

@section('content')
<div class="min-h-screen flex flex-col">

    <!-- Contenido principal -->
    <main class="flex-1 container mx-auto px-4 sm:px-6 py-8 md:py-12">
        <div class="max-w-3xl mx-auto">
       
            <!-- Tarjeta de selección -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden animate-fade-in">
                <!-- Encabezado de la tarjeta -->
                <div class="bg-primary text-[#1f355e] py-4 px-6">
                    <h2 class="text-xl md:text-2xl font-bold text-center">Seleccione el nivel educativo</h2>
                    <p class="text-center text-[#1f355e] mt-1">¿Para qué nivel desea llenar la historia de desarrollo?</p>
                </div>
                
                <!-- Opciones de selección -->
                <div class="p-6 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Opción Preescolar -->
                        <a href="{{ route('preescolar.seccion1') }}" 
                           class="group border-2 border-blue-100 rounded-xl p-6 text-center hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md">
                            <div class="bg-blue-100 rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center group-hover:bg-blue-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.933 12.8a1 1 0 000-1.6L6.6 7.2A1 1 0 005 8v8a1 1 0 001.6.8l5.333-4zM19.933 12.8a1 1 0 000-1.6l-5.333-4A1 1 0 0013 8v8a1 1 0 001.6.8l5.333-4z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2 group-hover:text-primary">Preescolar</h3>
                            <p class="text-gray-600">Para niños de 3 a 5 años</p>
                            <div class="mt-4">
                                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium group-hover:bg-blue-200">
                                    Maternal a Kinder 3
                                </span>
                            </div>
                        </a>
                        
                        <!-- Opción Primaria/Secundaria -->
                        <a href="{{ route('historia.primaria-secundaria') }}" 
                           class="group border-2 border-green-100 rounded-xl p-6 text-center hover:bg-green-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md">
                            <div class="bg-green-100 rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center group-hover:bg-green-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2 group-hover:text-green-700">Primaria/Secundaria</h3>
                            <p class="text-gray-600">Para niños de 6 a 15 años</p>
                            <div class="mt-4">
                                <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium group-hover:bg-green-200">
                                    1° Primaria a 3° Secundaria
                                </span>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Información adicional -->
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <div class="bg-blue-50 rounded-lg p-4">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mt-0.5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-sm text-gray-700">
                                    <strong>Nota:</strong> Si tiene hijos en ambos niveles, deberá completar un formulario para cada uno.
                                </p>
                            </div>
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
@endsection