<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    public static function new($post)
    {
        $status = DB::table('posts')
        ->insert($post);

        return $status;
    }
    public static function get(){
        $posts = DB::table('posts')->join('users', 'users.email', '=', 'posts.email_fk')->where('parent_post', '=', '-1')->orderByDesc('created_at')->get();
        foreach($posts as $post){
            $post->password = "";
        };
        return $posts;
    }
    public static function getOne($id){
        $posts = DB::table('posts')->join('users', 'users.email', '=', 'posts.email_fk')->where('id', '=', $id)->where('parent_post', '=', -1)->orderByDesc('created_at')->get();
        $posts[0]->password = "";
        return $posts;
    }
    public static function getComments($id){
        $comments = DB::table('posts')->join('users', 'users.email', '=', 'posts.email_fk')->where('parent_post', '=', $id)->orderByDesc('created_at')->get();
        foreach($comments as $comment){
            $comment->password = "";
        }
        return $comments;

        /*
        $comments = DB::select("select * from (select * from posts, users where email=email_fk order by parent_post, id) posts, (select @pv := '{$id}') initialisation where find_in_set(parent_post, @pv) > 0 and @pv := concat(@pv, ',', id)");
        foreach($comments as $comment){
            $comment->password = "";
        }
        return $comments;
        */
    }
    public static function addComment($comment){
        $status = DB::table('posts')
        ->insert($comment);

        return $status;
    }
}
