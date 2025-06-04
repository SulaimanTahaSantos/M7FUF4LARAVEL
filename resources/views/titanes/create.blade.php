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
            <h1 class="text-3xl font-bold text-gray-800">Agregar Nuevo Titán</h1>
        </div>
        <p class="text-gray-600">Registra un nuevo titán de Shingeki no Kyojin</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg border border-gray-200">
        <div class="bg-gradient-to-r from-red-50 to-orange-50 px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                <svg class="w-5 h-5 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Información del Titán
            </h2>
        </div>

        <div class="p-6">
            <form action="{{ route('titanes.store') }}" method="POST" class="space-y-6">
                @csrf

                @include('titanes.form')

                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('titanes.index') }}"
                       class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors duration-200">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="bg-gradient-to-r from-red-500 to-orange-600 hover:from-red-600 hover:to-orange-700 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Crear Titán
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
