<?php

namespace App\Http\Controllers;

use App\Models\Post;

class indexController extends Controller
{
    public function index()
    {

        $posts = Post::get();
        return view('index', ['posts' => $posts]);
    }
}
