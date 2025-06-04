@extends('layouts.titan')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Titanes de Shingeki no Kyojin</h1>
        <p class="text-gray-600">Gestiona la información de los titanes del anime</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6">
        <a href="{{ route('titanes.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-200">
             Agregar Nuevo Titán
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg border border-gray-200">
        <div class="bg-gradient-to-r from-red-50 to-orange-50 px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Lista de Titanes</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Portador
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Altura
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tipo
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Habilidades
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Imagen
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($titanes as $titan)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $titan->nombre }}</div>
                                <div class="text-sm text-gray-500 truncate">{{ Str::limit($titan->descripcion, 50) }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $titan->portador }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $titan->altura }}m
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    {{ $titan->tipo }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ Str::limit($titan->habilidades, 40) }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($titan->imagen_url)
                                    <img src="{{ $titan->imagen_url }}" alt="{{ $titan->nombre }}"
                                         class="w-12 h-12 rounded-full object-cover mx-auto">
                                @else
                                    <span class="text-gray-400">Sin imagen</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('titanes.show', $titan) }}"
                                       class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-3 py-1 rounded text-sm font-medium transition-colors duration-200">
                                        Ver
                                    </a>
                                    <a href="{{ route('titanes.edit', $titan) }}"
                                       class="bg-yellow-100 hover:bg-yellow-200 text-yellow-800 px-3 py-1 rounded text-sm font-medium transition-colors duration-200">
                                        Editar
                                    </a>
                                    <form action="{{ route('titanes.destroy', $titan) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('¿Estás seguro de que quieres eliminar este titán?')"
                                                class="bg-red-100 hover:bg-red-200 text-red-800 px-3 py-1 rounded text-sm font-medium transition-colors duration-200">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="text-gray-500">
                                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p class="text-lg font-medium">No hay titanes registrados</p>
                                    <p class="text-sm">Comienza agregando el primer titán</p>
                                    <a href="{{ route('titanes.create') }}"
                                       class="mt-4 inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-orange-600 text-white text-sm font-medium rounded-lg hover:from-red-600 hover:to-orange-700 transition-all duration-300">
                                        Agregar Titán
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
