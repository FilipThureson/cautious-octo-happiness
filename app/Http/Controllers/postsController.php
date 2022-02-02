<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;


class postsController extends Controller
{
    public function newPostPage()
    {
        if(!Session::get('name')){
            return view('newPost', ['notLoggedIn' => true]);
        }
        return view('newPost',['notLoggedIn' => false]);
    }
    public function addPost()
    {
        $post = [
            'title' => Request::post('title'),
            'blog' => Request::post('postText'),
            'email_fk' => Session::get('email')
        ];

        $success = Post::new($post);
        return $success;
    }
}
