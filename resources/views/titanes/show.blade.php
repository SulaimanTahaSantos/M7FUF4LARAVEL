@extends('layouts.titan')

@section('content')
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <a href="{{ route('titanes.index') }}"
                   class="text-red-600 hover:text-red-800 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-gray-800">{{ $titane->nombre }}</h1>
                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                    {{ $titane->tipo }}
                </span>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('titanes.edit', $titane) }}"
                   class="bg-orange-100 hover:bg-orange-200 text-orange-800 font-bold py-2 px-4 rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                    Editar
                </a>
                <form action="{{ route('titanes.destroy', $titane) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirmarEliminacion('{{ $titane->nombre }}')"
                            class="bg-red-100 hover:bg-red-200 text-red-800 font-bold py-2 px-4 rounded-lg transition-colors duration-200">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Información Principal -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-lg border border-gray-200">
                <div class="bg-gradient-to-r from-red-50 to-orange-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Información Detallada</h2>
                </div>
                <div class="p-6 space-y-6">
                    <!-- Descripción -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-900 leading-relaxed">{{ $titane->descripcion }}</p>
                        </div>
                    </div>

                    <!-- Detalles en Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Portador</label>
                            <div class="bg-blue-50 rounded-lg p-3">
                                <p class="text-blue-900 font-semibold">{{ $titane->portador }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Altura</label>
                            <div class="bg-green-50 rounded-lg p-3">
                                <p class="text-green-900 font-semibold">{{ $titane->altura }} metros</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Titán</label>
                            <div class="bg-purple-50 rounded-lg p-3">
                                <p class="text-purple-900 font-semibold">{{ $titane->tipo }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Fecha de Registro</label>
                            <div class="bg-gray-50 rounded-lg p-3">
                                <p class="text-gray-900 text-sm">{{ $titane->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Habilidades -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Habilidades Especiales</label>
                        <div class="bg-gradient-to-r from-red-50 to-orange-50 rounded-lg p-4 border-l-4 border-red-500">
                            <p class="text-gray-900 leading-relaxed">{{ $titane->habilidades }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Imagen y Stats -->
        <div class="space-y-6">
            <!-- Imagen -->
            <div class="bg-white rounded-lg shadow-lg border border-gray-200">
                <div class="bg-gradient-to-r from-orange-50 to-yellow-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Imagen</h2>
                </div>
                <div class="p-6">
                    @if($titane->imagen_url)
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100 mb-4">
                            <img src="{{ $titane->imagen_url }}"
                                 alt="{{ $titane->nombre }}"
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-sm text-gray-500 text-center">{{ $titane->nombre }}</p>
                    @else
                        <div class="aspect-square rounded-lg bg-gradient-to-br from-red-100 to-orange-100 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 mx-auto text-red-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-red-600 font-medium">Sin imagen</p>
                                <p class="text-red-400 text-sm">No hay imagen disponible</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Stats Rápidas -->
            <div class="bg-white rounded-lg shadow-lg border border-gray-200">
                <div class="bg-gradient-to-r from-yellow-50 to-red-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Estadísticas</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Poder de Ataque</span>
                        <div class="flex">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $titane->altura >= ($i * 15) ? 'text-red-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Velocidad</span>
                        <div class="flex">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $titane->altura <= ($i * 20) ? 'text-orange-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    <div class="pt-4 border-t border-gray-200">
                        <p class="text-xs text-gray-500">* Estadísticas estimadas basadas en altura y tipo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
