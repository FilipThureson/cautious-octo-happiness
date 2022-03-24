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
        return redirect('/');
    }
    public function singlePost($id)
    {
        # code...
        $post = Post::getOne($id);
        return view('singlePost', ['post'=>$post]);
    }

    public function getComments($id){

        $comments = Post::getComments($id);
        
        return $comments;
    }
    public function addComment(){
        $data = [
            'parent_post' => Request::post('parent'),
            'blog' => Request::post('blog'),
            'email_fk' => Request::post('email'),
            'title' => "comment"
        ];

        $status = Post::addComment($data);
        if($status){
            return back();
        }else{
            return "server Error Please try again!";
        }
    }
}
