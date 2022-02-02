<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    public static function get($email)
    {
        $user = DB::table('users')
        ->where('email', '=', $email)
        ->get();
        return $user;
    }
    public static function register($user)
    {
        $success = DB::table('users')
        ->insert($user);

        return $success;
    }
}
