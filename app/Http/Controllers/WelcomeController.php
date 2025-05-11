<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $communities = Community::latest()->take(6)->get();
        $latestPosts = Post::latest()->with('user')->take(3)->get();

        return view('welcome', compact('communities', 'latestPosts'));
    }
}
