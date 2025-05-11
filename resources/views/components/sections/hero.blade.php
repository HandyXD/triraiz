<section class="hero-gradient min-w-full min-w-2xs text-white  md:py-32 bg-gradient-to-br from-blue-950 to-gray-700">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-10 md:mb-0">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Explorando a las Comunidades de <span class="text-yellow-400">NARP</span>
            </h1>
            <p class="text-xl mb-8">
                Dedicado a preservar y promover el patrimonio cultural de las comunidades negras, afrocolombianas, raizales y palenqueras de Colombia.
            </p>
            <div class="flex space-x-4">
                <a href="#" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-full">
                    Explorar Culturas
                </a>
                <a href="{{route('posts.index')}}" class="border-2 border-white hover:bg-white hover:text-gray-900 text-white font-bold py-3 px-6 rounded-full">
                    Publicaciones
                </a>
            </div>
        </div>
        <div class="md:w-1/2 flex justify-center">
            <div class="relative">
                <img src="{{ asset('img/imagen7.jpeg') }}" alt="NAPR Community"
                class="rounded-lg shadow-2xl max-w-md">
                <div class="absolute -bottom-5 -right-5 bg-yellow-500 text-white p-4 rounded-lg shadow-lg">
                    <p class="font-bold">Desde el siglo XVI</p>
                    {{-- <p>Rich heritage</p> --}}
                </div>
            </div>
        </div>
    </div>
</section>
