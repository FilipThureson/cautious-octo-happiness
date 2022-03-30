<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;


class postsController extends Controller
{

    //viewn för att ladda upp nya inlägg
    public function newPostPage()
    {
        if(!Session::get('name')){
            return view('newPost', ['notLoggedIn' => true]); //ifall användaren inte är inloggad skicka med det till viewn newposts
        }
        return view('newPost',['notLoggedIn' => false]); //tvärt om från rad 17
    }

    //laddar upp nya inlägg
    public function addPost()
    {
        $post = [
            'title' => filter_var(Request::post('title'), FILTER_SANITIZE_SPECIAL_CHARS),
            'blog' => Request::post('postText'),
            'email_fk' => Session::get('email')
        ]; //hämtar och saniterar data från formuläret

        $success = Post::new($post); //laddar upp till databasen
        if($success){
            return redirect('/'); //om det lyckas skicka tillbaka till startsidan
        }else{
            return "error"; //om det inte lyckas skicka tillbaka error
        }
    }

    //returnerar en post från angiven id
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

    //returnerar alla kommentarer till angiven post

    public function getComments($id){

        $comments = Post::getComments($id);

        return $comments;
    }

    //lägger till en kommentar till angiven post
    public function addComment(){
        $data = [ //hämtar data från formuläret
            'parent_post' => Request::post('parent'),
            'blog' => Request::post('blog'),
            'email_fk' => Request::post('email'),
            'title' => "comment"
        ];

        $status = Post::addComment($data); //lägger till kommentaren till databasen
        if($status){
            return back(); //om det lyckas skicka tillbaka till förgående sidan
        }else{
            return "server Error Please try again!"; //om det inte lyckas skicka tillbaka error
        }
    }
    //tar bort ett inlägg
    public function deletePost(){
        //hämtar id från formuläret samt posten som ska tas bort
        $id = Request::post('id');
        $post = Post::getOne($id);

        if($post[0]->email === Session::get('email')){ //kollar om inloggad användare är skaparen av inlägget
            if(Post::removePost($id)){
                return redirect('/'); //om det lyckas skicka tillbaka till startsidan
            }else{
                return "error"; //om det inte lyckas skicka tillbaka error
            }

        }else{
            return 401; //om användaren inte är skaparen av inlägget skicka 401 - unauthorized
        }
    }
}
