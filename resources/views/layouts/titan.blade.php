<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titanes de Shingeki no Kyojin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-red-50 via-orange-50 to-yellow-50">

    <nav class="bg-white/90 backdrop-blur-sm shadow-lg border-b border-red-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-red-600 to-orange-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V7l-7-5z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <a href="{{ route('titanes.index') }}"
                       class="text-xl font-bold bg-gradient-to-r from-red-600 to-orange-600 bg-clip-text text-transparent hover:from-orange-600 hover:to-red-600 transition-all duration-300">
                        Titanes de Shingeki no Kyojin
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('titanes.index') }}"
                       class="text-gray-600 hover:text-red-600 font-medium transition-colors duration-200">
                        Lista de Titanes
                    </a>
                    <a href="{{ route('titanes.create') }}"
                       class="bg-gradient-to-r from-red-500 to-orange-600 hover:from-red-600 hover:to-orange-700 text-white px-6 py-2 rounded-full font-medium transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Agregar Titán
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            @yield('content')
        </div>
    </main>

    <footer class="bg-gradient-to-r from-red-800 to-orange-800 text-white py-4 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-sm">© 2025 Titanes de Shingeki no Kyojin - Sistema de Gestión</p>
            <p class="text-xs text-red-200 mt-1">¡Sasageyo! ¡Dedica tu corazón!</p>
        </div>
    </footer>

    <script>
        // Confirmación para eliminar
        function confirmarEliminacion(nombre) {
            return confirm(`¿Estás seguro de que quieres eliminar al titán "${nombre}"? Esta acción no se puede deshacer.`);
        }
    </script>

</body>
</html>
