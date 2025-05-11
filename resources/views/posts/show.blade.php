@extends('layouts.app')
@section('title', 'TriRaiz')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-4xl">
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
        <!-- Imagen destacada -->
        {{-- @if($post->featured_image) --}}
            <img src="{{ file_exists(public_path($post->featured_image)) ? asset($post->featured_image) : asset('img/defecto.png') }}" class="w-full h-64 object-cover">
        {{-- @else
            <div class="h-64 bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                <span class="text-white text-4xl font-bold">Sin imagen</span>
            </div>
        @endif --}}

        <div class="p-8">
            <!-- Meta -->
            <div class="flex items-center mb-4">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}" class="w-10 h-10 rounded-full mr-3" alt="{{ $post->user->name }}">
                <div>
                    <p class="font-medium text-gray-900">{{ $post->user->name }}</p>
                    <p class="text-sm text-gray-500">{{ $post->created_at->format('F d, Y') }} · {{ Str::ucfirst($post->type) }}</p>
                </div>
            </div>

            <div class="flex">
                <h1 class="text-3xl font-bold text-gray-900 mb-4 flex-auto">{{ $post->title }}</h1>
                <a href="{{ route('posts.index') }}"
                class="inline-block mb-6 text-sm px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition ">
                    ← Volver
                </a>
            </div>

            <!-- Categorías como etiquetas -->
            <div class="flex flex-wrap gap-2 mb-6">
                @foreach($post->categories as $category)
                <a href="{{ route('posts.index') }}?search=&category={{ $category->slug }}" target="_blank" rel="{{ $category->slug }}">
                    <span class="tag px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full hover:bg-blue-200">
                        #{{ $category->name }}
                    </span>
                </a>
                @endforeach
            </div>
            
            <!-- Resumen -->
            @isset($post->excerpt)
                <div class="prose max-w-none text-gray-700 mb-6">
                    <h3>Resumen</h3>
                    {!! nl2br(e($post->excerpt)) !!}
                </div>
            @endisset

           @isset($post->content)
                <!-- Contenido -->
                <div class="prose max-w-none text-gray-700 mb-6">
                    <h3>Desarrollo</h3>
                    {!! ($post->content) !!}
                </div>
            @endisset


            <!-- Reacciones -->
            <div class="flex items-center justify-between border-t border-b border-gray-100 py-4 mb-6">
                <div class="flex items-center space-x-4">
                    <button class="like-btn flex items-center space-x-1 text-gray-600 hover:text-red-500">
                        <i class="like-icon far fa-heart"></i>
                        <span>{{ $post->views }} vistas</span>
                    </button>
                    <button class="flex items-center space-x-1 text-gray-600 hover:text-blue-500">
                        <i class="fas fa-share-alt"></i>
                        <span>Compartir</span>
                    </button>
                </div>
                <button class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-bookmark"></i>
                </button>
            </div>

            <!-- Comentarios simulados -->
            <div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Comentarios</h3>

                <!-- Caja para nuevo comentario -->
                <div class="comment-box bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <h4 class="text-lg font-medium text-gray-900 mb-3">Deja un comentario</h4>
                    <form>
                        <textarea class="w-full px-4 py-3 rounded-lg border border-gray-300 mb-3" rows="4" placeholder="Escribe algo..."></textarea>
                        <div class="flex justify-between items-center">
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700">
                                Publicar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
