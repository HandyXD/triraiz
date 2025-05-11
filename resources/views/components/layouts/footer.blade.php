<footer class="bg-gray-800 text-white mt-12">
    <div class="container mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div>
            <h3 class="text-lg font-semibold mb-4">Sobre Nosotros</h3>
            <p class="text-gray-400 mb-4">TryRaiz es una plataforma dedicada a fortalecer la inclusión digital y la visibilidad de las comunidades negras, afrocolombianas, raizales y palenqueras (NAPR) en Colombia.</p>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div>
            <h3 class="text-lg font-semibold mb-4">Enlaces</h3>
            <ul class="space-y-2 text-gray-400">
                <li><a href="{{ route('home') }}" class="hover:text-white">Inicio</a></li>
                <li><a href="{{ route('posts.index') }}" class="hover:text-white">Artículos</a></li>
                <li><a href="{{ route('communities.index') }}" class="hover:text-white">Comunidades</a></li>
                <li><a href="{{ route('dashboard') }}" class="hover:text-white">Perfil</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-semibold mb-4">Registrarse</h3>
            <ul class="space-y-2 text-gray-400">
                <li><a href="{{ route('register') }}" class="hover:text-white">Registro</a></li>
            </ul>
        </div>
    </div>
    <div class="bg-gray-900 py-4">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
            <span>&copy; {{ date('Y') }} TryRaiz. Todos los derechos reservados.</span>
            <div class="space-x-4 mt-2 md:mt-0">
                <a href="#" class="hover:text-white">Privacidad</a>
                <a href="#" class="hover:text-white">Términos</a>
            </div>
        </div>
    </div>
</footer>
