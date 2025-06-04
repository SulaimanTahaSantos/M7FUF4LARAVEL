@extends('layouts.titan')

@section('content')
    <div class="mb-8">
        <div class="flex items-center space-x-3 mb-4">
            <a href="{{ route('titanes.index') }}"
               class="text-red-600 hover:text-red-800 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Editar Titán</h1>
        </div>
        <p class="text-gray-600">Modifica la información del titán: <span class="font-semibold text-red-600">{{ $titane->nombre }}</span></p>
    </div>

    <div class="bg-white rounded-lg shadow-lg border border-gray-200">
        <div class="bg-gradient-to-r from-orange-50 to-yellow-50 px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                <svg class="w-5 h-5 mr-2 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                </svg>
                Editar Información del Titán
            </h2>
        </div>

        <div class="p-6">
            <form action="{{ route('titanes.update', $titane) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                @include('titanes.form')

                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('titanes.index') }}"
                       class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors duration-200">
                        Cancelar
                    </a>
                    <div class="flex space-x-3">
                        <a href="{{ route('titanes.show', $titane) }}"
                           class="bg-blue-100 hover:bg-blue-200 text-blue-800 font-bold py-2 px-4 rounded-lg transition-colors duration-200">
                            Ver Detalles
                        </a>
                        <button type="submit"
                                class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                             Actualizar Titán
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
