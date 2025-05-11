<header class="bg-white shadow-md">
    <div class="container mx-auto px-4">
        <nav class="flex flex-wrap items-center justify-between py-4">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center">
                <svg class="h-8 w-8 mr-2 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <span class="font-bold text-xl text-yellow-600">TriRaiz</span>
            </a>

            <!-- Toggle -->
            <button id="menu-toggle" class="block lg:hidden text-blue-950 border border-blue-600 px-2 py-1 rounded hover:text-blue-500 hover:border-blue-500">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Links -->
            <div id="main-menu" class="hidden w-full lg:flex lg:items-center lg:w-auto mt-4 lg:mt-0">
                <ul class="lg:flex space-y-2 lg:space-y-0 lg:space-x-6 w-full lg:w-auto">
                    <li><a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-950">Inicio</a></li>
                    <li><a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-blue-950">Artículos</a></li>
                    <li><a href="{{ route('communities.index') }}" class="text-gray-600 hover:text-blue-950">Comunidades</a></li>
                </ul>
                <div class="ml-auto mt-4 lg:mt-0 lg:ml-6 flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-950">
                        @if(Auth::user())
                            <span class="text-gray-600 hover:text-blue-950">Panel</span>
                        @else
                            <span class="text-gray-600  hover:text-blue-950">Ingresa</span>
                        @endif
                        <span class="ml-2"><i class="fas fa-user-circle text-xl"></i></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('main-menu').classList.toggle('hidden');
        });
    </script>
</header>
