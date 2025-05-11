@extends('layouts.app')
@section('title', 'Posts')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-3">Últimos Artículos</h1>
        <p class="text-lg text-gray-600">Explora nuestra colección de publicaciones recientes</p>
    </div>
    <div class="mb-8 max-w-4xl mx-auto">
        <form method="GET" action="{{ route('posts.index') }}" class="flex flex-col md:flex-row items-center gap-4">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="Buscar artículos..." 
                class="w-full md:w-2/3 px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
    
            <select 
                name="category" 
                class="w-full md:w-1/3 px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
                <option value="">Todas las categorías</option>
                @foreach($categories as $category)
                    <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
    
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                Filtrar
            </button>
        </form>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="article-container">
        @foreach($posts as $post)
            <div class="article-card">
                <div class="bg-white rounded-xl shadow-md overflow-hidden h-full transform transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative">
                        <img src="{{ file_exists(public_path($post->featured_image)) ? asset($post->featured_image) : asset('img/defecto.png') }}" class="h-44 w-full object-cover" alt="{{ $post->title }}">
                        <span class="absolute top-3 right-3 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-md capitalize">{{ $post->type }}</span>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center mb-3 text-sm text-gray-500">
                            <span class="mr-3"><i class="far fa-calendar-alt mr-1"></i> {{ $post->created_at->format('M d, Y') }}</span>
                            <span><i class="far fa-eye mr-1"></i> {{ $post->views }} vistas</span>
                        </div>
                        <h5 class="text-xl font-bold mb-2">{{ $post->title }}</h5>
                        <p class="text-gray-600 mb-5">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 100) }}</p>
                    </div>
                    <div class="px-5 py-3 bg-gray-50 flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}" class="w-10 h-10 rounded-full object-cover mr-2" alt="{{ $post->user->name }}">
                            <span class="text-sm">{{ $post->user->name }}</span>
                        </div>
                        <a href="{{ route('posts.show', $post->slug) }}" class="px-3 py-1 text-sm border border-blue-600 text-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition-colors">
                            Leer más
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-12 text-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
