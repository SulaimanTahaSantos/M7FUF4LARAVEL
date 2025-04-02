<!-- filepath: /workspace/resources/views/suma.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suma de Números</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Suma de Dos Números</h1>

        <form action="/suma" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="numero1" class="block text-gray-700 text-sm font-bold mb-2">Número 1:</label>
                <input type="number" id="numero1" name="numero1"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mb-4">
                <label for="numero2" class="block text-gray-700 text-sm font-bold mb-2">Número 2:</label>
                <input type="number" id="numero2" name="numero2"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Sumar
                </button>
            </div>
        </form>

        @if (isset($suma))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
                role="alert">
                <strong class="font-bold">Resultado:</strong>
                <span class="block sm:inline">La suma de los números es {{ $suma }}.</span>
            </div>
        @endif
    </div>
</body>

</html>
