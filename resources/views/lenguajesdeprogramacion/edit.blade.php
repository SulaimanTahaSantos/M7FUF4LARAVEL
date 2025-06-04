@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Edita los lenguajes de programación</h1>

    <form action="{{ route('lenguajesdeprogramacion.update', $lenguajesDeProgramacion) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        @include('lenguajesdeprogramacion.form')
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            Actualiza
        </button>
    </form>
</div>
@endsection
