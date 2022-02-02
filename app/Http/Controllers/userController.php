<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;



class userController extends Controller
{
    public function loginPage()
    {
        return view('login', ['error' => Session::get('login-error')]);
    }
    public function login()
    {
        $email = Request::post('email');
        $password = Request::post('password');

        $account = User::get($email);
        if(count($account) == 0){
            Session::put('login-error', 'Email ej registrerad');
            return back();
        }else{
            if(Hash::check($password, $account[0]->password)){
                Session::put('login-error', null);
                Session::put('email', $email);
                Session::put('name', $account[0]->name);
                return redirect('/');
            }else{
                Session::put('login-error', 'Lösenord ej korrekt');
            return back();
            }
        }
    }
    public function register()
    {

        $user = [
            "name" => filter_var(Request::post('fName'), FILTER_SANITIZE_SPECIAL_CHARS) . " " .filter_var(Request::post('sName'), FILTER_SANITIZE_SPECIAL_CHARS),
            "email" => filter_var(Request::post('email'), FILTER_SANITIZE_EMAIL),
            "password" => Hash::make(filter_var(Request::post('password'), FILTER_SANITIZE_SPECIAL_CHARS))
        ];

        $success = User::register($user);
        if($success){
            Session::put('register-error', null);
            return redirect('/login');
        }else{
            Session::put('register-error', 'Det blev ett fel vid registering försök igen');
            return redirect('register');
        }
    }
    public function registerPage()
    {
        return view('register', ['error' => Session::get('register-error')]);
    }
}
