<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index()
    {

        $posts = Post::get();
        return view('index', ['posts' => $posts]);
    }
}
