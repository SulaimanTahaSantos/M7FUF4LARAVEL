@extends('layouts.base')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Listado de Lenguajes de Programación</h1>
        <p class="text-gray-600">Gestiona tu colección de lenguajes de programación</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

 <div class="bg-white rounded-lg shadow-lg border border-gray-200">
    <div class="bg-gradient-to-r from-blue-50 to-purple-50 px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">Lenguajes Registrados</h2>
    </div>

    <div class="w-full">
        <table class="w-full table-fixed divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">
                            Nombre
                        </th>
                        <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-2/6">
                            Descripción
                        </th>
                        <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">
                            Creado por
                        </th>
                        <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                            Fecha
                        </th>
                        <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                            Tipo
                        </th>
                        <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                            URL
                        </th>
                        <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @forelse($lenguajes as $lenguaje)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-3 py-4">
                                <div class="text-sm font-medium text-gray-900 truncate">{{ $lenguaje->nombre }}</div>
                            </td>
                            <td class="px-3 py-4">
                                <div class="text-sm text-gray-900 truncate" title="{{ $lenguaje->descripcion }}">
                                    {{ $lenguaje->descripcion ?: 'No disponible' }}
                                </div>
                            </td>
                            <td class="px-3 py-4">
                                <div class="text-sm text-gray-900 truncate">{{ $lenguaje->creador }}</div>
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900">
                                {{ $lenguaje->fecha_lanzamiento }}
                            </td>
                            <td class="px-3 py-4">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 truncate">
                                    {{ $lenguaje ->tipo ?: 'No disponible' }}
                                </span>
                            </td>
                            <td class="px-3 py-4 text-center">
                                @if($lenguaje->url)
                                    <img src="{{ $lenguaje->url }}" alt="Logos de lenguajes de programación">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-3 py-4">
                                <div class="flex space-x-1">
                                    <a href="{{ route('lenguajesdeprogramacion.edit', $lenguaje) }}"
                                       class="bg-yellow-100 hover:bg-yellow-200 text-yellow-800 px-2 py-1 rounded text-xs font-medium transition-colors duration-200">
                                        Editar
                                    </a>
                                    <form action="{{ route('lenguajesdeprogramacion.destroy', $lenguaje) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('¿Estás seguro de que quieres eliminar este lenguaje?')"
                                                class="bg-red-100 hover:bg-red-200 text-red-800 px-2 py-1 rounded text-xs font-medium transition-colors duration-200">
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
                                    <p class="text-lg font-medium">No hay lenguajes registrados</p>
                                    <p class="text-sm">Comienza agregando tu primer lenguaje de programación</p>
                                    <a href="{{ route('lenguajesdeprogramacion.create') }}"
                                       class="mt-4 inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white text-sm font-medium rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Agregar Lenguaje
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

