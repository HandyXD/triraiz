<form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
    @csrf
    @if(isset($post))
        @method('PUT')
    @endif
    
    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ isset($post) ? 'Editar' : 'Crear nuevo' }} Post</h2>
    
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required
               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="mb-4">
        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenido:</label>
        <textarea id="content" name="content" rows="6" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('content', $post->content ?? '') }}</textarea>
        @error('content')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Tipo:</label>
            <select id="type" name="type" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Seleccionar tipo --</option>
                @foreach(['artículo', 'crónica', 'entrevista', 'video', 'podcast', 'galería', 'educativo'] as $type)
                    <option value="{{ $type }}" {{ old('type', $post->type ?? '') == $type ? 'selected' : '' }}>
                        {{ ucfirst($type) }}
                    </option>
                @endforeach
            </select>
            @error('type')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Estado:</label>
            <select id="status" name="status" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Seleccionar estado --</option>
                @foreach(['borrador', 'pendiente', 'publicado', 'rechazado'] as $status)
                    <option value="{{ $status }}" {{ old('status', $post->status ?? '') == $status ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $status)) }}
                    </option>
                @endforeach
            </select>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="mb-4">
        <label for="community_id" class="block text-sm font-medium text-gray-700 mb-1">Comunidad:</label>
        <select id="community_id" name="community_id"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="">-- Seleccionar comunidad --</option>
            @foreach($communities as $community)
                <option value="{{ $community->id }}" {{ old('community_id', $post->community_id ?? '') == $community->id ? 'selected' : '' }}>
                    {{ $community->name }}
                </option>
            @endforeach
        </select>
        @error('community_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="mb-6">
        <label for="category_ids" class="block text-sm font-medium text-gray-700 mb-1">Categorías:</label>
        <select id="category_ids" name="category_ids[]" multiple
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 h-32">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ (isset($post) && $post->categories->contains($category->id)) || 
                       (is_array(old('category_ids')) && in_array($category->id, old('category_ids'))) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <p class="mt-1 text-xs text-gray-500">Mantén presionado Ctrl (Cmd en Mac) para seleccionar múltiples categorías</p>
        @error('category_ids')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="flex justify-end space-x-3">
        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            Cancelar
        </a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            {{ isset($post) ? 'Actualizar' : 'Crear' }} Post
        </button>
    </div>
</form>