<?php

use App\Http\Controllers\postsController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [userController::class, 'login']);

Route::post('/register', [userController::class, 'register']);

Route::get('/logout', function(){
    Session::flush();
    return back();
});

Route::post('/newPost', [postsController::class, 'addPost']);
