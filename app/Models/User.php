<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    //hämtar en användare med inskickad email
    public static function get($email)
    {
        $user = DB::table('users')
        ->where('email', '=', $email)
        ->get();
        return $user;
    }
    //skapar ny användare med inskickade user array
    public static function register($user)
    {
        $success = DB::table('users')
        ->insert($user);

        return $success;
    }
}
