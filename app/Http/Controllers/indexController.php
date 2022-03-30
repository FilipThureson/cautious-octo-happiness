<?php

namespace App\Http\Controllers;

use App\Models\Post;

class indexController extends Controller
{

    //returnerar viewn login med alla posts
    public function index()
    {
        $posts = Post::get();
        return view('index', ['posts' => $posts]);
    }
}
