<div class="mb-6">
    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
    <input type="text" name="nombre" id="nombre"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
        value="{{ old('nombre', $lenguajesDeProgramacion->nombre ?? '') }}">
    @error('nombre')
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>

<div class="mb-6">
    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
    <input type="text" name="descripcion" id="descripcion"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
        value="{{ old('descripcion', $lenguajesDeProgramacion->descripcion ?? '') }}">
    @error('descripcion')
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>

<div class="mb-6">
    <label for="creador" class="block text-sm font-medium text-gray-700">Creador</label>
    <input type="text" name="creador" id="creador"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
        value="{{ old('creador', $lenguajesDeProgramacion->creador ?? '') }}">
    @error('creador')
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>

<div class="mb-6">
    <label for="fecha_lanzamiento" class="block text-sm font-medium text-gray-700">Fecha de Lanzamiento</label>
    <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
        value="{{ old('fecha_lanzamiento', $lenguajesDeProgramacion->fecha_lanzamiento ?? '') }}">
    @error('fecha_lanzamiento')
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>


<div class="mb-6">
    <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
    <input type="text" name="tipo" id="tipo"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
        value="{{ old('tipo', $lenguajesDeProgramacion->tipo ?? '') }}">
    @error('tipo')
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>

<div class="mb-6">
    <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
    <input type="text" name="url" id="url"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
        value="{{ old('url', $lenguajesDeProgramacion->url ?? '') }}">
    @error('url')
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
