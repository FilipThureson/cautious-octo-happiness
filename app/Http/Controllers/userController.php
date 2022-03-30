<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;



class userController extends Controller
{

    //returnerar viewn login med eventuella felmeddelanden
    public function loginPage()
    {
        return view('login', ['error' => Session::get('login-error')]);
    }
    public function login()
    {
        //hämtar emailen och lösenorder från formuläret
        $email = Request::post('email');
        $password = Request::post('password');


        //hämtar användaren med inskickad email
        $account = User::get($email);
        //ifall användaren inte finns returnera error
        if(count($account) == 0){
            Session::put('login-error', 'Email ej registrerad');
            return back();
        }else{
            //kolla om lösenordet stämmer överens med det i databasen
            if(Hash::check($password, $account[0]->password)){
                Session::put('login-error', null);
                Session::put('email', $email);
                Session::put('name', $account[0]->name);
                return redirect('/');
            }else{
                //lösenordet stämmer inte överens med det i databasen
                Session::put('login-error', 'Lösenord ej korrekt');
            return back();
            }
        }
    }
    public function register()
    {
        //hämtar emailen, namnet och lösenordet från formuläret
        $user = [
            "name" => filter_var(Request::post('fName'), FILTER_SANITIZE_SPECIAL_CHARS) . " " .filter_var(Request::post('sName'), FILTER_SANITIZE_SPECIAL_CHARS),
            "email" => filter_var(Request::post('email'), FILTER_SANITIZE_EMAIL),
            "password" => Hash::make(filter_var(Request::post('password'), FILTER_SANITIZE_SPECIAL_CHARS))
        ];
        //ifall inserten lyckas returnera success och redirecta till login
        $success = User::register($user);
        if($success){
            Session::put('register-error', null);
            return redirect('/login');
        }else{
        //ifall inserten misslyckas returnera error och redirecta till register
            Session::put('register-error', 'Det blev ett fel vid registering försök igen');
            return redirect('register');
        }
    }
    //returnerar registation html sidan och skickar med error från register
    public function registerPage()
    {
        return view('register', ['error' => Session::get('register-error')]);
    }
}
