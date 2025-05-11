<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::latest()->get();
        return view('communities.index', compact('communities'));
    }

    public function show(Community $community)
    {
        return view('communities.show', compact('community'));
    }
}
