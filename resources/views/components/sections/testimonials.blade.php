<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="title-font text-3xl md:text-4xl font-bold mb-4">Voces de Nuestras Comunidades</h2>
            <div class="w-24 h-1 bg-yellow-600 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Escuche a los líderes comunitarios y a los portadores de la cultura hablar sobre lo que hace que su patrimonio sea especial.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestPosts as $post)
                <a href="{{ route('posts.show', $post) }}" >
                    <div class="bg-white p-8 rounded-lg">
                        <div class="text-yellow-400 text-2xl mb-4">
                            <i class="fas fa-quote-left"></i> <Span class="text-xl font-bold text-gray-800 mb-2">{{$post->title}}</Span>
                        </div>
                        <p class="text-gray-700 italic mb-6">
                            {{ Str::limit($post->excerpt ?? strip_tags($post->content), 80) }}
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-gray-300">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}" class="w-12 h-12 rounded-full object-cover mr-2" alt="{{ $post->user->name }}">
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold">{{$post->user->name}}</h4>
                                <p class="text-gray-600 text-sm">{{$post->user->specialty}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
