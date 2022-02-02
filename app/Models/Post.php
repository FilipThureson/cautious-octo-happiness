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
        $posts = DB::table('posts')->join('users', 'users.email', '=', 'posts.email_fk')->orderByDesc('created_at')->get();
        return $posts;
    }
}
