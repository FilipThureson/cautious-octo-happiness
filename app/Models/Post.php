<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{

    //skapar ny post med inskickade post array
    public static function new($post)
    {
        $status = DB::table('posts')
        ->insert($post);

        return $status;
    }
    //hämtar alla posts samt tar bort lösenordet från dem
    public static function get(){
        $posts = DB::table('posts')->join('users', 'users.email', '=', 'posts.email_fk')->where('parent_post', '=', '-1')->orderByDesc('created_at')->get();
        foreach($posts as $post){
            $post->password = "";
        };
        return $posts;
    }
    //hämtar en post med inskickad id
    public static function getOne($id){
        $posts = DB::table('posts')->join('users', 'users.email', '=', 'posts.email_fk')->where('id', '=', $id)->where('parent_post', '=', -1)->orderByDesc('created_at')->get();
        unset($posts[0]->password);
        return $posts;
    }

    /*
    getComments($id) -> retunerar array med kommentarer, Varje kommentar har en variabel $comment->child vilket är en ny getComments($id);
    */
    public static function getComments($id){

        $comments = DB::table('posts')->join('users', 'users.email', '=', 'posts.email_fk')->where('parent_post', '=', $id)->orderByDesc('created_at')->get();
        foreach($comments as $comment){
            //Hämtar alla kommentarer med förälder idt ($comment->id);
            $childs= Post::getComments($comment->id);
            //Lagrar barnen i childs indexet.
            $comment->childs = $childs;
            //tar bort användarens hashade lösenord innan det skickas till klienten.
            unset($comment->password);
        }
        return $comments;
    }
    //skapar ny kommentar med inskickade kommentar array
    public static function addComment($comment){
        $status = DB::table('posts')
        ->insert($comment);

        return $status;
    }
    //tar bort en post med inskickad id
    public static function removePost($id){
        return DB::table('posts')->where('id', '=', $id)->delete();
    }
}
