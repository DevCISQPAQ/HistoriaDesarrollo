<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/src/styles.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>

    <div x-data="{ open: false }">
        <button @click="open = !open" class="bg-blue-500 text-white px-4 py-2">
            Toggle mensaje
        </button>

        <div x-show="open" class="mt-2 text-blue-700">
            ¡Alpine.js está funcionando!
        </div>


        <button class="btn-rojo">Eliminar</button>

        <h1 class="titulo-principal">Bienvenido</h1>

    </div>

</body>

</html>