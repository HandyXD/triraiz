<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $community = Community::where('name', 'San Basilio de Palenque')->first();

        if (!$community) {
            $this->command->error('¡La comunidad San Basilio de Palenque no existe!');
            $this->command->info('Ejecuta primero el CommunitySeeder');
            return;
        }
    
        User::firstOrCreate(
            ['email' => 'user@user.com'],
            [
                'name' => 'Juan Palenquero',
                'password' => Hash::make('password'),
                'profile_image' => 'img/logo.png',
                'bio' => 'Miembro activo de la comunidad...',
                'community_id' => $community->id,
                'region' => 'Caribe',
                'specialty' => 'Música tradicional',
                'email_verified_at' => now(),
            ]
        );
    
        $this->command->info('¡Usuario de prueba creado con éxito!');
    }
}
