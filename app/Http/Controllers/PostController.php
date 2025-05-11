<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('user', 'categories');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }
    
        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.slug', $request->category);
            });
        }
    
        $posts = $query->latest()->paginate(9)->withQueryString();
        $categories = Category::all();
    
        return view('posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $communities = Community::all();
        return view('posts.create', compact('categories', 'communities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'type' => 'required|in:artículo,crónica,entrevista,video,podcast,galería,educativo',
            'status' => 'in:borrador,pendiente,publicado,rechazado',
            'category_ids' => 'array',
            'category_ids.*' => 'exists:categories,id',
            'community_id' => 'nullable|exists:communities,id',
        ]);

        $post = new Post($validated);
        $post->user_id = auth()->id();
        $post->save();

        if (!empty($validated['category_ids'])) {
            $post->categories()->sync($validated['category_ids']);
        }

        return redirect()->route('dashboard')->with('success', 'Post creado correctamente');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $communities = Community::all();
        return view('posts.edit', compact('post', 'categories', 'communities'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'type' => 'required|in:artículo,crónica,entrevista,video,podcast,galería,educativo',
            'status' => 'in:borrador,pendiente,publicado,rechazado',
            'category_ids' => 'array',
            'category_ids.*' => 'exists:categories,id',
            'community_id' => 'nullable|exists:communities,id',
        ]);

        $post->fill($validated);
        $post->save();

        if (!empty($validated['category_ids'])) {
            $post->categories()->sync($validated['category_ids']);
        }

        return redirect()->route('dashboard')->with('success', 'Post actualizado correctamente');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post eliminado');
    }

}
