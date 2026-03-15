<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Admisiones</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="shortcut icon" type="image/svg" href="{{ asset('/img/sello-cumbres-en-blanco-01.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/img/sello-cumbres-en-blanco-01.png') }}">
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-600 to-blue-400">
   <!-- <body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#5D7E8D] via-[#7FA0B0] to-[#3F5B66]"> -->

    <!-- overlay -->
    <div class="absolute inset-0 bg-black/30"></div>

    <div class="relative w-[92%] max-w-md mx-auto">

        <!-- encabezado -->
        <div class="text-center text-white mb-6">
            <div class="flex justify-center mb-4">
                <div class="bg-white p-3 rounded-full shadow-lg">
                    <img src="/img/sello-cumbres.svg" class="h-20">
                </div>
            </div>
            <h1 class="text-3xl font-bold">Sistema de Admisiones</h1>
            <p class="text-sm opacity-90">Plataforma para gestión de aspirantes</p>
        </div>

        <div class="bg-white/95 backdrop-blur rounded-xl shadow-2xl p-6 sm:p-8 max-w-md">

            @if(session('success') || session('error'))
            <div class="{{ session('success') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} p-3 rounded mb-4">
                {{ session('success') ?? session('error') }}
            </div>
            @endif

            <h2 class="text-xl font-semibold mb-6 text-center text-gray-700">
                Acceso Administrativo
            </h2>

            @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Correo electrónico
                    </label>

                    <input type="email" name="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="ejemplo@correo.com">
                </div>

                <div class="mb-6 relative">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Contraseña
                    </label>

                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="********">

                    <button type="button" id="togglePassword"
                        class="absolute right-3 top-9 text-gray-600 hover:text-gray-900">
                        Mostrar
                    </button>
                </div>

                <button type="submit"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg transition">
                    Ingresar
                </button>

            </form>

        </div>

        <p class="text-center text-white text-xs mt-4 opacity-80">
            © {{ date('Y') }} Colegio Cumbres Querétaro — Área de Admisiones
        </p>

    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {

            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.textContent = type === 'password' ? 'Mostrar' : 'Ocultar';

        });
    </script>

</body>

</html>