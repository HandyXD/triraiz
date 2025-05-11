<?php

namespace App\Livewire;

use App\Models\Community;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Dashboard extends Component
{
    public $pendingReviews = [];
    public $recentPosts;
    public $communityStats;
    public $userStats = [];
    public $userRole = null;
    public $userCommunity = null;

    public function mount()
    {
        $user = Auth::user();
        //$this->userRole = $user->roles()->first();
        $this->userCommunity = $user->community;
        // Cargar datos según el rol del usuario
        // if ($user->hasAnyRole(['admin', 'moderator'])) {
        //     $this->loadModeratorData($user);
        // } else {
        //     $this->loadUserData($user);
        // }
        $this->loadPosts();
        $this->community();

    }

    protected function loadModeratorData($user)
    {
        // Para moderadores, mostrar contenido pendiente de revisión
        if ($user->hasRole('admin')) {
            // Administradores ven todo el contenido pendiente
            $this->pendingReviews = Post::where('status', 'pendiente')
                ->with(['user', 'community'])
                ->latest()
                ->take(5)
                ->get();
                
            // Estadísticas de todas las comunidades
            $this->communityStats = Community::withCount(['users', 'posts'])
                ->latest('posts_count')
                ->take(5)
                ->get();
        } else {
            // Moderadores solo ven contenido de su comunidad
            $this->pendingReviews = Post::where('status', 'pendiente')
                ->where('community_id', $user->community_id)
                ->with(['user'])
                ->latest()
                ->take(5)
                ->get();
                
            // Solo estadísticas de su comunidad
            $this->communityStats = [$user->community()->withCount(['users', 'posts'])->first()];
        }

        // Posts recientes para ambos
        $this->recentPosts = Post::where('status', 'publicado')
            ->with(['user', 'community', 'categories'])
            ->latest()
            ->take(5)
            ->get();
            
        // Estadísticas de usuarios
        $this->userStats = [
            'total' => User::count(),
            'new_today' => User::whereDate('created_at', today())->count(),
            'contributors' => User::whereHas('roles', function ($query) {
                $query->where('name', 'contributor');
            })->count(),
            'moderators' => User::whereHas('roles', function ($query) {
                $query->where('name', 'moderator');
            })->count(),
        ];
    }

    protected function loadUserData($user)
    {
        // Para usuarios normales, mostrar contenido relevante para ellos
        if ($user->hasRole('contributor')) {
            // Posts propios y su estado
            $this->recentPosts = Post::where('user_id', $user->id)
                ->with(['community', 'categories'])
                ->latest()
                ->take(5)
                ->get();
        } else {
            // Visitantes ven solo posts publicados recientes
            $this->recentPosts = Post::where('status', 'publicado')
                ->with(['user', 'community', 'categories'])
                ->latest()
                ->take(5)
                ->get();
        }

        // Estadísticas simplificadas para la comunidad del usuario, si tiene
        if ($user->community) {
            $this->communityStats = [$user->community()->withCount(['users', 'posts'])->first()];
        } else {
            $this->communityStats = Community::withCount(['users', 'posts'])
                ->latest('posts_count')
                ->take(3)
                ->get();
        }
    }

    public function loadPosts()
    {
        $this->recentPosts = Post::with('user', 'categories')
            ->where('user_id', auth()->id())
            ->latest()
            ->take(10)
            ->get();
    }

    public function community()
    {
        $user = auth()->user();
        $userCommunity = $user->community;

        // Si quieres mostrar solo la comunidad del usuario
        $this->communityStats = Community::withCount(['users', 'posts'])
            ->when($userCommunity, function ($query) use ($userCommunity) {
                return $query->where('id', $userCommunity->id);
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}