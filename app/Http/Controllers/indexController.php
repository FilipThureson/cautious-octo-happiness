<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index()
    {
        if(!Session::get('isLogged')){

        }
    }
}
