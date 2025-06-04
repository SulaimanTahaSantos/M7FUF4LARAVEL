<!-- Nombre del Titán -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">
            Nombre del Titán <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="nombre"
               id="nombre"
               value="{{ old('nombre', $titane->nombre ?? '') }}"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 @error('nombre') border-red-500 @enderror"
               placeholder="Ej: Titán Colosal">
        @error('nombre')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="tipo" class="block text-sm font-medium text-gray-700 mb-2">
            Tipo de Titán <span class="text-red-500">*</span>
        </label>
        <select name="tipo"
                id="tipo"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 @error('tipo') border-red-500 @enderror">
            <option value="">Selecciona un tipo</option>
            <option value="Titán Cambiante" {{ old('tipo', $titane->tipo ?? '') == 'Titán Cambiante' ? 'selected' : '' }}>Titán Cambiante</option>
            <option value="Titán Puro" {{ old('tipo', $titane->tipo ?? '') == 'Titán Puro' ? 'selected' : '' }}>Titán Puro</option>
            <option value="Titán Especial" {{ old('tipo', $titane->tipo ?? '') == 'Titán Especial' ? 'selected' : '' }}>Titán Especial</option>
            <option value="Los Nueve" {{ old('tipo', $titane->tipo ?? '') == 'Los Nueve' ? 'selected' : '' }}>Los Nueve</option>
        </select>
        @error('tipo')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="portador" class="block text-sm font-medium text-gray-700 mb-2">
            Portador <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="portador"
               id="portador"
               value="{{ old('portador', $titane->portador ?? '') }}"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 @error('portador') border-red-500 @enderror"
               placeholder="Ej: Armin Arlert">
        @error('portador')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="altura" class="block text-sm font-medium text-gray-700 mb-2">
            Altura (metros) <span class="text-red-500">*</span>
        </label>
        <input type="number"
               name="altura"
               id="altura"
               value="{{ old('altura', $titane->altura ?? '') }}"
               step="0.01"
               min="0"
               max="999.99"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 @error('altura') border-red-500 @enderror"
               placeholder="Ej: 60">
        @error('altura')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div>
    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">
        Descripción <span class="text-red-500">*</span>
    </label>
    <textarea name="descripcion"
              id="descripcion"
              rows="4"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 @error('descripcion') border-red-500 @enderror"
              placeholder="Describe las características principales del titán...">{{ old('descripcion', $titane->descripcion ?? '') }}</textarea>
    @error('descripcion')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="habilidades" class="block text-sm font-medium text-gray-700 mb-2">
        Habilidades Especiales <span class="text-red-500">*</span>
    </label>
    <textarea name="habilidades"
              id="habilidades"
              rows="3"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 @error('habilidades') border-red-500 @enderror"
              placeholder="Ej: Vapor súper caliente, regeneración rápida, transformación explosiva...">{{ old('habilidades', $titane->habilidades ?? '') }}</textarea>
    @error('habilidades')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="imagen_url" class="block text-sm font-medium text-gray-700 mb-2">
        URL de Imagen (opcional)
    </label>
    <input type="url"
           name="imagen_url"
           id="imagen_url"
           value="{{ old('imagen_url', $titane->imagen_url ?? '') }}"
           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 @error('imagen_url') border-red-500 @enderror"
           placeholder="https://ejemplo.com/imagen-titan.jpg">
    @error('imagen_url')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
    <p class="mt-1 text-sm text-gray-500">Opcional: URL de una imagen del titán</p>
</div>

<div id="imagen-preview" class="hidden">
    <label class="block text-sm font-medium text-gray-700 mb-2">Vista previa</label>
    <div class="w-32 h-32 border border-gray-300 rounded-lg overflow-hidden bg-gray-50">
        <img id="preview-img" src="" alt="Vista previa" class="w-full h-full object-cover">
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const imagenUrlInput = document.getElementById('imagen_url');
    const previewDiv = document.getElementById('imagen-preview');
    const previewImg = document.getElementById('preview-img');

    // Mostrar vista previa si ya hay una URL
    if (imagenUrlInput.value) {
        mostrarVistaPrevia(imagenUrlInput.value);
    }

    imagenUrlInput.addEventListener('input', function() {
        const url = this.value.trim();
        if (url && esUrlValida(url)) {
            mostrarVistaPrevia(url);
        } else {
            ocultarVistaPrevia();
        }
    });

    function mostrarVistaPrevia(url) {
        previewImg.src = url;
        previewDiv.classList.remove('hidden');

        previewImg.onerror = function() {
            ocultarVistaPrevia();
        };
    }

    function ocultarVistaPrevia() {
        previewDiv.classList.add('hidden');
        previewImg.src = '';
    }

    function esUrlValida(string) {
        try {
            new URL(string);
            return true;
        } catch (_) {
            return false;
        }
    }
});
</script>
