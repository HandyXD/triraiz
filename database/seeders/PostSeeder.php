<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Community;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $community = Community::where('name', 'San Basilio de Palenque')->first();
        $categories = Category::all();

        $posts = [
            [
                'title' => 'Festival de Tambores en Palenque',
                'type' => 'artículo',
                'status' => 'publicado',
                'language' => 'Español',
                'is_featured' => true,
            ],
            [
                'title' => 'Entrevista a líder',
                'type' => 'entrevista',
                'status' => 'pendiente',
                'language' => 'Español',
            ],
            [
                'title' => 'Taller de tejido tradicional',
                'type' => 'educativo',
                'status' => 'borrador',
                'language' => 'Español',
            ]
        ];

        foreach ($posts as $postData) {
            $post = Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'content' => $this->generateFakeContent(),
                'excerpt' => 'Este es un resumen automático del post sobre ' . Str::lower($postData['title']),
                'featured_image' => 'img/posts/post-' . rand(1,5) . '.jpg',
                'type' => $postData['type'],
                'status' => $postData['status'],
                'user_id' => $user->id,
                'community_id' => $community->id,
                'language' => $postData['language'],
                'is_featured' => $postData['is_featured'] ?? false,
                'views' => rand(0, 1000),
            ]);

            $post->categories()->attach(
                $categories->random(rand(1, 2))->pluck('id')
            );
        }
    }

    private function generateFakeContent(): string
    {
        return '<p>' . implode('</p><p>', array_map(function() {
            return fake()->paragraph(rand(3, 6));
        }, range(1, rand(4, 8)))) . '</p>';
    }
}