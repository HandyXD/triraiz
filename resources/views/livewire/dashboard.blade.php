<div class="py-4">
    <div class="mx-auto sm:px-6 lg:px-8">
        <!-- Welcome banner -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6 p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        {{ __('Bienvenido') }}, {{ Auth::user()->name }}!
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        @if(Auth::user()->hasRole('admin'))
                            {{ __('Platform overview and administration tools') }}
                        @elseif(Auth::user()->hasRole('moderator'))
                            {{ __('Review content and manage your community') }}
                        @elseif(Auth::user()->hasRole('contributor'))
                            {{ __('Create and track your content') }}
                        @else
                            {{ __('Explore el contenido más reciente de las comunidades de NAPR') }}
                        @endif
                    </p>
                </div>
                <div>
                    @if(Auth::user()->hasAnyRole(['contributor', 'moderator', 'admin']))
                        <flux:button href="{{ route('posts.create') }}" wire:navigate>
                            {{ __('Create Post') }}
                        </flux:button>
                    @endif
                </div>
            </div>
        </div>

        <!-- Dashboard content grid -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            
            <!-- Quick stats cards -->
            @if(Auth::user()->hasAnyRole(['moderator', 'admin']))
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 sm:p-6 lg:col-span-2">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                            {{ __('Platform Stats') }}
                        </h3>
                    </div>
                    <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Total Users') }}</p>
                                    <h4 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $userStats['total'] }}</h4>
                                </div>
                                <div class="rounded-full bg-blue-100 dark:bg-blue-900 p-2">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('New Today') }}</p>
                                    <h4 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $userStats['new_today'] }}</h4>
                                </div>
                                <div class="rounded-full bg-green-100 dark:bg-green-900 p-2">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 plus" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Contributors') }}</p>
                                    <h4 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $userStats['contributors'] }}</h4>
                                </div>
                                <div class="rounded-full bg-yellow-100 dark:bg-yellow-900 p-2">
                                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Moderators') }}</p>
                                    <h4 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $userStats['moderators'] }}</h4>
                                </div>
                                <div class="rounded-full bg-purple-100 dark:bg-purple-900 p-2">
                                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Community information -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 sm:p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                        {{ $userCommunity ? $userCommunity->name : __('Top Communities') }}
                    </h3>
                    @if(Auth::user()->hasRole('admin'))
                        <a href="{{ route('communities.index') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
                            {{ __('Ver Todo') }}
                        </a>
                    @endif
                </div>
                
                @foreach($communityStats as $community)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 mb-4 last:mb-0">
                        <div class="flex items-center mb-2">
                            <img src="{{ $community->logo_url ? asset($community->logo_url) : asset('img/logo.png') }}" alt="{{ $community->name }}" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $community->name }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $community->location }}</p>
                            </div>
                        </div>
                        <div class="flex gap-4 mt-2">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Members') }}</p>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ $community->users_count }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Posts') }}</p>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ $community->posts_count }}</p>
                            </div>
                        </div>
                        @if($userCommunity && $community->id === $userCommunity->id)
                            <div class="mt-3">
                                <flux:button href="{{ route('communities.show', $community) }}" wire:navigate size="sm">
                                    {{ __('Ver Comunidades') }}
                                </flux:button>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Pending reviews for moderators/admins -->
            @if(Auth::user()->hasAnyRole(['moderator', 'admin']) && count($pendingReviews) > 0)
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 sm:p-6 md:col-span-2">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                            {{ __('Pending Reviews') }}
                        </h3>
                        <a href="{{ route('reviews.index') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
                            {{ __('Ver Todo') }}
                        </a>
                    </div>
                    <div class="flow-root">
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($pendingReviews as $post)
                                <li class="py-3">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-base font-semibold text-gray-900 dark:text-white truncate">
                                                {{ $post->title }}
                                            </p>
                                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                <p>{{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <flux:button href="{{ route('reviews.show', $post->id) }}" wire:navigate variant="secondary" size="sm">
                                            {{ __('Review') }}
                                        </flux:button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Recent posts -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 sm:p-6 md:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                        @if(Auth::user()->hasRole('contributor') && !Auth::user()->hasAnyRole(['moderator', 'admin']))
                            {{ __('Your Posts') }}
                        @else
                            {{ __('Publicaciones recientes') }}
                        @endif
                    </h3>
                    <a href="{{ route('posts.index') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
                        {{ __('View all') }}
                    </a>
                </div>
                
                @include('posts.userPosts', ['recentPosts' => $recentPosts])
            </div>
        </div>
    </div>
</div>