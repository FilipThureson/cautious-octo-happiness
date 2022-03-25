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
            'title' => filter_var(Request::post('title'), FILTER_SANITIZE_SPECIAL_CHARS),
            'blog' => Request::post('postText'),
            'email_fk' => Session::get('email')
        ];

        $success = Post::new($post);
        return redirect('/');
    }
    public function singlePost($id)
    {
<<<<<<< Updated upstream
        # code...
        $post = Post::getOne($id)[0];
=======
        $post = Post::getOne($id);
>>>>>>> Stashed changes
        return view('singlePost', ['post'=>$post]);
    }

    public function getComments($id){

        $comments = Post::getComments($id);

        return $comments;
    }
    public function addComment(){
        $data = [
            'parent_post' => filter_var(Request::post('parent'), FILTER_SANITIZE_SPECIAL_CHARS),
            'blog' => filter_var(Request::post('blog'), FILTER_SANITIZE_SPECIAL_CHARS),
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

    public function deletePost(){
        $id = Request::post('id');
        $post = Post::getOne($id);
        if($post[0]->email === Session::get('email')){
            if(Post::removePost($id)){
                return redirect('/');
            }else{
                return "error";
            }

        }else{
            return 401;
        }
    }
}
