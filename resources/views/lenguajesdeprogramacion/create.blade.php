@extends('layouts.base')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Nuevo lenguaje de programación</h1>
    <form action="{{ route('lenguajesdeprogramacion.store', [], true) }}" method="POST" class="space-y-6">
        @csrf
        @include('lenguajesdeprogramacion.form')
        <button type="submit" class="bg-[#bad80a] text-dark px-4 py-2 rounded">
            Guardar
        </button>
    </form>
</div>
@endsection
