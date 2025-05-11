<?php

namespace App\Livewire\Auth;

use App\Models\Community;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $bio = '';
    public string $region = '';
    public string $specialty = '';
    public ?int $community_id = null;
    public ?int $role_id = null;

    // Para los dropdowns
    public $communities = [];
    public $roles = [];
    
    public function mount()
    {
        // Cargamos las comunidades y roles disponibles para los dropdowns
        $this->communities = Community::all();
        // Asumimos que solo mostramos roles que un usuario puede seleccionar en registro
        // (por ejemplo, no incluir admin)
        $this->roles = Role::whereIn('name', ['visitor', 'contributor'])->get();
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'bio' => ['nullable', 'string', 'max:500'],
            'region' => ['nullable', 'string', 'max:100'],
            'specialty' => ['nullable', 'string', 'max:100'],
            'community_id' => ['nullable', 'exists:communities,id'],
            'role_id' => ['nullable', 'exists:roles,id'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // Eliminamos el role_id ya que lo asignaremos después con attach
        $roleId = $validated['role_id'] ?? null;
        unset($validated['role_id']);

        // Crear el usuario
        $user = User::create($validated);
        
        // Asignar rol predeterminado (visitor) si no se eligió ninguno
        if (!$roleId) {
            $roleId = Role::where('name', 'visitor')->first()->id;
        }
        
        // Asignar el rol al usuario
        $user->roles()->attach($roleId);

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
