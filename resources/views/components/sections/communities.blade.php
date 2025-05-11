<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="title-font text-3xl md:text-4xl font-bold mb-4">Nuestras Comunidades</h2>
            <div class="w-24 h-1 bg-yellow-600 mx-auto mb-6"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach($communities->take(4) as $community)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $community->banner_image ?? asset('img/defecto.png') }}" class="w-full h-48 object-cover" alt="{{ $community->name }}">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $community->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($community->description, 100) }}</p>
                        <a href="{{route('communities.show', $community)}}" class="text-yellow-600 hover:underline font-semibold">Más información →</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
