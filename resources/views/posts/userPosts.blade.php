@if(count($recentPosts) > 0)
    <div class="flow-root">
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($recentPosts as $post)
                <li class="py-3">
                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                        <div class="flex-1 min-w-0 mb-2 md:mb-0">
                            <p class="text-base font-semibold text-gray-900 dark:text-white truncate">
                                {{ $post->title }}
                            </p>
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <span class="capitalize mr-2">{{ $post->type }}:</span>
                                <span>{{ Str::limit($post->excerpt, 60) }}</span>
                            </div>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mt-1">
                                <span class="bg-{{ $post->status === 'publicado' ? 'green' : ($post->status === 'pendiente' ? 'yellow' : 'gray') }}-100 text-{{ $post->status === 'publicado' ? 'green' : ($post->status === 'pendiente' ? 'yellow' : 'gray') }}-800 px-2 py-0.5 rounded">
                                    {{ __(ucfirst(str_replace('_', ' ', $post->status))) }}
                                </span>

                                <span class="mx-1">•</span>
                                <span>{{ $post->user->name }}</span>
                                <span class="mx-1">•</span>
                                <span>{{ $post->created_at->diffForHumans() }}</span>

                                @if($post->categories->isNotEmpty())
                                    <span class="mx-1">•</span>
                                    <span>{{ $post->categories->first()->name }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('posts.show', $post) }}" class="text-sm text-while-600 hover:bg-gray-700 bg-gray-500 p-1 rounded">Ver</a>
                            @if(Auth::id() === $post->user_id)
                                <a href="{{ route('posts.edit', $post) }}" class="text-sm text-while-600 hover:bg-gray-700 bg-gray-500 p-1 rounded">Editar</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este post?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-white bg-red-500 hover:bg-red-600 p-1 rounded">
                                        Eliminar
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@else
    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 text-center">
        <p class="text-gray-500 dark:text-gray-400">
            No tienes publicaciones.
        </p>
        <div class="mt-3">
            <a href="{{ route('posts.create') }}" class="text-sm bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Crear tu primer post
            </a>
        </div>
    </div>
@endif
